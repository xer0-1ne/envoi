<?php #index.php

    include "includes/header.php"; 
                
?>
<header>
    <!-- Start title section -->
    <div class="text-center h6">
        <span class="small text-dark">
            <a href="<?php echo $site_url . 'admin' ?>" class="text-dark">Admin</a><br>
            <a href="<?php echo $site_url . 'login.php' ?>" class="text-dark">Login</a>
        </span>
    </div>

    <div class="container head">
        <div class="row">

            <div class="col-md-12">
                <a class="page-header h1 title" href="<?php echo $site_url; ?>"><?php echo $site_title; ?></a>
                <h3><small><?php echo $site_slogan; ?></small></h3>
            </div>
        </div>

        <!-- author block, left panel -->
        <?php include INCLUDES_DIR . "author.php"; ?>
    </div>
</header>
<!-- end title section and Start Body -->

<!-- Search bar -->
<div class="row no-gutters align-items-center search">
    <input type="search" class="form-control rounded-pill shadow-sm p-4 mb-4 bg-light" value="search">
</div>

<!-- main content -->
<div class="container content">
    <div class="row">

        <!-- post section -->
        <div class="container">

            <!-- display posts -->
            <?php displayPosts(); ?>

        </div> <!-- end container -->
    </div> <!-- end row -->
</div> <!-- end container -->

<!-- End Body -->

<!-- Include footer -->
<?php include INCLUDES_DIR . "footer.php"; ?>