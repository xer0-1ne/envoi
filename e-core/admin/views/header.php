<?php # e-core/admin/views/nav.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//new header object
$admin = new HtmlConstructor();

$admin->create_doctype();

$admin->create_tag('html', ['lang'=>$var_header_info['html_lang']] );
$admin->open_tag('head');
        $admin->create_tag('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $admin->create_tag('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $admin->create_tag('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $admin->create_tag('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $admin->create_tag('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $admin->create_tag('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $admin->create_tag('link', ['rel'=>'stylesheet', 'href'=>DIR_BASE_CSS . 'bootstrap.min.css' ]);
        $admin->create_tag('link', ['rel'=>'stylesheet', 'href'=>DIR_ADMIN_RESOURCES . 'style.css' ]);
        $admin->create_tag('link', ['rel'=>'stylesheet', 'href'=>DIR_FONT_AWESOME . 'fontawesome-all.min.css' ]);
$admin->close_tag('head');

?>