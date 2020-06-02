<?php #init.php

    define('SLASH', DIRECTORY_SEPARATOR); //define separator
    define('ROOT', __DIR__ . SLASH); //define root directory
    define('CONFIG_DIR', ROOT . 'config' . SLASH); //define config directory
    define('INCLUDES_DIR', ROOT . 'includes'. SLASH); //define includes directory
    define('RESOURCE_DIR', ROOT . 'resources'. SLASH); //define includes directory
    define('CONTENT_DIR', ROOT . 'content' . SLASH); //define content location

    //declare required files
    $config_file = CONFIG_DIR . 'config.php';
    $functions_file = INCLUDES_DIR . 'functions.php';

    include $config_file;
    include $functions_file;

?>