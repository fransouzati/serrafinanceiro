<?php


    class Extra_charge {
        private $FieldsValidation = array(
            'id'   => '',
            'date' => 'notEmpty,validDate',
            'value' => 'notEmpty,validMoney',
            'id_entry' => array('existsForeign', 'entry'),
            'id_client' => array('existsForeign', 'client'),
            'expiry' => 'notEmpty,validDate',
        );
        private $FieldsMasks = array(
            'date' => 'dateMask',
            'value' => 'moneyMask',
            'id_entry' => array('getDto', ['entry', 'id']),
            'id_client' => array('getDto', ['client', 'id']),
            'expiry' => 'dateMask',
            'status' => 'booleanMask',

        );
        public $FieldsErrors = array(
            'date' => 'Informe uma data de cobrança válida.',
            'value' => 'Informe um valor de cobrança válido.',
            'id_entry' => 'Informe uma entrada válida.',
            'id_client' => 'Informe um cliente válido.',
            'expiry' => 'Informe uma data de validade válida.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $date;
        private $description;
        private $value;
        private $id_entry;
        private $id_client;
        private $status;
        private $expiry;
    }
