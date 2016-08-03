<?php
    
    class Permission {
        use Functions;
    
        /**
         * Analyse the _POST variable to make the permission string
         * to put in the database
         * Format:
         *      controller1[act1,act2]|controller2[act1,act2,act3]
         *
         * @return String - permissions
         */
        static function permissionStr(){
            
            $block = self::$block;
            $str = '';
            $secFunctions = array();
            
            foreach($_POST as $key => $val){
                if(self::validPostName($key)){
                    $key = str_replace('_permission_', '', $key);
                    $str .= $key . '[';
                    $secFunctions[$key] = array();
                    if(count($val)) {
                        foreach($val as $pack) {
                            $functions = $block[$key][$pack];
                            foreach ($functions as $function) {
                                if(!in_array($function, $secFunctions[$key])){
                                    $str .= $function . ',';
                                    $secFunctions[$key][] = $function;
                                }
                            }
                        }
                        $str = trim($str, ',') . ']|';
                    }
                }
            }
            
            $str = trim($str, '|');
            
            return $str;
            
        }
    
        /**
         * Checks if an _POST key are from the permissions module
         *
         * @param $name - post key name
         * @return Boolean - is valid
         */
        static function validPostName($name){
            return str_replace('_permission_', '', $name) != $name;
        }
    
        /**
         * Gets the string from database and turns into an array
         *
         * @param String $str - permission string from database
         * @return array - permission array
         */
        static function permissionArray($str){
            $str = explode('|', $str);
            $permissions = array();
            foreach($str as $permission){
                $bracketIni = strpos($permission, '[');
                $controller = substr($permission, 0, $bracketIni);
                
                $bracketEnd = strpos($permission, ']');
                $len = $bracketEnd - $bracketIni - 1;
                $functions = substr($permission, $bracketIni + 1, $len);
                $functions = explode(',', $functions);
                
                if(count($functions)){
                    $permissions[$controller] = $functions;
                }
            }
            
            return $permissions;
        }
        
        /**
         * Check if the user can make an action
         * @param array $permissions - user's permissions
         * @param String $controller - trying to access
         * @param String $action - trying to execute
         * @return Boolean - has access
         */
        static function hasAccess($permissions, $controller, $action){
            $publics = self::$publics;
            if(isset($publics[$controller])){
                if(in_array($action, $publics[$controller]))
                    return true;
            }
            
            if(isset($permissions[$controller])){
                if(in_array($action, $permissions[$controller]))
                    return true;
            }
            
            return false;
        }
    
        /**
         * @return array - permissions packages
         */
        static function getPackages(){
            return self::$block;
        }
    
        /**
         * Makes a form to check the user's permission
         *
         * @param boolean $makeDisabled - make checkboxes disabled
         * @param Boolean $add - add form if true, edit form if false. Default: true
         * @param string $permissions - if $add == false, the user's permissions
         * @return string - form
         */
        static function makeForm($makeDisabled = false, $add = true, $permissions = null){
            $form = '
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-header">Permissões</h3>
                    </div>
                </div>
            ';
            foreach(self::$block as $controller => $packages){
                $name = self::$controllers[$controller];
                $form .= '
                    <div class="row">
                        <div class="col-sm-12">
                            <h4>'.$name.'</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                ';
                foreach($packages as $package => $functions){
                    if($add){
                        $checked = '';
                    }else{
                        if(self::hasPackage($permissions, $controller, $package))
                            $checked = 'checked';
                        else
                            $checked = '';
                    }
                    if($makeDisabled){
                        $disabled = 'disabled';
                    }else{
                        $disabled = '';
                    }
                    $form .= '
                        <label class="checkbox-inline">
                            <input '.$checked.' '.$disabled.' type="checkbox" name="_permission_'.$controller.'[]" value="'.$package.'">'.$package.'
                        </label>
                    ';
                }
                $form .= '
                        </div>
                    </div>
                ';
            }
            
            return $form;
        }
    
        /**
         * Check if user has permission to one package of functions
         *
         * @param array $permissions - user's permissions
         * @param string $controller - controller to view package
         * @param string $package - package to check
         * @return boolean - has package
         */
        static function hasPackage($permissions, $controller, $package){
            $packFunctions = self::$block[$controller][$package];
            $permissions = self::permissionArray($permissions);
            
            foreach($packFunctions as $function){
                if(!isset($permissions[$controller]))
                    return false;
                if(!in_array($function, $permissions[$controller]))
                    return false;
            }
            
            return true;
        }
    }