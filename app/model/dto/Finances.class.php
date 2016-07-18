<?php


    class Finances {
        private $FieldsValidation = array(
            'monthly_value' => 'validMoney',
            'payment_day' => 'between',
        );
        private $FieldsMasks = array(
            'monthly_value' => 'moneyMask',
            'status' => 'booleanMask',
        );
        public $FieldsErrors = array(
            'monthly_value' => 'Informe o valor mensal de pagamento.',
            'payment_day' => 'Informe uma data válida para o pagamento.',
        );
        public $FieldsForm = array(
        );
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $status;
        private $observation;
        private $monthly_value;
        private $payment_day;
        
        public function between($data){
            return $data > 1 && $data < 31;
        }
    }
