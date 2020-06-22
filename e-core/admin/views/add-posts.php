<?php # e-core/admin/views/add-posts.php

//security check
defined('CHECK_SECURE_ENVOI') or die("Please return to the main page.");

echo "Add Posts" . BR . BR;

echo "<a href=" . $conf_site_url . "admin/add-post/" . ">Add Posts</a>"  . BR;
echo "<a href=" . $conf_site_url . "admin/edit-post/" . ">Edit Posts</a>" . BR;
echo "<a href=" . $conf_site_url . "admin/profile/" . ">Profile Posts</a>" . BR;
echo "<a href=" . $conf_site_url . "admin/settings/" . ">Settings Posts</a>" . BR;
echo "<a href=" . $conf_site_url . "admin/view-posts/" . ">View Posts</a>" . BR;
echo "<a href=" . $conf_site_url . "admin/dashboard/" . ">Dashboard</a>" . BR;
echo "<a href=" . $conf_site_url . ">View Site</a>" . BR;

?>