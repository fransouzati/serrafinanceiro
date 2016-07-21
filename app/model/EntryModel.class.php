<?php

    class EntryModel extends AppModel {

        public function getEntry($id) {
            return $this->getDto('entry', 'id', $id);
        }

        public function makeQuery() {
            $sql = 'SELECT * FROM entry e WHERE ';

            $client = $_POST['_filter_client'];
            if ($client != '') {
                if ($client != 'clear') {
                    $sql .= ' e.id_client = ' . $client . ' AND';
                }
            } else {
                $sql .= ' e.id_client IS NULL AND';
            }


            $client = $_POST['_filter_type'];
            if ($client != '') {
                if ($client != 'clear') {
                    $sql .= ' e.id_type = ' . $client . ' AND';
                }
            }


            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = explode('/', $period);
                $sql .= ' e.date >= "' . trim($period[0]) . '" AND e.date <= "' . trim($period[1]) . '" AND ';
            }

            $sql = rtrim($sql, ' WHEREAND');
            $sql .= 'ORDER BY date';

            $entries = $this->query($sql);

            $entries = $this->query2dto($entries, 'entry');

            return $entries;

        }

        public function edit($id) {
            $entryType = $this->getEntryType($id);
            $error = '';

            if (!$entryType->set('name', $_POST['name']))
                $error .= $entryType->FieldsErrors['name'] . '<br>';
            $entryType->set('need_partner', isset($_POST['need_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                if ($this->update('entry_type', $entryType, array('id' => $id))) {
                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return true;
                } else {
                    Viewer::flash(_INSERT_ERROR, 'e');

                    return false;
                }
            }

        }

        public function add() {
            $entry = new Entry();

            $entry = $this->makeDto($entry);
            $error = $entry[1];
            $entry = $entry[0];

            if (trim($entry->get('id_client')) == '') {
                $entry->set('id_client', null);
            }

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                $this->initTransaction();
                if (!$this->insert('entry', $entry)) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();

                    return false;
                }


                if (!$this->cashDestination($entry)) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();

                    return false;
                }


                if (!is_null($entry->get('id_client')) && $entry->get('id_client') != '') {

                    $id = $this->lastInserted('entry');
                    $entry->set('id', $id);
                    $extraModel = new ExtraChargeModel();
                    if (!$extraModel->addByEntry($entry)) {
                        Viewer::flash(_INSERT_ERROR, 'e');
                        $this->cancelTransaction();

                        return false;
                    }
                    if(!$this->saveHistory($entry)){
                        Viewer::flash(_INSERT_ERROR, 'e');
                        $this->cancelTransaction();

                        return false;
                    }

                    // DANGER
                    // those lines needs to be the last ones of this process
                    $clientModel = new ClientModel();
                    $clientModel->inspectionValidate($entry->get('id_client'));
                }

                $this->endTransaction();

                return true;
            }
        }

        public function addByInstallment($installment) {
            $entry = new Entry();
            $entry->set('date', date('Y-m-d'));
            $entry->set('description', 'Pagamento de parcela de projeto - ' . $installment->get('id_project') . '.');
            $entry->set('value', $installment->get('value'));
            $idType = $installment->get('id_project', true)->get('id_entry_type');
            $entry->set('id_type', $idType);
            if(!$this->insert('entry', $entry))
                return false;
            if(!$this->cashDestination($entry))
                return false;
            if(!$this->saveHistory($entry)){
                return false;
            }


            $clientModel = new ClientModel();
            $clientModel->inspectionValidate($entry->get('id_client'));

            return true;
        }

        public function addByExtraCharge($extraCharge) {
            $entry = new Entry();
            $entry->set('date', date('Y-m-d'));
            $entry->set('description', 'Pagamento de cobrança extra - cliente ' . $extraCharge->get('id_client') . '.');
            $entry->set('value', $extraCharge->get('value'));
            $entry->set('id_type', _EXTRA_ENTRY_TYPE_ID);
            $entry->set('id_client', $extraCharge->get('id_client'));
            
            if(!$this->insert('entry', $entry))
                return false;
            if(!$this->cashDestination($entry))
                return false;
            if(!$this->saveHistory($entry)){
                return false;
            }
            $clientModel = new ClientModel();
            $clientModel->inspectionValidate($extraCharge->get('id_client'));

            return true;
        }

        public function addByBalanceEdit($investor){
            $oldValue = $investor->get('initial_capital');
            $newValue = $investor->decimalMask($_POST['initial_capital']);
            $difference = $newValue - $oldValue;

            $entry = new Entry();
            $entry->set('date', date('Y-m-d'));
            $entry->set('description', 'Acréscimo de caixa');
            $entry->set('value', $difference);
            $entry->set('id_type', _ADJUST_ENTRY_TYPE_ID);
            if(!$this->insert('entry', $entry))
                return false;
            if(!$this->cashDestination($entry))
                return false;
            return true;
        }

        public function addByReport($id_type, $value, $id_client = null, $description = 'Pagamento de título'){
            $entry = new Entry();
            $entry->set('date', date('Y-m-d'));
            $entry->set('value', $value);
            $entry->set('id_type', $id_type);
            $entry->set('id_client', $id_client);
            $entry->set('description', $description);
            if(!$this->insert('entry', $entry))
                return false;
            if(!$this->cashDestination($entry))
                return false;
            return true;
        }

        /**
         * Decides wheter the money goes to the bank or the internal count
         * @return boolean
         */
        public function cashDestination($entry) {
            if (!isset($_POST['destination']))
                $_POST['destination'] = 'bank';

            $investorModel = new InvestorModel();

            switch ($_POST['destination']) {
                case 'bank':
                    return $investorModel->cashDestination($entry, 'increase', _BANK_INVESTOR_NAME);
                case 'internal':
                    return $investorModel->cashDestination($entry, 'increase', _INTERNAL_INVESTOR_NAME);
                default:
                    return false;
            }
        }

        /**
         * Makes the array to export in pdf/excel
         * @return array
         */
        public function query2export() {
            $entries = $this->makeQuery();
            $final = array();
            foreach ($entries as $entry) {
                $client = $entry->get('id_client', true);
                if (is_object($client)) {
                    $client = $client->get('name');
                } else {
                    $client = '-';
                }
                $final[] = array(
                    $entry->get('date', true),
                    $entry->get('id_type', true)->get('name'),
                    $client,
                    $entry->get('description'),
                    'R$' . $entry->get('value', true),
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

            $client = $_POST['_filter_client'];
            if ($client != '') {
                if ($client != 'clear') {
                    $type .= ' Cliente ID ' . $client . ' |';
                }
            } else {
                $type .= ' Sem cliente envolvido |';
            }

            $type2 = $_POST['_filter_type'];
            if ($type2 != '') {
                if ($type2 != 'clear') {

                    $type2 .= ' Tipo de entrada ID ' . $type2 . ' |';
                }
            }

            return rtrim($type, '| ');
        }

        public function saveHistory($entry){
            $history = new Finances_history();
            $history->set('id_finances', $entry->get('id_client'));
            $history->set('date', $entry->get('date'));
            $history->set('description', 'Entrada de '.$entry->get('value').'.');
            return $this->insert('finances_history', $history);
        }


    }
