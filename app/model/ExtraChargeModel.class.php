<?php

    class ExtraChargeModel extends AppModel {

        public function getExtraCharge($id) {
            return $this->getDto('extra_charge', 'id', $id);
        }

        public function add($id_client) {
            $error = '';
            $extraCharge = new Extra_charge();

            if(!$extraCharge->set('date', $_POST['date']))
                $error .= $extraCharge->FieldsErrors['date'].'<br>';

            if(!$extraCharge->set('value', $_POST['value']))
                $error .= $extraCharge->FieldsError['value'].'<br>';

            if(!$extraCharge->set('expiry', $_POST['expiry']))
                $error .= $extraCharge->FieldsErrors['expiry'].'<br>';

            if(isset($_POST['description']))
                $extraCharge->set('description', $_POST['description']);

            $extraCharge->set('status', $_POST['status']);
            $extraCharge->set('id_client', $id_client);

            if ($error != '') {
                Viewer::flash($error, 'e');
            } else {

                $this->initTransaction();

                if($extraCharge->get('status')){
                    $entryModel = new EntryModel();
                    if(!$entryModel->addByExtraCharge($extraCharge)){
                        Viewer::flash(_INSERT_ERROR, 'e');
                        $this->cancelTransaction();
                        return false;
                    }
                }else{
                    if(strtotime($extraCharge->get('expiry')) < strtotime('Y-m-d')){
                        $clientModel = new ClientModel();
                        $clientModel->inspectionValidate($extraCharge->get('id_client'));
                    }
                }
                if(!$this->insert('extra_charge', $extraCharge)){
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();
                    return false;
                }

                $this->endTransaction();

                $clientModel = new ClientModel();
                $clientModel->inspectionValidate($extraCharge->get('id_client'));

                return true;
            }
        }

        public function addByEntry($entry){
            $extra = new Extra_charge();
            $extra->set('id_entry', $entry->get('id'));
            $extra->set('id_client', $entry->get('id_client'));
            $extra->set('date', $entry->get('date'));
            $extra->set('description', $entry->get('description'));
            $extra->set('value', $entry->get('value'));
            $extra->set('status', 1);
            $extra->set('expiry', $entry->get('date'));
            return $this->insert('extra_charge', $extra);
        }

        public function pay($extraCharge){
            $entryModel = new EntryModel();
            $this->initTransaction();
            if(!$entryModel->addByExtraCharge($extraCharge)){
                $this->cancelTransaction();
                return false;
            }
            $extraCharge->set('status', 1);
            if(!$this->update('extra_charge', $extraCharge, array('id' => $extraCharge->get('id')))){
                $this->cancelTransaction();
                return false;
            }
            $this->endTransaction();

            $clientModel = new ClientModel();
            $clientModel->inspectionValidate($extraCharge->get('id_client'));
            return true;
        }

        public function delete($extraCharge, $condition = false){
            if($extraCharge->get('status')){
                $withdrawModel = new WithdrawModel();
                if(!$withdrawModel->addByExtraCharge($extraCharge)){
                    return false;
                }
            }

            if(parent::delete('extra_charge', array('id' => $extraCharge->get('id')))){
                $clientModel = new ClientModel();
                $clientModel->inspectionValidate($extraCharge->get('id_client'));
                return true;
            }
            return false;
        }

    }
