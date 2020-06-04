<?php #admin-profile.php

    include "admin-header.php";

?>



<div class="d-flex" id="wrapper">
    <?php include "admin-nav.php"; ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container-fluid shadow admin-navbar-dark">
                <h4 class="text-light p-3 text-center">Profile</h4>
            </div>

            <div class="container-fluid">
                User profile information. Here you will be able to change Title, Name, About Me info, Picture, etc.
            </div>
        </div>
    </div>

    <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

<?php include "admin-footer.php"; ?>