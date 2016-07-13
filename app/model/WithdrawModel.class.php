<?php

    class WithdrawModel extends AppModel {

        public function getWithdraw($id) {
            return $this->getDto('withdraw', 'id', $id);
        }

        public function makeQuery() {
            $sql = 'SELECT * FROM withdraw w WHERE ';


            $client = $_POST['_filter_type'];
            if ($client != '') {
                if ($client != 'clear') {
                    $sql .= ' w.id_type = ' . $client . ' AND';
                }
            }

            $partner = $_POST['_filter_partner'];
            if ($partner != '') {
                if ($partner != 'clear') {
                    $sql .= ' w.id_partner = ' . $partner . ' AND';
                }
            }

            $investor = $_POST['_filter_investor'];
            if ($investor != '') {
                if ($investor != 'clear') {
                    $sql .= ' w.id_investor = ' . $investor . ' AND';
                }
            }


            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = explode('/', $period);
                $sql .= ' w.date >= "' . trim($period[0]) . '" AND w.date <= "' . trim($period[1]) . '" AND ';
            }

            $sql = rtrim($sql, ' WHEREAND');
            $sql .= 'ORDER BY w.date';

            $withdraws = $this->query($sql);

            $withdraws = $this->query2dto($withdraws, 'withdraw');

            return $withdraws;

        }

        public function edit($id) {
            $withdrawType = $this->getWithdrawType($id);
            $error = '';

            if (!$withdrawType->set('name', $_POST['name']))
                $error .= $withdrawType->FieldsErrors['name'] . '<br>';
            $withdrawType->set('need_partner', isset($_POST['need_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                if ($this->update('withdraw_type', $withdrawType, array('id' => $id))) {
                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return true;
                } else {
                    Viewer::flash(_INSERT_ERROR, 'e');

                    return false;
                }
            }

        }

        public function add() {
            $withdraw = new Withdraw();

            $error = '';

            if(!$withdraw->set('date', $_POST['date']))
                $error .= $withdraw->FieldsErrors['date'].'<Br>';

            if(!$withdraw->set('id_type', $_POST['id_type']))
                $error .= $withdraw->FieldsErrors['id_type'].'<br>';

            if(!$withdraw->set('id_investor', $_POST['id_investor']))
                $error .= $withdraw->FieldsErrors['id_invsetor'].'<br>';

            if(!$withdraw->set('value', $_POST['value']))
                $error .= $withdraw->FieldsErrors['value'].'<Br>';

            $withdraw->set('description', $_POST['description']);

            $withdrawType = new WithdrawTypeModel();
            $type = $withdrawType->getWithdrawType($withdraw->get('id_type'));
            if($type->get('need_partner'))
                $withdraw->set('id_partner', $_POST['id_partner']);

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                $this->initTransaction();
                if (!$this->insert('withdraw', $withdraw)) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();

                    return false;
                }


                if (!$this->cashDestination($withdraw)) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();

                    return false;
                }

                $withdrawTypeModel = new WithdrawTypeModel();
                if(!$withdrawTypeModel->updateBalance($withdraw)){
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();

                    return false;
                }

                $this->endTransaction();

                return true;
            }
        }


        public function addByExtraCharge($extraCharge) {
            $withdraw = new Withdraw();
            $withdraw->set('date', date('Y-m-d'));
            $withdraw->set('description', 'Deleção de cobrança extra - cliente ' . $extraCharge->get('id_client') . '.');
            $withdraw->set('value', $extraCharge->get('value'));
            $withdraw->set('id_type', _ADJUST_EXIT_TYPE_ID);

            $investor = $this->search('investor', '*', array('name' => _BANK_INVESTOR_NAME))[0];
            $withdraw->set('id_investor', $investor['id']);

            if(!$this->insert('withdraw', $withdraw))
                return false;

            if(!$this->cashDestination($withdraw))
                return false;

            $withdrawTypeModel = new WithdrawTypeModel();
            if(!$withdrawTypeModel->updateBalance($withdraw))
                return false;

            $clientModel = new ClientModel();
            $clientModel->inspectionValidate($extraCharge->get('id_client'));

            return true;
        }

        public function addByBalanceEdit($investor){
            $oldValue = $investor->get('initial_capital');
            $newValue = $investor->decimalMask($_POST['initial_capital']);
            $difference = $oldValue - $newValue;

            $withdraw = new Withdraw();
            $withdraw->set('date', date('Y-m-d'));
            $withdraw->set('Description', 'Decréscimo de caixa');
            $withdraw->set('value', $difference);
            $withdraw->set('id_type', _ADJUST_EXIT_TYPE_ID);
            $withdraw->set('id_investor', $investor->get('id'));

            if(!$this->insert('withdraw', $withdraw))
                return false;
            if(!$this->cashDestination($withdraw))
                return false;
            return true;
        }

        public function addByBill($payment){
            $withdraw = new Withdraw();
            $withdraw->set('date', date('Y-m-d'));
            $withdraw->set('description', 'Pagamento de conta');
            $withdraw->set('value', $payment->get('value'));
            $withdraw->set('id_type', $payment->get('id_bill', true)->get('id_type'));

            if($_POST['destination'] == 'bank') {
                $investor = $this->search('investor', '*', array('name' => _BANK_INVESTOR_NAME))[0];
                $withdraw->set('id_investor', $investor['id']);
            }else{
                $investor = $this->search('investor', '*', array('name' => _INTERNAL_INVESTOR_NAME))[0];
                $withdraw->set('id_investor', $investor['id']);
            }

            if(!$this->insert('withdraw', $withdraw))
                return false;
            if(!$this->cashDestination($withdraw))
                return false;
            return true;
        }

        /**
         * Decides wheter the money goes to the bank or the internal count
         * @return boolean
         */
        public function cashDestination($withdraw) {
            if (!isset($_POST['destination']))
                $_POST['destination'] = 'bank';

            $investorModel = new InvestorModel();

            switch ($_POST['destination']) {
                case 'bank':
                    return $investorModel->cashDestination($withdraw, 'decrease', _BANK_INVESTOR_NAME);
                case 'internal':
                    return $investorModel->cashDestination($withdraw, 'decrease', _INTERNAL_INVESTOR_NAME);
                default:
                    return false;
            }
        }

        /**
         * Makes the array to export in pdf/excel
         * @return array
         */
        public function query2export() {
            $withdraws = $this->makeQuery();
            $final = array();
            foreach ($withdraws as $withdraw) {
                if(!is_null($withdraw->get('id_partner')) && $withdraw->get('id_partner') != ''){
                    $partner = $withdraw->get('id_partner', true)->get('name');
                }else{
                    $partner = '-';
                }
                $final[] = array(
                    $withdraw->get('date', true),
                    $withdraw->get('id_type', true)->get('name'),
                    $withdraw->get('description'),
                    $withdraw->get('id_investor', true)->get('name'),
                    $partner,
                    'R$'.$withdraw->get('value', true),
                );
            }

            return $final;
        }

        /**
         * Creates the type of the export (without pendings, specific client, etc).
         */
        public function makeExportType() {

            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = unfilter_period($period);
                $period = explode('-', $period);
                $type = ' Período entre ' . trim($period[0]) . ' e ' . trim($period[1]) . ' |';
            }

            $partner = $_POST['_filter_partner'];
            if ($partner != '') {
                if ($partner != 'clear') {
                    $type .= ' Sócio ID '.$partner.' |';
                }
            }

            $investor = $_POST['_filter_investor'];
            if ($investor != '') {
                if ($investor != 'clear') {
                    $type .= ' Investiro ID '.$investor.' |';
                }
            }

            $type2 = $_POST['_filter_type'];
            if ($type2 != '') {
                if ($type2 != 'clear') {

                    $type2 .= ' Tipo de entrada ID ' . $type2 . ' |';
                }
            }

            return rtrim($type, '| ');
        }



    }
