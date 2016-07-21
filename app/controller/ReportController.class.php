<?php


    class ReportController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('report', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }

                $report = $this->model->getReport($id);
                $period = $report->get('period', true);
                
                if(explode(' - ', $period)[0] == '01/01/1970')
                    $period = 'todos em aberto até '.explode(' - ', $period)[1];
                $this->viewer->set('period', $period);

                $txt = $this->model->txt2array($report)[0];
                $this->viewer->set('txt', $txt);

                if($this->model->exists('report_payment', 'id_report', $id)){
                    $this->viewer->set('reportStatus', true);
                }else{
                    $this->viewer->Set('reportStatus', false);
                }

                $this->viewer->set('report', $report);
                $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/reportFilter.js');
                return $this->viewer->show('view_one', $report->get('name'));
            }

            $reports = $this->model->search('report');
            $reports = $this->model->query2dto($reports, 'report');
            $this->viewer->set('reports', $reports);

            return $this->viewer->show('view', 'Relatórios de título');
        }

        public function add(){

            if($this->request()){
                if($this->model->add()) {
                    $id = $this->model->lastInserted('report');
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                }else{
                    Viewer::flash(_INSERT_ERROR, 'e');
                    unset($_POST);
                    return $this->add();
                }
            }

            $period = date('01/m/Y - t/m/Y');
            $this->viewer->set('period', $period);

            $clients = $this->model->search('client', '*', false, 'name');
            $clients = $this->model->query2dto($clients, 'client');
            $this->viewer->set('clients', $clients);
            $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/addReport.js');
            return $this->viewer->show('add', 'Realizar relatório de títulos');


        }

        public function pay($id){
            if($this->request()){
                if($this->model->pay($id)){
                    Viewer::flash(_INSERT_SUCCESS, 's');
                }else{
                    Viewer::flash(_INSERT_ERROR, 'e');
                }
            }
            return $this->view($id);
        }

        public function toPdf($id){
            if(!$this->model->exists('report', 'id', $id)){
                Viewer::flash(_INSERT_ERROR, 'e');
                return $this->view();
            }

            $report = $this->model->getReport($id);
            $period = $report->get('period', true);
            if(explode(' - ', $period)[0] == '01/01/1970')
                $period = 'todos em aberto até '.explode(' - ', $period)[1];
            $pdfType = 'Período: '.$period  .' | Criação: '.$report->get('created', true);

            // Declares the variables before initializing the pdf
            $this->export->pdf->set('pdfName', 'Relatório de títulos');
            $this->export->pdf->set('pdfType', 'Relatório de títulos - '.$pdfType);
            $this->export->pdf->set('headerColumns', array(
                'ID', 'Cliente', 'CPF/CNPJ', 'Observações financ.', 'Suporte mensal',
                'Projetos', 'Extras', 'Total'
            ));

            $this->export->pdf->SetWidths(array(
                15,50,30,50,30,50,30,22
            ));

            // Inits the pdf, so you can put rows on it
            $this->export->pdf->Initialize('L');

            $pdfData = $this->model->txt2array($report)[1];

            $this->export->pdf->set('pdfData', $pdfData);
            $this->export->pdf->ShowData();

            // Outputs it to screen
            $this->export->pdf->Finish();
        }

        public function toExcel($id){
            if(!$this->model->exists('report', 'id', $id)){
                Viewer::flash(_INSERT_ERROR, 'e');
                return $this->view();
            }

            $report = $this->model->getReport($id);
            $period = $report->get('period', true);
            if(explode(' - ', $period)[0] == '01/01/1970')
                $period = 'todos em aberto até '.explode(' - ', $period)[1];
            $excelType = 'Período: '.$period.' | Criação: '.$report->get('created', true);

            $this->export->excel->set('title', 'Relatório de Títulos');
            $this->export->excel->PutRow(array('Relatório de títulos - '.$excelType));

            $this->export->excel->set('headerColumns', array(
                'ID', 'Cliente', 'CPF/CNPJ', 'Observações financ.', 'Suporte mensal',
                'Projetos', 'Extras', 'Total'
            ));

            $this->export->excel->Initialize();

            $data = $this->model->txt2array($report)[1];

            $this->export->excel->set('data', $data);
            $this->export->excel->ShowData();

            $this->export->excel->Finish();

        }


    }
