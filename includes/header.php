<?php 
    include "config/config.php";
    include "includes/functions.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO -->
    <meta name="description" content="">
    <meta name="author" content="<?php echo $username; ?>" >
    <meta name="url" content="<?php echo $site_url; ?>" >
    <meta name="copyright" content="<?php echo $site_title; ?>">
    <meta name="robots" content="index,follow">
    
    <title><?php echo $site_title ?></title>
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/css/style.css">
</head>

<div class="container head">
    <div class="row">
       
        <div class="col-md-12">
            <h1 class="page-header"><?php echo $site_title; ?></h1>
            <h3><small><?php echo $site_slogan; ?></small></h3>
        </div>
    </div>
    
    <!-- author block, left panel -->
    <?php include "includes/author.php"; ?> 
</div>
   
    
