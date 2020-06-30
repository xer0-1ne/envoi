<?php # e-core/admin/views/view-posts.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//check for the delete super global
if (isset($_GET['delete'])) {
    $location = ($_GET['delete']);

    //delete post and return the the views page
    delete_post($location);
    header("Location: " . $conf_site_url . "admin" . SLASH . "view-posts" . SLASH);
}

//define the page title
$page_title = 'View Posts';

//Required for header and navigation
include(DIR_ADMIN_VIEWS . "header.php");

$admin->create_node('div', ['class'=>'d-flex', 'id'=>'wrapper']);
    include(DIR_ADMIN_VIEWS . "nav.php");
    $admin->create_node('div', [ 'class'=>'bg-white flex-column content container-fluid admin-body', 'id'=>'content-wrapper']);
        $admin->create_node('div', ['class'=>'admin-header']);
            $admin->create_text_node('span', ['class'=>'admin-header-text dark-text'], $page_title );
        $admin->close_node('div');
        $admin->create_node('table', ['class'=>'table table-sm table-hover table-striped admin-table']);
            $admin->create_node('thead', ['class'=>'thead-light']);
                $admin->create_simple_node('tr');
                    $admin->create_simple_text_node('th', 'Status');
                    $admin->create_simple_text_node('th', 'Title');
                    $admin->create_simple_text_node('th', 'Type');
                    $admin->create_simple_text_node('th', 'Date');
                    $admin->create_simple_text_node('th', 'Time');
                    $admin->create_simple_text_node('th', ' ');
                    $admin->create_simple_text_node('th', ' ');
                $admin->close_node('tr');
            $admin->close_node('thead');
            $admin->create_simple_node('tbody');

                //scan for posts
                $post_scan = find_content(DIR_CONTENT_POSTS);

                //get metadata from posts
                $post_meta = get_post_meta($post_scan);

                //start populating rows of posts
                foreach ( $post_meta as $post_info ) {

                    //open table row
                    $admin->create_simple_node('tr');

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
                        $post_location  = $post_file_data->get_post_file_location();   
                        
                        //display the post meta data in the table fields
                        $admin->create_simple_text_node('td', $post_status);
                        $admin->create_simple_text_node('td', $post_title);
                        $admin->create_simple_text_node('td', $post_type);
                        $admin->create_simple_text_node('td', $post_date);
                        $admin->create_simple_text_node('td', $post_time);

                        //edit icon
                        $admin->create_simple_node('td');
                            $admin->create_node('a', ['href'=>$conf_site_url . "admin/edit-post/?edit=" . $post_location]);
                            $admin->create_straight_node('img', ['class'=>'bi text-danger', 'src'=>DIR_BOOTSTRAP_ICONS . 'pencil-square.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                            $admin->close_node('a');
                        $admin->close_node('td');

                        //delete icon
                        $admin->create_simple_node('td');
                            $admin->create_node('a', ['href'=>'?delete=' . $post_location]);
                                $admin->create_straight_node('img', ['class'=>'bi text-danger', 'src'=>DIR_BOOTSTRAP_ICONS . 'trash-fill.svg', 'alt'=>'edit', 'width'=>'16', 'height'=>'16'] );
                            $admin->close_node('a');
                        $admin->close_node('td');

                    //close table row
                    $admin->close_node('tr');
                }

            $admin->close_node('tbody');
        $admin->close_node('table');
    $admin->close_node('div');
$admin->close_node('div');

//required for footer
include(DIR_ADMIN_VIEWS . "footer.php");

$admin->display();

?>