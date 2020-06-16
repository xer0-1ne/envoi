<?php # e-core/site/structure/post_constructor.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//map posts and store in variable //returns array
$post_map = find_content(DIR_CONTENT_POSTS);

//get basic post meta info (file location, date posted, etc)
$post_meta = get_post_meta($post_map);

//loop through each post in the array and display the info
foreach ( $post_meta as $post_info ) {

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

        echo "<div class='post'>" .
            "<a href='#' class='h2'>" .
                $post_title . "</a><br>" .
            "<span class='small font-weight-bold'>Posted on: " .
                $post_p_date . " at " . $post_time . "</span><br>" .
            $post_content . "</div>";

    }
}

?>