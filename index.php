<?php include "includes/header.php"; ?>

<!-- Start Body -->

<div class="container">
    <div class="row">
        
        <!-- author block, left panel -->
        <?php include "includes/author.php"; ?> 
        
        <!-- post section -->
        <div class="col-md-8">
        
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