<?php #admin-add-content.php

    include "admin-header.php";

    if(isset($_POST['submit'])) {
        
        $post_type = $_POST['post_type'];
        $post_title = $_POST['title'];
        $post_content = $_POST['content'];
        $post_status = $_POST['status'];
        $post_date = $_POST['date'];
        $post_time = $_POST['time'];
        
        if ($post_title == "" || empty($post_title)) {
                                    
            echo "<script><br>" . 
                 "var el = document.getElementById('title'); <br>" .
                 "el.classList.add('text-danger'); <br>" . 
                 "</script>";
        }
    }
?>

<body id="page-top">
    <div id="wrapper">

        <?php include "admin-nav.php"; ?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <?php include "admin-nav-top.php"; ?>

                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Add Content</h3>
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
            </div>
        </div>

        <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
        
        
        <script>
            
            var datetime = new Date();
            var currentDate = datetime.toISOString().slice(0,10);
            var currentTime = datetime.getHours() + ':' + datetime.getMinutes();

            document.getElementById('date').value = currentDate;
            document.getElementById('time').value = currentTime;

        </script>

    <?php include "admin-footer.php"; ?>