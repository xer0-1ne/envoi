<?php # e-core/site/site.php //dirver

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//initiate theme
include_once(DIR_THEMES . $conf_current_theme . SLASH . "index.php");

?>