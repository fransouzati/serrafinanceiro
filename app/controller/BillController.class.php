<?php


    class BillController extends AppController {

        public function view() {
            $bills = $this->model->query2dto($this->model->search('bill'), 'bill');
            $this->viewer->set('bills', $bills);
            $this->viewer->show('view', 'Contas a pagar');
        }

        public function edit($id) {

            if (!$this->model->exists('bill', 'id', $id)) {
                Viewer::flash(_EXISTS_ERROR, 'e');

                return $this->view();
            }

            if ($this->request()) {
                if ($this->model->edit($id)) {
                    Viewer::flash(_INSERT_SUCCESS, 's');
                    return $this->view();
                } else {
                    unset($_POST);

                    return $this->edit($id);
                }
            }

            $types = $this->model->search('withdraw_type');
            $types = $this->model->query2dto($types, 'withdraw_type');
            $this->viewer->set('types', $types);

            $bill = $this->model->getBill($id);
            $this->viewer->set('bill', $bill);
            
            $this->viewer->show('edit', 'Editar conta ' . $bill->get('id_type', true)->get('name'));
        }

        public function add() {
            if ($this->request()) {
                if ($this->model->add()) {

                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return $this->view();
                } else {
                    unset($_POST);

                    return $this->add();
                }
            }

            $types = $this->model->search('withdraw_type');
            $types = $this->model->query2dto($types, 'withdraw_type');
            $this->viewer->set('types', $types);
            
            return $this->viewer->show('add', 'Cadastrar conta a pagar');
        }

        public function pay($id_bill) {
            if(!$this->model->exists('bill', 'id', $id_bill)){
                Viewer::flash(_EXISTS_ERROR, 'e');
                return $this->view();
            }
            $bill = $this->model->getBill($id_bill);
            if ($this->request()) {
                if ($this->model->pay($bill)) {

                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return $this->view();
                } else {
                    unset($_POST);

                    return $this->pay($id_bill);
                }
            }

            $this->viewer->set('bill', $bill);
            return $this->viewer->show('pay', 'Pagar conta - '.$bill->get('id_type', true)->get('name'));
        }

        public function payments(){
    
            if($this->request()) {
                $this->viewer->set('_filter_period', unfilter_period($_POST['_filter_period']));
        
                $payments = $this->model->makeQuery();
                
            }else{
                $this->viewer->set('_filter_period', date('01/m/Y - t/m/Y'));
                
                $payments = $this->model->search('bill_payment', '*', false, 'date');
                $payments = $this->model->query2dto($payments, 'bill_payment');
        
            }
    
            $total = $this->model->getTotal($payments);
            $this->viewer->set('total', $total);
            
            $this->viewer->set('payments', $payments);

            $this->viewer->show('payments', 'Pagamentos');
        }

    }
