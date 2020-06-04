<?php #admin-add-content.php

    include "admin-header.php";

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
                            <option value="post">Post</option>
                            <option value="photo">Photo</option>
                            <option value="video">Video</option>
                            <option value="upload">File Upload</option>
                            <option value="url">URL Link</option>
                            <option value="quote">Quote</option>
                            <option class="select-hr" disabled>----------</option>
                            <option value="page">Page</option>
                        </select>
                        <hr>
                        <label class="my-1 mr-2 small" id="title" for="title">Title:</label>
                        <input type="text" class="input-group form-control form-group" name="title" required>
                        <label class="my-1 mr-2 small" id="content" for="content">Content:</label>
                        <textarea class="input-group form-control form-group post-textarea" rows="15" name="content"></textarea>
                    </div><!-- end of the left side -->


                    <div class="container col-md-3 ">
                        <label class="my-1 mr-2" for="info">Content Info</label><br>

                        <input class="btn btn-secondary form-control form-group" type="submit" name="save" value="Save for Later">
                        <input class="btn btn-danger form-control form-group" type="submit" name="submit" value="Post">

                        <label class="my-1 mr-2 small" for="date">Status:</label>
                        <select class="form-control form-group" name="status">
                            <option value="draft">Draft</option>
                            <option value="posted">Posted</option>
                        </select>
          
                        <label class="my-1 mr-2 small" for="date">Date:</label>
                        <input class="input-group form-control form-group" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
                        <label class="my-1 mr-2 small" for="time">Time:</label>
                        <input class="input-group form-control form-group" type="time" id="time" name="time" value="<?php echo date('H:i'); ?>">
                        <hr>

                    </div><!-- end of the right side -->
                </div>
            </form>
        </div>
    </div>

    <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>

<?php include "admin-footer.php"; ?>