<?php #post_functions.php

include_once "../init.php";

//display default list of all posts
function display_posts() {

?>
<div class="d-flex" id="wrapper">
    <?php include "admin-nav.php"; ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">

            <div class="container-fluid shadow admin-navbar-dark">
                <h4 class="text-light p-3 text-center">Posts</h4>
            </div>
            <div class="container-fluid">

                <table class="table table-sm table-hover table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Status</th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Posted</td>
                            <td>This is a Title for A Post</td>
                            <td>Text</td>
                            <td>test info</td>
                            <td>test info</td>
                            <td><i class="fas fa-edit"></i></td>
                            <td><i class="fas fa-trash"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>
</div>
<?php
} //end display_posts()

//display section for adding new posts
function add_post() {
    
if(isset($_POST['submit'])) {

    $post_type = $_POST['post_type'];
    $post_title = $_POST['title'];
    $post_content = $_POST['content'];
    $post_status = $_POST['status'];
    $post_date = $_POST['date'];
    $post_time = $_POST['time'];

} ?>

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
            <textarea class="input-group form-control form-group" rows="15" name="content"></textarea>
        </div><!-- end of the left side -->


        <div class="container col-md-3 ">
            <label class="my-1 mr-2" for="info">Content Info</label><br>

            <input class="btn btn-secondary form-control form-group" type="submit" name="save" value="Save for Later">
            <input class="btn btn-danger form-control form-group" type="submit" name="submit" value="Post">

            <label class="my-1 mr-2 small" for="date">Status:</label>
            <select class="form-control form-group" name="status">
                <option value="post">Draft</option>
                <option value="photo">Posted</option>
            </select>
            <label class="my-1 mr-2 small" for="date">Date:</label>
            <input class="input-group form-control form-group" type="date" id="date" name="date" value="">
            <label class="my-1 mr-2 small" for="time">Time:</label>
            <input class="input-group form-control form-group" type="time" id="time" name="time" value="">
            <hr>

        </div><!-- end of the right side -->
    </div>
</form>

<script>
    var datetime = new Date();
    var currentDate = datetime.toISOString().slice(0,10);
    var currentTime = datetime.getHours() + ':' + datetime.getMinutes();

    document.getElementById('date').value = currentDate;
    document.getElementById('time').value = currentTime;
</script>
<?php
} //end add_post()

?> <!-- end of file