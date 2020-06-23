<?php # e-core/admin/views/view-posts.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//scan for posts
$post_scan = find_content(DIR_CONTENT_POSTS);

//get metadata from posts
$post_meta = get_post_meta($post_scan);

//define the page title
$page_title = 'View Posts';

//Required for header and navigation
include(DIR_ADMIN_VIEWS . "header.php");

$admin->create_tag('div', ['class'=>'d-flex', 'id'=>'wrapper']);
    include(DIR_ADMIN_VIEWS . "nav.php");
    $admin->create_tag('div', [ 'class'=>'flex-column content container-fluid admin-body', 'id'=>'content-wrapper']);
        $admin->create_tag('div', ['class'=>'admin-header']);
            $admin->create_tag_text('span', ['class'=>'admin-header-text dark-text'], $page_title );
        $admin->close_tag('div');
        $admin->create_tag('table', ['class'=>'table table-sm table-hover table-striped admin-table']);
            $admin->create_tag('thead', ['class'=>'thead-light']);
                $admin->create_simple_tag('tr');
                    $admin->create_simple_tag_text('th', 'Status');
                    $admin->create_simple_tag_text('th', 'Title');
                    $admin->create_simple_tag_text('th', 'Type');
                    $admin->create_simple_tag_text('th', 'Date');
                    $admin->create_simple_tag_text('th', 'Time');
                    $admin->create_simple_tag_text('th', ' ');
                    $admin->create_simple_tag_text('th', ' ');
                $admin->close_tag('tr');
            $admin->close_tag('thead');
            $admin->create_simple_tag('tbody');

                //start populating rows of posts
                foreach ( $post_meta as $post_info ) {

                    //open table row
                    $admin->create_simple_tag('tr');

                        //get path location for the markdown post file
                        $post_file_location = $post_info['location'] . $post_info['file'];
                    
                        //get an array of data for the post information
                        $post_file_data = build_post($post_file_location);
                    
                        //assign meta data to variables for each post to display
                        $post_status    = $post_file_data->get_status();
                        $post_title     = $post_file_data->get_title();
                        $post_type      = $post_file_data->get_type();
                        $post_date      = $post_file_data->get_pretty_date();
                        $post_time      = $post_file_data->get_time();      
                        
                        //display the post meta data in the table fields
                        $admin->create_simple_tag_text('td', $post_status);
                        $admin->create_simple_tag_text('td', $post_title);
                        $admin->create_simple_tag_text('td', $post_type);
                        $admin->create_simple_tag_text('td', $post_date);
                        $admin->create_simple_tag_text('td', $post_time);

                        //edit icon
                        $admin->create_simple_tag('td');
                            $admin->create_tag('a', ['href'=>'#']);
                                $admin->create_tag('i', ['class'=>'fas fa-edit']);
                                $admin->close_tag('i');
                            $admin->close_tag('a');
                        $admin->close_tag('td');

                        //delete icon
                        $admin->create_simple_tag('td');
                            $admin->create_tag('a', ['href'=>'#']);
                                $admin->create_tag('i', ['class'=>'fas fa-trash red-text']);
                                $admin->close_tag('i');
                            $admin->close_tag('a');
                        $admin->close_tag('td');

                    //close table row
                    $admin->close_tag('tr');
                }

            $admin->close_tag('tbody');
        $admin->close_tag('table');
    $admin->close_tag('div');
$admin->close_tag('div');

//required for footer
include(DIR_ADMIN_VIEWS . "footer.php");

$admin->display();

?>