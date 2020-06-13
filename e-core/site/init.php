<?php # e-core/site/init.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

/*
 * Define required directories for absolute path
 */

//DIR_ROOT and DIR_CORE are defined in index.php

//define base folders
define('DIR_CONTENT', DIR_ROOT . 'e-content' . SLASH);
define('DIR_THEMES', DIR_ROOT . 'e-themes' . SLASH);
define('DIR_RESOURCES', DIR_CORE . 'resources' . SLASH);

//used for base stylesheets
define('URL_RESOURCES', "e-core" . SLASH . "resources" . SLASH);

//define core paths
define('DIR_ADMIN', DIR_CORE . 'admin' . SLASH);
define('DIR_CLASSES', DIR_CORE . 'classes' . SLASH);
define('DIR_DATABASE', DIR_CORE . 'database' . SLASH);

//define base resource paths
define('DIR_BASE_CSS', URL_RESOURCES . 'css' . SLASH);
define('DIR_BASE_FONTS', URL_RESOURCES . 'fonts' . SLASH);
define('DIR_BASE_IMAGES', URL_RESOURCES . 'images' . SLASH);
define('DIR_BASE_JS', URL_RESOURCES . 'js' . SLASH);

//define content storage location
define('DIR_MODULES', DIR_CONTENT . "modules" . SLASH);
define('DIR_POSTS', DIR_CONTENT . "posts" . SLASH);
define('DIR_UPLOADS', DIR_CONTENT . "uploads" . SLASH);

//define HTML tags
define('BR', "<br>");

/*
 * Include all required files
 */

//convert to array at some point... for now, will work with static file
include(DIR_DATABASE . "config.php");

//used for base stylesheets
define('URL_CURRENT_THEME', "e-themes" . SLASH . $conf_current_theme);
define('URL_CURRENT_THEME_CSS', URL_CURRENT_THEME . SLASH . "css" . SLASH);

//variable declaration
include(DIR_CORE . "variables.php");

//include global functions and variables
include(DIR_CORE . "functions.php");

//include HTML structure class
include(DIR_CLASSES . "html_header.class.php");


/*
 * Initialize site requirements
 */

?>