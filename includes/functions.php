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
function getPost($file) {
    
    $post_content = "";
    
    //create a new post
    $post = new TextPost();
    
    //set the date and time based on file path and name
    $post->set_datetime($file);
    
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
            
            //set post status
            $post->set_type($line);
       
        } else if ( beginWith($line, "status")) {
            
            //set post type
            $post->set_type($line);

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