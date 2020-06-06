<?php #admin-posts.php

    include "admin-header.php";

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
                            <th>Location</th>
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
                            
                            $rel_path = str_replace(CONTENT_DIR, "", $post_file_location);

                            //get an array of data for the post information
                            $post_file_data = getPostHeader($post_file_location);

                            //assign meta data to variables for each post to display
                            $post_status    = $post_file_data->get_status();
                            $post_title     = $post_file_data->get_title();
                            $post_type      = $post_file_data->get_type();
                            $post_date      = $post_file_data->get_date();
                            $post_time      = $post_file_data->get_time();
                            
                            ?>                             
                            
                            <!-- display the post meta data in the table fields -->
                            <td><?php echo $post_status; ?></td>
                            <td><?php echo $post_title; ?></td>
                            <td><?php echo $post_type; ?></td>
                            <td><?php echo $post_date; ?></td>
                            <td><?php echo $post_time; ?></td>
                            <td><?php echo $rel_path; ?></td>
                            <td><a href="<?php echo "admin-edit-content.php?source=edit&file=" . $rel_path ?>"><i class="fas fa-edit"></i></a></td>
                            <td><a href="?delete=<?php echo $rel_path; ?>"><i class="fas fa-trash red-text"></i></a></td>
                                                        
                        </tr>
                        <?php 
                        
                        } //close for each loop
                            
                        if (isset($_GET['delete'])) {
                            
                            //reassemble the direct-path location
                            $file = CONTENT_DIR . $_GET['delete'];
                            
                            //get page without the parameters
                            $page = explode("?", $_SERVER['PHP_SELF']);
                            
                            //delete the file
                            unlink($file);
                            header("Location: $page[0]");
                        } //end if(isset)

                        ?>
                    </tbody>
                </table>
            </div>
            <a class="border rounded-pill d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        </div>
    </div>
</div>

<!-- <div>, <body> and <html> tags close in footer -->
<?php include "admin-footer.php"; ?>