<?php


    class Finances {
        private $FieldsValidation = array(
            'monthly_value' => 'validMoney',
        );
        private $FieldsMasks = array(
            'monthly_value' => 'moneyMask',
            'status' => 'booleanMask',
        );
        public $FieldsErrors = array(
            'monthly_value' => 'Informe o valor mensal de pagamento.',
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

    }
