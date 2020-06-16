<?php # e-core/functions.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//return if a line begins with "check"
function beginWith($line, $check) {
    
    $length = strlen($check);
    return substr($line, 0, $length) === $check; 

}

//return if a line begins with "check"
function endWith($line, $check) {
    
    $length = strlen($check);
    if ($length == 0) {
        return true;
    }
    return substr($line, -$length) === $check; 
    
}

//directory mapping to scan and find posts in the content folder
function find_content($directory) {
    
    //declare variable for results to be stored
    $result = array();

    //scan directory and subdirectories for all files / store in array
    $scandir = scandir($directory);
    
    //loop through scandir 
    foreach ($scandir as $key => $value) {
        
        //ignore parent and prior directory and .DS_Store (stupid Mac)
        if (!in_array($value,array(".","..",".DS_Store"))) {
            
            //set value for directory
            if (is_dir($directory . SLASH . $value)) {
                $result[$value] = find_content($directory . SLASH . $value);
            } else {
                //different falue for file
                $result[] = $value;
            }
        }
    }
    //return mapped the array
    return $result;
}

//getting post information (file location, date posted, etc)
function get_post_meta(array $post_map) {
    
    $year = array_keys($post_map);

    foreach ($post_map as $year => $months) {
        foreach ($months as $month => $post_names) {
            foreach ($post_names as $name_of_post => $files) { 
                foreach ($files as $file ) {

                    $result[] = array(
                        'location' => DIR_CONTENT_POSTS . $year . SLASH . 
                                      $month . SLASH . $name_of_post . SLASH,
                        'file' => $file,
                        'year' => $year,
                        'month' => $month
                    );
                }
            }
        }
    }
    
    //return in order of latest first, and oldest last
    $result = array_reverse($result);
    return $result;
}

//build's post from file and returns in HTML
function build_post($file) {
    
    $post_content = "";
    
    //create a new post
    $post = new Post();
    
    //open post file from porvided location or die with error message
    $open_file = fopen($file, "r") or die("Can't open File " . $file);

    //process post informartion and store into array
    while ( !feof($open_file)) {
        $line = fgets($open_file);

        //check for post title, type and status
        if ( beginWith($line, "title")) {
            
            //set post title
            $post->set_title($line);
            
        } else if ( beginWith($line, "type")) {
            
            //set post type
            $post->set_type($line);
       
        } else if ( beginWith($line, "status")) {
            
            //set post status
            $post->set_status($line);

        } else if ( beginWith($line, "date")) {
            
            //set post date
            $post->set_date($line);
            
        } else if ( beginWith($line, "time")) {
            
            //set post time
            $post->set_time($line);
            
        } else {
            //concatenate post content
            $post_content .= $line . "<br>";        
            
        } //end content assignment
        
    } //end while
    
    //set post congtent
    $post->set_content($post_content);
    
    fclose($open_file);
    
    //return post array
    return $post;
}

?>