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
            
                $post_list = directoryArrayMap("content");            
                $post_info = getPostInfo($post_list);

                foreach ( $post_info as $post ) {
                    $location = $post['location'];
                    echo "<div class='post'>";
                    echo getPost($location);
                    echo "</div>";
                }
            ?>
            
        </div>
    </div> <!-- end row -->
</div> <!-- end container -->

<!-- End Body -->

<?php include "includes/footer.php"; ?>