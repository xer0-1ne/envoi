<?php # e-core/admin/views/footer.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

$admin->create_tag('script', ['src'=> DIR_BASE_JS . "jquery.min.js" ]);
$admin->close_tag('script');
$admin->create_tag('script', ['src'=> DIR_BASE_JS . "bootstrap.min.js" ]);
$admin->close_tag('script');
$admin->create_tag('script', ['src'=> DIR_BASE_JS . "theme.js" ]);
$admin->close_tag('script');

$admin->close_tag('body');
$admin->close_tag('html');
?>