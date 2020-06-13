<?php # e-core/variables.php

require_once(DIR_SITE . 'init.php');                //require init.php for site requirements

//HTML header variables ( used in e-core/functions.php )
$var_html_doctype               = '<!DOCTYPE html>';
$var_html_lang                  = 'en';
$var_html_meta_charset          = 'UTF-8';
$var_html_viewport              = 'width=device-width, initial-scale=1.0';
$var_html_meta_description      = '';
$var_html_meta_author           = 'USERNAME';
$var_html_meta_url              = $conf_site_url;
$var_html_meta_copyright        = '';
$var_html_meta_robots           = 'index,follow';

$var_html_site_title            = $conf_site_title;

?>