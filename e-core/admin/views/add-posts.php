<?php # e-core/admin/views/add-posts.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

//check if form has been submitted
if(isset($_POST['submit'])) {

    //create array to store post data
    $post_data = array(
        "post_title" => $_POST['title'],
        "post_type" => $_POST['post_type'],
        "post_status" => $_POST['status'],
        "post_date" => $_POST['date'],
        "post_year" => date("Y", strtotime($_POST['date'])),
        "post_month" => date("m", strtotime($_POST['date'])),
        "post_day" => date("d", strtotime($_POST['date'])),
        "post_time" => $_POST['time'],
        "post_content" => $_POST['content']
    );
    
    //create post
    create_post($post_data);
    header("Location: " . $conf_site_url . "admin" . SLASH . "view-posts" . SLASH);
}

//define the page title
$page_title = 'Add Content';

//Required for header and navigation
include(DIR_ADMIN_VIEWS . "header.php");

$admin->create_node('div', ['class'=>'d-flex', 'id'=>'wrapper']);
    include(DIR_ADMIN_VIEWS . "nav.php");
    $admin->create_node('div', [ 'class'=>'bg-white flex-column content container-fluid admin-body', 'id'=>'content-wrapper']);
        $admin->create_node('div', ['class'=>'admin-header']);
            $admin->create_text_node('span', ['class'=>'admin-header-text dark-text'], $page_title );
        $admin->close_node('div');
        $admin->create_node('form', ['method'=>'post', 'action'=>' ']);
            $admin->create_node('div', ['class'=>'row']);

                //left area
                $admin->create_node('div', ['class'=>'container container-fluid col-md-9']);
                    $admin->create_straight_text_node('label', ['class'=>'my-1 mr-2 small', 'id'=>'title', 'for'=>'title'], 'Title:');
                    $admin->create_required_node('input', ['type'=>'text', 'class'=>'input-group form-control form-group', 'name'=>'title']);
                    $admin->create_straight_text_node('label', ['class'=>'my-1 mr-2 small', 'id'=>'content', 'for'=>'content'], 'Content:');
                    $admin->create_straight_node('textarea', ['class'=>'input-group form-control form-group post-textarea', 
                                                            'id'=>'content_area', 
                                                            'name'=>'content']);
                    
                    //using EasyMDE until Envoi has it's own markdown editor
                    $admin->create_simple_text_node('script', 'var easyMDE = new EasyMDE({element: document.getElementById("content_area")})');
                $admin->close_node('div');

                //beginning of the right panel
                $admin->create_node('div', ['class'=>'container col-md-3']);
                    $admin->create_straight_text_node('label', ['class'=>'my-1 mr-2 font-weight-bold', 'for'=>'info'], 'Post Information');
                    $admin->create_hr();

                    //post type drowndown selector
                    $admin->create_straight_text_node('label', ['class'=>'my-1 mr-2 small', 'for'=>'post_type'], 'Post Type: ');
                    $admin->create_node('select', ['class'=>'form-control', 'name'=>'post_type']);
                        $admin->create_straight_text_node('option', ['value'=>'post'], 'Post');                     
                        $admin->create_straight_text_node('option', ['value'=>'photo'], 'Photo');                     
                        $admin->create_straight_text_node('option', ['value'=>'video'], 'Video');
                        $admin->create_straight_text_node('option', ['value'=>'upload'], 'Upload');
                        $admin->create_straight_text_node('option', ['value'=>'url'], 'URL');
                        $admin->create_straight_text_node('option', ['value'=>'quote'], 'Quote');
                        $admin->create_straight_disabled_text_node('option', ['value'=>'select-hr'], '--------------');
                        $admin->create_straight_text_node('option', ['value'=>'page'], 'Page');
                    $admin->close_node('select');

                    //post status dropdown selector
                    $admin->create_straight_text_node('label', ['class'=>'my-1 mr-2 small','for'=>'status'], 'Status: ');
                    $admin->create_node('select', ['class'=>'form-control form-group', 'name'=>'status']);
                        $admin->create_straight_text_node('option', ['value'=>'draft'], 'Draft');
                        $admin->create_straight_text_node('option', ['value'=>'posted'], 'Posted');
                    $admin->close_node('select');

                    //post date
                    $admin->create_straight_text_node('label', ['class'=>'my-1 mr-2 small', 'for'=>'date'], 'Date: ');
                    $admin->create_node('input', ['class'=>'input-group form-control form-group', 
                                                    'type'=>'date', 
                                                    'id'=>'date', 
                                                    'name'=>'date',
                                                    'value'=>date("Y-m-d") ]);

                    //post time
                    $admin->create_straight_text_node('label', ['class'=>'my-1 mr-2 small', 'for'=>'time'], 'Time: ');
                    $admin->create_node('input', ['class'=>'input-group form-control form-group', 
                                                    'type'=>'time', 
                                                    'id'=>'time', 
                                                    'name'=>'time',
                                                    'value'=>date("H:i") ]);
                    $admin->create_hr();

                    //form buttons
                    $admin->create_node('input', ['class'=>'btn btn-secondary form-control form-group', 
                                                    'type'=>'submit', 
                                                    'name'=>'save', 
                                                    'value'=>'Save for Later']);
                    $admin->create_node('input', ['class'=>'btn btn-danger form-control form-group mt-3', 
                                                    'type'=>'submit', 
                                                    'name'=>'submit', 
                                                    'value'=>'Post Now']);
                        $admin->close_node('div');
                    $admin->close_node('div');                        
                $admin->close_node('div');
            $admin->close_node('div');
        $admin->close_node('form');
    $admin->close_node('div');
$admin->close_node('div');

//required for footer
include(DIR_ADMIN_VIEWS . "footer.php");

//display the page
$admin->display();

?>