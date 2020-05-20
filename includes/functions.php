<?php

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

//directory mapping
function directoryArrayMap($directory) {
  
   $result = array();

   $scandir = scandir($directory);
   foreach ($scandir as $key => $value)
   {
      if (!in_array($value,array(".","..",".DS_Store")))
      {
         if (is_dir($directory . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = directoryArrayMap($directory . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[] = $value;
         }
      }
   }
  
   return $result;
} 

//getting post information
function getPostInfo($arrayOfPosts) {
    $post_search = $arrayOfPosts;

    $year = array_keys($post_search);

    foreach ($post_search as $year => $months) {
        foreach ($months as $month => $days) {
            foreach ($days as $day => $files) {
                foreach ($files as $file) {

                    $result[] = array(
                        'location' => "content/$year/$month/$day/$file",
                        'file' => $file,
                        'year' => $year,
                        'month' => $month,
                        'day' => $day,
                        'hour' => '',
                        'minutes' => ''
                    );
                }
            }
        }
    }
    
    $result = array_reverse($result);
    return $result;
}

//build's post from file and returns in HTML
function getPost($file) {
    
    $post = "";

    $open_file = fopen($file, "r") or die("Can't open File");

    $data = array();
    $marker = "|||";

    while ( !feof($open_file)) {
        $line = fgets($open_file);

        if ( beginWith($line, $marker) ) {

            //remove the special characters
            $line = str_replace(str_split('|'), '', $line);

            //explode the data for array keys
            list($key_title, $pre_entry) = explode(":", $line);
            
            //remove spaces from 
            $key_title = str_replace(str_split(' '), '', $key_title);

            //assign data to array
            $data = array(
                $key_title => $pre_entry
            );

            $header = postHeader($key_title, $pre_entry);
            $post .= $header;

        } else {
            $post .= $line . "<br>";
        }

    }
    fclose($open_file);
    
    return $post;
}

//builds the header for the post
function postHeader($title, $entry) {
    
    if($title == 'title') {
        return "<h2><a href='#' class='nounderline'>" . $entry . "</a></h2>";
    }
    
}

?>