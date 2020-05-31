<?php #init.php

    //define separator
    define('SLASH', DIRECTORY_SEPARATOR);

    //define root directory
    define('ROOT', __DIR__ . SLASH);

    //define config directory
    define('CONFIG_DIR', ROOT . 'config' . SLASH);

    //define includes directory
    define('INCLUDES_DIR', ROOT . 'includes'. SLASH);

    //define includes directory
    define('RESOURCE_DIR', ROOT . 'resources'. SLASH);

    //declare required files
    $config_file = CONFIG_DIR . 'config.php';
    $functions_file = INCLUDES_DIR . 'functions.php';

    include $config_file;
    include $functions_file;

?>