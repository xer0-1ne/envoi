<?php #classes.php

class TextPost {
    
        private $title;
        private $type;
        private $status;
        private $content;
        private $post_date;
        private $post_time;
    
        //set title from provided line
        function set_title($line) {
            
            //remove "title:" marker from the line
            $header_value = str_replace("title: ", "", $line);
            
            //assign title value into array            
            $this->title = $header_value; 
        }
    
        //get title
        function get_title() {
            return $this->title;
        }
        
        //set type
        function set_type($line) {
            
            //remove "type:" marker from the line
            $header_value = str_replace("type: ", "", $line);
            
            //assign type value into array        
            $this->type = $header_value;
        }
    
        //get type
        function get_type() {
            return ucwords($this->type);
        }
        
        //set status
        function set_status($line) {
            
            //remove "status:" marker from the line
            $header_value = str_replace("status: ", "", $line);

            //assign title value into array         
            $this->status = $header_value;
            
        }
    
        //get status
        function get_status() {
            return ucwords($this->status);
        }
        
        //set content
        function set_content($content) {
            
            //set content (by concatinating information to current line)
            $this->content = $content;
        }
    
        //get content
        function get_content() {
            return $this->content;
        }
        
        //set date
        function set_date($file_location) {
            
            //make date from file location 
            $build_date = str_replace(ROOT, "", $file_location);
            $build_date = str_replace(array('/','content','.md'), '', $build_date);

            //format the date into a readable type "Tuesday the 19th of May at 19:27"
            $this->post_date = date('l\, F jS\ Y', strtotime($build_date));

        }
        
        //get date and time
        function get_date() {
            return $this->post_date;
        }
    
        //set time
        function set_time($file_location) {
            
            //make date from file location 
            $build_date = str_replace(ROOT, "", $file_location);
            $build_date = str_replace(array('/','content','.md'), '', $build_date);

            //format the date into a readable type "Tuesday the 19th of May at 19:27"
            $this->post_time = date('H\:i', strtotime($build_date));

        }
    
        //get date and time
        function get_time() {
            return $this->post_time;
        }
}

class PicturePost
{
    
    
    
}

class VideoPost
{
    
    
    
}

class FilePost
{
    
    
    
}

class LinkPost
{
    
    
    
}

class QuotePost
{
    
    
    
}