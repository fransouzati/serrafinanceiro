<?php

    /**
     * Files autoload
     *
     * @author Rafael de Paula - <rafael@bentonet.com.br>
     * @param String $class - called class name
     *
     **/
    function autoload($class) {
        // Base MVC
        if (file_exists(_BASE_ROOT_DIR . 'controller/' . $class . '.class.php')) {
            include_once(_BASE_ROOT_DIR . 'controller/' . $class . '.class.php');
        }
        elseif (file_exists(_BASE_ROOT_DIR . 'model/' . $class . '.class.php')) {
            include_once(_BASE_ROOT_DIR . 'model/' . $class . '.class.php');
        }
        elseif (file_exists(_BASE_ROOT_DIR . 'viewer/' . $class . '.class.php')) {
            include_once(_BASE_ROOT_DIR . 'viewer/' . $class . '.class.php');
        }

        // Traits
        elseif (file_exists(_BASE_ROOT_DIR . 'model/Trait/' . $class . '.trait.php')) {
            include_once(_BASE_ROOT_DIR . 'model/Trait/' . $class . '.trait.php');
        }
        elseif (file_exists(_APP_ROOT_DIR . 'model/Trait/' . $class . '.trait.php')) {
            include_once(_APP_ROOT_DIR . 'model/Trait/' . $class . '.trait.php');
        }

        // App classes
        elseif (file_exists(_APP_ROOT_DIR . 'controller/' . $class . '.class.php')) {
            include_once(_APP_ROOT_DIR . 'controller/' . $class . '.class.php');
        }
        elseif (file_exists(_APP_ROOT_DIR . 'model/' . $class . '.class.php')) {
            include_once(_APP_ROOT_DIR . 'model/' . $class . '.class.php');
        }
        elseif (file_exists(_APP_ROOT_DIR . 'model/dto/' . $class . '.class.php')) {
            include_once(_APP_ROOT_DIR . 'model/dto/' . $class . '.class.php');
        }
        elseif (file_exists(_APP_ROOT_DIR . 'viewer/' . $class . '.class.php')) {
            include_once(_APP_ROOT_DIR . 'viewer/' . $class . '.class.php');
        }
        elseif (file_exists(SMARTY_SYSPLUGINS_DIR . strtolower($class) . '.php')){
            include SMARTY_SYSPLUGINS_DIR . strtolower($class) . '.php';
        }

        // PDF
        elseif(file_exists('plugins/fpdf/'.strtolower($class).'.php')){
            include_once('plugins/fpdf/'.strtolower($class).'.php');
        }
        elseif(file_exists(_APP_ROOT_DIR.'model/pdf/'.$class.'.class.php')){
            include_once(_APP_ROOT_DIR.'model/pdf/'.$class.'.class.php');
        }
        elseif(file_exists(_BASE_ROOT_DIR.'model/pdf/'.$class.'.class.php')){
            include_once(_BASE_ROOT_DIR.'model/pdf/'.$class.'.class.php');
        }

        // Excel
        elseif(file_exists('plugins/phpexcel/'.$class.'.php')){
            include_once('plugins/phpexcel/'.$class.'.php');
        }elseif(file_exists(_APP_ROOT_DIR.'model/excel/'.$class.'.class.php')){
            include_once(_APP_ROOT_DIR.'model/excel/'.$class.'.class.php');
        }elseif(file_exists(_BASE_ROOT_DIR.'model/excel/'.$class.'.class.php')){
            include_once(_BASE_ROOT_DIR.'model/excel/'.$class.'.class.php');
        }
    }

    spl_autoload_register('autoload');
