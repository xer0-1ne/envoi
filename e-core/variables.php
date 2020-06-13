<?php # e-core/variables.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

$var_header_info = [
    'html_lang'                  => 'en',
    'html_meta_charset'          => 'UTF-8',
    'html_viewport'              => 'width=device-width, initial-scale=1.0',
    'html_meta_description'      => '',
    'html_meta_author'           => 'USERNAME',
    'html_meta_url'              => $conf_site_url,
    'html_meta_copyright'        => '',
    'html_meta_robots'           => 'index,follow',
    'html_site_title'            => $conf_site_title
];

$var_base_bootstrap_css         = 'bootstrap.min.css';
$var_style                      = 'style.css';

?>