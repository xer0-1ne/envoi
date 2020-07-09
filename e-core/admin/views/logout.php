<?php #NAME_OF_PAGE

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

$_SESSION["id"] = '';
session_destroy();

header("Location: " . $conf_site_url);


?>