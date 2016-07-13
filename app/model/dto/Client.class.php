<?php


    class Client {
        private $FieldsValidation = array(
            'id'              => '',
            'name'            => 'notEmpty',
            'cpf_cnpj'        => 'validDocument',
            'ie'              => '',
            'email1'          => 'validEmail',
            'email2'          => 'validEmail',
            'phone1'          => '',
            'phone2'          => '',
            'site'            => '',
            'since'           => 'validDate',
            'responsible'     => '',
            'responsible_cpf' => 'validCpf',
            'address'         => '',
            'observation'     => '',
            'status'          => '',
        );
        private $FieldsMasks = array(
            'since' => 'dateMask',
        );
        public $FieldsErrors = array(
            'name'            => 'Informe um nome válido.',
            'cpf_cnpj'        => 'Informe um CPF/CNPJ válido.',
            'email1'          => 'Informe o e-mail de contato 1 válido.',
            'email2'          => 'Informe o e-mail de contato 2 válido.',
            'since'           => 'Informe uma data válida para o cadastro.',
            'responsible_cpf' => 'Informe um CPF válido para o responsável.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $name;
        private $cpf_cnpj;
        private $ie;
        private $email1;
        private $email2;
        private $phone1;
        private $phone2;
        private $site;
        private $since = null;
        private $responsible;
        private $responsible_cpf;
        private $address;
        private $observation;
        private $status;

    }
