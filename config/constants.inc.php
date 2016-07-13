<?php
    // Defines the class and method to use as index
    define('_MAIN_CLASS', 'UserController');
    define('_MAIN_METHOD', 'login');

    // Defines the main language to the system
    define('_LOCALE', 'ptbr');

    // Defines the URL base of the website
    if(!_LOCAL)
        $ext = '/financeiro/';
    else
        $ext = '';
    define('_BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].$ext);

    // Defines the directory separator
    define('_DS', DIRECTORY_SEPARATOR);

    define('_BANK_INVESTOR_NAME', 'Caixa');
    define('_INTERNAL_INVESTOR_NAME', 'Caixa interno');

    define('_SUPPORT_ENTRY_TYPE_ID', 1);
    define('_DEVELOPMENT_ENTRY_TYPE_ID', 2);
    define('_ADJUST_ENTRY_TYPE_ID', 8);
    define('_EXTRA_ENTRY_TYPE_ID', 7);

    define('_ADJUST_EXIT_TYPE_ID', 6);
