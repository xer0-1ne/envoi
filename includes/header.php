<?php #header.php

    //define separator
    define('SLASH', DIRECTORY_SEPARATOR);

    //define root directory
    define('ROOT', dirname(__dir__, 1) . SLASH);

    //define config directory
    define('CONFIG_DIR', ROOT . 'config' . SLASH);

    //define includes directory
    define('INCLUDES_DIR', ROOT . 'includes'. SLASH);

    //declare required files
    $config_file = CONFIG_DIR . 'config.php';
    $functions_file = INCLUDES_DIR . 'functions.php';

    include $config_file;
    include $functions_file;

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <meta name="description" content="">
    <meta name="author" content="<?php echo $username; ?>" >
    <meta name="url" content="<?php echo $site_url; ?>" >
    <meta name="copyright" content="<?php echo $site_title; ?>">
    <meta name="robots" content="index,follow">

    <title><?php echo $site_title ?></title>
    
    <!-- Links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $site_url; ?>resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $site_url; ?>resources/css/style.css">
    
</head>

