<?php #index.php

    include "../init.php";
    include "admin-header.php";

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
                <form>
                    <div class="row">
                        <div class="container col-md-9">
                            <label class="my-1 mr-2" for="selection">Choose Content Type</label>
                            <select class="form-control">
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
                            <label class="my-1 mr-2 small" for="date">Title:</label>
                            <input type="text" class="input-group form-control form-group" id="title">
                            <label class="my-1 mr-2 small" for="date">Content:</label>
                            <textarea class="input-group form-control form-group" rows="15" id="content"></textarea>
                        </div><!-- end of the left side -->


                        <div class="container col-md-3 ">
                            <label class="my-1 mr-2" for="info">Content Info</label><br>
                            <button type="button" class="btn btn-secondary form-control form-group">Save for Later</button>
                            <button type="button" class="btn btn-danger form-control form-group">Post</button>
                            <label class="my-1 mr-2 small" for="date">Status:</label>
                            <select class="form-control form-group">
                                <option value="post">Draft</option>
                                <option value="photo">Posted</option>
                            </select>
                            <label class="my-1 mr-2 small" for="date">Date:</label>
                            <input class="input-group form-control form-group" type="date">
                            <label class="my-1 mr-2 small" for="date">Time:</label>
                            <input class="input-group form-control form-group" type="time">
                            <hr>

                        </div><!-- end of the left side -->
                    </div>

                </form>
            </div>
        </div>

        <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

    <?php include "admin-footer.php"; ?>