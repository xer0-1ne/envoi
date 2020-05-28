<?php include "includes/header.php"; ?>

<!-- Start Body -->

<!-- Search bar -->
<div class="row no-gutters align-items-center search">
    <input type="search" class="form-control rounded-pill shadow-sm p-4 mb-4 bg-light" value="find something...">    
</div>



<div class="container content">
    <div class="row">
        
        <!-- post section -->
        <div class="container">

            <?php 
            
                //scan the content folder for all posts
                $post_list = directoryArrayMap("content");    
            
                //create an array for each post
                $post_info = getPostInfo($post_list);

                //loop through each post in the array and display the info
                foreach ( $post_info as $post ) {
                    
                    //get file location
                    $location = $post['location'];
                    echo "<div class='post'>";
                    
                    //get the post contents
                    echo getPost($location);
                    echo "</div>";
                    

                }
            ?>
            
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->

<!-- End Body -->

<?php include "includes/footer.php"; ?>