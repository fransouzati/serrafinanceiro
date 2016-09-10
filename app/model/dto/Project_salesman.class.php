<?php
    
    
    class Project_salesman {
        private $FieldsValidation = array(
        );
        private $FieldsMasks = array(
            'percentage' => 'percentageMask',
            'id_project' => array('getDto', ['project', 'id']),
            'id_salesman' => array('getDto', ['salesman', 'id']),
        );
        public $FieldsErrors = array(
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id_project;
        private $id_salesman;
        private $percentage;
        
    }
