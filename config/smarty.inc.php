<?php
    define('HOME', getenv('DOCUMENT_ROOT').'/financeiro/');
    define('HOST', $_SERVER['HTTP_HOST']);
    define('FRAMEWORK', HOME.'/base/');
    
    define('SMARTY_DIR', FRAMEWORK.'smarty/');
    define('TEMPLATES', HOME.'/app/viewer/');
    define('TMP', FRAMEWORK.'tmp/');
    define('TMP_CACHE', FRAMEWORK.'cache/');

    require_once(SMARTY_DIR.'Smarty.class.php');