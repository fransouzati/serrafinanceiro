<?php

    class WithdrawTypeModel extends AppModel {

        public function getWithdrawType($id) {
            return $this->getDto('withdraw_type', 'id', $id);
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
                return $this->update('withdraw_type', $withdrawType, array('id' => $id));
            }

        }

        public function add() {
            $error = '';
            $withdrawType = new Withdraw_Type();

            if (!$withdrawType->set('name', $_POST['name']))
                $error .= $withdrawType->FieldsErrors['name'] . '<br>';
            $withdrawType->set('need_partner', isset($_POST['need_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');
            } else {
                return $this->insert('withdraw_type', $withdrawType);
            }
        }

        public function updateBalance($withdraw){
            if($withdraw->validDecimal($withdraw->get('value'))){
                $value = $withdraw->get('value');
            }else{
                $value = $withdraw->decimalMask($withdraw->get('value'));
            }

            $type = $this->getWithdrawType($withdraw->get('id_type'));
            $type->set('balance', $type->get('balance') + $value);
            
            return $this->update('withdraw_type', $type, array('id' => $withdraw->get('id_type')));
        }
    }
