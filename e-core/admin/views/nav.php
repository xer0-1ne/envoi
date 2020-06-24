<?php # e-core/admin/views/nav.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

$admin->create_node('nav', ['class'=>'navbar align-items-start sidebar accordion p-0 navbar-custom']);
    $admin->create_node('div', ['class'=>'admin-navbar sidebar accordion']);
        $admin->create_node('div', ['class'=>'list-group list-group-flush flex-column']);
            $admin->create_node('a', ['href'=>'#', 'class'=>'navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0']);

                //navbar title
                $admin->create_text_node('span', ['class'=>'mx-3 text-dark h4'], "Admin");
            $admin->close_node('a');

            //navbar items
            $admin->create_node('ul', ['class'=>'nav navbar-nav', 'id'=>'accordionSidebar']);

                //item View Website
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url]);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-home']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'View Website');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Dashboard
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/dashboard/"]);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-columns']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'Dashboard');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Add Content
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/add-post/"]);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-plus-square']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'Add Content');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item View Posts
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/view-posts/"]);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-file']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'View Posts');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Uploads
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-file-upload']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'Uploads');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Settings
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/settings/"]);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-cogs']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'Settings');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Profile
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/profile/"]);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-user']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'Profile');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Logout
                $admin->create_node('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_straight_node('i', ['class'=>'text-dark pr-1 fas fa-sign-out-alt']);
                        $admin->create_text_node('span', ['class'=>'text-dark'], 'Log Out');
                    $admin->close_node('a');
                $admin->close_node('li');
            $admin->close_node('ul');

            //collapse/expand button
            $admin->create_node('div', ['class'=>'text-center d-none d-md-inline']);
                $admin->create_straight_node('button', ['class'=>'btn rounded-circle border-0','id'=>'sidebarToggle', 'type'=>'button']);
            $admin->close_node('div');
            
        $admin->close_node('div');
    $admin->close_node('div');
$admin->close_node('nav');

?>