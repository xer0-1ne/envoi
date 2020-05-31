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
                    <h3 class="text-dark mb-1">Posts</h3>
                </div>
                <div class="container-fluid">
                    List of all posts that have been created.  You will be able to edit/delete from this page.  You will also be able to see which social media service each post has been sent to.
                </div>
            </div>
        </div>

        <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

<?php include "admin-footer.php"; ?>