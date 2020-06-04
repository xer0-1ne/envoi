<?php #admin-posts.php

    include "admin-header.php";
    //post_functions are all of the pre-defined pages for post related CRUD

?>

<div class="d-flex" id="wrapper">
    <?php include "admin-nav.php"; ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <!-- header -->
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
                    
                        <?php 

                        //scan content directory for post files
                        $scan_for_posts = scanContentFolder(CONTENT_DIR);

                        $post_meta = getPostMeta($scan_for_posts);

                        foreach ( $post_meta as $post_info ) {
                            
                            //get file path location for the markdown post file
                            $post_file_location = $post_info['location'];

                            //get an array of data for the post information
                            $post_file_data = getPostHeader($post_file_location);

                            //assign meta data to variables for each post to display
                            $post_status    = $post_file_data->get_status();
                            $post_title     = $post_file_data->get_title();
                            $post_type      = $post_file_data->get_type();
                            $post_date      = $post_file_data->get_date();
                            $post_time      = $post_file_data->get_time();
                            
                            ?>                             

                            <td><?php echo $post_status; ?></td>
                            <td><?php echo $post_title; ?></td>
                            <td><?php echo $post_type; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td><?php echo $post_time; ?></td>
                            <td><a href="<?php echo $post_file_location; ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="<?php echo $post_file_location; ?>"><i class="fas fa-trash"></i></a></td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>
</div>

<!-- <div>, <body> and <html> tags close in footer -->
<?php include "admin-footer.php"; ?>