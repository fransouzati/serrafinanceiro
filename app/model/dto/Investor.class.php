<?php


    class Investor {
        private $FieldsValidation = array(
            'id'       => '',
            'name'     => 'notEmpty',
            'initial_capital' => 'validMoney',
            'is_partner' => '',
        );
        private $FieldsMasks = array(
            'initial_capital' => 'moneyMask',
            'is_partner' => 'booleanMask'
        );
        public $FieldsErrors = array(
            'name'            => 'Informe um nome válido.',
            'initial_capital' => 'Informe um capital inicial válido.',
        );
        public $FieldsForm = array(
        );
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $name;
        private $initial_capital;
        private $is_partner;

    }
