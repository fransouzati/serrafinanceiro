<?php


    class Bill_installment {
        private $FieldsValidation = array(
            'id_bill' => array('existsForeign', ['bill', 'id']),
            'value'   => 'validMoney',
            'number'     => 'validNumber',
            'expiry' => 'validDate',
        );
        private $FieldsMasks = array(
            'id_bill' => array('getDto', ['bill', 'id']),
            'value'   => 'moneyMask',
            'expiry' => 'dateMask',
            'payed' => 'booleanMask',
            'payed_date', 'datemask',
            'id_payment' => array('getDto', ['bill_payment', 'id']),
        );
        public $FieldsErrors = array(
            'id_bill'  => 'Informe uma conta válida.',
            'value' => 'Informe um valor válido.',
            'number' => 'Informe um número de parcelas válido.',
            'expiry'   => 'Informe vencimento válido.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $id_bill;
        private $value;
        private $number;
        private $expiry;
        private $payed;
        private $id_payment;

    }
