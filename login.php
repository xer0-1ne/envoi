<?php #index.php

    include "includes/header.php"; 

    //session_start();

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
?>

<!-- login form -->
<div class="container col-md-8 mt-5">
    <form action="" method="post" class="login-form rounded-lg shadow-lg p-3 mb-5 bg-white">
        <!-- wecome message -->
        <div class="form-group mb-2 login-welcome">
            <p class="h3 text-center">Envoi Login</p>
        </div>
        <div class="form-group mb-5">
            <p class="text-center h5"><?php echo "Welcome back " . $username; ?></p>
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
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="<?php echo $site_url; ?>" class="btn btn-link nounderline">Head Back to <?php echo $site_title; ?></button>
        </div>
    </form>
</div>