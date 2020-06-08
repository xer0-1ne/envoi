<?php #fucntions.php

include "classes.php";

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
function scanContentFolder($directory) {
  
   $result = array();

   $scandir = scandir($directory);
   foreach ($scandir as $key => $value)
   {
      if (!in_array($value,array(".","..",".DS_Store")))
      {
         if (is_dir($directory . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = scanContentFolder($directory . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[] = $value;
         }
      }
   }
   return $result;
} 

//getting post information (file location, date posted, etc)
function getPostMeta($arrayOfPosts) {
    
    $year = array_keys($arrayOfPosts);

    foreach ($arrayOfPosts as $year => $months) {
        foreach ($months as $month => $days) {
            foreach ($days as $day => $files) {
                foreach ($files as $file) {
                    
                    $len = strlen($file);
                    $hour = substr($file, -$len, 2);
                    $min = substr($file, -$len + 2, 2);

                    $result[] = array(
                        'location' => CONTENT_DIR . $year
                         . DIRECTORY_SEPARATOR . $month
                         . DIRECTORY_SEPARATOR . $day
                         . DIRECTORY_SEPARATOR . $file,
                        'file' => $file,
                        'year' => $year,
                        'month' => $month,
                        'day' => $day,
                        'hour' => $hour,
                        'minutes' => $min
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
function getPostHeader($file) {
    
    $post_content = "";
    
    //create a new post
    $post = new TextPost();
    
    //set the date and time based on file path and name
    $post->set_date($file);
    $post->set_time($file);
    
    //open post file from porvided location or die with error message
    $open_file = fopen($file, "r") or die("Can't open File");

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

        }
    } //end while
    fclose($open_file);
    
    //return post array
    return $post;
}

//build's post from file and returns in HTML
function getPost($file) {
    
    $post_content = "";
    
    //create a new post
    $post = new TextPost();
    
    //set the date and time based on file path and name
    $post->set_date($file);
    $post->set_time($file);
    
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

//display the posts
function displayPosts() {
    
    //scan the content folder for all posts
    $post_list = scanContentFolder(CONTENT_DIR);

    //get basic post meta info (file location, date posted, etc)
    $post_meta_info = getPostMeta($post_list);

    //loop through each post in the array and display the info
    foreach ( $post_meta_info as $post_info ) {

    //get file path location for the markdown post file
    $post_file_location = $post_info['location'];

    //get an array of data for the post information
    $post_file_data = getPost($post_file_location);

    //assign data to variables
    $post_title     = $post_file_data->get_title();
    $post_type      = $post_file_data->get_type();
    $post_status    = $post_file_data->get_status();
    $post_content   = $post_file_data->get_content();
    $post_date      = $post_file_data->get_date();    
    $post_time      = $post_file_data->get_time();

    //check post status to "draft"... using trim to strip the last (white) character from the object    
    //if (trim($post_status) != "draft" ) {
        
    if (trim($post_status) != "Draft" ) {

        echo "<div class='post'>" .
            "<a href='#' class='nounderline h2'>" .
                $post_title . "</a><br>" .
            "<span class='small font-weight-bold'>Posted on: " .
                $post_date . " at " . $post_time . "</span><br>" .
            $post_content . "</div>";

        }
    }
}

//create post and store in folder
function createPost($post_data) {
    
    //post in the future or past!

    //explode the date into readable variables
    $post_date = $post_data["post_date"];
    list($post_year, $post_month, $post_day) = explode("-", $post_date);

    //create folder structure from date
    $folder = CONTENT_DIR . 
        $post_year . SLASH . 
        $post_month . SLASH . 
        $post_day . SLASH;

    //get time
    $post_time = str_replace(":", "", $post_data["post_time"]);

    //create filename
    $file = strval($post_time) . ".md";

    //create the folder
    if ( !file_exists($folder)) {
        mkdir($folder, 0755, true);
    }

    //create post location
    $post_location = $folder . SLASH . $file;

    //create file if it doesn't exist
    if ( !file_exists($post_location) ) {
        $new_post_file = fopen($post_location, 'w');
        fwrite($new_post_file, 'd');
        fclose($new_post_file);
    }

    //create post file to open/edit
    $post_file = fopen($post_location, "w") or die("Unable to create/edit post.");

    //write data to psot file
    fwrite($post_file, "title: " . $post_data["post_title"] . PHP_EOL );
    fwrite($post_file, "type: " . $post_data["post_type"] . PHP_EOL );
    fwrite($post_file, "status: " . $post_data["post_status"] . PHP_EOL );
    fwrite($post_file, $post_data["post_content"] );

    //close file
    fclose($post_file);
}


?>