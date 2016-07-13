<?php

    class AppModel extends Model {
        private $caller;

        public function __construct() {
            parent::__construct();
            if(isset(debug_backtrace()[2]['object']))
                $this->caller = debug_backtrace()[2]['object'];
        }

        public function caller() {
            return $this->caller;
        }

        /**
         * @param object $dto - dto para montar
         * @param null $id - valor do id principal do dto
         * @param string $primaryName - nome do id principal do dto (padrão: id)
         * @return array - dto preenchido, erros do processo
         */
        public function makeDto($dto, $id = null, $primaryName = 'id') {
            $data = $dto->getArrayData();
            $errors = '';

            foreach ($data as $field => $value) {
                if ($field != $primaryName) {
                    if (!isset($_POST[$field]))
                        $_POST[$field] = '';

                    if (!$dto->set($field, $_POST[$field])) {
                        if(isset($dto->FieldsErrors[$field]))
                            $errors .= $dto->FieldsErrors[$field] . '<br>';
                    }
                }
            }

            if(!is_null($id))
                $dto->set($primaryName, $id);

            return array($dto, $errors);
        }
    }
