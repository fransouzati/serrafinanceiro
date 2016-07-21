<?php


    class Balance_history {
        private $FieldsValidation = array(
        );
        private $FieldsMasks = array(
            'id_user' => array('getDto', ['user', 'id']),
            'value_before' => 'moneyMask',
            'value_after' => 'moneyMask',
            'date' => 'dateMask',
        );
        public $FieldsErrors = array(
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $id_user;
        private $value_before;
        private $value_after;
        private $date;
    }
