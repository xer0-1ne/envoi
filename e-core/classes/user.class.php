<?php # e-core/classes/class.user.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

class User {
    
    protected $username    = '';
    protected $firstname   = '';
    protected $lastname    = '';
    protected $password    = '';
    protected $email       = '';
    protected $title       = '';
    protected $about       = '';
    protected $session_id  = '';
    
    /*
     * 'Setters' for User
     */
    
    function set_username(string $username) {
        $this->username = $username;
    }
    
    function set_firstname(string $firstname) {
        $this->username = $username;
    }
    
    function set_lastname(string $lastname) {
        $this->username = $username;
    }
    
    function set_password(string $password) {
        $this->username = $username;
    }
        
    function set_email(string $email) {
        $this->username = $username;
    }

    function set_title(string $title) {
        $this->username = $username;
    }
 
    function set_about(string $about) {
        $this->username = $username;
    }
 
    function set_session_id(string $session_id) {
        $this->username = $username;
    }
    
    /*
     * 'Getters' for User
     */
    
    function get_username() {
        return $this->username;
    }
    
    function get_firstname() {
        return $this->firstname;
    }
    
    function get_lastname() {
        return $this->lastname;
    }
    
    function get_email() {
        return $this->email;
    }

    function get_title() {
        return $this->title;
    }

    function get_about() {
        return $this->about;
    }

    function get_session_id() {
        return $this->session_id;
    }
}

?>