<?php # admin.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

if (fnmatch("*dashboard/", $_SERVER['REQUEST_URI'])) {
    include(DIR_ADMIN_VIEWS . 'dashboard.php');
} else if (fnmatch("*add-post/", $_SERVER['REQUEST_URI'])) {
    include(DIR_ADMIN_VIEWS . 'add-posts.php');
} else if (fnmatch("*edit-post/*", $_SERVER['REQUEST_URI'])) {
    include(DIR_ADMIN_VIEWS . 'edit-posts.php');
} else if (fnmatch("*profile/", $_SERVER['REQUEST_URI'])) {
    include(DIR_ADMIN_VIEWS . 'profile.php');
} else if (fnmatch("*settings/", $_SERVER['REQUEST_URI'])) {
    include(DIR_ADMIN_VIEWS . 'settings.php');
} else if (fnmatch("*view-posts/*", $_SERVER['REQUEST_URI'])) {
    include(DIR_ADMIN_VIEWS . 'view-posts.php');
} else {
    include(DIR_ADMIN_VIEWS . 'dashboard.php');
}

?>