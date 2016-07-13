<?php


    class EntryTypeController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('entry_type', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $entryType = $this->model->getEntryType($id);
                $this->viewer->set('entryType', $entryType);
                return $this->viewer->show('view_one', 'Tipo de entrada - '.$entryType->get('name'));
            }

            $entryTypes = $this->model->search('entry_type');
            $entryTypes = $this->model->query2dto($entryTypes, 'entry_type');
            $this->viewer->set('entryTypes', $entryTypes);
            $this->viewer->show('view', 'Tipos de entrada');
        }

        public function edit($id) {

            if (!$this->model->exists('entry_type', 'id', $id)) {
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

            $entryType = $this->model->getEntryType($id);
            $this->viewer->set('entryType', $entryType);

            $this->viewer->show('edit', 'Editar ' . $entryType->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('entry_type');
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            return $this->viewer->show('add', 'Cadastrar tipo de entrada');
        }
    }
