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

    //create an array of all post meta data
    foreach ($post_map as $year => $months) {
        foreach ($months as $month => $post_names) {
            foreach ($post_names as $name_of_post => $files) { 
                foreach ($files as $file ) {

                    //full location of post file
                    $post_location = DIR_CONTENT_POSTS . $year . SLASH . $month . SLASH . $name_of_post . SLASH . "default.md";

                    //set full date with time from post
                    $datetime = get_datetime($post_location);

                    //create array of meta data from post
                    $result[] = array(
                        'location' => DIR_CONTENT_POSTS . $year . SLASH . 
                                      $month . SLASH . $name_of_post . SLASH,
                        'file' => $file,
                        'year' => $year,
                        'month' => $month,
                        'datetime' => $datetime
                    );
                }
            }
        }
    }

    //sort the array in date order
    array_multisort( array_column($result, 'datetime'), SORT_DESC, $result );
    
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
            
        } else if ( beginWith($line, "location")) {
            
            //set post time
            $post->set_post_file_location($line);
            
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

//construct posts
function post_fetch(&$html) {

    //map posts
    $post_map = find_content(DIR_CONTENT_POSTS);

    //get basic post meta info (file location, date posted, etc)
    $post_meta = get_post_meta($post_map);

    //loop through each post in the array and display the info
    foreach ( $post_meta as $post_info ) {

        $post_dom_stack = new HtmlConstructor();

        //get file path location for the markdown post file
        $post_file_location = $post_info['location'] . $post_info['file'];

        //get an array of data for the post information
        $post_file_data = build_post($post_file_location);

        //assign data to variables
        $post_title     = $post_file_data->get_title();
        $post_type      = $post_file_data->get_type();
        $post_status    = $post_file_data->get_status();
        $post_p_date    = $post_file_data->get_pretty_date();
        $post_time      = $post_file_data->get_time();
        $post_content   = $post_file_data->get_content();

        //check post status to "draft"... using trim to strip the last (white) character from the object
        //temporary, in the future, themes will determine how posts are displayed.
        if (trim($post_status) != "Draft" ) {

            $post_dtg = "Posted on: " . $post_p_date . " at " . $post_time;

            $html->create_node('div', ['class'=>'post']);
            $html->create_text_node('a', ['class'=>'h2 text-muted', 'href'=>'#'] , $post_title);
            $html->create_text_node('span', ['class'=>'small font-weight-bold'], $post_dtg);
            $html->create_text_node('span', ['class'=>'post'], $post_content);
            $html->close_node('div');
        }
    }
}

function get_datetime(string $file) {

    //declare date time variable
    $datetime = "";
    
    //open post file from location or die with error message
    $open_file = fopen($file, "r") or die("Can't open File " . $file);

    //process post informartion and store into array
    while ( !feof($open_file)) {
        $line = fgets($open_file);

        //check for post title, type and status
        if ( beginWith($line, "date")) {

            $datetime .= substr($line, strpos($line, ": ") + 1);
            
        } else if ( beginWith($line, "time")) {
            
            $datetime .= substr($line, strpos($line, ": ") + 1);

        }
    }

    //close post file
    fclose($open_file);

    //return the date value 
    return strtotime($datetime);
}

//create post and store in folder
function create_post(array $post_data) {
    
    //post in the future or past!

    //get post date info
    $post_date = $post_data['post_date'];
    $post_year = $post_data['post_year'];
    $post_month = $post_data['post_month'];
    $post_day = $post_data['post_day'];

    $post_title = ltrim(rtrim($post_data['post_title']));
    $post_title = str_replace(' ', '_', strtolower($post_title));

    $post_file = "default.md";

    //post location
    $post_rel_folder_location = $post_year . SLASH . $post_month . SLASH . $post_title . SLASH;
    $post_folder_location = DIR_CONTENT_POSTS . $post_rel_folder_location;
    
    //create the folder
    if ( !file_exists($post_folder_location)) {
        mkdir($post_folder_location, 0755, true);
    }

    //create post location
    $post_file_location = $post_folder_location . $post_file;

    //create file if it doesn't exist
    if ( !file_exists($post_file_location) ) {
        $new_post_file = fopen($post_file_location, 'w');
        fwrite($new_post_file, 'd');
        fclose($new_post_file);
    }

    //create post file to open/edit
    $post_file = fopen($post_file_location, "w") or die("Unable to create/edit post.");

    //write data to psot file
    fwrite($post_file, "title: " . $post_data['post_title'] . PHP_EOL );
    fwrite($post_file, "type: " . $post_data['post_type'] . PHP_EOL );
    fwrite($post_file, "status: " . $post_data['post_status'] . PHP_EOL );
    fwrite($post_file, "date: " . $post_data['post_date'] . PHP_EOL );
    fwrite($post_file, "time: " . $post_data['post_time'] . PHP_EOL );
    fwrite($post_file, "location: " . $post_rel_folder_location . PHP_EOL );
    fwrite($post_file, $post_data['post_content']);

    //close file
    fclose($post_file);
}

//remove associated files and folders for a post location
function delete_post($location) {

    //set the path to delete
    $full_path = DIR_CONTENT_POSTS . $location;

    //remove all files and then delete the folder
    array_map('unlink', glob("$full_path/*.*"));
    rmdir($full_path);
}

?>