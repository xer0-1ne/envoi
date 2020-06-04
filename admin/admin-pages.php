<?php #admin-pages.php

    include "admin-header.php";

?>

<div class="d-flex" id="wrapper">
    <?php include "admin-nav.php"; ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid shadow admin-navbar-dark">
                <h4 class="text-light p-3 text-center">Pages</h4>
            </div>
            <div class="container-fluid">
                List of all pages that have been created.  You will be able to edit/delete from this page.
            </div>

        </div>
    </div>

    <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

<?php include "admin-footer.php"; ?>