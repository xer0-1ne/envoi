<?php # e-core/admin/views/nav.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

$admin->create_tag('nav', ['class'=>'navbar align-items-start sidebar accordion p-0 navbar-custom']);
    $admin->create_tag('div', ['class'=>'admin-navbar sidebar accordion']);
        $admin->create_tag('div', ['class'=>'list-group list-group-flush flex-column']);
            $admin->create_tag('a', ['href'=>'#', 'class'=>'navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0']);

                //navbar title
                $admin->create_tag_text('span', ['class'=>'mx-3 text-dark h4'], "Admin");
            $admin->close_tag('a');

            //navbar items
            $admin->create_tag('ul', ['class'=>'nav navbar-nav', 'id'=>'accordionSidebar']);

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>$conf_site_url]);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-home']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'View Website');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/dashboard/"]);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-columns']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Dashboard');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/add-post/"]);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-plus-square']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Add Content');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/view-posts/"]);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-file']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Posts');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-file-alt']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Pages');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-file-upload']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Uploads');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/settings/"]);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-cogs']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Settings');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>$conf_site_url . "admin/profile/"]);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-user']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Profile');
                    $admin->close_tag('a');
                $admin->close_tag('li');

                //item
                $admin->create_tag('li', ['class'=>'nav-item', 'role'=>'presentation']);
                    $admin->create_tag('a', ['class'=>'nav-link', 'href'=>'#']);
                        $admin->create_tag('i', ['class'=>'text-dark pr-1 fas fa-sign-out-alt']);
                        $admin->close_tag('i');
                        $admin->create_tag_text('span', ['class'=>'text-dark'], 'Log Out');
                    $admin->close_tag('a');
                $admin->close_tag('li');
            $admin->close_tag('ul');

            //collapse/expand button
            $admin->create_tag('div', ['class'=>'text-center d-none d-md-inline']);
                $admin->create_tag('button', ['class'=>'btn rounded-circle border-0','id'=>'sidebarToggle', 'type'=>'button']);
                $admin->close_tag('button');
            $admin->close_tag('div');
            
        $admin->close_tag('div');
    $admin->close_tag('div');
$admin->close_tag('nav');

?>