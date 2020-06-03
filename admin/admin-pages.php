<?php #admin-pages.php

    include "admin-header.php";

?>

<body id="page-top">
<div id="wrapper">

    <?php include "admin-nav.php"; ?>

    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">

            <?php include "admin-nav-top.php"; ?>

            <div class="container-fluid">
                <h3 class="text-dark mb-1">Pages</h3>
            </div>
            <div class="container-fluid">
                List of all pages that have been created.  You will be able to edit/delete from this page.
            </div>

        </div>
    </div>

    <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

<?php include "admin-footer.php"; ?>