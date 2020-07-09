<?php # e-core/admin/views/nav.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//create the navbar / side panel
$admin->create_node('nav', ['class'=>'navbar align-items-start']);
    $admin->create_node('div', ['class'=>'admin-navbar sidebar']);
        $admin->create_node('div', ['class'=>'list-group list-group-flush']);
            $admin->create_node('a', ['href'=>'#', 'class'=>'navbar-brand sidebar-brand pl-4 pr-4']);

                //navbar title
                $admin->create_text_node('span', ['class'=>'mx-3 text-muted h4'], "Admin Panel");
            $admin->close_node('a');

            //navbar items
            $admin->create_node('ul', ['class'=>'nav navbar-nav ml-3', 'id'=>'accordionSidebar']);

                //item View Website
                $admin->create_node('li', ['class'=>'nav-item my-1 align-middle', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url]);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'browsers-outline', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'View Website');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Dashboard
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/dashboard/"]);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'bar-chart', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'Dashboard');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Add Content
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/add-post/"]);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'add-circle', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'Add Content');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item View Posts
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/view-posts/"]);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'file-tray-stacked', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'View Posts');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Uploads
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'cloud-upload', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'Uploads');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Settings
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/settings/"]);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'cog', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'Settings');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Profile
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/profile/"]);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'person', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'Profile');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Logout
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>'admin/logout/']);
                        $admin->create_straight_node('ion-icon', ['class'=>'text-dark align-middle', 'name'=>'log-out', 'size'=>'small']);
                        $admin->create_text_node('span', ['class'=>'text-muted align-middle'], 'Log Out');
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