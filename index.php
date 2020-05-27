<?php include "includes/header.php"; ?>

<!-- Start Body -->

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