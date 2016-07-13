<?php


    class Finances_history {
        private $FieldsValidation = array(
            'id_finances' => array('existsForeign', 'finances'),
            'date' => 'validDate',
        );
        private $FieldsMasks = array(
            'date' => 'dateMask',
        );
        public $FieldsErrors = array(
            'id_finances' => 'Informe a ID do financeiro.',
            'date' => 'Informe uma data válida.',
        );
        public $FieldsForm = array(
        );
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $id_finances;
        private $date;
        private $description;

    }
