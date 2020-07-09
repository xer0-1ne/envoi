<?php # e-core/admin/views/profile.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//define the page title
$page_title = 'Profile';

//Required for header and navigation
include(DIR_ADMIN_VIEWS . "header.php");

$admin->create_node('div', ['class'=>'d-flex', 'id'=>'wrapper']);
    include(DIR_ADMIN_VIEWS . "nav.php");
    $admin->create_node('div', [ 'class'=>'bg-white flex-column content container-fluid admin-body', 'id'=>'content-wrapper']);
        $admin->create_node('div', ['class'=>'admin-header']);
            $admin->create_text_node('span', ['class'=>'admin-header-text dark-text'], $page_title );
        $admin->close_node('div');
        $admin->create_simple_node('nav');
            $admin->create_node('div', ['class'=>'nav nav-tabs','id'=>'profile-tabs','role'=>'tablist']);

                $admin->create_straight_text_node('a', ['class'=>'nav-link active', 
                                                        'id'=>'user-tab', 
                                                        'data-toggle'=>'tab', 
                                                        'href'=>'#user-tab', 
                                                        'role'=>'tab', 
                                                        'aria-controls'=>'user-tab', 
                                                        'aria-selected'=>'true'], 'User Information');
                $admin->create_straight_text_node('a', ['class'=>'nav-link', 
                                                        'id'=>'social-media-tab', 
                                                        'data-toggle'=>'tab', 
                                                        'href'=>'#social-media-tab', 
                                                        'role'=>'tab', 
                                                        'aria-controls'=>'social-media-tab', 
                                                        'aria-selected'=>'false'], 'Social Media Profiles');          
            $admin->close_node('div');
        $admin->close_node('nav');
        

        $admin->create_node('div', ['class'=>'tab-content', 'id'=>'profile-tabsContent']);
            $admin->create_straight_text_node('div', ['class'=>'tab-pane fade show active', 
                                                      'id'=>'user-tab', 
                                                      'role'=>'tabpanel', 
                                                      'aria-labelledby'=>'user-tab'], 'User Data');
            $admin->create_straight_text_node('div', ['class'=>'tab-pane fade', 
                                                      'id'=>'social-media-tab', 
                                                      'role'=>'tabpanel', 
                                                      'aria-labelledby'=>'social-media-tab'], 'Social Media Data');
        $admin->close_node('div');

    $admin->close_node('div');
$admin->close_node('div');

//required for footer
include(DIR_ADMIN_VIEWS . "footer.php");

$admin->display();

?>