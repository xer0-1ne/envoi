<?php # e-core/site/login.php

$error_msg = '';

//security check
defined('CHECK_SECURE_ENVOI') or die('Please return to the main page.');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( !empty($_POST['password']) ) {

        //get database file
        $dbfile = file_get_contents(DIR_DATABASE . 'data.db');

        //decode json file
        $db_array = json_decode($dbfile, true);

        //get password hash from db
        $pwd_hash = $db_array[$user_username]['password'];

        //check if password is valid
        if (password_verify($_POST['password'], $pwd_hash)) {
            //starts a session
            //will need to create unique session values and then protect all admin pages and the mainpage bar.
            $_SESSION["id"] = $db_array[$user_username]['user_id'];
            header('Location: ' . $conf_site_url);

        } else {
            //change to a modal box later.
            $error_msg = 'Wrong password, try again...';
        }
    } 
}

$login = new HtmlConstructor();

$login->create_doctype();
$login->create_node('html', ['lang'=>$var_header_info['html_lang']] );
$login->create_simple_node('head');
        $login->create_node('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $login->create_node('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $login->create_node('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $login->create_node('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $login->create_node('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $login->create_node('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $login->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BOOTSTRAP_CSS . 'bootstrap.min.css' ]);
        $login->create_node('link', ['rel'=>'stylesheet', 'href'=>$conf_site_url . 'e-core/resources/css/style.css' ]);
$login->close_node('head');

$login->create_node('div',  ['class'=>'row v-center']);        
    // login form 
    $login->create_node('form', ['method'=>'post', 'class'=>'login-form rounded-lg shadow-lg']);

        //Welcome Message
        $login->create_node('div',  ['class'=>'form-group mb-2 login-welcome']);
            $login->create_text_node('p',  ['class'=>'h2 text-center pb-4'], 'Login');
            $login->create_text_node('p',  ['class'=>'text-center h6'], 'Welcome Back' );
            if (isset($error_msg)) {
                $login->create_text_node('span', ['class'=>'align-center text-danger', 'id'=>'e_msg'], $error_msg);
            };
        $login->close_node('div');

        // password section 
        $login->create_node('div',  ['class'=>'form-group']);
            $login->create_node('div',  ['class'=>'input-group']);
                $login->create_required_node('input', ['type'=>'password', 
                                                        'class'=>'form-control control', 
                                                        'name'=>'password', 
                                                        'id'=>'password', 
                                                        'placeholder'=>'Password']);
            $login->close_node('div');
            $login->create_text_node('label', ['class'=>'text-muted small', 'for'=>'password'], 
                                        'Enter your password');
        $login->close_node('div');

        $login->create_node('div',  ['class'=>'d-flex justify-content-center']);
            $login->create_text_node('button', ['type'=>'submit', 'class'=>'btn btn-dark'], 'Login');
            $login->create_text_node('a', ['href'=>$conf_site_url, 'class'=>'btn btn-link text-dark nounderline'], 
                                        "Head Back to $conf_site_title");
        $login->close_node('div');
    $login->close_node('form');
$login->close_node('div');

$login->display();
?>