<?php


    class Withdraw_type {
        private $FieldsValidation = array(
            'id'   => '',
            'name' => 'notEmpty',
            'need_partner' => '',
        );
        private $FieldsMasks = array(
            'need_partner' => 'booleanMask',
            'balance' => 'moneyMask',
        );
        public $FieldsErrors = array(
            'name' => 'Informe um nome válido.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $name;
        private $need_partner;
        private $balance;
    }
