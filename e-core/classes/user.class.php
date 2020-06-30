<?php # e-core/classes/class.user.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

class User {
    
    protected $user_info = [
        'username' => '',
        'firstName' => '',
        'lastName' => '',
        'password' => '',
        'salt' => '',
        'email' => '',
        'title' => '',
        'about' => ''
    
    ];
    
    /*
     * Functions for creating the user
     */
    
    function createUser() {}
    
    /*
     * 'Setters' for User
     */
    
    function set_username() {}
    
    function set_firstName() {}
    
    function set_lastName() {}
    
    function set_password() {}
    
    function set_salt() {}
    
    function set_email() {}
    
    /*
     * 'Getters' for User
     */
    
    function get_username() {
        return VALUE;
    }
    
    function get_firstName() {
        return VALUE;
    }
    
    function get_lastName() {
        return VALUE;
    }
    
    function get_password() {
        return VALUE;
    }
    
    function get_salt() {
        return VALUE;
    }
    
    function get_email() {
        return VALUE;
    }
       
    /*
     * Functions for changing information
     */
    function change_username() {}
    
    function change_firstName() {}
    
    function change_lastName() {}
    
    function change_password() {}
    
    function change_salt() {}

    function change_email() {}
  
}

?>