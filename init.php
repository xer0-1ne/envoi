<?php #init.php

    include_once "config/config.php";

    define('SLASH', DIRECTORY_SEPARATOR); //define separator
    define('ROOT', __DIR__ . SLASH); //define root directory
    define('CONFIG_DIR', ROOT . 'config' . SLASH); //define config directory
    define('INCLUDES_DIR', ROOT . 'includes'. SLASH); //define includes directory
    define('RESOURCE_DIR', ROOT . 'resources'. SLASH); //define includes directory
    define('CONTENT_DIR', ROOT . 'content' . SLASH); //define content location
    define('LOGIN_PAGE', $site_url . SLASH . "login.php"); //define the login page

    //declare required files
    $config_file = CONFIG_DIR . 'config.php';
    $functions_file = INCLUDES_DIR . 'functions.php';

    include $config_file;
    include $functions_file;

    date_default_timezone_set($timezone);


?>