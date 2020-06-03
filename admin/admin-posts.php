<?php #admin-posts.php

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
                
                    <table class="table table-sm table-hover table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>test info</td>
                                <td>test info</td>
                                <td>test info</td>
                                <td>test info</td>
                                <td>test info</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>

<?php include "admin-footer.php"; ?>