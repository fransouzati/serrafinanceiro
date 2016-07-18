<?php


    class Project {
        private $FieldsValidation = array(
            'name' => 'notEmpty',
            'value' => 'notEmpty,validMoney',
            'initial_date' => 'validDate',
            'end_date' => 'validDate',
            'id_entry_type' => array('existsForeign', 'entry_type'),
        );
        private $FieldsMasks = array(
            'id_client' => array('getDto', ['client', 'id']),
            'id_entry_type' => array('getDto', ['entry_type', 'id']),
            'value' => 'moneyMask',
            'initial_date' => 'dateMask',
            'end_date' => 'dateMask',
            'done_date' => 'dateMask',
            'done' => 'booleanMask',
            'status' => 'booleanMask',
        );
        public $FieldsErrors = array(
            'id_client' => 'Informe um cliente válido.',
            'name' => 'Informe um nome válido.',
            'value' => 'Informe um valor válido.',
            'initial_date' => 'Informe uma data de início válida.',
            'end_date' => 'Informe uma data final válida.',
            'done_date' => 'Informe uma data de finalização válida.',
        );
        public $FieldsForm = array(
        );
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $id_client = null;
        private $id_entry_type = null;
        private $name;
        private $value;
        private $initial_date;
        private $end_date;
        private $executor;
        private $status;
        private $observation;
        private $done;
        private $done_date;


        public function strtotime2($date){
            return strtotime($date);
        }

        public function today($transform = false){
            if($transform)
                return date('d/m/Y');
            else
                return date('Y-m-d');
        }

    }
