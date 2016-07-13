<?php


    class ExtraChargeController extends AppController {

        public function add($id_client) {
            if(!$this->model->exists('client', 'id', $id_client)){
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->redirect('/client/view');
            }

            if ($this->request()) {
                if ($this->model->add($id_client)) {
                    $id = $this->model->lastInserted('extra_charge');
                    $extraCharge = $this->model->getExtraCharge($id);

                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->redirect('/client/view/'.$extraCharge->get('id_client'));
                } else {
                    unset($_POST);

                    return $this->add($id_client);
                }
            }

            $this->viewer->set('id_client', $id_client);
            return $this->viewer->show('add', 'Cadastrar cobrança extra');
        }

        public function pay($id){
            if (!$this->model->exists('extra_charge', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->redirect('/client/view');
            }

            $extraCharge = $this->model->getExtraCharge($id);

            if($this->model->pay($extraCharge)){
                Viewer::flash(_INSERT_SUCCESS, 's');
            }else{
                Viewer::flash(_INSERT_ERROR, 'e');
            }

            return $this->redirect('/client/view/'.$extraCharge->get('id_client'));
        }

        public function delete($id){
            $extraCharge = $this->model->getExtraCharge($id);

            if($this->model->delete($extraCharge)){
                Viewer::flash(_DELETE_SUCCESS, 's');
            }else{
                Viewer::flash(_DELETE_ERROR, 'e');
            }

            return $this->redirect('/client/view/'.$extraCharge->get('id_client'));
        }
    }
