<?php
    
    
    class Bill {
        private $FieldsValidation = array(
            'id_type' => array('existsForeign', ['withdraw_type', 'id']),
            'value'   => 'validMoney',
            'day'     => 'validDay',
        );
        private $FieldsMasks = array(
            'id_type'     => array('getDto', ['withdraw_type', 'id']),
            'value'       => 'moneyMask',
            'is_variable' => 'booleanMask',
        );
        public $FieldsErrors = array(
            'id_type' => 'Informe um tipo de saída válido.',
            'value'   => 'Informe um valor válido.',
            'day'     => 'Informe um dia válido.',
        );
        public $FieldsForm = array();
        use Validation;
        use Masks;
        use DTO;
        private $id;
        private $id_type;
        private $is_variable;
        private $day;
        private $value;
        private $description;
        
        public function validDay($day) {
            if ($this->validNumber($day)) {
                if ($day >= 1 && $day < 31)
                    return true;
            }
            
            return false;
        }
        
    }
