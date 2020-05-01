<?php
  //include the configuration file
  require_once('config/config.php');
?>

<!DOCTYPE html>
<html lang="<?php echo $language ?>">
  <head>
	  <!-- Meta Tag -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- SEO -->
    <meta name="description" content="<?php echo $seo_description ?>" />
    <meta name="author" content="<?php echo $author ?>" />
    <meta name="url" content="<?php echo $site_url ?>" />
    <meta name="robots" content="index,follow" />

    <!-- Title -->
    <title><?php echo $title . " - " . $slogan; ?></title>

    <!-- CSS References -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="fonts/font-awesome.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta">
  </head>

  <body>
      <div class="container">
          <div class="row">
              <div class="col">
                  <div class="box box-padding">
                      <h3 class="name"><?php echo $author ?></h3>
                      <p class="title">Programmer</p>
                      <p class="description">I am a programmer that likes to make things.</p>
                      <div id="social-icons">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-twitter fa-stack-1x fa-inverse"></i></span></li>
                            <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x fa-inverse"></i></span></li>
                            <li class="list-inline-item"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-github fa-stack-1x fa-inverse"></i></span></li>
                        </ul>
                    </div>
                  </div>
              </div>
              <div class="col-md-10 col-lg-8 box-padding">
                  <div class="site-logo" id="site-logo">
                      <h1><?php echo $title ?></h1>
                      <h5><?php echo $slogan ?></h5>
                  </div>
                  <div class="post-preview">
                      <a href="#">
                          <h2 class="post-title">This is a Demo Test</h2>
                          <p class="post-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tristique placerat facilisis. Quisque id erat a nibh hendrerit venenatis id eget arcu. Proin sollicitudin id dui eget ultricies. Duis metus eros, bibendum a auctor
                              nec, eleifend id elit. Nunc eget orci ante. Mauris consequat, velit sit amet aliquam commodo, ligula enim euismod lorem, eu interdum justo lorem nec diam. Maecenas bibendum mauris at nulla faucibus, at scelerisque ex lacinia.
                              Praesent ac turpis volutpat, hendrerit turpis quis, tristique mauris. Praesent at elementum est, ut porta mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut enim diam, varius id faucibus vitae, sagittis sed
                              diam. Proin id eros vitae nulla semper tempus. Pellentesque sollicitudin lectus diam, lacinia porta sapien hendrerit sed. Aliquam id lectus a sem varius porttitor ac ac metus. Aliquam quis pellentesque ligula, a convallis magna.
                              Vestibulum nec diam quis justo porta fringilla at non urna.</p>
                      </a>
                      <p class="post-meta">Posted by&nbsp;<a href="#">Will Roberts</a></p>
                  </div>
              </div>
          </div>
      </div>
      <footer>
          <div class="container">
              <div class="row">
                  <div class="col-md-10 col-lg-8 mx-auto">
                      <p class="text-muted copyright">Copyright&nbsp;©&nbsp;Brand 2020</p>
                  </div>
              </div>
          </div>
      </footer>
      <!-- All required scripts -->
      <script src="js/bootstrap.js"></script>
      <script src="js/jquery.min.js"></script>
      <script src="js/clean-blog.js"></script>

  </body>


  </body>
</html>
