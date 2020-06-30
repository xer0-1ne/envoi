<?php  # setup.php

ob_start();                                         //start output buffering

define('SLASH', DIRECTORY_SEPARATOR);               //Shorten directory separator
define('DIR_ROOT', __DIR__ . SLASH);                //define root path
define('DIR_CORE', DIR_ROOT . 'e-core' . SLASH);    //define core path
define('DIR_SITE', DIR_CORE . 'site' . SLASH);      //define default site path

define('CHECK_SECURE_ENVOI', true);                 //define security constant

require_once(DIR_CORE . 'conf' . SLASH . 'config.php');
require_once(DIR_SITE . 'init.php');     

//new header object
$setup = new HtmlConstructor();

$setup->create_doctype();

$setup->create_node('html', ['lang'=>$var_header_info['html_lang']] );
$setup->open_node('head');
        $setup->create_node('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $setup->create_node('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $setup->create_node('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $setup->create_node('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $setup->create_node('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $setup->create_node('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $setup->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BOOTSTRAP_CSS . 'bootstrap.min.css' ]);
        $setup->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BASE_CSS . 'style.css' ]);
$setup->close_node('head');

$setup->create_node('div', ['class'=>'row ml-1 mr-1 setup-page']);
    $setup->create_node('div', ['class'=>'row']);
        $setup->create_text_node('span', ['class'=>'page-header h1 head title text-center'], 'Envoi Setup');
    $setup->close_node('div');

    $setup->create_node('div', ['class'=>'container content setup-body']);
        $setup->create_node('div', ['class'=>'row']);
            $setup->create_simple_text_node('p', 'Welcome to the Envoi setup page. Configuring Envoi is a very simple process ' .  
                                                    'that requires a few minutes of your time. Once the security is setup, you will ' .  
                                                    'be on your way to spreading your words!');
            $setup->create_simple_text_node('p', 'Before you can get started, I need to learn a few things from you.');

            //start form
            $setup->create_node('form', ['class'=>'mb-5']);
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'website_name'], 'Website Name');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'website_url', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'What is the name of your website.');
                $setup->close_node('div');
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'website_url'], 'Website URL');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'website_url', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Enter the URL that your site will be hosted at.  Example: https://mysite.com or http://localhost.');
                $setup->close_node('div');                 
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'username'], 'Username');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'username', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Enter a username that is unique to you. This name will be displayed as the content creator. ');
                $setup->close_node('div');
                

                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'email'], 'E-Mail Address');
                    $setup->create_required_node('input', ['type'=>'email', 'id'=>'email', 'class'=>'form-control' ]);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Provide an email that can receive notifications and general ' . 
                                                                                            'administrative information about Envoi. This email will also be used for password reset.');
                $setup->close_node('div');

                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'password'], 'Password');
                    $setup->create_required_node('input', ['type'=>'password', 'id'=>'password', 'class'=>'form-control' ]);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'password-verify'], 'Repeat Password');

                    $setup->create_required_node('input', ['type'=>'password', 'id'=>'password-verify', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Your password must be 8-20 characters long and use a series letters, nubmers, capital letters ' . 
                                                                                            'and/or special characters to increase the strength. If you need help generating a password, you ' .  
                                                                                            'can <a href=\"https://www.google.com/search?q=password%20generator\" target=\"_blank\">Google</a> it.');
                $setup->close_node('div');

                //generate random salt
                $random_salt = bin2hex(random_bytes(16));

                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'salt'], 'Salt Encryption');
                    $setup->create_required_node('input', ['type'=>'email', 'id'=>'salt', 'class'=>'form-control', 'value'=>$random_salt ]);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'If you don\'t want to use our pre-generated salt, then you need to provide a very strong salt to ' . 
                                                                                            'ensure that your encryption is secure. It is highly recommended that you obtain a salt from a ' . 
                                                                                            '<a href=\"https://www.google.com/search?q=blowfish%20generator\" target=\"_blank\">random generator</a>.');
                $setup->close_node('div');

                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'agreement'], 'Agree to terms');
                    $setup->create_node('div', ['class'=>'mb-2 form-check']);
                        $setup->create_required_node('input', ['class'=>'form-check-label mr-3', 'type'=>'checkbox', 'id'=>'agree_to_use' ]);
                        $setup->create_text_node('span', ['class'=>'form-check-label', 'for'=>'agree_to_use'], 'I understand that, by using Envoi, I assume full responsibility for all content ' .  
                                                                                                                'posted, published and distributed.  Furthermore, if I link any public social media ' .  
                                                                                                                'services with Envoi, I agree to adhere with all rules and regulations set forth by ' . 
                                                                                                                'these social media services.  Envoi assumes no responsibility for illicit content, ' .  
                                                                                                                'illegal activity and/or other activity that could result in harm to someone or something. ' .   
                                                                                                                'I freely use this product at my own risk and will accept responsibility for how I ' .  
                                                                                                                'choose to use Envoi.  Additionally, I acknowledge the licence file that was included.');
                    $setup->close_node('div');
                $setup->close_node('div');

                $setup->create_node('div', ['class'=>'d-flex justify-content-center']);
                    $setup->create_text_node('button', ['class'=>'btn btn-dark', 'type'=>'submit'], 'Create Account');
                $setup->close_node('div');

            $setup->close_node('form');
        $setup->close_node('div');
    $setup->close_node('div');
$setup->close_node('div');

$setup->display();

?>