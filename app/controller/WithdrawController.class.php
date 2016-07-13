<?php


    class WithdrawController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('withdraw', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $withdraw = $this->model->getWithdraw($id);
                $this->viewer->set('withdraw', $withdraw);
                return $this->viewer->show('view_one', 'Saída');
            }

            if($this->request()) {
                if($_POST['submit'] == 'pdf'){
                    return $this->export('pdf');
                }elseif($_POST['submit'] == 'excel'){
                    return $this->export('excel');
                }

                $this->viewer->set('_filter_type', $_POST['_filter_type']);
                $this->viewer->set('_filter_investor', $_POST['_filter_investor']);
                $this->viewer->set('_filter_partner', $_POST['_filter_partner']);
                $this->viewer->set('_filter_period', unfilter_period($_POST['_filter_period']));

                $withdraws = $this->model->makeQuery();
            }else{
                $this->viewer->set('_filter_type', 'clear');
                $this->viewer->set('_filter_investor', 'clear');
                $this->viewer->set('_filter_partner', 'clear');
                $this->viewer->set('_filter_period', date('01/m/Y - t/m/Y'));


                $withdraws = $this->model->search('`withdraw`', '*', false, 'date');
                $withdraws = $this->model->query2dto($withdraws, 'withdraw');

            }

            $types = $this->model->search('withdraw_type');
            $types = $this->model->query2dto($types, 'withdraw_type');
            $this->viewer->set('types', $types);

            $investors = $this->model->search('investor');
            $investors = $this->model->query2dto($investors, 'investor');
            $this->viewer->set('investors', $investors);
            $partners = array();
            foreach($investors as $investor){
                if($investor->get('is_partner')){
                    $partners[] = $investor;
                }
            }
            $this->viewer->set('partners', $partners);

            $this->viewer->set('withdraws', $withdraws);
            $this->viewer->show('view', 'Saídas');
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

            $investors = $this->model->search('investor');
            $investors = $this->model->query2dto($investors, 'investor');
            $this->viewer->set('investors', $investors);
            $partners = array();
            foreach($investors as $investor){
                if($investor->get('is_partner')){
                    $partners[] = $investor;
                }
            }
            $this->viewer->set('partners', $partners);

            $types = $this->model->search('withdraw_type');
            $types = $this->model->query2dto($types, 'withdraw_type');
            $this->viewer->set('types', $types);

            $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/showPartners.js');

            return $this->viewer->show('add', 'Cadastrar saída');
        }

        public function export($type){
            switch ($type){
                case 'pdf':
                    $pdfType = $this->model->makeExportType();

                    // Declares the variables before initializing the pdf
                    $this->export->pdf->set('pdfName', 'Relatório de Saídas');
                    $this->export->pdf->set('pdfType', 'Saídas |'.$pdfType);
                    $this->export->pdf->set('headerColumns', array(
                        'Data', 'Tipo', 'Descrição', 'Investidor', 'Sócio', 'Valor'
                    ));
                    $this->export->pdf->SetWidths(array(
                        27,40,65,65,50,30
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

                    $this->export->excel->set('title', 'Relatório de Saidas');
                    $this->export->excel->PutRow($excelType);

                    $this->export->excel->set('headerColumns', array(
                        'Data', 'Tipo', 'Descrição', 'Investidor', 'Sócio', 'Valor'
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
