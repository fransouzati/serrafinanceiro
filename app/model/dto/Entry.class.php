<?php


    class Entry {
        private $FieldsValidation = array(
            'id'   => '',
            'date' => 'notEmpty,validDate',
            'value' => 'notEmpty,validMoney',
            'id_type' => array('existsForeign', 'entry_type'),
        );
        private $FieldsMasks = array(
            'date' => 'dateMask',
            'value' => 'moneyMask',
            'id_type' => array('getDto', ['entry_type', 'id']),
            'id_client' => array('getDto', ['client', 'id']),
        );
        public $FieldsErrors = array(
            'date' => 'Informe uma data de entrada válida.',
            'value' => 'Informe um valor de entrada válido.',
            'id_type' => 'Informe um tipo de entrada válido.',
            'id_client' => 'Informe um cliente válido.',
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
        private $id_client;
    }
