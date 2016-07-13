<?php


    class User {
        private $FieldsValidation = array(
            'id'       => 'notEmpty',
            'email' => 'notEmpty,validEmail',
            'password' => 'notEmpty',
            'name'     => 'notEmpty',
        );
        private $FieldsMasks = array();
        public $FieldsErrors = array(
            'email'        => 'Informe um email válido.',
            'password'        => 'Informe uma senha válida.',
            'name'            => 'Informe um nome válido.',
            'passwordConfirm' => 'Senhas não conferem',
        );
        public $FieldsForm = array(
        );
        use Validation;
        use DTO;
        private $id;
        private $email;
        private $password;
        private $name;

    }
