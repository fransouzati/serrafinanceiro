<?php


    class SalesmanController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('salesman', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $salesman = $this->model->getSalesman($id);
                
                $projects = $this->model->search('project_salesman', '*', array('id_salesman' => $id));
                $projects = $this->model->query2dto($projects, 'project_salesman');
                $this->viewer->set('projects', $projects);
                
                $this->viewer->set('salesman', $salesman);
                return $this->viewer->show('view_one', 'Vendedor/Colaborador '.$salesman->get('name'));
            }

            $salesmans = $this->model->search('salesman');
            $salesmans = $this->model->query2dto($salesmans, 'salesman');
            $this->viewer->set('salesmans', $salesmans);
            $this->viewer->show('view', 'Vendedores/Colaboradores');
        }

        public function edit($id) {

            if (!$this->model->exists('salesman', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            $salesman = $this->model->getSalesman($id);

            if ($this->request()) {
                if ($this->model->edit($id)) {
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->edit($id);
                }
            }

            $this->viewer->set('salesman', $salesman);
            
            $this->viewer->show('edit', 'Editar ' . $salesman->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('salesman');
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            return $this->viewer->show('add', 'Cadastrar investidor');
        }
    
        public function export(){
            if($this->request()) {
                switch ($_POST['type']) {
                    case 'pdf':
                        $pdfType = $this->model->makeExportType();
            
                        // Declares the variables before initializing the pdf
                        $this->export->pdf->set('pdfName', 'Relatório de Comissão');
                        $this->export->pdf->set('pdfType', 'Relatório de Comissão'.$pdfType);
                        $this->export->pdf->set('headerColumns', array(
                            'Vendedor/Colaborador', 'Comissões', 'Total'
                        ));
                        $this->export->pdf->SetWidths(array(
                            45, 200, 32
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
            
                        $this->export->excel->set('title', 'Relatório de Comissão');
                        $this->export->excel->PutRow($excelType);
            
                        $this->export->excel->set('headerColumns', array(
                            'Vendedor/Colaborador', 'Comissões', 'Total'
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
                return;
            }
            $salesmans = $this->model->search('salesman');
            $salesmans = $this->model->query2dto($salesmans, 'salesman');
            $this->viewer->set('salesmans', $salesmans);
            return $this->viewer->show('export', 'Relatório de Comissão');
        }
        
        /**
         * ####### THIS METHOD SHOULD ONLY BE CALLED ONLY BY AJAX #######
         *
         * Usage:
         * app/assets/js/addSalesman.js
         *
         * Gets the percentage of an salesman
         * @param int $id
         * @return void
         */
        public function getPercentage($id){
            echo $this->model->getSalesman($id)->get('percentage', true).'%';
            return;
        }
    }
