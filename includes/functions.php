<?php #fucntions.php

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
    
    $post = array(
        'title' => "",
        'type' => "",
        'status' => "",
        'content' => "",
        'datetime' => ""
    );
    
    //make date from file location 
    $build_date = str_replace(ROOT, "", $file);
    $build_date = str_replace(array('/','content','.md'), '', $build_date);
    
    //format the date into a readable type "Tuesday the 19th of May at 19:27"
    $post['datetime'] = date('l \t\h\e jS \o\f F\, Y \a\t H\:i', strtotime($build_date));
    
    //open post file from porvided location or die with error message
    $open_file = fopen($file, "r") or die("Can't open File");

    //process post informartion and store into array
    while ( !feof($open_file)) {
        $line = fgets($open_file);

        if ( beginWith($line, "title")) {
            
            //remove "title:"
            $header_value = str_replace("title: ", "", $line);
            
            //assign title value into array
            $post['title'] = $header_value;

        } else if ( beginWith($line, "type")) {
            
            //remove "title:"
            $header_value = str_replace("type: ", "", $line);
            
            //assign title value into array
            $post['type'] = $header_value;

                
        } else if ( beginWith($line, "status")) {
            
            //remove "title:"
            $header_value = str_replace("status: ", "", $line);
            
            //assign title value into array
            $post['status'] = $header_value;

        } else {
            
            $post['content'] .= $line . "<br>";
            
        } //end of header value assignment 
        
    } //end while
    fclose($open_file);
    
    //return post array
    return $post;
}

?>