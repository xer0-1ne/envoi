<?php  # setup.php

define('SLASH', DIRECTORY_SEPARATOR);               //Shorten directory separator
define('DIR_ROOT', __DIR__ . SLASH);                //define root path
define('DIR_CORE', DIR_ROOT . 'e-core' . SLASH);    //define core path
define('DIR_SITE', DIR_CORE . 'site' . SLASH);      //define default site path
define('CHECK_SECURE_ENVOI', true);                 //define security constant
require_once(DIR_CORE . 'conf' . SLASH . 'config.php');
require_once(DIR_SITE . 'init.php');

//if data.db exists, then send user to login page
if ( file_exists(DIR_DATABASE . 'data.db') ) {
    //header("Location: " . $conf_site_url . "login/");
}

//check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //check for form agreement
    if ($_POST['agree_to_use']) {

        //check if the provided passwords match
        if ($_POST['password'] === $_POST['password-verify']) {

            //extract data from setup form
            $website_name       = $_POST['website_name'];
            $website_url        = $_POST['website_url'];
            $firstname          = $_POST['firstname'];
            $lastname           = $_POST['lastname'];
            $username           = $_POST['username'];
            $email              = $_POST['email'];

            //hash password 
            $password = password_hash( $_POST['password'], PASSWORD_ARGON2I );
            $dbfile = DIR_DATABASE . 'data.db';

            //build array for json file
            $data = array(
                $username => array(
                    'username' => "$username",
                    'email' => "$email",
                    'password' => "$password",
                )
            );

            //encode the json file with the data array
            $pwd_json = json_encode($data, JSON_FORCE_OBJECT);

            //open file and write json to file
            $file = fopen($dbfile, 'w');
            fwrite($file, 'd');
            fwrite($file, $pwd_json); 

            //close file
            fclose($file);

            //change permissions of database file to 644
            chmod($dbfile, 600);

            //go to main page
            header("Location: " . $conf_site_url . "login/");

        } else die("Password fields didn't match");
    } else die("You need to agree to the terms.");
}

/*****
 * Setup Form Below
 *****/

//new header object
$setup = new HtmlConstructor();

//setup doctype
$setup->create_doctype();

//setup html and header
$setup->create_node('html', ['lang'=>$var_header_info['html_lang']] );
$setup->create_simple_node('head');
        $setup->create_node('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $setup->create_node('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $setup->create_node('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $setup->create_node('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $setup->create_node('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $setup->create_node('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $setup->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BOOTSTRAP_CSS . 'bootstrap.min.css' ]);
        $setup->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BASE_CSS . 'style.css' ]);
$setup->close_node('head');

//setup the page for the form
$setup->create_node('div', ['class'=>'row ml-1 mr-1 setup-page']);

    //header to setup page
    $setup->create_node('div', ['class'=>'row']);
        $setup->create_text_node('span', ['class'=>'page-header h1 head title text-center'], 'Envoi Setup');
    $setup->close_node('div');

    //body area for setup form
    $setup->create_node('div', ['class'=>'container content setup-body']);
        $setup->create_node('div', ['class'=>'row']);
            $setup->create_simple_text_node('p', 'Welcome to the Envoi setup page. Configuring Envoi is a very simple process ' .  
                                                    'that requires a few minutes of your time. Once the security is setup, you will ' .  
                                                    'be on your way to spreading your words!');
            $setup->create_simple_text_node('p', 'Before you can get started, let\'s get some basic information.');

            //start form
            $setup->create_node('form', ['class'=>'mb-5', 'method'=>'post' ]);

                //website name
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'website_name'], 'Website Name');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'website_name', 'name'=>'website_name', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'What is the name of your website.');
                $setup->close_node('div');

                //website url
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'website_url'], 'Website URL');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'website_url', 'name'=>'website_url', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Enter the URL that your site will be hosted at.  Example: https://mysite.com or http://localhost.');
                $setup->close_node('div');        
                
                //first name
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'firstname'], 'First Name');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'firstname', 'name'=>'firstname', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Enter your first name. ');
                $setup->close_node('div');

                //last name
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'lastname'], 'Last Name');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'lastname', 'name'=>'lastname', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Enter your last name. ');
                $setup->close_node('div');

                //username
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'username'], 'Username');
                    $setup->create_required_node('input', ['type'=>'text', 'id'=>'username', 'name'=>'username', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Enter a username that is unique to you. This name will be displayed as the content creator. ');
                $setup->close_node('div');

                //email
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'email'], 'E-Mail Address');
                    $setup->create_required_node('input', ['type'=>'email', 'id'=>'email', 'name'=>'email', 'class'=>'form-control' ]);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Provide an email that can receive notifications and general ' . 
                                                                                            'administrative information about Envoi. This email will also be used for password reset.');
                $setup->close_node('div');

                //for passwords
                $setup->create_node('div', ['class'=>'mb-4']);
                    $pwd_msg = 'Your password must consist of 8 characters with at least one number, one uppercase and one lowercase letter.';
                    //password field
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'password'], 'Password');
                    $setup->create_required_node('input', ['type'=>'password', 'id'=>'password', 'title'=>$pwd_msg, 'pattern'=>'(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', 'name'=>'password', 'class'=>'form-control' ]);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'password-verify'], 'Repeat Password');
                    
                    //verify password field
                    $setup->create_required_node('input', ['type'=>'password', 'id'=>'password-verify', 'title'=>$pwd_msg, 'pattern'=>'(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}', 'name'=>'password-verify', 'class'=>'form-control']);
                    $setup->create_text_node('small', ['class'=>'form-text text-muted'], 'Your password must at least 8 characters long with 1 uppercase, 1 lower case and a number. ' . 
                                                                                            'Add special characters to increase your strength.  If you need help generating a password, you ' .  
                                                                                            'can <a href=\"https://www.google.com/search?q=password%20generator\" target=\"_blank\">Google</a> it.');
                $setup->close_node('div');

                //agreement section
                $setup->create_node('div', ['class'=>'mb-4']);
                    $setup->create_text_node('label', ['class'=>'font-weight-bold form-label', 'for'=>'agreement'], 'Agree to terms');
                    $setup->create_node('div', ['class'=>'mb-2 form-check']);
                        $setup->create_required_node('input', ['class'=>'form-check-label mr-3', 'type'=>'checkbox', 'id'=>'agree_to_use', 'name'=>'agree_to_use' ]);
                        $setup->create_text_node('span', ['class'=>'form-check-label', 'for'=>'agree_to_use'], 'I understand that, by using Envoi, I assume full responsibility for all content ' .  
                                                                                                                'posted, published, and distributed.  Furthermore, I agree to adhere with all rules and ' .
                                                                                                                'regulations set forth by any social media service that is linked to Envoi. ' .  
                                                                                                                'Envoi assumes no responsibility for illicit content, ' .  
                                                                                                                'illegal activity and/or other activity that could result in harm to someone or something. ' .   
                                                                                                                'I freely use this product at my own risk and will accept responsibility for how I ' .  
                                                                                                                'choose to use Envoi.  Additionally, I acknowledge the <a href="LICENSE.md" target="_blank">license</a> file that is included.');
                    $setup->close_node('div');
                $setup->close_node('div');

                //create accouint button
                $setup->create_node('div', ['class'=>'d-flex justify-content-center']);
                $setup->create_node('input', ['class'=>'btn btn-info', 
                                              'type'=>'submit', 
                                              'name'=>'submit', 
                                              'value'=>'Create Account']);                
                $setup->close_node('div');
            $setup->close_node('form');
        $setup->close_node('div');
    $setup->close_node('div');
$setup->close_node('div');

$setup->display();

?>