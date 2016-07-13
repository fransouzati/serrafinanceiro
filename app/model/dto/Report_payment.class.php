<?php


    class Report_payment {
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
        private $id_report;
        private $id_client;
        private $type;
        private $id_title;
        private $value;


    }
