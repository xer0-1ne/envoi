<?php # e-core/database/config.php

//convert to array at some point... for now, will work with static file

defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

/*
 * Global site configuration variables
 */

$conf_current_theme     = "default";
$conf_site_url          = "http://localhost/envoi/";
$conf_site_title        = "Envoi";
$conf_site_slogan       = "One place to share it all";

$conf_host_url          =  $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$conf_timezone          = "America/New_York";

?>