<?php


    class ClientController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                
                
                echo 'o';
                
                if (!$this->model->exists('client', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $client = $this->model->getClient($id);
                $finances = $this->model->getFinances($id);
                $this->viewer->set('finances', $finances);
                $this->viewer->set('client', $client);

                $histories = $this->model->search('finances_history', '*', array('id_finances' => $id), 'id DESC');
                $histories = $this->model->query2dto($histories, 'finances_history');
                $this->viewer->set('histories', $histories);

                $extras = $this->model->search('extra_charge', '*', array('id_client' => $id), 'date DESC');
                $extras = $this->model->query2dto($extras, 'extra_charge');
                $this->viewer->set('extras', $extras);

                $projects = $this->model->search('project', '*', array('id_client' => $id), 'initial_date DESC');
                $projects = $this->model->query2dto($projects, 'project');
                $this->viewer->set('projects', $projects);

                return $this->viewer->show('view_one', $client->get('name'));
            }

            if($this->request()) {
                if($_POST['submit'] == 'pdf'){
                    return $this->export('pdf');
                }elseif($_POST['submit'] == 'excel'){
                    return $this->export('excel');
                }

                $this->viewer->set('_filter_status', $_POST['_filter_status']);
                $this->viewer->set('_filter_finances', $_POST['_filter_finances']);

                $clients  = $this->model->makeQuery();
            }else{
                $this->viewer->set('_filter_status', 'all');
                $this->viewer->set('_filter_finances', 'all');

                $clients = $this->model->search('client');
                $clients = $this->model->query2dto($clients, 'client');
            }

            $finances = $this->model->search('finances');
            $finances = $this->model->query2dto($finances, 'finances');
            $finalFinances = array();
            foreach ($finances as $finance) {
                $finalFinances[$finance->get('id')] = $finance;
            }

            $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/clientsPendencies.js');
            $this->viewer->set('finances', $finalFinances);
            $this->viewer->set('clients', $clients);
            $this->viewer->show('view', 'Clientes');
        }

        public function edit($id) {

            if (!$this->model->exists('client', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            if ($this->request()) {
                if ($this->model->edit($id)) {
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->edit($id);
                }
            }

            $client = $this->model->getClient($id);
            $this->viewer->set('client', $client);
            $finances = $this->model->getFinances($id);
            $this->viewer->set('finances', $finances);
            
            $this->viewer->show('edit', 'Editar ' . $client->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('client');

                    // in way to get the lastInsertId
                    // the endTransaction statement needs
                    // to be placed here
                    $this->model->endTransaction();

                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            return $this->viewer->show('add', 'Cadastrar cliente');
        }

        public function export($type){
            switch ($type){
                case 'pdf':
                    $pdfType = $this->model->makeExportType();

                    // Declares the variables before initializing the pdf
                    $this->export->pdf->set('pdfName', 'Relatório de Clientes');
                    $this->export->pdf->set('pdfType', 'Clientes'.$pdfType);
                    $this->export->pdf->set('headerColumns', array(
                        'ID', 'Nome', 'Email', 'Telefone', 'Site', 'CPF/CNPJ', 'Suporte', 'Desde', 'Pend.',
                    ));
                    $this->export->pdf->SetWidths(array(
                        15,50,40,30,60,30,17,20,15
                    ));

                    // Inits the pdf, so you can put rows on it
                    $this->export->pdf->Initialize('L');

                    $pdfData = $this->model->query2export();
                    $this->export->pdf->set('pdfData', $pdfData);
                    $this->export->pdf->ShowData();

                    // Outputs it to screen
                    $this->export->pdf->Finish();
                    break;
                case 'excel':
                    $excelType = $this->model->makeExportType();
                    $excelType = explode('|', $excelType);
                    $excelType[0] = 'Filtro: ';

                    $this->export->excel->set('title', 'Relatório de Clientes');
                    $this->export->excel->PutRow($excelType);

                    $this->export->excel->set('headerColumns', array(
                        'ID', 'Nome', 'Email', 'Telefone', 'Site', 'CNPJ', 'Suporte', 'Desde', 'Pend.',
                    ));

                    $this->export->excel->Initialize();

                    $data = $this->model->query2export();
                    $this->export->excel->set('data', $data);
                    $this->export->excel->ShowData();

                    $this->export->excel->Finish();

                    unset($_POST);
                    $this->view();
                    break;
                default:
                    Viewer::flash('Tipo não encontrado', 'e');
                    return $this->view();
                    break;
            }
        }

        /**
         * ####### THIS METHOD SHOULD ONLY BE CALLED ONLY BY AJAX #######
         *
         * Usage:
         * app/assets/js/clientsPendencies.js
         *
         * Gets the client's pendencies
         * Makes a json
         * @param int $id_client
         * @return void
         */
        public function pendenciesModal($id_client){
            return $this->model->pendenciesModal($id_client);
        }
    }
