<?php


    class Bill_payment {
        private $FieldsValidation = array(
            'id_bill' => array('existsForeign', ['bill', 'id']),
            'value'   => 'validMoney',
            'date'     => 'validDate',
        );
        private $FieldsMasks = array(
            'id_bill' => array('getDto', ['bill', 'id']),
            'value'   => 'moneyMask',
            'date' => 'dateMask',
            'id_withdraw' => array('getDto', ['withdraw', 'id'])
        );
        public $FieldsErrors = array(
            'id_bill'  => 'Informe uma conta válida.',
            'value' => 'Informe um valor válido.',
            'date'   => 'Informe uma data válida.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $id_bill;
        private $id_withdraw;
        private $date;
        private $value;
        private $observation;

    }
