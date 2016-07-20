<?php

    class UserModel extends AppModel {

        public function getUser($id) {
            return $this->getDto('user', 'id', $id);
        }

        public function login() {
            $cond = array('email'     => $_POST['email'],
                          'conscond1' => 'AND',
                          'password'  => $_POST['password']);
            $data = $this->search('user', '*', $cond);
            if (count($data) == 1) {
                $user = $this->getuser($data[0]['id']);
                $_SESSION['user'] = serialize($user);
                $_SESSION['logged'] = true;
                debug_backtrace()[1]['object']->setUser($user);

                return true;
            } else {
                return false;
            }
        }

        public function edit($id) {
            $user = $this->getUser($id);
            $error = '';
            if ($user->get('email') != $_POST['email']) {
                $hasUsers = $this->search('user', '*', array('email' => $_POST['email']));
                if (count($hasUsers) != 0)
                    $error .= _USER_EXISTS . '<br />';
            }

            if (!$user->set('name', $_POST['name']))
                $error .= $user->FieldsErrors['name'] . '<br>';
            if (!$user->set('email', $_POST['email']))
                $error .= $user->FieldsErrors['email'] . '<br>';

            if (isset($_POST['password'])) {
                if ($_POST['password'] != '') {
                    if ($_POST['password'] == $_POST['passwordConfirm'])
                        $user->set('password', $_POST['password']);
                    else
                        $error .= $user->FieldsErrors['passwordConfirm'];
                }
            }

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                return $this->update('user', $user, array('id' => $id));
            }

        }

        public function add() {
            $error = '';
            $user = new User();

            $hasUsers = $this->search('user', '*', array('email' => $_POST['email']));
            if (count($hasUsers) != 0)
                $error .= _USER_EXISTS . '<br />';

            if (!$user->set('name', $_POST['name']))
                $error .= $user->FieldsErrors['name'] . '<br>';
            if (!$user->set('email', $_POST['email']))
                $error .= $user->FieldsErrors['email'] . '<br>';
            if ($_POST['password'] != $_POST['passwordConfirm'])
                $error .= $user->FieldsErrors['passwordConfirm'];
            if (!$user->set('password', $_POST['password']))
                $error .= $user->FieldsErrors['password'];

            if ($error != '') {
                Viewer::flash($error, 'e');

                return true;
            } else {
                return $this->insert('user', $user);
            }
        }

        public function home() {
            $clientModel = new ClientModel();
            $clientModel->completeInspection();

            $billModel = new BillModel();
            $toPay = $billModel->toPay();

            return array(
                'bills' => $toPay,
            );
        }

        public function editBalance($id) {
            $investorModel = new InvestorModel();
            $investor = $investorModel->getInvestor($id);
            $this->initTransaction();
            if ($investorModel->editBalance($investor)) {
                if(!$this->emailBalance($investor)){
                    $this->cancelTransaction();
                    return false;
                }
                $this->endTransaction();
                return true;
            } else {
                $this->cancelTransaction();
                return false;
            }
        }

        public function emailBalance($investor) {
            require HOME.'/plugins/phpmailer/PHPMailerAutoload.php';

            $pop = new POP3();
            $pop->Authorise('mail.serraempresas.com.br', 587, 30, 'sistemafinanceiro@serraempresas.com.br',
                'ut$AL937', 0);

            $email = new PHPMailer;

            // $email->SMTPDebug = 3;

            $email->isSMTP();
            $email->Host = 'mail.serraempresas.com.br';
            $email->SMTPAuth = true;
            $email->Username = 'sistemafinanceiro@serraempresas.com.br';
            $email->Password = 'ut$AL937';
            $email->SMTPSecure = 'tls';
            $email->Port = 587;

            $email->From = 'sistemafinanceiro@serraempresas.com.br';
            $email->FromName = 'Sistema Financeiro';
            $email->addBCC('');
            $email->isHTML(true);

            $email->Subject = 'Alteração de caixa no Sistema Financeiro';

            $oldValue = $investor->get('initial_capital', true);
            $newValue = $_POST['initial_capital'];
            $user = unserialize($_SESSION['user'])->get('name');

            $email->Body = 'Valor de saldo em conta do caixa '.$investor->get('name').' alterado: de R$' . $oldValue . ' para ' . $newValue . ', por '.$user.'.';
            $email->CharSet = 'UTF-8';
            
            $email->AddAddress('eduardo@serraempresas.com.br', "Eduardo");
            $email->AddAddress('emanuel@serraempresas.com.br', "Emanuel");
            $email->AddAddress('mauricio@serraempresas.com.br', "Mauricio");

            return $email->send();
        }

    }
