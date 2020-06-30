<?php # e-themes/default/index.php

//security check
defined('CHECK_SECURE_ENVOI') or die('Please return to the main page.');

//new header object
$page = new HtmlConstructor();

//create header
$page->create_doctype();

$page->create_node('html', ['lang'=>$var_header_info['html_lang']] );

//site header section
$page->open_node('head');
        $page->create_node('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $page->create_node('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $page->create_node('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $page->create_node('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $page->create_node('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $page->create_node('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $page->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BOOTSTRAP_CSS . 'bootstrap.min.css' ]);
        $page->create_node('link', ['rel'=>'stylesheet', 'href'=>URL_CURRENT_THEME_CSS . 'theme.css' ]);
        $page->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BASE_CSS . 'style.css' ]);
        $page->create_node('link', ['rel'=>'stylesheet', 'href'=>'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css']);
$page->close_node('head');

//open body section
$page->open_node('body');

        //navbar at top (this will only be visible for logged in users)
        $page->create_menu_node('nav', ['class'=>'nav navbar-dark bg-dark quick-bar justify-content-center']);
                $page->create_menu_text_node('a', ['class'=>'nav-link text-light small', 'href'=>$conf_site_url . 'admin/'], 'Admin' );
                $page->create_menu_text_node('a', ['class'=>'nav-link text-light small', 'href'=>$conf_site_url . 'admin/add-post/'], 'Add Post' );
                $page->create_menu_text_node('a', ['class'=>'nav-link text-light small', 'href'=>$conf_site_url . 'admin/profile/'], 'Profile' );
                $page->create_menu_text_node('a', ['class'=>'nav-link text-light small', 'href'=>$conf_site_url . 'admin/settings/'], 'Settings' );
                $page->create_menu_text_node('a', ['class'=>'nav-link text-light small', 'href'=>$conf_site_url . 'admin/logout/'], 'Logout' );
        $page->close_node('nav');

        //show site title and slogan
        $page->create_node('div', ['class'=>'container head']);
            $page->create_node('div', ['class'=>'row']);
                $page->create_node('div', ['class'=>'col-md-12']);
                    $page->create_text_node('a', ['href'=>$conf_site_url, 'class'=>'page-header h1 title'], $conf_site_title );
                    $page->create_text_node('small', ['class'=>'h4'], $conf_site_slogan);
                $page->close_node('div');
            $page->close_node('div');

            //author section
            $page->create_node('div', ['class'=>'container author-block']);
                $page->create_node('div', ['class'=>'row']);
                    $page->create_node('div', ['class'=>'container']);
                        $page->create_node('img', ['class'=>'rounded-circle profile-picture mt-3 mb-3',
                                                  'src'=>$conf_profile_picture]);
                        $page->create_text_node('p', ['class'=>'h3 username'], $user_username);
                        $page->create_text_node('p', ['class'=>'h5 user-title'], $user_title);
                        $page->create_text_node('p', ['class'=>'description author-about text-justify'], $user_about);
                        $page->create_node('div', ['id'=>'social-icons']);
                            $page->create_node('ul', ['class'=>'list-inline text-center']);
                                $page->create_node('li', ['class'=>'list-inline-item']);
                                    $page->create_node('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_node('i', ['class'=>'s_icon fab fa-twitter']);
                                        $page->close_node('i');
                                    $page->close_node('span');
                                $page->close_node('li');
                                $page->create_node('li', ['class'=>'list-inline-item']);    
                                    $page->create_node('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_node('i', ['class'=>'s_icon fab fa-facebook']);
                                        $page->close_node('i');
                                    $page->close_node('span');
                                $page->close_node('li');
                                $page->create_node('li', ['class'=>'list-inline-item']);
                                    $page->create_node('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_node('i', ['class'=>'s_icon fab fa-github']);
                                        $page->close_node('i');
                                    $page->close_node('span');
                                $page->close_node('li');
                                $page->create_node('li', ['class'=>'list-inline-item']);
                                    $page->create_node('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_node('i', ['class'=>'s_icon fab fa-linkedin']);
                                        $page->close_node('i');
                                    $page->close_node('span');
                                $page->close_node('li');
                            $page->close_node('ul');
                        $page->close_node('div');
                    $page->close_node('div');
                $page->close_node('div');
            $page->close_node('div');
        $page->close_node('div');

    //main section area
    //gets all posts
    $page->get_posts();

    //footer section area
        $page->create_node('div', ['class'=>'col-md-12']);
            $page->create_node('div', ['class'=>'container']);
                $page->create_node('div', ['class'=>'row']);
                    $page->create_node('div', ['class'=>'mx-auto']);
                        $page->create_text_node('p', ['class'=>'text-muted copyright'], $var_footer_text);
                    $page->close_node('div');
                $page->close_node('div');
            $page->close_node('div');
        $page->close_node('div');
        
        $page->create_simple_node('script', ['src'=>DIR_BOOTSTRAP_JS . 'bootstrap.min.js' ]);
        $page->create_simple_node('script', ['src'=>DIR_BASE_JS . 'jquery.min.js' ]);

$page->close_node('body');
$page->close_node('html');

$page->display();

?>