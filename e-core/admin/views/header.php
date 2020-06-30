<?php # e-core/admin/views/nav.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//new header object
$admin = new HtmlConstructor();

$admin->create_doctype();

$admin->create_node('html', ['lang'=>$var_header_info['html_lang']] );
$admin->open_node('head');
        $admin->create_node('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $admin->create_node('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $admin->create_node('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $admin->create_node('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $admin->create_node('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $admin->create_node('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $admin->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BOOTSTRAP_CSS . 'bootstrap.min.css' ]);
        $admin->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_ADMIN_RESOURCES . 'style.css' ]);

        //using EasyMDE until I create my own markdown editor
        $admin->create_node('link', ['rel'=>'stylesheet', 'href'=>'https://unpkg.com/easymde/dist/easymde.min.css']);
        $admin->create_straight_node('script', ['src'=>'https://unpkg.com/easymde/dist/easymde.min.js']);

$admin->close_node('head');

?>