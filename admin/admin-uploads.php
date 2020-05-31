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
                    <h3 class="text-dark mb-1">Uploads</h3>
                </div>
                <div class="container-fluid">
                    List of all uploaded files.  Option to add/remove files.
                </div>
            </div>
        </div>

        <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

<?php include "admin-footer.php"; ?>