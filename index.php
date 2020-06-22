<?php # index.php

/* Envoi Blog
 * https://github.com/xer0-1ne/envoi
 * MIT License
 * Initial Creator - Will Roberts
 *
 * Envoi is a PHP-based flat file blogging system with shareability, simplicity, and versatility in mind. 
 */

ob_start();                                         //start output buffering

define('SLASH', DIRECTORY_SEPARATOR);               //Shorten directory separator
define('DIR_ROOT', __DIR__ . SLASH);                //define root path
define('DIR_CORE', DIR_ROOT . 'e-core' . SLASH);    //define core path
define('DIR_SITE', DIR_CORE . 'site' . SLASH);      //define default site path

define('CHECK_SECURE_ENVOI', true);                 //define security constant

require_once(DIR_CORE . 'database' . SLASH . 'config.php');
require_once(DIR_SITE . 'init.php');                //require init.php for site requirements

//check for admin or login, else display the main site
if (fnmatch("*admin/*",$_SERVER['REQUEST_URI'])) {
    include(DIR_SITE . 'admin.php');
} else if (fnmatch("*login/",$_SERVER['REQUEST_URI'])) {
    include(DIR_SITE . 'login.php');
} else {
    include(DIR_SITE . 'site.php');
}

?>