<?php


    class ProjectController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('project', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $project = $this->model->getProject($id);
                $this->viewer->set('project', $project);

                $installments = $this->model->search('project_installment', '*', array('id_project' => $id), 'number');
                if(count($installments)){
                    $installments = $this->model->query2dto($installments, 'project_installment');
                }
                $this->viewer->set('installments', $installments);

                $this->viewer->set('qttInstallments', count($installments));
                $this->setSalesmans('salesmansModal');
                
                $salesmans = $this->model->search('project_salesman', '*', array('id_project' => $id));
                $salesmans = $this->model->query2dto($salesmans, 'project_salesman');
                $this->viewer->set('salesmans', $salesmans);
    
                $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/addInstallment.js');
                $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/projectPayment.js');
                $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/addSalesman.js');
                return $this->viewer->show('view_one', $project->get('name'));
            }

            if($this->request()) {
                if($_POST['submit'] == 'pdf'){
                    return $this->export('pdf');
                }elseif($_POST['submit'] == 'excel'){
                    return $this->export('excel');
                }

                $this->viewer->set('_filter_status', $_POST['_filter_status']);
                $this->viewer->set('_filter_end', $_POST['_filter_end']);
                $this->viewer->set('_filter_name', $_POST['_filter_name']);
                $this->viewer->set('_filter_executor', $_POST['_filter_executor']);
                $this->viewer->set('_filter_client', $_POST['_filter_client']);
                $this->viewer->set('_filter_period', unfilter_period($_POST['_filter_period']));

                $projects = $this->model->makeQuery();
            }else{
                $this->viewer->set('_filter_status', 'all');
                $this->viewer->set('_filter_end', 'all');
                $this->viewer->set('_filter_name', '');
                $this->viewer->set('_filter_executor', '');
                $this->viewer->set('_filter_client', 'clear');
                $this->viewer->set('_filter_period', date('01/m/Y - t/m/Y'));


                $projects = $this->model->search('project', '*', false, 'id DESC');
                $projects = $this->model->query2dto($projects, 'project');

            }

            $clients = $this->model->search('client');
            $clients = $this->model->query2dto($clients, 'client');
            $this->viewer->set('clients', $clients);


            $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/projectPendencies.js');
            $this->viewer->set('projects', $projects);
            $this->viewer->show('view', 'Projetos');
        }

        public function edit($id) {

            if (!$this->model->exists('project', 'id', $id)) {
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

            $clients = $this->model->search('client', '*', false, 'name');
            $clients = $this->model->query2dto($clients, 'client');
            $this->viewer->set('clients', $clients);
    
            $entryTypes = $this->model->search('entry_type');
            $entryTypes = $this->model->query2dto($entryTypes, 'entry_type');
            $this->viewer->set('entryTypes', $entryTypes);

            $project = $this->model->getProject($id);
            $this->viewer->set('project', $project);
            
            $this->viewer->show('edit', 'Editar ' . $project->get('name'));
        }

        public function addInstallment($id){
            if (!$this->model->exists('project', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            if($this->request()){
                $this->model->addInstallment($id);
            }

            $this->view($id);

        }

        public function editInstallment($id) {
            if (!$this->model->exists('project_installment', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            $installment = $this->model->getInstallment($id);
            $this->viewer->set('installment', $installment);

            if ($this->request()) {
                if ($this->model->editInstallment($id)) {
                    $this->model->updateStatus($installment->get('id_project', true));
                    return $this->view($installment->get('id_project'));
                } else {
                    unset($_POST);

                    return $this->edit($id);
                }
            }
            
            $last = 'SELECT * FROM project_installment p WHERE p.id_project = '.$installment->get('id_project').'
                ORDER BY p.number DESC LIMIT 1
            ';
            $last = $this->model->query($last)[0]['number'];
            $this->viewer->set('last', $last);
            
            $name = $installment->get('id_project', true)->get('name');
            $this->viewer->show('editInstallment', 'Editar parcela ' . $installment->get('number').' - '.$name);
        }

        public function deleteInstallment($id){
            if (!$this->model->exists('project_installment', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            $installment = $this->model->getInstallment($id);

            if($this->model->delete('project_installment', array('id' => $id))){
                $this->model->updateStatus($installment->get('id_project', true));
                $this->model->checkNumberOrdenation($installment->get('id_project', true));
                
                Viewer::flash(_DELETE_SUCCESS, 's');
                return $this->view($installment->get('id_project'));
            }else{
                Viewer::flash(_DELETE_ERROR, 'e');
                return $this->view($installment->get('id_project'));
            }

        }
        
        public function undoPayment($id_installment){
            if (!$this->model->exists('project_installment', 'id', $id_installment)) {
                Viewer::flash(_EXISTS_ERROR, 'e');
        
                return $this->view();
            }
    
            $installment = $this->model->getInstallment($id_installment);
            
            if($this->model->undoPayment($installment)){
                $this->model->updateStatus($installment->get('id_project', true));
    
                Viewer::flash('Pagamento desfeito com sucesso.', 's');
                return $this->view($installment->get('id_project'));
            }else{
                Viewer::flash(_DELETE_ERROR, 'e');
                return $this->view($installment->get('id_project'));
            }
        }

        public function payInstallment($id){
            if (!$this->model->exists('project_installment', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            $installment = $this->model->getInstallment($id);

            if($this->model->payInstallment($installment)){
                Viewer::flash(_INSERT_SUCCESS, 's');
            }else{
                Viewer::flash(_INSERT_ERROR, 'e');
            }

            return $this->view($installment->get('id_project'));
        }

        public function add($id_client = null) {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('project');

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
            
            $clients = $this->model->search('client', '*', false, 'name');
            $clients = $this->model->query2dto($clients, 'client');
            $this->viewer->set('clients', $clients);
    
            $entryTypes = $this->model->search('entry_type');
            $entryTypes = $this->model->query2dto($entryTypes, 'entry_type');
            $this->viewer->set('entryTypes', $entryTypes);
            
            $this->viewer->addJs(_APP_ROOT_DIR . 'assets/js/addInstallment.js');

            $this->viewer->set('id_client', $id_client);
            return $this->viewer->show('add', 'Cadastrar projeto');
        }

        public function export($type){
            switch ($type){
                case 'pdf':
                    $pdfType = $this->model->makeExportType();

                    // Declares the variables before initializing the pdf
                    $this->export->pdf->set('pdfName', 'Relatório de Projetos');
                    $this->export->pdf->set('pdfType', 'Projetos'.$pdfType);
                    $this->export->pdf->set('headerColumns', array(
                        'ID', 'Nome', 'Cliente', 'Valor', 'Início', 'Fim', 'Executor', 'Pend.',
                    ));
                    $this->export->pdf->SetWidths(array(
                        15,50,50,30,35,35,47,15
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

                    $this->export->excel->set('title', 'Relatório de Projetos');
                    $this->export->excel->PutRow($excelType);

                    $this->export->excel->set('headerColumns', array(
                        'ID', 'Nome', 'Cliente', 'Valor', 'Início', 'Fim', 'Executor', 'Pend.',
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

        public function end($id){
            if(!$this->model->exists('project', 'id', $id)){
                Viewer::flash(_EXISTS_ERROR, 'e');
                return $this->view();
            }

            if($this->model->end($id)){
                Viewer::flash(_INSERT_SUCCESS, 's');
                return $this->view($id);
            }else{
                return $this->view($id);
            }

        }
        
        public function setSalesmans($name){
            $salesmans = $this->model->query2dto($this->model->search('salesman'), 'salesman');
            $this->viewer->set($name, $salesmans);
        }
        
        public function addSalesman($id_project){
            if(!$this->model->exists('project', 'id', $id_project)){
                Viewer::flash(_EXISTS_ERROR, 'e');
                unset($_POST);
                return $this->view();
            }
            
            if(!$this->model->addSalesman($id_project)){
                Viewer::flash(_INSERT_SUCCESS, 's');
            }
            
            return $this->view($id_project);
        }
        
        public function deleteSalesman($id_project, $id_salesman){
            $cond = array(
                'id_project' => $id_project,
                'conscond1' => 'AND',
                'id_salesman' => $id_salesman
            );
            
            $this->model->delete('project_salesman', $cond);
            Viewer::flash(_DELETE_SUCCESS, 's');
            return $this->view($id_project);
        }

        /**
         * ####### THIS METHOD SHOULD ONLY BE CALLED ONLY BY AJAX #######
         *
         * Usage:
         * app/assets/js/projectPendencies.js
         *
         * Gets the project's installments that don't have any payments associated
         * Makes a json
         * @param int $id_project
         * @return void
         */
        public function installmentsModal($id_project){
            return $this->model->installmentsModal($id_project);
        }

        /**
         * ####### THIS METHOD SHOULD ONLY BE CALLED ONLY BY AJAX #######
         *
         * Usage:
         * app/assets/js/addInstallment.js
         *
         * It echoes the form's inputs of one installment to be added in the project
         * @param $qtt - Quantity of installments
         * @return void
         */
        public function addInstallmentForm($qtt) {

            return $this->model->addInstallmentForm($qtt);

        }
    
        /**
         * ####### THIS METHOD SHOULD ONLY BE CALLED ONLY BY AJAX #######
         *
         * Usage:
         * app/assets/js/projectPayment.js
         *
         * Populates one modal to make a payment screen to an installment
         * @param int $id_installment
         * @return void
         */
        public function payInstallmentModal($id_installment) {
        
            return $this->model->payInstallmentModal($id_installment);
        
        }

    }

