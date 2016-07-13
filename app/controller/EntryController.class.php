<?php


    class EntryController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('entry', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $entry = $this->model->getEntry($id);
                $this->viewer->set('entry', $entry);
                return $this->viewer->show('view_one', 'Entrada');
            }

            if($this->request()) {
                if($_POST['submit'] == 'pdf'){
                    return $this->export('pdf');
                }elseif($_POST['submit'] == 'excel'){
                    return $this->export('excel');
                }

                $this->viewer->set('_filter_type', $_POST['_filter_type']);
                $this->viewer->set('_filter_client', $_POST['_filter_client']);
                $this->viewer->set('_filter_period', unfilter_period($_POST['_filter_period']));

                $entries = $this->model->makeQuery();
            }else{
                $this->viewer->set('_filter_type', 'clear');
                $this->viewer->set('_filter_client', 'clear');
                $this->viewer->set('_filter_period', date('01/m/Y - t/m/Y'));


                $entries = $this->model->search('entry', '*', false, 'date');
                $entries = $this->model->query2dto($entries, 'entry');

            }

            $clients = $this->model->search('client');
            $clients = $this->model->query2dto($clients, 'client');
            $this->viewer->set('clients', $clients);

            $types = $this->model->search('entry_type');
            $types = $this->model->query2dto($types, 'entry_type');
            $this->viewer->set('types', $types);

            $this->viewer->set('entries', $entries);
            $this->viewer->show('view', 'Entradas');
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    unset($_POST);
                    return $this->view();
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            $clients = $this->model->search('client');
            $clients = $this->model->query2dto($clients, 'client');
            $this->viewer->set('clients', $clients);

            $types = $this->model->search('entry_type');
            $types = $this->model->query2dto($types, 'entry_type');
            $this->viewer->set('types', $types);

            return $this->viewer->show('add', 'Cadastrar entrada');
        }

        public function export($type){
            switch ($type){
                case 'pdf':
                    $pdfType = $this->model->makeExportType();

                    // Declares the variables before initializing the pdf
                    $this->export->pdf->set('pdfName', 'Relatório de Entradas');
                    $this->export->pdf->set('pdfType', 'Entradas |'.$pdfType);
                    $this->export->pdf->set('headerColumns', array(
                        'Data', 'Tipo', 'Cliente', 'Descrição', 'Valor'
                    ));
                    $this->export->pdf->SetWidths(array(
                        20,40,50,55,25
                    ));

                    // Inits the pdf, so you can put rows on it
                    $this->export->pdf->Initialize('P');

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

                    $this->export->excel->set('title', 'Relatório de Entradas');
                    $this->export->excel->PutRow($excelType);

                    $this->export->excel->set('headerColumns', array(
                        'Data', 'Tipo', 'Cliente', 'Descrição', 'Valor'
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
    }
