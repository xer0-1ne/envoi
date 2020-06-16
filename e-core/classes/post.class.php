<?php # e-core/classes/post.class.php

/*
 * Posts are stored in e-content/posts/{YEAR}/{MONTH}/{POST_TITLE_ALL_LOWER}/default.md
 * Post variables are:
 *
 * title: STRING
 * type: STRING
 * status: STRING
 * date: 20200603 (YYYYMMDD)
 * time: 2359 (HHMM)
 */ 


class Post {
    
    protected $title;
    protected $type;
    protected $status;
    protected $post_date;
    protected $post_date_year;
    protected $post_date_month;
    protected $post_date_day;
    protected $post_file_location;
    protected $post_pretty_date;
    protected $post_time;
    protected $content;
    
    /*
     * Post Class Setters
     */

    //set title from $line variable
    function set_title($line) {
        
        //set $title value         
        $this->title = $this->get_header_data($line);
    }

    //set title from $line variable
    function set_type($line) {
        
        //set $type value         
        $this->type = $this->get_header_data($line);
    }

    //set status from $line variable
    function set_status($line) {
        
        //set $status value         
        $this->status = $this->get_header_data($line);
    }
    
    //set date from $line variable
    function set_date($line) {
        
        //set the pretty date
        $this->set_pretty_date($this->get_header_data($line));

        //set date YYYYMMDD
        $this->post_date = $this->get_header_data($line);
    }

    //set time from $line variable
    function set_time($line) {
        
        //set time HHMM
        $this->post_time = $this->get_header_data($line);
    }
    
    //set content
    function set_content($content) {

        //set content (by concatinating information to current line)
        $this->content = $content;
    }
    
    /*
     * Post Class Getters
     */

    //get title
    function get_title() {
        return $this->title;
    }

    //get type
    function get_type() {
        return ucwords($this->type);
    }

    //get status
    function get_status() {
        return ucwords($this->status);
    }

    //get date and time
    function get_pretty_date() {
        return $this->post_pretty_date;
    }

    //get date and time
    function get_date() {
        return $this->post_date;
    }

    //get date and time
    function get_time() {
        return $this->post_time;
    }
    
    //get content
    function get_content() {
        return $this->content;
    }
    
    /*
     * Other supporting class functions
     */   
    
    //get value without header
    function get_header_data($value) {
        
        //ignore everything before ": "
        return substr($value, strpos($value, ": ") + 1);
    }
    
    //set readable date from $line variable
    private function set_pretty_date($line) {
        
        //extract data from header line (exclude header title)
        $p_date = $this->get_header_data($line);
        
        //format the date into a "pretty" readable type
        $this->post_pretty_date = date('l\, F jS\ Y', strtotime($p_date));       
    }
}







?>