<?php # e-themes/default/index.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//new header object
$page = new HtmlConstructor();

//create header
$page->create_doctype();
$page->create_tag('html', ['lang'=>$var_header_info['html_lang']] );
$page->open_tag('head');
        $page->create_tag('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $page->create_tag('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $page->create_tag('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $page->create_tag('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $page->create_tag('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $page->create_tag('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $page->create_tag('link', ['rel'=>'stylesheet', 'href'=>DIR_BASE_CSS . $var_base_bootstrap_css ]);
        $page->create_tag('link', ['rel'=>'stylesheet', 'href'=>URL_CURRENT_THEME_CSS . $var_style ]);
$page->close_tag('head');

//open body section
$page->open_tag('body');

    //site header section
    $page->open_tag('header');

        //display for now, but ultimately, only display if the member is logged in
        $page->create_tag('div', ['class'=>'text-center h6']);
            $page->create_tag('span', ['class'=>'small text-dark']);
                $page->create_tag_text('a', 'Admin', ['href'=>$conf_site_url . "admin/"] );
                $page->create_br();
                $page->create_tag_text('a', 'Login', ['href'=>$conf_site_url . "login/"] );
            $page->close_tag('span');
        $page->close_tag('div');

        //show site title and slogan
        $page->create_tag('div', ['class'=>'container head']);
            $page->create_tag('div', ['class'=>'row']);
                $page->create_tag('div', ['class'=>'col-md-12']);
                    $page->create_tag_text('a', $conf_site_title, ['href'=>$conf_site_url, 'class'=>'page-header h1 title']);
                    $page->create_tag('small', ['class'=>'h3']);
                        $page->create_br();
                        echo $conf_site_slogan;
                    $page->close_tag('small');
                $page->close_tag('div');
            $page->close_tag('div');

            //author section
            $page->create_tag('div', ['class'=>'container author-block']);
                $page->create_tag('div', ['class'=>'row']);
                    $page->create_tag('div', ['class'=>'container']);
                        $page->create_tag('img', ['class'=>'rounded-circle profile-picture mt-3 mb-3',
                                                  'src'=>$conf_profile_picture]);
                        $page->create_tag_text('p', $user_username, ['class'=>'h3 username']);
                        $page->create_tag_text('p', $user_title, ['class'=>'h5 user-title']);
                        $page->create_tag_text('p', $user_about, ['class'=>'description text-justify']);
                        $page->create_tag('div', ['id'=>'social-icons']);
                            $page->create_tag('ul', ['class'=>'list-inline text-center']);
                                $page->create_tag('li', ['class'=>'list-inline-item']);
                                    $page->create_tag('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_tag('i', ['class'=>'fab fa-twitter']);
                                        $page->close_tag('i');
                                    $page->close_tag('span');
                                $page->close_tag('li');
                                $page->create_tag('li', ['class'=>'list-inline-item']);    
                                    $page->create_tag('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_tag('i', ['class'=>'fab fa-facebook']);
                                        $page->close_tag('i');
                                    $page->close_tag('span');
                                $page->close_tag('li');
                                $page->create_tag('li', ['class'=>'list-inline-item']);
                                    $page->create_tag('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_tag('i', ['class'=>'fab fa-github']);
                                        $page->close_tag('i');
                                    $page->close_tag('span');
                                $page->close_tag('li');
                                $page->create_tag('li', ['class'=>'list-inline-item']);
                                    $page->create_tag('span', ['class'=>'fa-stack fa-lg']);
                                        $page->create_tag('i', ['class'=>'fab fa-linkedin']);
                                        $page->close_tag('i');
                                    $page->close_tag('span');
                                $page->close_tag('li');
                            $page->close_tag('ul');
                        $page->close_tag('div');
                    $page->close_tag('div');
                $page->close_tag('div');
            $page->close_tag('div');
        $page->close_tag('div');
    $page->close_tag('header');

    //main section area
    $page->open_tag('main');

    //include post constructor
    include(DIR_SITE_STRUCTURE . "post_constructor.php");

    $page->close_tag('main');

    //footer section area
    $page->open_tag('footer');
        $page->create_tag('div', ['class'=>'col-md-12']);
            $page->create_tag('div', ['class'=>'container']);
                $page->create_tag('div', ['class'=>'row']);
                    $page->create_tag('div', ['class'=>'mx-auto']);
                        $page->create_tag_text('p', $var_footer_text, ['class'=>'text-muted copyright']);
                    $page->close_tag('div');
                $page->close_tag('div');
            $page->close_tag('div');
        $page->close_tag('div');
        
        $page->create_tag('script', ['src'=>DIR_BASE_JS . $var_base_bootstrap_js]);
        $page->close_tag('script');        
        $page->create_tag('script', ['src'=>DIR_BASE_JS . $var_base_jquery_js]);
        $page->close_tag('script');

    $page->close_tag('footer');
$page->close_tag('body');
$page->close_tag('html');

?>