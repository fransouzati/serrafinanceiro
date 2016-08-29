<?php


    class BillController extends AppController {

        public function view($id = null) {
            if(!is_null($id)){
                if(!$this->model->exists('bill', 'id', $id)){
                    Viewer::flash(_EXISTS_ERROR, 'e');
                    return $this->view();
                }
                $bill = $this->model->getBill($id);
                $installments = array();
                if($bill->get('is_variable')){
                    $installments = $this->model->search('bill_installment', '*', array('id_bill' => $id));
                    $installments = $this->model->query2dto($installments, 'bill_installment');
                }
                $this->viewer->set('installments', $installments);
                $this->viewer->set('bill', $bill);
                $this->viewer->set('months', count($installments));
                
                return $this->viewer->show('view_one', $bill->get('description'));
            }
            $bills = $this->model->query2dto($this->model->search('bill'), 'bill');
            $this->viewer->set('bills', $bills);
            return $this->viewer->show('view', 'Contas a pagar');
        }

        public function edit($id) {
            
            if (!$this->model->exists('bill', 'id', $id)) {
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
            
            $types = $this->model->search('withdraw_type');
            $types = $this->model->query2dto($types, 'withdraw_type');
            $this->viewer->set('types', $types);

            $bill = $this->model->getBill($id);
            $this->viewer->set('bill', $bill);
            
            if($bill->get('is_variable')){
                $qttInstallments = $this->model->numRows('bill_installment', array('id_bill' => $id));
                $this->viewer->set('qttInstallments', $qttInstallments);
            }
    
            $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/billVariable.js');
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
            
            $this->viewer->addJs(_APP_ROOT_DIR.'assets/js/billVariable.js');
            
            return $this->viewer->show('add', 'Cadastrar conta a pagar');
        }

        public function pay($id_bill, $number = null) {
            if(!$this->model->exists('bill', 'id', $id_bill)){
                Viewer::flash(_EXISTS_ERROR, 'e');
                return $this->view();
            }
            if(!is_null($number)){
                $condition = array(
                    'id_bill' => $id_bill,
                    'conscond1' => 'AND',
                    'number' => $number
                );
                if($this->model->numRows('bill_installment', $condition) < 1){
                    Viewer::flash(_EXISTS_ERROR, 'e');
                    return $this->view();
                }
                $installment = $this->model->getInstallment($id_bill, $number);
            }
            $bill = $this->model->getBill($id_bill);
            if ($this->request()) {
                if ($this->model->pay($bill, $number)) {

                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return $this->view();
                } else {
                    unset($_POST);

                    return $this->pay($id_bill);
                }
            }

            $this->viewer->set('number', $number);
            $this->viewer->set('bill', $bill);
            $title = 'Pagar conta - '.$bill->get('description');
            if(isset($installment))
                $title .= ' - Parcela '.$installment->get('number');
            return $this->viewer->show('pay', $title);
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
        
        public function delete($id){
            if(!$this->model->exists('bill', 'id', $id)){
                Viewer::flash(_EXISTS_ERROR, 'e');
                return $this->view();
            }
            
            $this->model->delete('bill_installment', array(
                'id_bill' => $id,
                'conscond1' => 'AND',
                'payed' => 0
            ));
            $this->model->delete('bill', array(
                'id' => $id
            ));
            
            Viewer::flash(_DELETE_SUCCESS, 's');
            $this->view();
        }

    }
