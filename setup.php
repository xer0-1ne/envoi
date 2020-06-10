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

                    <p>Before you can get started, I need to learn a few things from you.</p>
                    <form class="mb-5">
                      <div class="row mb-4">
                            <label class="font-weight-bold" for="website_name">Website Name</label>
                            <input type="text" id="website_url" class="form-control" required>
                            <small class="form-text text-muted">
                                What is the name of your website.  
                            </small>
                        </div>
                      
                       <div class="row mb-4">
                            <label class="font-weight-bold" for="website_url">Website URL</label>
                            <input type="text" id="website_url" class="form-control" required>
                            <small class="form-text text-muted">
                                Enter the URL that your site will be hosted at.  Example: https://mysite.com or http://localhost.
                            </small>
                        </div>
                       
                       
                        <div class="row mb-4">
                            <label class="font-weight-bold" for="username">Username</label>
                            <input type="text" id="username" class="form-control" required>
                            <small class="form-text text-muted">
                                Enter a username that is unique to you. This name will be displayed as the content creator.
                            </small>
                        </div>

                        <div class="row mb-4">
                            <label class="font-weight-bold" for="email">E-Mail Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" id="email" class="form-control" required>
                            </div>
                            <small class="form-text text-muted">
                                Provide an email that can receive notifications and general administrative information about Envoi. This email will also be used for password reset.
                            </small>
                        </div>

                        <div class="row mb-4">
                            <label class="font-weight-bold" for="password">Password</label>
                            <div class="input-group mb-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">*</span>
                                </div>
                                <input type="password" id="password" class="form-control" required>
                            </div>
                            <label class="font-weight-bold" for="password-verify">Repeat Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">*</span>
                                </div>
                                <input type="password" id="password-verify" class="form-control" required>
                            </div>
                            <small class="form-text text-muted">
                                Your password must be 8-20 characters long and use a series letters, nubmers, capital letters and/or special characters to increase the strength. If you need help generating a password, you can <a href="https://www.google.com/search?q=password%20generator" target="_blank">Google</a> it.
                            </small>
                        </div>

                        <div class="row mb-4">
                            <label class="font-weight-bold" for="email">Salt Encryption</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="email" id="email" class="form-control" required>
                            </div>
                            <small class="form-text text-muted">
                                Provide a very strong salt to ensure that your encryption is secure. It is highly recommended that you obtain a salt from a <a href="https://www.google.com/search?q=blowfish%20generator">random generator</a>.
                            </small>
                        </div>
                        
                        <div class="row mb-4 ml-2">
                            <input class="form-check-input" type="checkbox" value="" id="agree_to_use" required>
                            <label class="form-check-label" for="agree_to_use">
                                I understand that, by using Envoi, I assume full responsibility for all content posted, published and distributed.  Furthermore, if I link any publish social media services with Envoi, I agree to adhere with all rules and regulations set forth by these social media services.  Envoi assumes no responsibility for illicit content, illegal activity and/or other activity that could result in harm to someone or something.  I freely use this product at my own risk and will accept responsibility for how I choose to use Envoi.
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
        
        include "includes/footer.php";

    } else {
        header("Location: " . $site_url);

    }
?>