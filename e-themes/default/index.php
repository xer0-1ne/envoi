<?php # e-themes/default/index.php

    //create header
    $header = new htmlHeader();

    //build header
    $header->new_header($var_header_info);
    $header->add_stylesheet(DIR_BASE_CSS . $var_base_bootstrap_css);
    $header->add_stylesheet(URL_CURRENT_THEME_CSS . $var_style);
  


    echo "Theme Works....";

?>


