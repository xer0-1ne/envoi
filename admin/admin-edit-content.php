<?php #admin-edit-content.php

    include "admin-header.php";

    if(isset($_GET['file'])) {
        
        //get file from address
        $post_file = CONTENT_DIR . $_GET['file'];
        
        //get post data
        $post_data = getPost($post_file);
        
        //set post variables
        $post_type = strtolower($post_data->get_type());
        $post_title = $post_data->get_title();
        $post_content = $post_data->get_content();
        $post_status = $post_data->get_status();
        $post_date = date('Y-m-d', strtotime($post_data->get_date()));
        $post_time = $post_data->get_time();
    }


    if(isset($_POST['submit'])) {

        //create array to store post data
        $post_data = array(
            "post_type" => $_POST['post_type'],
            "post_title" => $_POST['title'],
            "post_content" => $_POST['content'],
            "post_status" => $_POST['status'],
            "post_date" => $_POST['date'],
            "post_time" => $_POST['time']
        );
        
        //create post
        createPost($post_data);
        header("Location: " . $site_url . "admin" . SLASH . "admin-posts.php");

    }

?>

<div class="d-flex" id="wrapper">
    <?php include "admin-nav.php"; ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid shadow admin-navbar-dark">
                <h4 class="text-light p-3 text-center">Add Content</h4>
            </div>

            <form action="" method="post">
                <div class="row">
                    <div class="container col-md-9">
                        <label class="my-1 mr-2" for="selection">Choose Content Type</label>
                        <select class="form-control" name="post_type">
                            <?php 
                                //create array for post types
                                $list = array("post", "photo", "video", "upload", "url", "quote");

                                //iterate through the array for all types of posts and create and option
                                foreach ( $list as $option ) {

                                    echo '<option value="' . $option . '"'; 
                                    
                                    //if the post_type matches, add the selected attribute
                                    if ( trim($post_type) == $option) {
                                        echo ' selected="selected"';
                                    } 
                                    
                                    //close the option element
                                    echo ">" . ucfirst($option) . "</option><br>";
                                } 
                            ?>
                            <option class="select-hr" disabled>----------</option>
                            <option value="page" disabled>Page</option>
                        </select>
                        <hr>
                        <label class="my-1 mr-2 small" id="title" for="title">Title:</label>
                        <input type="text" value="<?php echo $post_title; ?>" class="input-group form-control form-group" name="title" required>
                        <label class="my-1 mr-2 small" id="content" for="content">Content:</label>
                        <textarea class="input-group form-control form-group post-textarea" rows="15" name="content"><?php echo $post_content; ?></textarea>
                    </div><!-- end of the left side -->

                    <div class="container col-md-3 ">
                        <label class="my-1 mr-2" for="info">Content Info</label><br>

                        <input class="btn btn-secondary form-control form-group" type="submit" name="save" value="Save for Later">
                        <input class="btn btn-danger form-control form-group" type="submit" name="submit" value="Post">

                        <label class="my-1 mr-2 small" for="date">Status:</label>
                        <select class="form-control form-group" name="status">
                        <?php
                            //check for the draft entry
                            if ( trim($post_status) == "Draft") {
                                //if post is in draft, then select draft else not
                                echo '<option value="draft" selected="selected">Draft</option>';
                            } else {
                                echo '<option value="draft">Draft</option>';
                            }

                            //check for the posted entry
                            if ( trim($post_status) == "Posted") {
                                //if post is posted, then select posted else not
                                echo '<option value="posted" selected="selected">Posted</option>';
                            } else {
                                echo '<option value="posted">Posted</option>';
                            }
                        ?>
                        </select>

                        <label class="my-1 mr-2 small" for="date">Date:</label>
                        <input class="input-group form-control form-group" type="date" id="date" name="date" value="<?php echo $post_date; ?>">
                        <label class="my-1 mr-2 small" for="time">Time:</label>
                        <input class="input-group form-control form-group" type="time" id="time" name="time" value="<?php echo $post_time; ?>">
                        <hr>

                    </div><!-- end of the right side -->
                </div>
            </form>
        </div>
    </div>

    <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<?php include "admin-footer.php"; ?>