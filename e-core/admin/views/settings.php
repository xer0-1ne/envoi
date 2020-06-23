<?php # e-core/admin/views/settings.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

include(DIR_ADMIN_VIEWS . "header.php");
include(DIR_ADMIN_VIEWS . "nav.php");

include(DIR_ADMIN_VIEWS . "footer.php");

$admin->display();
?>