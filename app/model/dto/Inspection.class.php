<?php


    class Inspection {
        private $FieldsValidation = array(

        );
        private $FieldsMasks = array(

        );
        public $FieldsErrors = array(

        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $date;

    }
