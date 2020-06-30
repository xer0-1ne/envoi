<?php # e-core/admin/views/nav.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

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
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url]);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'window.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'View Website');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Dashboard
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/dashboard/"]);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'view-stacked.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'Dashboard');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Add Content
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/add-post/"]);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'journal-plus.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'Add Content');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item View Posts
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/view-posts/"]);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'card-list.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'View Posts');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Uploads
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'file-earmark.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'Uploads');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Settings
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/settings/"]);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'gear-wide-connected.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'Settings');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Profile
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/profile/"]);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'file-person.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'Profile');
                    $admin->close_node('a');
                $admin->close_node('li');

                //item Logout
                $admin->create_node('li', ['class'=>'nav-item my-1', 'role'=>'presentation']);
                    $admin->create_node('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_straight_node('img', ['class'=>'bi menu-icon-color', 'src'=>DIR_BOOTSTRAP_ICONS . 'door-open.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                        $admin->create_text_node('span', ['class'=>'text-muted'], 'Log Out');
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