<?php # e-core/admin/views/dashboard.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//define the page title
$page_title = 'Dashboard';

//Required for header and navigation
include(DIR_ADMIN_VIEWS . "header.php");

$admin->create_node('div', ['class'=>'d-flex', 'id'=>'wrapper']);
    include(DIR_ADMIN_VIEWS . "nav.php");
    $admin->create_node('div', [ 'class'=>'bg-white flex-column content container-fluid admin-body', 'id'=>'content-wrapper']);
        $admin->create_node('div', ['class'=>'admin-header']);
            $admin->create_text_node('span', ['class'=>'admin-header-text dark-text'], $page_title );
        $admin->close_node('div');






    $admin->close_node('div');
$admin->close_node('div');

include(DIR_ADMIN_VIEWS . "footer.php");

$admin->display();
?>