<?php # e-core/admin/views/settings.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//define the page title
$page_title = 'Settings';

//Required for header and navigation
include(DIR_ADMIN_VIEWS . "header.php");

$admin->create_node('div', ['class'=>'d-flex', 'id'=>'wrapper']);
    include(DIR_ADMIN_VIEWS . "nav.php");
    $admin->create_node('div', [ 'class'=>'bg-white flex-column content container-fluid admin-body', 'id'=>'content-wrapper']);
        $admin->create_node('div', ['class'=>'admin-header']);
            $admin->create_text_node('span', ['class'=>'admin-header-text dark-text'], $page_title );
        $admin->close_node('div');

        $admin->create_node('table', ['class'=>'table table-sm']);
            $admin->create_simple_node('thead');
                $admin->create_simple_node('tr');
                    $admin->create_straight_text_node('th', ['scope'=>'col'], 'Variable');
                    $admin->create_straight_text_node('th', ['scope'=>'col'], 'Value');
                $admin->close_node('tr');
            $admin->close_node('thead');
            //get testtings
            $settings_config = get_config_settings(DIR_CONF . "config.php");

            foreach ($settings_config as $variable => $value) {
                $admin->create_simple_node('tr');
                    $admin->create_straight_text_node('td', ['scope'=>'col'], $variable);
                    $admin->create_node('td', ['scope'=>'col']);
                        $admin->create_straight_node('input', ['class'=>'form-control mx-sm-3 config', 'value'=>$value]);
                $admin->close_node('tr');
            }
        $admin->close_node('table');
        $admin->create_node('div', ['class'=>'float-right']);

        $admin->create_node('input', ['class'=>'btn btn-secondary form-control form-group', 
                                      'type'=>'submit', 
                                      'name'=>'save', 
                                      'value'=>'Save Settings']);

        $admin->close_node('div');
    $admin->close_node('div');
$admin->close_node('div');

//required for footer
include(DIR_ADMIN_VIEWS . "footer.php");

$admin->display();

?>