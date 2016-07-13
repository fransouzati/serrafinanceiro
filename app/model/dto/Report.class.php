<?php


    class Report {
        private $FieldsValidation = array(
            'name' => 'notEmpty',
            'period' => 'notEmpty',
            'file' => 'notEmpty',
            'created' => 'validDate',
        );
        private $FieldsMasks = array(
            'period' => 'unfilterPeriod',
            'created' => 'dateMask',
        );
        public $FieldsErrors = array(
            'name' => 'Informe um nome.',
            'period' => 'Informe um período',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $name;
        private $period;
        private $created;
        private $file;

    }
