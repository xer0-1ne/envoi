<?php #index.php

    include "includes/header.php"; 
                
?>

<!-- Start title section -->

<div class="container head">
    <div class="row">

        <div class="col-md-12">
            <a class="page-header h1" href="<?php echo $site_url; ?>"><?php echo $site_title; ?></a>
            <h3><small><?php echo $site_slogan; ?></small></h3>
        </div>
    </div>

    <!-- author block, left panel -->
    <?php include INCLUDES_DIR . "author.php"; ?>
</div>

<!-- end title section -->

<!-- Start Body -->

<!-- Search bar -->
<div class="row no-gutters align-items-center search">
    <input type="search" class="form-control rounded-pill shadow-sm p-4 mb-4 bg-light" value="search">    
</div>



<div class="container content">
    <div class="row">
        
        <!-- post section -->
        <div class="container">

            <?php 
                //scan the content folder for all posts
                $post_list = scanContentFolder(CONTENT_DIR);
            
                //get basic post meta info (file location, date posted, etc)
                $post_meta_info = getPostMeta($post_list);
                
                //loop through each post in the array and display the info
                foreach ( $post_meta_info as $post_info ) {
                    
                    //get file path location for the markdown post file
                    $post_file_location = $post_info['location'];
                    
                    //get an array of data for the post information
                    $post_file_data = getPost($post_file_location);
                    
                    //assign data to variables
                    $post_title     = $post_file_data->get_title();
                    $post_type      = $post_file_data->get_type();
                    $post_status    = $post_file_data->get_status();                  
                    $post_content   = $post_file_data->get_content();
                    $post_datetime  = $post_file_data->get_datetime();
                    
                    //display post
                    echo "<div class='post'>" . 
                         "<a href='#' class='nounderline h2'>" . 
                            $post_title . "</a><br>" .
                         "<span class='small font-weight-bold'>Posted on: " . 
                            $post_datetime . "</span><br>" .
                         $post_content . "</div>";
                }
            ?>
            
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->

<!-- End Body -->

<!-- Include footer -->
<?php include INCLUDES_DIR . "footer.php"; ?>