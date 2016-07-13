<?php

    trait Validation {

        public function validNumber($input) {
            return filter_var($input, FILTER_VALIDATE_INT) || $input == 0;
        }

        public function validEmail($input) {
            return filter_var($input, FILTER_VALIDATE_EMAIL);
        }

        public function notSpecials($input) {
            return filter_var($input, FILTER_SANITIZE_FULL_SPECIAL_CHARS) == $input;
        }

        public function notEmpty($input) {
            return trim($input) != '';
        }

        public function validCpf($cpf) {
            $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);
            // Valida tamanho
            if (strlen($cpf) != 11)
                return false;
            // Calcula e confere primeiro dígito verificador
            for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
                $soma += $cpf{$i} * $j;
            $resto = $soma % 11;
            if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto))
                return false;
            // Calcula e confere segundo dígito verificador
            for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
                $soma += $cpf{$i} * $j;
            $resto = $soma % 11;
            return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
        }
        

        public function validDate($input) {
            $input = explode('-', $input);

            if (count($input) == 3) {
                if (checkdate($input[1], $input[2], $input[0])) {
                    return true;
                }
            }

            return false;
        }

        public function validTime($input) {
            $input = explode(':', $input);
            if (count($input) == 2) {
                if (($input[0] < 24) && ($input[1] < 60)) {
                    return true;
                }
            } elseif (count($input) == 3) {
                if (($input[0] < 24) && ($input[1] < 60) && ($input[2] < 60)) {
                    return true;
                }
            }
        }

        public function validDatetime($input) {
            $input = explode(' ', $input);
            if (count($input) != 2)
                return false;
            if (!$this->validacaoData($input[0]))
                return false;
            if (!$this->validacaoHorario($input[1]))
                return false;

            return true;
        }

        public function validUf($input) {
            $input = strtoupper($input);
            $arrUF = array("AC" => "Acre", "AL" => "Alagoas", "AM" => "Amazonas", "AP" => "Amapá", "BA" => "Bahia", "CE" => "Ceará", "DF" => "Distrito Federal", "ES" => "Espírito Santo", "GO" => "Goiás", "MA" => "Maranhão", "MT" => "Mato Grosso", "MS" => "Mato Grosso do Sul", "MG" => "Minas Gerais", "PA" => "Pará", "PB" => "Paraíba", "PR" => "Paraná", "PE" => "Pernambuco", "PI" => "Piauí", "RJ" => "Rio de Janeiro", "RN" => "Rio Grande do Norte", "RO" => "Rondônia", "RS" => "Rio Grande do Sul", "RR" => "Roraima", "SC" => "Santa Catarina", "SE" => "Sergipe", "SP" => "São Paulo", "TO" => "Tocantins");

            return array_key_exists($input, $arrUF);
        }

        public function validCnpj($input) {
            $j = 0;
            for ($i = 0; $i < (strlen($input)); $i++) {
                if (is_numeric($input[$i])) {
                    $num[$j] = $input[$i];
                    $j++;
                }
            }
            if (!isset($num)) {
                $isCnpjValid = false;
            } else {
                if (count($num) != 14) {
                    return false;
                }

                if ($num[0] == 0 && $num[1] == 0 && $num[2] == 0 && $num[3] == 0 && $num[4] == 0 && $num[5] == 0 && $num[6] == 0 && $num[7] == 0 && $num[8] == 0 && $num[9] == 0 && $num[10] == 0 && $num[11] == 0) {
                    $isCnpjValid = false;
                } else {
                    $j = 5;
                    for ($i = 0; $i < 4; $i++) {
                        $multiplica[$i] = $num[$i] * $j;
                        $j--;
                    }
                    $soma = array_sum($multiplica);
                    $j = 9;
                    for ($i = 4; $i < 12; $i++) {
                        $multiplica[$i] = $num[$i] * $j;
                        $j--;
                    }
                    $soma = array_sum($multiplica);
                    $resto = $soma % 11;
                    if ($resto < 2) {
                        $dg = 0;
                    } else {
                        $dg = 11 - $resto;
                    }
                    if ($dg != $num[12]) {
                        $isCnpjValid = false;
                    }
                }
                if (!isset($isCnpjValid)) {
                    $j = 6;
                    for ($i = 0; $i < 5; $i++) {
                        $multiplica[$i] = $num[$i] * $j;
                        $j--;
                    }
                    $soma = array_sum($multiplica);
                    $j = 9;
                    for ($i = 5; $i < 13; $i++) {
                        $multiplica[$i] = $num[$i] * $j;
                        $j--;
                    }
                    $soma = array_sum($multiplica);
                    $resto = $soma % 11;
                    if ($resto < 2) {
                        $dg = 0;
                    } else {
                        $dg = 11 - $resto;
                    }
                    if ($dg != $num[13]) {
                        $isCnpjValid = false;
                    } else {
                        $isCnpjValid = true;
                    }
                }
            }

            return $isCnpjValid;
        }

        public function validDocument($input){
            if(!$this->validCpf($input))
                if(!$this->validCnpj($input))
                    return false;
            return true;
        }

        public function validFile($input, $types) {
            $extension = explode('.', $input);
            if (count($extension) < 2)
                return false;
            $extension = strtolower($extension[count($extension) - 1]);

            return in_array($extension, $types);
        }

        public function existsForeign($table, $input) {
            $primary = 'id';
            if(is_array($table)){
                $primary = $table[1];
                $table = $table[0];
            }
            $model = debug_backtrace()[2]['object'];

            return $model->exists($table, $primary, $input);

        }

        public function validDecimal($input){
            return is_numeric($input);
        }

        public function validMoney($input){
            $ret = false;
            if($this->validDecimal($input)){

                $ret = true;
            }else{
                $input = $this->decimalMask($input);
                if($this->validDecimal($input))
                    $ret = true;
            }

            if($ret){
                return true;
            }else{
                return false;
            }
        }

    }
