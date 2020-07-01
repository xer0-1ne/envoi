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
define('URL_SITE', $conf_site_url );
define('URL_RESOURCES', URL_SITE . "e-core" . SLASH . "resources" . SLASH);

//define core paths
define('DIR_ADMIN', DIR_CORE . 'admin' . SLASH);
define('DIR_CLASSES', DIR_CORE . 'classes' . SLASH);
define('DIR_CONF', DIR_CORE . 'conf' . SLASH);
define('DIR_DATABASE', DIR_CORE . 'database' . SLASH);

//define base resources paths
define('DIR_BASE_CSS', URL_RESOURCES . 'css' . SLASH);
define('DIR_BASE_IMAGES', URL_RESOURCES . 'images' . SLASH);
define('DIR_BASE_JS', URL_RESOURCES . 'js' . SLASH);
define('DIR_ADMIN_RESOURCES', URL_SITE . 'e-core' . SLASH . 'admin' . SLASH . 'resources' . SLASH );

//define bootstrap resources path
define('DIR_BOOTSTRAP', URL_RESOURCES . "bootstrap" . SLASH);
define('DIR_BOOTSTRAP_CSS', DIR_BOOTSTRAP . "css" . SLASH);
define('DIR_BOOTSTRAP_ICONS', DIR_BOOTSTRAP . "icons" . SLASH);
define('DIR_BOOTSTRAP_JS', DIR_BOOTSTRAP . "js" . SLASH);

//define content storage location
define('DIR_MODULES', DIR_CONTENT . "modules" . SLASH);
//using demo posts for now, but will need to switch to live posts 
//define('DIR_POSTS', DIR_CONTENT . "posts" . SLASH);
define('DIR_CONTENT_POSTS', DIR_CONTENT . "demo-posts" . SLASH);
define('DIR_CONTENT_UPLOADS', DIR_CONTENT . "uploads" . SLASH);

//admin views
define('DIR_ADMIN_VIEWS', DIR_ADMIN . 'views' . SLASH);

//admin site/structure
define('DIR_SITE_STRUCTURE', DIR_SITE . 'structure' . SLASH);

//define HTML tags
define('BR', "<br>\n");
define('SP', " ");

define('USERNAME', "user_username");
define('FIRSTNAME', "user_firstname");
define('LASTNAME', "user_lastname");
define('USER_TITLE', "user_title");
define('USER_EMAIL', "user_email");

define('DB_FILE', DIR_DATABASE . "data.db");

/*
 * Include all required files
 */

//convert to array at some point... for now, will work with static file
//BOTH OF THE FILES WILL NOT BE INCLUDED AS THEY WILL STORE SENSITIVE ARRAYS
include(DIR_CONF . "config.php");
include(DIR_CONF . "user.php");

//used for base stylesheets
define('URL_CURRENT_THEME_CSS', URL_SITE . "e-themes" . SLASH . $conf_current_theme . SLASH . "css" . SLASH);

//variable declaration
include(DIR_CORE . "variables.php");

//include global functions and variables
include(DIR_CORE . "functions.php");

//include HTML structure class
include(DIR_CLASSES . "html.class.php");
include(DIR_CLASSES . "post.class.php");

//set timezone
date_default_timezone_set($conf_timezone);


/*
 * Initialize site requirements
 */

?>