<?php

    class ProjectModel extends AppModel {

        public function getProject($id) {
            return $this->getDto('project', 'id', $id);
        }

        public function getInstallment($id) {
            return $this->getDto('project_installment', 'id', $id);
        }

        public function makeQuery() {
            $sql = 'SELECT * FROM project p WHERE ';

            $status = $_POST['_filter_status'];
            if ($status != 'all') {
                if ($status == 'ok')
                    $sql .= ' p.status = 1 AND';
                else
                    $sql .= ' p.status = 0 AND';
            }

            $end = $_POST['_filter_end'];
            if ($end != 'all') {
                if ($end == 'finished')
                    $sql .= ' p.done = 1 AND';
                elseif ($end == 'ongoing')
                    $sql .= ' p.done = 0 OR p.done IS NULL AND';
                else
                    $sql .= ' p.done = 0 AND p.end_date < "' . date('Y-m-d') . '" AND';
            }

            $name = $_POST['_filter_name'];
            $sql .= ' p.name LIKE "%' . $name . '%" AND';

            $client = $_POST['_filter_client'];
            if ($client != '') {
                if ($client != 'clear') {
                    $sql .= ' p.id_client = ' . $client . ' AND';
                }
            } else {
                $sql .= ' p.id_client IS NULL AND';
            }

            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = explode('/', $period);
                $sql .= ' p.initial_date >= "' . trim($period[0]) . '" AND p.initial_date <= "' . trim($period[1]) . '" AND ';
            }

            $executor = $_POST['_filter_executor'];
            if ($executor != '') {
                $sql .= ' p.executor LIKE "%' . $executor . '%" AND';
            }

            $sql = rtrim($sql, ' WHEREAND');
            
            $sql .= ' ORDER BY id DESC';

            $projects = $this->query($sql);

            $projects = $this->query2dto($projects, 'project');

            return $projects;

        }

        public function edit($id) {
            $project = $this->getProject($id);
            $status = $project->get('status');
            $done = $project->get('done');
            $doneDate = $project->get('done_date');
            $project = $this->makeDto($project, $id);
            $error = $project[1];
            $project = $project[0];
            $project->set('status', $status);
            if ($project->get('id_client') == '')
                $project->set('id_client', null);
            $project->set('done', $done);
            $project->set('done_date', $doneDate);
            
            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                $this->initTransaction();
                if (!$this->update('project', $project, array('id' => $id))) {
                    Viewer::flash(_INSERT_ERROR, 'e');

                    return false;
                }
                $this->endTransaction();

                return true;

            }

        }

        public function addInstallment($id) {
            if (is_object($id)) {
                $project = $id;
                $id = $project->get('id');
            } else {
                $project = $this->getProject($id);
            }

            // Installments number validation: must be a valid integer number, between 0 and infinity
            // If not valid, cancel the transaction (including the project) and returns the error message
            if (!isset($_POST['qttInstallments'])) {
                Viewer::flash('Informe a quantidade de parcelas.', 'e');
                $this->cancelTransaction();

                return false;
            } else {
                if (!$project->validNumber($_POST['qttInstallments'])) {
                    Viewer::flash('Informe a quantidade de parcelas.', 'e');
                    $this->cancelTransaction();

                    return false;
                } else {
                    if ($_POST['qttInstallments'] < 0) {
                        Viewer::flash('Informe a quantidade de parcelas.', 'e');
                        $this->cancelTransaction();

                        return false;
                    }
                }
            }


            $error = '';

            $newStatus = 1;
            // For loop to insert all the installments
            if (isset($_POST['minInstallments']))
                $ini = $_POST['minInstallments'];
            else
                $ini = 0;
            for ($i = $ini; $i < $_POST['qttInstallments']; $i++) {
                $installment = new Project_installment();
                $installment->set('id_project', $id);
                $installment->set('number', $i + 1);
                $installment->set('status', $_POST['status' . ($i + 1)]);
                if (!$installment->get('status'))
                    $newStatus = 0;

                if (!$installment->set('value', $_POST['value' . ($i + 1)]))
                    $error .= $installment->FieldsErrors['value'];
                if (!$installment->set('expiry', $_POST['expiry' . ($i + 1)]))
                    $error .= $installment->FieldsErrors['expiry'];

                if ($error != '') {
                    // If any errors were encountered during the validation,
                    // cancel the transaction (including the project) and returns the error message
                    Viewer::flash($error, 'e');
                    $this->cancelTransaction();

                    return false;
                }

                if (!$this->insert('project_installment', $installment)) {
                    // If not inserted, cancel the transaction (including the project and other installments)
                    // and returns the error message
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();

                    return false;
                }

                // If the installment is already payed, adds to the entry table
                if ($installment->get('status')) {
                    $entryModel = isset($entryModel) ? $entryModel : new EntryModel();
                    $_POST['destination'] = $_POST['destination'.$installment->get('number')];
                    if (!$entryModel->addByInstallment($installment, $project->get('id_entry_type'), $project->get('id_client'))) {
                        Viewer::flash(_INSERT_ERROR, 'e');
                        $this->cancelTransaction();

                        return false;
                    }
                }
            }

            // If all installments were payed
            if ($_POST['qttInstallments'] > 0) {
                $this->updateStatus($project);
            }

            if(!is_null($project->get('id_client')) && trim($project->get('id_client')) != ''){
                $clientModel = new ClientModel();
                $clientModel->inspectionValidate($project->get('id_client'));
            }

            return true;

        }

        public function editInstallment($id) {
            $installment = $this->getInstallment($id);
            $error = '';
            if (!$installment->set('value', $_POST['value']))
                $error .= $installment->FieldsErrors['value'];
            if (!$installment->set('expiry', $_POST['expiry']))
                $error .= $installment->FieldsErrors['expiry'];

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                $this->initTransaction();
                if (!$this->update('project_installment', $installment, array('id' => $id))) {
                    Viewer::flash(_INSERT_ERROR, 'e');

                    return false;
                }

                if (!is_null($installment->get('id_project', true)->get('id_client')) && trim($installment->get('id_project', true)->get('id_client')) != '') {
                    $clientModel = new ClientModel();
                    $clientModel->inspectionValidate($installment->get('id_project', true)->get('id_client'));
                }

                $this->endTransaction();

                return true;

            }

        }

        public function add() {

            $project = new Project();
            $project = $this->makeDto($project);
            $error = $project[1];
            $project = $project[0];
            $project->set('status', 0);
            if ($project->get('id_client') == '')
                $project->set('id_client', null);

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                $this->initTransaction();

                // Inits the transaction inserting the project
                if (!$this->insert('project', $project)) {
                    // if not inserted, cancel the transaction and returns the error message
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();

                    return false;
                }

                // Add the installments
                $id = $this->lastInserted('project');
                $project->set('id', $id);
                if (!$this->addInstallment($project))
                    return false;

                // Updates the client status
                if (!is_null($project->get('id_client')) && trim($project->get('id_client')) != '') {
                    $clientModel = new ClientModel();
                    $clientModel->inspectionValidate($project->get('id_client'));
                }

                return true;
            }
        }

        public function updateStatus($project) {
            $installments = $this->search('project_installment', '*', array('id_project' => $project->get('id')));
            $project->set('status', 1);
            if (count($installments) < 1) {
                $project->set('status', 0);
            } else {
                foreach ($installments as $installment) {
                    if ($installment['status'] == 0)
                        $project->set('status', 0);
                }
            }
            $this->update('project', $project, array('id' => $project->get('id')));

            return $project;
        }

        /**
         * Makes the array to export clients in pdf/excel
         * @return array
         */
        public function query2export() {
            $projects = $this->makeQuery();
            $final = array();
            foreach ($projects as $project) {
                $client = $project->get('id_client', true);
                $project->set('status', !$project->get('status'));
                if (is_object($client)) {
                    $client = $client->get('name');
                } else {
                    $client = '-';
                }
                $final[] = array(
                    $project->get('id'),
                    $project->get('name'),
                    $client,
                    'R$' . $project->get('value', true),
                    $project->get('initial_date', true),
                    $project->get('end_date', true),
                    $project->get('executor'),
                    $project->get('status', true),
                );
            }

            return $final;
        }

        /**
         * Creates the type of the export (without pendings, specific client, etc).
         */
        public function makeExportType() {
            $status = $_POST['_filter_status'];
            if ($status != 'all') {
                if ($status == 'ok')
                    $type = ' | Sem pendências |';
                else
                    $type = ' | Com pendências';
            } else {
                $type = ' | Com e sem pendências |';
            }

            $end = $_POST['_filter_end'];
            if ($end != 'all') {
                if ($end == 'finished')
                    $type .= ' Projetos finalizados |';
                elseif ($end == 'ongoing')
                    $type .= ' Projetos em andamento |';
                else
                    $type .= ' Projetos atrasados |';
            }

            $name = $_POST['_filter_name'];
            if ($name != '') {
                $type .= ' Nome contenha ' . $name . ' |';
            }

            $client = $_POST['_filter_client'];
            if ($client != '') {
                if ($client != 'clear') {
                    $type .= ' Cliente ID ' . $client . ' |';
                }
            } else {
                $type .= ' Sem cliente envolvido |';
            }

            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = explode('/', $period);
                $type .= ' Período entre ' . trim(date('d/m/Y', $period[0])) . ' e ' . trim(date('d/m/Y', $period[1])) . ' |';
            }

            $executor = $_POST['_filter_executor'];
            if ($executor != '') {
                $type .= ' Executor contenha ' . $executor . ' |';
            }

            return rtrim($type, '| ');
        }

        public function addInstallmentForm($qtt) {
            $div = '<div class="installment row" id="installment' . $qtt . '">';

            $div .= '<div class="col-xs-1">';
            $div .= '<br>';
            $div .= '<b style="font-size: 18px!important" id="lblQtt' . $qtt . '">' . $qtt . '.</b>';
            $div .= '</div>';

            $div .= '<div class="col-sm-3 form-group">';
            $div .= '<label id="lblValue' . $qtt . '" for="value' . $qtt . '" class="control-label">Valor</label>';
            $div .= '<input type="text" id="lblValue' . $qtt . '" name="value' . $qtt . '" class="form-control mask-money">';
            $div .= '</div>';

            $div .= '<div class="col-sm-3 form-group">';
            $div .= '<label id="lblExpiry' . $qtt . '" for="expiry' . $qtt . '" class="control-label">Vencimento</label>';
            if($qtt == 1)
                $class = 'firstInstallment';
            else
                $class = '';
            $div .= '<input type="date" id="lblExpiry' . $qtt . '" name="expiry' . $qtt . '" class="form-control mask-date expiry '.$class.'">';
            $div .= '</div>';

            $div .= '<div class="col-sm-2 form-group">';
            $div .= '<label id="lblStatus' . $qtt . '" for="status' . $qtt . '" class="control-label">Situação</label> <br>';
            $div .= '<input type="radio" id="iptStatusnok' . $qtt . '" name="status' . $qtt . '" value="0" checked> Pendente <br>';
            $div .= '<input type="radio" id="iptStatusok' . $qtt . '" name="status' . $qtt . '" value="1"> Pago ';
            $div .= '</div>';
            
            $div .= '<div class="col-sm-2 form-group">';
            $div .= '<label id="lblDestination'.$qtt.'" for="destination'.$qtt.'" class="control-label">Caixa</label>';
            $div .= '<select id="iptDestination'.$qtt.'" name="destination'.$qtt.'" class="form-control">';
            $div .= '<option value="bank">Banco</option>';
            $div .= '<option value="internal">Interno</option>';
            $div .= '</select>';
            $div .= '</div>';

            $div .= '<div class="col-xs-1 col-md-1 form-group"><br>';
            $div .= '<button type="button" class="btn btn-default btn-lg btnRemove" id="' . $qtt . '">';
            $div .= '<span class="fa fa-remove"></span>';
            $div .= '</button>';
            $div .= '</div>';

            $div .= '</div>';
            echo $div;
        }

        public function installmentsModal($id_project) {

            if ($this->exists('project', 'id', $id_project)) {
                $project = $this->getProject($id_project);
                $json = array(
                    'title'      => $project->get('name'),
                    'pendencies' => $this->getPendencies($id_project),
                );
                echo json_encode($json);
            } else {
                echo 0;
            }

        }

        public function getPendencies($id_project) {
            $installments = $this->search('project_installment', '*', array('id_project' => $id_project));
            $installments = $this->query2dto($installments, 'project_installment');
            $pendencies = array();
            foreach ($installments as $installment) {
                $pendencies[] = array(
                    'number' => $installment->get('number'),
                    'value'  => 'R$' . $installment->get('value', true),
                    'expiry' => $installment->get('expiry', true),
                );
            }

            return $pendencies;
        }

        public function end($id) {
            $project = $this->getProject($id);
            $project->set('done', 1);
            if (!$project->set('done_date', $_POST['done_date'])) {
                Viewer::flash($project->FieldsErrors['done_date'], 'e');

                return false;
            }
            if (!$this->update('project', $project, array('id' => $id))) {
                Viewer::flash(_INSERT_ERROR, 'e');

                return false;
            }

            return true;
        }
        
        public function payInstallment($installment) {
            $installment->set('status', 1);
            $entryModel = new Entrymodel();

            $this->initTransaction();
            if (!$entryModel->addByInstallment($installment)) {
                $this->cancelTransaction();

                return false;
            }
            if (!$this->update('project_installment', $installment, array('id' => $installment->get('id')))) {
                $this->cancelTransaction();

                return false;
            }
            $this->endTransaction();

            return true;
        }

    }
