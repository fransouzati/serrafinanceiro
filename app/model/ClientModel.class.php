<?php
    
    class ClientModel extends AppModel {
        
        public function getClient($id) {
            return $this->getDto('client', 'id', $id);
        }
        
        public function getFinances($id) {
            return $this->getDto('finances', 'id', $id);
        }
        
        public function makeQuery() {
            $sql = 'SELECT * FROM client c JOIN finances f ON f.id = c.id WHERE ';
            
            $status = $_POST['_filter_status'];
            if ($status != 'all') {
                if ($status == 'actives')
                    $sql .= ' c.status = 1 AND';
                else
                    $sql .= ' c.status = 0 AND';
            }
            
            $finances = $_POST['_filter_finances'];
            if ($finances != 'all') {
                if ($finances == 'pending')
                    $sql .= ' f.status = 0';
                else
                    $sql .= ' f.status = 1';
            }
            
            $sql = rtrim($sql, ' WHEREAND');
            
            $clients = $this->query($sql);
            
            $clients = $this->query2dto($clients, 'client');
            
            return $clients;
            
        }
        
        public function edit($id) {
            $client = $this->getClient($id);
            $client = $this->makeDto($client, $id);
            $error = $client[1];
            $client = $client[0];
            
            if ($error != '') {
                Viewer::flash($error, 'e');
                
                return false;
            } else {
                $this->initTransaction();
                
                // Init the transaction trying to update the client in the database
                if (!$this->update('client', $client, array('id' => $id))) {
                    // If not updated, cancel the transaction and returns the error message
                    Viewer::flash(_INSERT_ERROR, 'e');
                    
                    return false;
                }
                
                // Else, begins the update of the finances infos
                $finances = $this->getFinances($id);
                // In this case, two DTOs are needed to keep an history of financial information changes
                $oldFinances = $this->getFinances($id);;
                
                $finances = $this->makeDto($finances, $id);
                
                // Do the comparison and put in a boolean var
                $makeHistory = $finances != $oldFinances;
                
                $error = $finances[1];
                $finances = $finances[0];
                
                if ($error != '') {
                    // If there is any errors during the validation process,
                    // cancel the transaction (including the client) and returns the error message
                    Viewer::flash($error, 'e');
                    $this->cancelTransaction();
                    
                    return false;
                }
                
                $finances->set('status', 1);
                $finances->set('observation', $_POST['observation_finances']);
                if (!$this->update('finances', $finances, array('id' => $id))) {
                    // If not updated, cancel the transaction (including the client) and returns the error message
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();
                    
                    return false;
                }
                
                if ($makeHistory) {
                    // If there is any changes in the finances
                    
                    // Needs to have two ifs statements in case of both values are changed,
                    // register the updates in separated database's rows.
                    
                    // monthly value change
                    if ($finances->decimalMask($finances->get('monthly_value')) != $oldFinances->get('monthly_value')) {
                        
                        // default text for description
                        $description = 'Suporte mensal alterado de R$' . $oldFinances->get('monthly_value', true) . ' para ' .
                            $finances->get('monthly_value');
                        
                        $history = new Finances_history();
                        $history->set('id_finances', $id);
                        $history->set('date', date('Y-m-d'));
                        $history->set('description', $description);
                        $this->insert('finances_history', $history);
                    }
                    
                    // observation change
                    if ($finances->get('observation') != $oldFinances->get('observation')) {
                        
                        // default text for description
                        $description = 'Observação alterada para ' . $finances->get('observation');
                        
                        $history = new Finances_history();
                        $history->set('id_finances', $id);
                        $history->set('date', date('Y-m-d'));
                        $history->set('description', $description);
                        $this->insert('finances_history', $history);
                    }
                    
                }
                
                
                $this->endTransaction();
                
                return true;
                
            }
            
        }
        
        public function add() {
            
            $client = new Client();
            $client = $this->makeDto($client);
            $error = $client[1];
            $client = $client[0];
            
            if ($error != '') {
                Viewer::flash($error, 'e');
                
                return false;
            } else {
                $this->initTransaction();
                // Init the transaction trying to insert the client in the database
                if (!$this->insert('client', $client)) {
                    // If not inserted, cancel the transaction and returns the error message
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();
                    
                    return false;
                }
                
                // Else, begins the insertion of the finances infos
                $id = $this->lastInserted('client');
                $finances = new Finances();
                $finances = $this->makeDto($finances, $id);
                $error = $finances[1];
                $finances = $finances[0];
                
                if ($error != '') {
                    // If there is any errors during the validation process,
                    // cancel the transaction (including the client) and returns the error message
                    Viewer::flash($error, 'e');
                    $this->cancelTransaction();
                    
                    return false;
                }
                
                if ($finances->decimalMask($finances->get('monthly_value')) > 0)
                    $finances->set('status', 0);
                else
                    $finances->set('status', 0);
                
                $finances->set('observation', $_POST['observation_finances']);
                if (!$this->insert('finances', $finances)) {
                    // If not inserted, cancel the transaction (including the client) and returns the error message
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();
                    
                    return false;
                }
                
                
                return true;
            }
        }
        
        /**
         * Makes the array to export clients in pdf/excel
         * @return array
         */
        public function query2export() {
            $clients = $this->makeQuery();
            $final = array();
            foreach ($clients as $client) {
                $finances = $this->getFinances($client->get('id'));
                $finances->set('status', !$finances->get('status'));
                $final[] = array(
                    $client->get('id'),
                    $client->get('name'),
                    $client->get('email1'),
                    $client->get('phone1'),
                    $client->get('site'),
                    $client->get('cpf_cnpj'),
                    'R$' . $finances->get('monthly_value', true),
                    $client->get('since', true),
                    $finances->get('status', true),
                );
            }
            
            return $final;
        }
        
        /**
         * Creates the type of the export (without pendings, only actives, etc).
         */
        public function makeExportType() {
            $status = $_POST['_filter_status'];
            if ($status != 'all') {
                if ($status == 'actives')
                    $type = ' | Ativos |';
                else
                    $type = ' | Inativos |';
            } else {
                $type = ' | Ativos e Inativos |';
            }
            
            $finances = $_POST['_filter_finances'];
            if ($finances != 'all') {
                if ($finances == 'pending')
                    $type .= ' Com pendências';
                else
                    $type .= ' Sem pendências';
            } else {
                $type .= ' Com e sem pendências';
            }
            
            return $type;
        }
        
        /**
         * Passes through the clients, project_installments and extra_charge
         * looking for pendencies. Updates the status of the client
         * @return void.
         */
        public function completeInspection($checkDate = true) {
            if (!$this->exists('inspection', 'date', date('Y-m-d')) || !$checkDate) {
                $clients = $this->search('client');
                foreach ($clients as $client) {
                    $this->inspectionValidate($client['id']);
                }
                $inspection = new Inspection();
                $inspection->set('date', date('Y-m-d'));
                $this->insert('inspection', $inspection);
            }
            
            return;
        }
        
        public function inspectionValidate($id) {
            $finances = $this->getFinances($id);
            $financesStatus = $finances->get('status');
            $status = $this->supportInspection($id, $finances->get('monthly_value')) &&
                $this->installmentInspection($id) &&
                $this->extraInspection($id);
            
            if ($financesStatus != $status)
                $this->changeFinancesStatus($finances, $status);
        }
        
        public function supportInspection($id_client, $monthly_value) {
            if ($monthly_value == 0)
                return true;
            
            $sql = 'SELECT * FROM entry 
                    WHERE id_type = ' . _SUPPORT_ENTRY_TYPE_ID . ' AND 
                          date >= "' . date('Y-m') . '-01" AND 
                          date <= "' . date('Y-m-t') . '" AND
                          value >= ' . $monthly_value . ' AND
                          id_client = ' . $id_client;
            
            $entries = $this->query($sql);
            
            if (count($entries) < 1)
                return false;
            
            return true;
        }
        
        public function installmentInspection($id_client) {
            $sql = 'SELECT * FROM project_installment i 
                    JOIN project p ON p.id = i.id_project 
                    WHERE i.status = 0 AND
                          i.expiry >= "' . date('Y-m') . '01" AND
                          i.expiry <  "' . date('Y-m-d') . '" AND
                          p.id_client = ' . $id_client;
            
            $installments = $this->query($sql);
            if (count($installments) > 0)
                return false;
            
            return true;
        }
        
        public function extraInspection($id_client) {
            $sql = 'SELECT * FROM extra_charge
                    WHERE status = 0 AND 
                          expiry >= "' . date('Y-m') . '01" AND
                          expiry <  "' . date('Y-m-d') . '" AND
                          id_client = ' . $id_client;
            
            $extraCharges = $this->query($sql);
            if (count($extraCharges) > 0)
                return false;
            
            return true;
        }
        
        public function changeFinancesStatus($finances, $status) {
            $finances->set('status', $status);
            $this->update('finances', $finances, array('id' => $finances->get('id')));
        }
        
        public function pendenciesModal($id_client) {
            
            if ($this->exists('client', 'id', $id_client)) {
                $client = $this->getClient($id_client);
                $json = array(
                    'name'       => $client->get('name'),
                    'pendencies' => $this->getPendencies($id_client)['pendencies'],
                );
                echo json_encode($json);
            } else {
                echo 0;
            }
            
        }
        
        public function getPendencies($id_client, $period = null) {
            
            if (is_null($period)) {
                $periodInit = date('Y-m-01');
                $periodFinal = date('Y-m-t');
            } else {
                $period = explode('/', $period);
                $periodInit = trim($period[0]);
                $periodFinal = trim($period[1]);
            }
            
            
            $finances = $this->getFinances($id_client);
            $client = $this->getClient($id_client);
            
            $pendencies = array();
            $total = 0;
            $supportTotal = 0;
            $installmentTotal = 0;
            $extraTotal = 0;
            
            // Se paga mensalidade e é cliente ativo
            if ($finances->get('monthly_value') > 0 && $client->get('status')) {

                //Pega quantos meses de diferença tem no relatório
                $diff = abs(strtotime($periodFinal) - strtotime($periodInit));
                $years = floor($diff / (365 * 60 * 60 * 24));
                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $months = ($years * 12) + $months;
                if($months == 0)
                    $months = 1;
                
                // Mês a mês..
                for ($i = 0; $i < $months; $i++) {
                    
                    /*
                     * Precisa deste $i para ir somando os meses
                     * caso for mais de um mês, se não ficaria apenas no mês
                     * da data de início.
                     */
                    $month = explode('-', $periodInit)[1] + $i;
                    $year = explode('-', $periodInit)[0];
                    if ($month > 12) {
                        $month = 01;
                        $year = $year + 1;
                    }
                    
                    // Início e final do mês
                    $monthInit = $year . '-' . $month . '-01';
                    $monthFinal = date("Y-m-t", strtotime($monthInit));
                    // Timestamp
                    $monthInitTs = strtotime($monthInit);
                    $monthFinalTs = strtotime($monthFinal);
                    $todayTs = strtotime(date('Y-m-d'));
    
                    // Verificação se é este mês que está sendo retirado o relatório.
                    $thisMonth = (($todayTs >= $monthInitTs) && ($todayTs <= $monthFinalTs));
                    
                    
                    if ($thisMonth) {
                        if (date('d') > $finances->get('payment_day')) {
                            $finalDate = date('Y-m-d');
                        } else {
                            continue;
                        }
                    } else {
                        if (strtotime($client->get('since')) > $monthInitTs)
                            continue;
                        // Prev & next month
                        $finalDate = $monthFinal;
                    }
                    
                    $sql = 'SELECT * FROM entry 
                                    WHERE id_type = ' . _SUPPORT_ENTRY_TYPE_ID . ' AND 
                                    date >= "' . $monthInit . '" AND 
                                    date <= "' . $finalDate . '" AND
                                    id_client = ' . $id_client;
    
                    $entries = $this->query($sql);
                    if (count($entries) < 1) {
                        $pendencies[] = array(
                            'type'   => 'Suporte web',
                            'value'  => 'R$' . $finances->get('monthly_value', true),
                            'expiry' => $finances->get('payment_day') . '/' . $month . '/' . $year,
                            'id'     => $id_client,
                        );
                        $total += $finances->get('monthly_value');
                        $supportTotal += $finances->get('monthly_value');
                    }
                }
            }
            
            $sql = 'SELECT * FROM extra_charge
                    WHERE status = 0 AND 
                          expiry >= "' . $periodInit . '" AND
                          expiry <  "' . $periodFinal . '" AND
                          id_client = ' . $id_client;
            
            $extraCharges = $this->query2dto($this->query($sql), 'extra_charge');
            foreach ($extraCharges as $extraCharge) {
                $pendencies[] = array(
                    'type'   => 'Cobrança extra',
                    'value'  => 'R$' . $extraCharge->get('value', true),
                    'expiry' => $extraCharge->get('expiry', true),
                    'id'     => $extraCharge->get('id'),
                );
                $total += $extraCharge->get('value');
                $extraTotal += $extraCharge->get('value');
            }
            
            $sql = 'SELECT p.done, 
                           p.done_date, 
                           p.end_date, 
                           p.executor, 
                           p.id_client, 
                           p.initial_date, 
                           p.name, 
                           p.observation, 
                           p.status, 
                           p.value,
                           i.expiry,
                           i.id,
                           i.id_project,
                           i.number,
                           i.status,
                           i.value
                    FROM project_installment i 
                    JOIN project p ON p.id = i.id_project 
                    WHERE i.status = 0 AND
                          i.expiry >= "' . $periodInit . '" AND
                          i.expiry <  "' . $periodFinal . '" AND
                          p.id_client = ' . $id_client . '
                    ORDER BY i.expiry';
            $installments = $this->query2dto($this->query($sql), 'project_installment');
            foreach ($installments as $installment) {
                $pendencies[] = array(
                    'type'   => 'Parcela de projeto',
                    'value'  => 'R$' . $installment->get('value', true),
                    'expiry' => $installment->get('expiry', true),
                    'id'     => $installment->get('id'),
                );
                $total += $installment->get('value');
                $installmentTotal += $installment->get('value');
            }
            
            return array('pendencies' => $pendencies, 'total' => $total,
                         'supportTotal' => $supportTotal, 'extraTotal' => $extraTotal,
                         'installmentTotal' => $installmentTotal);
            
        }
        
        public function getPendenciesExport($id_client, $period = null) {
            
            if (is_null($period)) {
                $periodInit = date('Y-m-01');
                $periodFinal = date('Y-m-t');
            } else {
                $period = explode('/', $period);
                $periodInit = trim($period[0]);
                $periodFinal = trim($period[1]);
            }
            
            
            $finances = $this->getFinances($id_client);
            $client = $this->getClient($id_client);
            
            $pendencies = array(
                'support' => '',
                'extra'   => '',
                'project' => '',
            );
            $total = 0;
            $supportTotal = 0;
            $extraTotal = 0;
            $installmentTotal = 0;
            
            $pendencies['support'] = '-';
            if ($finances->get('monthly_value') > 0 && $client->get('status')) {
                $diff = abs(strtotime($periodFinal) - strtotime($periodInit));
                $years = floor($diff / (365 * 60 * 60 * 24));
                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                if($months == 0)
                    $months = 1;
                
                for ($i = 0; $i < $months; $i++) {
                    $month = explode('-', $periodInit)[1] + $i;
                    $year = explode('-', $periodInit)[0];
                    if ($month > 12) {
                        $month = 01;
                        $year = $year + 1;
                    }
                    
                    $monthInit = $year . '-' . $month . '-01';
                    $monthFinal = date("Y-m-t", strtotime($monthInit));
                    
                    $monthInitTs = strtotime($monthInit);
                    $monthFinalTs = strtotime($monthFinal);
                    $todayTs = strtotime(date('Y-m-d'));
                    
                    $thisMonth = (($todayTs >= $monthInitTs) && ($todayTs <= $monthFinalTs));
                    
                    if ($thisMonth) {
                        if (date('d') > $finances->get('payment_day')) {
                            $finalDate = date('Y-m-d');
                        } else {
                            continue;
                        }
                    } else {
                        // Prev or next month
                        $finalDate = $monthFinal;
                    }
                    
                    $sql = 'SELECT * FROM entry 
                                    WHERE id_type = ' . _SUPPORT_ENTRY_TYPE_ID . ' AND 
                                    date >= "' . $monthInit . '" AND 
                                    date <= "' . $finalDate . '" AND
                                    id_client = ' . $id_client;
                    $entries = $this->query($sql);
                    if (count($entries) < 1) {
                        if ($pendencies['support'] == '-')
                            $pendencies['support'] = '';
                        $expiry = $finances->get('payment_day') . '/' . $month . '/' . $year;
                        $pendencies['support'] .= 'R$' . $finances->get('monthly_value', true) . ' (' . $expiry . ') + ';
                        $total += $finances->get('monthly_value');
                        $supportTotal += $finances->get('monthly_value');
                    }
                }
            }
            $pendencies['support'] = trim($pendencies['support'], ' + ');
            
            $sql = 'SELECT * FROM extra_charge
                    WHERE status = 0 AND 
                          expiry >= "' . $periodInit . '" AND
                          expiry <  "' . $periodFinal . '" AND
                          id_client = ' . $id_client;
            $extraCharges = $this->query2dto($this->query($sql), 'extra_charge');
            if (count($extraCharges)) {
                foreach ($extraCharges as $extraCharge) {
                    $pendencies['extra'] .= 'R$' . $extraCharge->get('value', true) . ' + ';
                    $total += $extraCharge->get('value');
                    $extraTotal += $extraCharge->get('value');
                }
                $pendencies['extra'] = trim($pendencies['extra'], ' + ');
            } else {
                $pendencies['extra'] = '-';
            }
            
            
            $sql = 'SELECT p.done, 
                           p.done_date, 
                           p.end_date, 
                           p.executor, 
                           p.id_client, 
                           p.initial_date, 
                           p.name, 
                           p.observation, 
                           p.status, 
                           p.value,
                           i.expiry,
                           i.id,
                           i.id_project,
                           i.number,
                           i.status,
                           i.value
                    FROM project_installment i 
                    JOIN project p ON p.id = i.id_project 
                    WHERE i.status = 0 AND
                          i.expiry >= "' . $periodInit . '" AND
                          i.expiry <  "' . $periodFinal . '" AND
                          p.id_client = ' . $id_client . '
                    ORDER BY i.expiry';
            $installments = $this->query2dto($this->query($sql), 'project_installment');
            if (count($installments)) {
                
                foreach ($installments as $installment) {
                    $pendencies['project'] .= 'R$' . $installment->get('value', true) . ' parcela ' . $installment->get('number') .
                        ' ' . $installment->get('id_project', true)->get('name') . ' + ';
                    $total += $installment->get('value');
                    $installmentTotal += $installment->get('value');
                }
                $pendencies['project'] = trim($pendencies['project'], ' + ');
            } else {
                $pendencies['project'] = '-';
            }
            
            return array('pendencies' => $pendencies, 'total' => $total,
                         'supportTotal' => $supportTotal, 'extraTotal' => $extraTotal,
                         'installmentTotal' => $installmentTotal);
        }
        
        public function getAloneInstallments($period = null) {
            if (is_null($period)) {
                $periodInit = date('Y-m-01');
                $periodFinal = date('Y-m-t');
            } else {
                $period = explode('/', $period);
                $periodInit = trim($period[0]);
                $periodFinal = trim($period[1]);
            }
            
            $sql = 'SELECT p.done, 
                           p.done_date, 
                           p.end_date, 
                           p.executor, 
                           p.id_client, 
                           p.initial_date, 
                           p.name, 
                           p.observation, 
                           p.status, 
                           p.value,
                           i.expiry,
                           i.id,
                           i.id_project,
                           i.number,
                           i.status,
                           i.value
                    FROM project_installment i 
                    JOIN project p ON p.id = i.id_project 
                    WHERE i.status = 0 AND
                          i.expiry >= "' . $periodInit . '" AND
                          i.expiry <  "' . $periodFinal . '" AND
                          p.id_client IS NULL 
                    ORDER BY i.expiry';
            $installments = $this->query2dto($this->query($sql), 'project_installment');
            
            return $installments;
        }
    }
