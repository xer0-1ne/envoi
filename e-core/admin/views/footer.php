<?php # e-core/admin/views/footer.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

$admin->create_straight_node('script', ['src'=> DIR_BASE_JS . "jquery.min.js" ]);
$admin->create_straight_node('script', ['src'=> DIR_BASE_JS . "bootstrap.min.js" ]);
$admin->create_straight_node('script', ['src'=> DIR_BASE_JS . "theme.js" ]);

$admin->close_node('body');
$admin->close_node('html');
?>