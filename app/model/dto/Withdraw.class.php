<?php


    class Withdraw {
        private $FieldsValidation = array(
            'date' => 'notEmpty,validDate',
            'value' => 'notEmpty,validMoney',
            'id_type' => array('existsForeign', 'withdraw_type'),
            'id_investor' => array('existsForeign', 'investor'),
        );
        private $FieldsMasks = array(
            'date' => 'dateMask',
            'value' => 'moneyMask',
            'id_type' => array('getDto', ['withdraw_type', 'id']),
            'id_investor' => array('getDto', ['investor', 'id']),
            'id_partner' => array('getDto', ['investor', 'id']),
        );
        public $FieldsErrors = array(
            'date' => 'Informe uma data de saída válida.',
            'value' => 'Informe um valor de saída válido.',
            'id_type' => 'Informe um tipo de saída válido.',
            'id_investor' => 'Informe um investidor válido.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $date;
        private $description;
        private $value;
        private $id_type;
        private $id_investor;
        private $id_partner;
    }
