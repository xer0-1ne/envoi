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

//directory mapping to scan and find posts in the content folder
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
                    
                    $len = strlen($file);
                    $hour = substr($file, -$len, 2);
                    $min = substr($file, -$len + 2, 2);

                    $result[] = array(
                        'location' => "content/$year/$month/$day/$file",
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
    
    $result = array_reverse($result);
    return $result;
}

//build's post from file and returns in HTML
function getPost($file) {
    
    $post = "";
    
    //make date from file location 
    $build_date = str_replace(array('/','content','.md'), '', $file);
    
    //format the date into a readable type "Tuesday the 19th of May at 19:27"
    $date_time = date('l \t\h\e jS \o\f F\, Y \a\t H\:i', strtotime($build_date));

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

            $header = postHeader($key_title, $pre_entry, $date_time);
            $post .= $header;

        } else {
            $post .= $line . "<br>";
        }

    }
    fclose($open_file);
    
    return $post;
}

//builds the header for the post
function postHeader($title, $entry, $date_time) {
    
    if($title == 'title') {
        return "<a href='#' class='nounderline h2'>" . $entry . "</a><br>" . 
            "<span class='small'>" . "Posted on: " . "<span class='font-weight-bold'>" . 
            $date_time . "</span></span><br><br>";
    }
    
}

?>