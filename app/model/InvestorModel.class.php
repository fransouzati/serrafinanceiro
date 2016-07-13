<?php

    class InvestorModel extends AppModel {

        public function getInvestor($id) {
            return $this->getDto('investor', 'id', $id);
        }

        public function edit($id) {
            $investor = $this->getInvestor($id);
            $error = '';

            if (!$investor->set('name', $_POST['name']))
                $error .= $investor->FieldsErrors['name'] . '<br>';
            if (!$investor->set('initial_capital', $_POST['initial_capital']))
                $error .= $investor->FieldsErrors['initial_capital'] . '<br>';
            $investor->set('is_partner', isset($_POST['is_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                return $this->update('investor', $investor, array('id' => $id));
            }

        }

        public function add() {
            $error = '';
            $investor = new Investor();

            if (!$investor->set('name', $_POST['name']))
                $error .= $investor->FieldsErrors['name'] . '<br>';
            if (!$investor->set('initial_capital', $_POST['initial_capital']))
                $error .= $investor->FieldsErrors['initial_capital'] . '<br>';
            $investor->set('is_partner', isset($_POST['is_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');
                return false;
            } else {
                return $this->insert('investor', $investor);
            }
        }

        public function cashDestination($entry, $operation, $type){
            if(is_object($entry)){
                if(!$entry->validDecimal($entry->get('value'))){
                    $entry = $entry->decimalmask($entry->get('value'));
                }else{
                    $entry = $entry->get('value');
                }
            }
            $investor = $this->search('investor', '*', array('name' => $type));
            if(count($investor) < 1){
                $investor = $this->addIncreaseInvestor($type);
            }else{
                $investor = $this->query2dto($investor,'investor')[0];
            }
            $capital = $investor->get('initial_capital');

            if($operation == 'increase')
                $capital += $entry;
            else
                $capital -= $entry;

            $investor->set('initial_capital', $capital);
            
            return $this->update('investor', $investor, array('id' => $investor->get('id')));

        }

        /**
         * @param string $type
         * @return Investor
         */
        public function addIncreaseInvestor($type){
            $investor = new Investor();
            $investor->set('name', $type);
            $investor->set('initial_capital', 0);
            $investor->set('is_partner', 0);
            $this->insert('investor', $investor);
            $investor->set('id', $this->lastInserted('investor'));
            return $investor;
        }

        public function editBalance($investor){
            $oldValue = $investor->get('initial_capital');
            $newValue = $investor->decimalMask($_POST['initial_capital']);
            if($oldValue > $newValue){
                // decrease
                
                $withdrawModel = new WithdrawModel();
                return $withdrawModel->addByBalanceEdit($investor);
            }else{
                // increase

                $entryModel = new EntryModel();
                return $entryModel->addByBalanceEdit($investor);
            }
        }

    }
