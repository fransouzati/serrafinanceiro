<?php

    class ReportModel extends AppModel {

        public function getReport($id) {
            return $this->getDto('report', 'id', $id);
        }

        public function add() {

            $report = new Report();
            $report = $this->makeDto($report);
            $error = $report[1];
            $report = $report[0];
            $report->set('created', date('Y-m-d'));
            $report->set('toView', isset($_POST['toView']));
            
            if(isset($_POST['all'])){
                $report->set('period', '1970-01-01 / '.date('Y-m-d'));
            }

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {

                if (!isset($_POST['clients'])) {
                    Viewer::flash(_INSERT_ERROR, 'e');

                    return false;
                }

                $file = $this->mountTxt($report->get('period'));
                $report->set('file', $file);

                if (!$this->insert('report', $report)) {
                    unlink(_APP_ROOT_DIR.'assets/reports/'.$file.'_screen.txt');
                    unlink(_APP_ROOT_DIR.'assets/reports/'.$file.'_export.txt');
                    return false;
                }

                $id = $this->lastInserted('report');
                $report->set('id', $id);
                if(!$this->addClients($report)){
                    unlink(_APP_ROOT_DIR.'assets/reports/'.$file.'_screen.txt');
                    unlink(_APP_ROOT_DIR.'assets/reports/'.$file.'_export.txt');
                    $this->delete('report', array('id' => $id));
                    $this->delete('report_client', array('id_report' => $id));
                    return false;
                }

                $clientModel = new ClientModel();
                $clientModel->completeInspection();

                return true;
            }
        }

        public function addClients($report){
            if (in_array('all', $_POST['clients'])) {
                $clients = $this->query2dto($this->search('client'), 'client');

                foreach ($clients as $client) {
                    $reportClient = new Report_client();
                    $reportClient->set('id_client', $client->get('id'));
                    $reportClient->set('id_report', $report->get('id'));

                    if(!$this->insert('report_client', $reportClient))
                        return false;
                }

            } else {
                foreach($_POST['clients'] as $id_client){
                    $reportClient = new Report_client();
                    $reportClient->set('id_client', $id_client);
                    $reportClient->set('id_report', $report->get('id'));
                    if(!$this->insert('report_client', $reportClient))
                        return false;
                }
            }
            return true;
        }

        public function mountTxt($period){
            $clientModel = new ClientModel();
            $toTxt = array();
            $toTxtExport = array();
            $totals = array(
                'support' => 0,
                'installment' => 0,
                'extra' => 0,
            );
            if (in_array('all', $_POST['clients'])) {
                $clients = $this->query2dto($this->search('client', '*', false, 'name'), 'client');

                foreach ($clients as $client) {
                    $this->checkPendenciesScreen($clientModel, $client->get('id'), $period, $toTxt, $totals);
                    $this->checkPendenciesExport($clientModel, $client->get('id'), $period, $toTxtExport);
                }
                
                $aloneInstallments = $clientModel->getAloneInstallments($period);
                if(count($aloneInstallments)){

                    $screenInstallments = array();
                    $finalTotal = 0;

                    foreach($aloneInstallments as $installment){
                        $screenInstallments[] = array(
                            'type'   => 'Parcela de projeto',
                            'value'  => 'R$'.$installment->get('value', true),
                            'expiry' => $installment->get('expiry', true),
                            'id' => $installment->get('id'),
                        );

                        $exportInstallments = 'R$'.$installment->get('value', true).' parcela '.$installment->get('number').
                                               ' '.$installment->get('id_project', true)->get('name');
    
    
                        $toTxtExport[] = array(
                            '-',
                            'SEM CLIENTE',
                            '-',
                            'Vencimento: '.$installment->get('expiry', true),
                            '-',
                            $exportInstallments,
                            '-',
                            $installment->get('value'),
                        );
                        
                        $totals['installment'] += $installment->get('value');
                    }
                    $exportInstallments = trim($exportInstallments, ' + ');

                    $toTxt[] = array(
                        'id' => 0,
                        'name' => 'SEM CLIENTE',
                        'cnpj' => '',
                        'finances' => '',
                        'pendencies' => $screenInstallments,
                        'total' => $finalTotal,
                    );

                }

            } else {
                foreach($_POST['clients'] as $id_client){
                    $this->checkPendenciesScreen($clientModel, $id_client, $period, $toTxt, $totals);
                    $this->checkPendenciesExport($clientModel, $id_client, $period, $toTxtExport, $totals);
                }
            }

            $client = new Client();
            $sumTotal = $totals['support'] + $totals['installment'] + $totals['extra'];
            $toTxtExport[] = array(
                '', '', '',
                'SOMA TOTAL',
                'R$'.$client->moneyMask($totals['support']),
                'R$'.$client->moneyMask($totals['installment']),
                'R$'.$client->moneyMask($totals['extra']),
                $sumTotal,
            );
            
            $toTxt = serialize($toTxt);
            $toTxtExport = serialize($toTxtExport);
            $file = uniqid();
            file_put_contents(_APP_ROOT_DIR.'assets/reports/'.$file.'_screen.txt', $toTxt);
            file_put_contents(_APP_ROOT_DIR.'assets/reports/'.$file.'_export.txt', $toTxtExport);
            return $file;


        }

        public function checkPendenciesScreen(ClientModel $model, $id_client, $period, &$toTxt, &$totals){
            $pendencies = $model->getPendencies($id_client, $period);
            if($pendencies['total'] != 0){
                $client = $model->getClient($id_client);
                $finances = $model->getFinances($id_client);

                $toTxt[] = array(
                    'id' => $client->get('id'),
                    'name' => $client->get('name'),
                    'cnpj' => $client->get('cpf_cnpj'),
                    'finances' => $finances->get('observation'),
                    'pendencies' => $pendencies['pendencies'],
                    'total' => $pendencies['total'],
                );
                $totals['support'] += $pendencies['supportTotal'];
                $totals['extra'] += $pendencies['extraTotal'];
                $totals['installment'] += $pendencies['installmentTotal'];
            }
        }

        public function checkPendenciesExport(ClientModel $model, $id_client, $period, &$toTxt){
            $pendencies = $model->getPendenciesExport($id_client, $period);
            if($pendencies['total'] != 0){
                $client = $model->getClient($id_client);
                $finances = $model->getFinances($id_client);

                $toTxt[] = array(
                    $client->get('id'),
                    $client->get('name'),
                    $client->get('cpf_cnpj'),
                    $finances->get('observation'),
                    $pendencies['pendencies']['support'],
                    $pendencies['pendencies']['project'],
                    $pendencies['pendencies']['extra'],
                    $pendencies['total'],
                );
            }
        }

        public function txt2array($report){
            $file = _APP_ROOT_DIR.'assets/reports/'.$report->get('file').'_screen.txt';
            $file2 = _APP_ROOT_DIR.'assets/reports/'.$report->get('file').'_export.txt';
            $content = unserialize(file_get_contents($file));
            $content2 = unserialize(file_get_contents($file2));
            for($i = 0; $i < count($content2); $i++){
                $arr = $content2[$i];
                $content2[$i][count($arr) - 1] = 'R$'.$report->moneyMask($arr[count($arr) - 1]);
            }
            return array($content, $content2);
        }

        public function pay($id_payment){
            if(!isset($_POST['pay'])){
                return false;
            }

            $this->initTransaction();

            $entryModel = new EntryModel();
            $extraChargeModel = new ExtraChargeModel();
            $projectModel = new ProjectModel();
            foreach($_POST['pay'] as $i => $title){
                if(!isset($_POST[$title])){
                    $this->cancelTransaction();
                    return false;
                }

                $type = explode('_', $title)[0];
                $id = explode('_', $title)[1];
                if($type == 'support'){
                    $id_type = _SUPPORT_ENTRY_TYPE_ID;
                    $id_client = $id;
                    $description = 'Pagamento de título - Suporte mensal';
                }elseif($type == 'extra'){
                    $id_type = _EXTRA_ENTRY_TYPE_ID;
                    $extra = $extraChargeModel->getExtraCharge($id);
                    $extra->set('status', 1);
                    if(!$extraChargeModel->update('extra_charge', $extra, array('id' => $id))){
                        $this->cancelTransaction();
                        return false;
                    }
                    $id_client = $extra->get('id_client');
                    $description = 'Pagamento de título - Cobrança extra';
                }else{
                    $installment = $projectModel->getInstallment($id);
                    $project = $installment->get('id_project', true);
                    $id_type = $project->get('id_entry_type');
                    $installment->set('status', 1);
                    if(!$projectModel->update('project_installment', $installment, array('id' => $id))){
                        $this->cancelTransaction();
                        return false;
                    }
                    $id_client = $installment->get('id_project', true)->get('id_client');
                    $description = 'Pagamento de título - Parcela '.$installment->get('number').
                                   ' de projeto '.$project->get('name');
                }
                $_POST['destination'] = $_POST[$title.'_destination'];
                if(!$entryModel->addByReport($id_type, $_POST[$title], $id_client, $description)){
                    $this->cancelTransaction();
                    return false;
                }
                if(!$this->addPayment($id_payment, $type, $id, $_POST[$title], $id_client)){
                    $this->cancelTransaction();
                    return false;
                }


            }
            $this->endTransaction();

            $clientModel = new ClientModel();
            $clientModel->completeInspection(false);

            return true;
        }

        public function addPayment($id_report, $type, $id_title, $value, $id_client = null){
            $payment = new Report_payment();
            $payment->set('id_report', $id_report);
            $payment->set('type', $type);
            $payment->set('id_title', $id_title);
            $payment->set('value', $value);
            $payment->set('id_client', $id_client);
            return $this->insert('report_payment', $payment);
        }
        
        public function blockPayed($report, $id_report){
            $finalReport = array();
            foreach($report as $client){
                foreach($client['pendencies'] as $num=>$pendency){
                    switch($pendency['type']){
                        case 'Suporte web':
                            $type = 'support';
                            break;
                        case 'Cobrança extra':
                            $type = 'extra';
                            break;
                        case 'Parcela de projeto':
                            $type = 'installment';
                            break;
                    }
                    $cond = array(
                        'type' => $type,
                        'conscond1' => 'AND',
                        'id_client' => $client['id'],
                        'conscond2' => 'AND',
                        'id_title' => $pendency['id']
                    );
                    if($type == 'support'){
                        $cond['conscond3'] = 'AND';
                        $cond['id_report'] = $id_report;
                    }
                    $paids = $this->search('report_payment', '*', $cond);
                    if(count($paids) > 0){
                        $pendency['block'] = 1;
                    }else{
                        $pendency['block'] = 0;
                    }
                    $client['pendencies'][$num] = $pendency;
                }
                $finalReport[] = $client;
            }
            return $finalReport;
        }
        
        public static function reportType($type){
            // switch($type){
            //     case 'development':
            //         return in_array('development')
            //         break;
            //     case 'support':
            //         break;
            //     case 'extra':
            //         break;
            // }
            return in_array($type, $_POST['_report_filter']);
        }

    }
