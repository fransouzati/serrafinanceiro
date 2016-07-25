<?php

    class BillModel extends AppModel {

        public function getBill($id) {
            return $this->getDto('bill', 'id', $id);
        }
        
        public function getTotal($payments){
            $total = 0;
            foreach($payments as $payment){
                $total += $payment->get('value');
            }
            if(isset($payment))
                return $payment->moneyMask($total);
            else
                return '0,00';
        }
        
        public function makeQuery(){
            $sql = 'SELECT * FROM bill_payment p WHERE ';
            
            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = explode('/', $period);
                $sql .= ' p.date >= "' . trim($period[0]) . '" AND p.date <= "' . trim($period[1]) . '" AND ';
            }
    
            $sql = rtrim($sql, ' WHEREAND');
            $sql .= 'ORDER BY date';
    
            $payments = $this->query($sql);
    
            $payments = $this->query2dto($payments, 'bill_payment');
    
            return $payments;
    
        }

        public function edit($id) {
            $bill = $this->getBill($id);
            $bill = $this->makeDto($bill, $id);
            $error = $bill[1];
            $bill = $bill[0];

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                if (!$this->update('bill', $bill, array('id' => $id))) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    return false;
                }
                return true;
            }

        }

        public function add() {

            $bill = new Bill();
            $bill = $this->makeDto($bill);
            $error = $bill[1];
            $bill = $bill[0];

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                if (!$this->insert('bill', $bill)) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    return false;
                }
                return true;
            }
        }

        public function toPay(){
            $sql1 = 'SELECT id_bill FROM bill_payment WHERE date >= "'.date('Y-m-01').'" AND date <= "'.date('Y-m-t').'"';
            $sql2 = '
                SELECT * FROM bill b
                WHERE b.id NOT IN ('.$sql1.')
                ORDER BY b.day
            ';
            $toPay = $this->query2dto($this->query($sql2), 'bill');
            return $toPay;
        }

        public function pay($bill){
            $id_bill = $bill->get('id');
            $date = date('Y-m-d');

            $payment = new Bill_payment();
            $payment->set('id_bill', $id_bill);
            $payment->set('date', $date);
            $payment->set('value', $_POST['value']);
            $payment->set('observation', $_POST['observation']);

            $withdrawModel = new WithdrawModel();
            if(!$withdrawModel->addByBill($payment)){
                Viewer::flash(_INSERT_ERROR, 'e');
                return false;
            }
            $id_withdraw = $this->lastInserted('withdraw');
            $payment->set('id_withdraw', $id_withdraw);

            $this->insert('bill_payment', $payment);
            
            return true;


        }

    }
