<?php #classes.php

class TextPost {
    
        private $title;
        private $type;
        private $status;
        private $content;
        private $datetime;
    
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
            return $this->type;
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
            return $this->status;
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
        
        //set date and time
        function set_datetime($file_location) {
            
            //make date from file location 
            $build_date = str_replace(ROOT, "", $file_location);
            $build_date = str_replace(array('/','content','.md'), '', $build_date);

            //format the date into a readable type "Tuesday the 19th of May at 19:27"
            $this->datetime = date('l \t\h\e jS \o\f F\, Y \a\t H\:i', strtotime($build_date));

        }
    
        //get date and time
        function get_datetime() {
            return $this->datetime;
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