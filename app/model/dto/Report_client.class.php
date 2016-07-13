<?php


    class Report_client {
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
        private $id_report;
        private $id_client;


    }
