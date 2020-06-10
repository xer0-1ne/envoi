<?php 
    
    include "includes/header.php";

    if($password == "" || $salt = "" ) {
        
        ?>
        <div class="row col-md ml-1 mr-1">
            <span class="page-header h1 head title">Envoi Setup</span>
        </div>
        <div class="row mt-5 col-md ml-1 mr-1">
            <div class="container content setup-body">
                <div class="row">
                    <p>Welcome to the Envoi setup page. Configuring Envoi is a very simple process that requires a few minutes of your time. Once the security is setup, you will be on your way to spreading your words!</p>

                    <p>Before you can get started, I need a few things from you.  Name, email, password and salt.</p>
                    <form class="mb-5">
                        <div class="row mb-4">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" aria-describedby="usernameHelper" required>
                            <small id="usernameHelper" class="form-text text-muted">
                                Enter a username that is unique to you. This name will be displayed as the content creator.
                            </small>
                        </div>

                        <div class="row mb-4">
                            <label for="email">E-Mail Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" id="email" class="form-control" aria-describedby="emailHelper" required>
                            </div>
                            <small id="emailHelper" class="form-text text-muted">
                                Provide an email that can receive notifications and general administrative information about Envoi. This email will also be used for password reset.
                            </small>
                        </div>

                        <div class="row mb-4">
                            <label for="password">Password</label>
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">*</span>
                                </div>
                                <input type="password" id="password" class="form-control" aria-describedby="passwordHelper" required>
                            </div>
                            <label for="password-verify">Repeat Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">*</span>
                                </div>
                                <input type="password" id="password-verify" class="form-control" aria-describedby="password-verifyHelper" required>
                            </div>
                            <small id="password-verifyHelper" class="form-text text-muted">
                                Your password must be 8-20 characters long and use a series letters, nubmers, capital letters and/or special characters to increase the strength. If you need help generating a password, you can <a href="https://www.google.com/search?q=password%20generator" target="_blank">Google</a> it.
                            </small>
                        </div>

                        <div class="row mb-4">
                            <label for="email">Salt Encryption</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" id="email" class="form-control" aria-describedby="emailHelper" required>
                            </div>
                            <small id="emailHelper" class="form-text text-muted">
                                Provide a very strong salt to ensure that your encryption is secure. It is highly recommended that you obtain a salt from a <a href="https://www.google.com/search?q=blowfish%20generator">random generator</a>.
                            </small>
                        </div>
                        
                        <div class="row mb-4 ml-2">
                            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                            <label class="form-check-label" for="invalidCheck2">
                                I understand that I take full responsibility for using Envoi and all contant posted.  Additionally, I agree to follow all rules and regulations set forth by any social media service I plan on linking with my personal Envoi blog.
                            </label>
                        </div>
                        
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-dark">Create Account</button>
                        </div>






                    </form>



                </div>
            </div>
        </div>
        <?php
        
        include "footer.php";

    }
?>