<?php


    class ExitTypeController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('exit_type', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $exitType = $this->model->getExitType($id);
                $this->viewer->set('exitType', $exitType);
                return $this->viewer->show('view_one', 'Tipo de saída - '.$exitType->get('name'));
            }

            $exitTypes = $this->model->search('exit_type');
            $exitTypes = $this->model->query2dto($exitTypes, 'exit_type');
            $this->viewer->set('exitTypes', $exitTypes);
            $this->viewer->show('view', 'Tipos de saída');
        }

        public function edit($id) {

            if (!$this->model->exists('exit_type', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            if ($this->request()) {
                if ($this->model->edit($id)) {
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->edit($id);
                }
            }

            $exitType = $this->model->getExitType($id);
            $this->viewer->set('exitType', $exitType);

            $this->viewer->show('edit', 'Editar ' . $exitType->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('exit_type');

                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            return $this->viewer->show('add', 'Cadastrar tipo de saída');
        }
    }
