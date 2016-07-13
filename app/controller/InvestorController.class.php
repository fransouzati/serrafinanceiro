<?php


    class InvestorController extends AppController {

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('investor', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $investor = $this->model->getInvestor($id);
                $this->viewer->set('investor', $investor);
                return $this->viewer->show('view_one', $investor->get('name'));
            }

            $investors = $this->model->search('investor');
            $investors = $this->model->query2dto($investors, 'investor');
            $this->viewer->set('investors', $investors);
            $this->viewer->show('view', 'Investidores');
        }

        public function edit($id) {

            if (!$this->model->exists('investor', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            $investor = $this->model->getInvestor($id);
            if($investor->get('name') == _BANK_INVESTOR_NAME ||
               $investor->get('name') == _INTERNAL_INVESTOR_NAME){
                $this->viewer->flash("Este investidor não pode ser editado.", 'e');
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

            $this->viewer->set('investor', $investor);
            
            $this->viewer->show('edit', 'Editar ' . $investor->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('investor');
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            return $this->viewer->show('add', 'Cadastrar investidor');
        }
    }
