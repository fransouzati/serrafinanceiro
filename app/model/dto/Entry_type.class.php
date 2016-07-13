<?php


    class Entry_type {
        private $FieldsValidation = array(
            'id'   => '',
            'name' => 'notEmpty',
        );
        private $FieldsMasks = array(
        );
        public $FieldsErrors = array(
            'name' => 'Informe um nome válido.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $name;
    }
