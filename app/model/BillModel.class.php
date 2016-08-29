<?php
    
    class BillModel extends AppModel {
        
        public function getBill($id) {
            return $this->getDto('bill', 'id', $id);
        }
        
        public function getInstallment($id_bill, $number){
            $condition = array(
                'id_bill' => $id_bill,
                'conscond1' => 'AND',
                'number' => $number
            );
            $installment = $this->query2dto($this->search('bill_installment', '*', $condition), 'bill_installment');
            return $installment[0];
        }
        
        public function getTotal($payments) {
            $total = 0;
            foreach ($payments as $payment) {
                $total += $payment->get('value');
            }
            if (isset($payment))
                return $payment->moneyMask($total);
            else
                return '0,00';
        }
        
        public function makeQuery() {
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
            $isVariable = $bill->get('is_variable');
            $bill = $this->makeDto($bill, $id);
            $error = $bill[1];
            $bill = $bill[0];
            $bill->set('is_variable', $isVariable);
            
            if ($error != '') {
                Viewer::flash($error, 'e');
                
                return false;
            } else {
                $this->initTransaction();
                
                if (!$this->checkFixVar($bill)) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();
                    return false;
                }
                if (!$this->update('bill', $bill, array('id' => $id))) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();
                    
                    return false;
                }
                
                $this->endTransaction();
                
                return true;
            }
            
        }
        
        public function checkFixVar(&$bill) {
            $status = true;
            if ($bill->get('is_variable')) {
                $keepVariable = !isset($_POST['to_fixed']);
                if ($keepVariable) {
                    $default = $_POST['defaultInstallments'];
                    $qttInstallments = $_POST['qttInstallments'];
                    if ($default > $qttInstallments) { // wants to delete some installments
    
                        $status = $this->deleteInstallments($bill, false, $default - $qttInstallments, $default);
    
                    } elseif ($default < $qttInstallments) { // wants to add some installments
    
                        $status = $this->addInstallments($bill, $qttInstallments - $default);
    
                    } // else, keeps the same
                    
                } else {
                    $status = $this->deleteInstallments($bill, true);
                    $bill->set('is_variable', 0);
                }
            } else {
                $keepFixed = !isset($_POST['to_variable']);
                if (!$keepFixed) {
                    $status = $this->addInstallments($bill);
                    $bill->set('is_variable', 1);
                }
            }
            return $status;
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
                $this->initTransaction();
                if (!$this->insert('bill', $bill)) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    
                    return false;
                }
                
                $id = $this->lastInserted('bill');
                $bill->set('id', $id);
                if ($bill->get('is_variable')) {
                    if (!$this->addInstallments($bill)) {
                        Viewer::flash(_INSERT_ERROR, 'e');
                        $this->cancelTransaction();
                        
                        return false;
                    }
                }
                
                $this->endTransaction();
                
                return true;
            }
        }
        
        public function addInstallments($bill, $quantity = null) {
            // Installments number validation: must be a valid integer number, between 0 and infinity
            // If not valid, cancel the transaction (including the bill) and returns the error message
            $id_bill = $bill->get('id');
            $defaultDate = 'Y-m-' . $_POST['day'];
            
            if (is_null($quantity)) {
                if (!isset($_POST['qttInstallments'])) {
                    Viewer::flash('Informe a quantidade de parcelas.', 'e');
                    
                    return false;
                } else {
                    $_POST['qttInstallments'] = (int)$_POST['qttInstallments'];
                    if (!Validation::validNumber($_POST['qttInstallments'])) {
                        Viewer::flash('Informe a quantidade de parcelas.', 'e');
                        
                        return false;
                    } else {
                        if ($_POST['qttInstallments'] < 1) {
                            Viewer::flash('Informe a quantidade de parcelas.', 'e');
                            
                            return false;
                        }
                    }
                }
                $quantity = $_POST['qttInstallments'];
                $countFrom = strtotime(date($defaultDate));
                $numberFrom = 0;
                
            } else {
                $lastInstallment = $this->search(
                    'bill_installment',
                    '*',
                    array(
                        'id_bill' => $id_bill,
                    ),
                    'number DESC',
                    false,
                    1
                )[0];
                $lastExpiry = explode('-', $lastInstallment['expiry']);
                $dateFrom = $lastExpiry[0].'-'.$lastExpiry[1].'-'.$_POST['day'];
                $countFrom = strtotime($dateFrom);
                $numberFrom = $lastInstallment['number'];
            }
            
            
            for ($i = 1; $i <= $quantity; $i++) {
                $installment = new Bill_installment();
                $installment->set('id_bill', $id_bill);
                $installment->set('value', $_POST['value']);
                $installment->set('number', $numberFrom + $i);
                $installment->set('payed', 0);
                $expiryStr = '+' . $i . ' months';
                $installment->set('expiry', date($defaultDate, strtotime($expiryStr, $countFrom)));
                $installment->set('id_payment', null);
                if (!$this->insert('bill_installment', $installment))
                    return false;
            }
            
            return true;
        }
        
        public function deleteInstallments(Bill $bill, $all, $quantity = null, $default = null) {
            if ($all) { // delete all installments that isn't payed
                $sql = '
                  DELETE FROM bill_installment
                  WHERE id_bill = ' . $bill->get('id') . ' AND
                        payed = 0
                ';
            } else { // delete only last $quantity installments (not including payed)
                $sql = '
                    DELETE FROM bill_installment
                    WHERE id_bill = ' . $bill->get('id') . ' AND
                          payed = 0 AND
                          number > ' . ($default - $quantity) . '
                ';
            }
            
            return $this->execute($sql);
        }
        
        public function toPay() {
            $sql1 = 'SELECT id_bill FROM bill_payment WHERE date >= "' . date('Y-m-01') . '" AND date <= "' . date('Y-m-t') . '"';
            $sql2 = '
                SELECT * FROM bill b
                WHERE b.id NOT IN (' . $sql1 . ') AND b.is_variable = 0
                ORDER BY b.day
            ';
            $bills = $this->query2dto($this->query($sql2), 'bill');
            
            $sql = 'SELECT * FROM bill_installment bi 
                   WHERE bi.payed = 0 AND expiry <= "' . date('Y-m-t') . '"';
            $installments = $this->query2dto($this->query($sql), 'bill_installment');
            
            return array($bills, $installments);
        }
        
        public function pay($bill, $number = null) {
            $id_bill = $bill->get('id');
            $date = date('Y-m-d');
            
            $payment = new Bill_payment();
            $payment->set('id_bill', $id_bill);
            $payment->set('date', $date);
            $payment->set('value', $_POST['value']);
            $observation = $_POST['observation'].' - '.$bill->get('description');
            if(!is_null($number)){
                $observation .= ' - PARCELA '.$number;
            }
            $payment->set('observation', $observation);
            
            $withdrawModel = new WithdrawModel();
            $this->initTransaction();
            if (!$withdrawModel->addByBill($payment)) {
                Viewer::flash(_INSERT_ERROR, 'e');
                $this->cancelTransaction();
                return false;
            }
            $id_withdraw = $this->lastInserted('withdraw');
            $payment->set('id_withdraw', $id_withdraw);
            
            if(!$this->insert('bill_payment', $payment)) {
                Viewer::flash(_INSERT_ERROR, 'e');
                $this->cancelTransaction();
                return false;
            }
            $id_payment = $this->lastInserted('bill_payment');
            
            if(!is_null($number)) {
                $installment = $this->getInstallment($id_bill, $number);
                $installment->set('payed', 1);
                $installment->set('id_payment', $id_payment);
                
                if (!$this->update('bill_installment', $installment, array('id' => $installment->get('id')))) {
                    Viewer::flash(_INSERT_ERROR, 'e');
                    $this->cancelTransaction();
        
                    return false;
                }
            }
            $this->endTransaction();
            
            return true;
            
            
        }
        
    }
