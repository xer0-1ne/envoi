<?php 

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

if (!empty($_POST)) {
    if (isset($_POST['password'])) {
        
        //set password to variable
        
        //encrpyt password
        
        //compare password to stored password
        
        //if passwords match, start session
        
        /*
        session_start();

        if ( isset( $_SESSION['user_id'] ) ) {

            //protected page information

        } else {

            //redirect to the login page
            header("Location: " . LOGIN_PAGE);
        }
        ?>

*/
    }
}

$page = new HtmlConstructor();

$page->create_doctype();
$page->create_node('html', ['lang'=>$var_header_info['html_lang']] );
$page->create_simple_node('head');
        $page->create_node('meta', ['charset'=>$var_header_info['html_meta_charset']] );
        $page->create_node('meta', ['name'=>'viewport', 'content'=>$var_header_info['html_viewport']] );
        $page->create_node('meta', ['name'=>'description', 'content'=>$var_header_info['html_meta_description']] );
        $page->create_node('meta', ['name'=>'author', 'content'=>$var_header_info['html_meta_author']] );
        $page->create_node('meta', ['name'=>'url', 'content'=>$var_header_info['html_meta_url']] );
        $page->create_node('meta', ['name'=>'robots', 'content'=>$var_header_info['html_meta_robots']] );
        $page->create_node('link', ['rel'=>'stylesheet', 'href'=>DIR_BOOTSTRAP_CSS . 'bootstrap.min.css' ]);
        $page->create_node('link', ['rel'=>'stylesheet', 'href'=>$conf_site_url . 'e-core/resources/css/style.css' ]);
$page->close_node('head');
$page->display();

?>

<!-- login form -->
<div class="row v-center">
    <div class="container col-md-8 h-100 my-auto">
        <form action="" method="post" class="login-form rounded-lg shadow-lg">
            <!-- wecome message -->
            <div class="form-group mb-2 login-welcome">
                <p class="h2 text-center pb-4">Login</p>
            </div>
            <div class="form-group mb-5">
                <p class="text-center h6">Welcome Back</p>
            </div>
            <!-- password section -->
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">*</div>
                    </div>
                    <input type="password" class="form-control control" id="password" placeholder="Password" required>
                </div>
                <small><label class="text-muted" for="password">Enter your password:</label></small>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark">Login</button>
                <a href="<?php echo $conf_site_url; ?>" class="btn btn-link text-dark nounderline">Head Back to
                    <?php echo $conf_site_title; ?></a>
            </div>
        </form>
    </div>
</div>