<?php


    class Project_installment {
        private $FieldsValidation = array(
            'id_project' => array('existsForeign', 'project'),
            'number' => 'validNumber',
            'value' => 'validMoney',
            'expiry' => 'validDate',
        );
        private $FieldsMasks = array(
            'id_project' => array('getDto', ['project', 'id']),
            'value' => 'moneyMask',
            'expiry' => 'dateMask',
        );
        public $FieldsErrors = array(
            'id_client' => 'Informe um cliente válido.',
            'name' => 'Informe um nome válido.',
            'value' => 'Informe um valor válido.',
            'initial_date' => 'Informe uma data de início válida.',
            'end_date' => 'Informe uma data final válida.',
        );
        public $FieldsForm = array(
        );
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $id_project;
        private $number;
        private $value;
        private $expiry;
        private $status;

    }
