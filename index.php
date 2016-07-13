<?php

    session_start();

    setlocale(LC_MONETARY,"pt_BR");
    date_default_timezone_set('Brazil/East');
    
    define('_LOCAL', $_SERVER['HTTP_HOST'] == 'localhost:8091' || $_SERVER['HTTP_HOST'] == 'localhost:8092');
    
    // Dir config
    include_once('config/dirList.php');

    // Constants
    include_once(_CONFIG_ROOT_DIR.'/constants.inc.php');

    // Date format
    include_once(_CONFIG_ROOT_DIR.'check/formatDate.inc.php');

    // Autoload
    include_once(_CONFIG_ROOT_DIR.'exec/autoload.inc.php');

    // Smarty
    include_once(_CONFIG_ROOT_DIR.'smarty.inc.php');

    // Database connection_status
    include_once(_CONFIG_ROOT_DIR.'database/dbConnection.inc.php');

    // Errors handler
    include_once(_CONFIG_ROOT_DIR.'errors/errorHandler.inc.php');

    // Error messages
    include_once(_CONFIG_ROOT_DIR.'errors/messagesLocales.inc.php');

    // Code execution
    include_once(_CONFIG_ROOT_DIR.'exec/exec.inc.php');
