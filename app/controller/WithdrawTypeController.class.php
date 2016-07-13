<?php


    class WithdrawTypeController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('withdraw_type', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $withdrawType = $this->model->getwithdrawType($id);
                $this->viewer->set('withdrawType', $withdrawType);
                return $this->viewer->show('view_one', 'Tipo de saída - '.$withdrawType->get('name'));
            }

            $withdrawTypes = $this->model->search('withdraw_type');
            $withdrawTypes = $this->model->query2dto($withdrawTypes, 'withdraw_type');
            $this->viewer->set('withdrawTypes', $withdrawTypes);
            $this->viewer->show('view', 'Tipos de saída');
        }

        public function edit($id) {

            if (!$this->model->exists('withdraw_type', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            if ($this->request()) {
                if ($this->model->edit($id)) {
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->edit($id);
                }
            }

            $withdrawType = $this->model->getwithdrawType($id);
            $this->viewer->set('withdrawType', $withdrawType);

            $this->viewer->show('edit', 'Editar ' . $withdrawType->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('withdraw_type');
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            return $this->viewer->show('add', 'Cadastrar tipo de saída');
        }
    }
