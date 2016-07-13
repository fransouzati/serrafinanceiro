<?php


    class UserController extends AppController {

        public function home() {
            $set = $this->model->home();

            foreach($set as $var => $value){
                $this->viewer->set($var, $value);
            }

            return $this->viewer->show('home', 'Inicio');
        }

        public function login() {
            if ($this->logged())
                return $this->home();
            if ($this->request()) {
                if ($this->model->login()) {
                    Viewer::flash(_LOGIN_SUCCESS, 's');

                    return $this->home();
                } else {
                    Viewer::flash(_LOGIN_ERROR, 'e');
                    unset($_POST);

                    return $this->login();
                }
            }

            return $this->viewer->show('login', 'Login', false);
        }

        public function logout() {
            unset($_SESSION['loged']);
            unset($_SESSION['user']);
            session_destroy();
            session_start();
            Viewer::flash('Até logo!', 's');

            return $this->login();
        }

        public function view($id = null) {
            if (!is_null($id)) {
                if (!$this->model->exists('user', 'id', $id)) {
                    Viewer::flash(_EXISTS_ERROR, 'e');

                    return $this->view();
                }
                $user = $this->model->getUser($id);
                $this->viewer->set('user', $user);
                return $this->viewer->show('view_one', $user->get('name'));
            }

            $users = $this->model->search('user');
            $users = $this->model->query2dto($users, 'user');
            $this->viewer->set('users', $users);
            $this->viewer->show('view', 'Administradores');
        }

        public function edit($id) {
            if ($id != parent::user()->get('id')) {
                Viewer::flash(_PERMISSION_ERROR, 'e');

                return $this->view($id);
            }

            if (!$this->model->exists('user', 'id', $id)) {
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

            $user = $this->model->getUser($id);
            $this->viewer->set('user', $user);
            
            $this->viewer->show('edit', 'Editar ' . $user->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {
                    $id = $this->model->lastInserted('user');
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view($id);
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            return $this->viewer->show('add', 'Cadastrar administrador');
        }

        public function viewBalance(){
            $sql = 'SELECT * FROM investor WHERE name = "'._BANK_INVESTOR_NAME.'" OR name = "'._INTERNAL_INVESTOR_NAME.'"';
            $investors = $this->model->query($sql);
            $investors = $this->model->query2dto($investors, 'investor');
            $this->viewer->set('investors', $investors);
            $this->viewer->show('viewBalance', 'Saldo em caixa');
            return;

        }

        public function editBalance($id){
            if (!$this->model->exists('investor', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');
                return $this->viewBalance();
            }

            if ($this->request()) {
                if ($this->model->editBalance($id)) {
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->viewBalance();
                } else {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    unset($_POST);

                    return $this->editBalance($id);
                }
            }

            $investorModel = new InvestorModel();
            $investor = $investorModel->getInvestor($id);
            if($investor->get('name') == _BANK_INVESTOR_NAME)
                $this->viewer->set('destination', 'bank');
            else
                $this->viewer->set('destination', 'internal');

            $this->viewer->set('investor', $investor);

            $this->viewer->show('editBalance', 'Editar ' . $investor->get('name'));
        }
    }
