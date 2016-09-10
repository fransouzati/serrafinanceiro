<?php
    
    
    class Salesman {
        private $FieldsValidation = array(
            'id'         => '',
            'name'       => 'notEmpty',
            'percentage' => 'notEmpty',
        );
        private $FieldsMasks = array(
            'percentage' => 'percentageMask',
        );
        public $FieldsErrors = array(
            'name'       => 'Informe um nome válido.',
            'percentage' => 'Informe uma porcentagem de comissão válida.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $name;
        private $percentage;
        
    }
