<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion admin-navbar-dark p-0 navbar-custom">
    <div class="admin-navbar-dark sidebar-dark accordion">
        <div class="list-group list-group-flush flex-column">

            <!-- Title of NavBar -->
            <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                <div class="sidebar-brand-text mx-3"><span>
                        <h4>Admin</h4>
                    </span></div>
            </a>
            <!-- Navbar Items -->
            <ul class="nav navbar-nav" id="accordionSidebar">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="<?php echo $site_url; ?>">
                        <i class="pr-1 fas fa-home"></i><span>Home</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="index.php">
                        <i class="pr-1 fas fa-columns"></i><span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="admin-add-content.php">
                        <i class="pr-1 fas fa-plus-square"></i><span>Add Content</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="admin-posts.php">
                        <i class="pr-1 fas fa-file"></i><span>Posts</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="admin-pages.php">
                        <i class="pr-1 fas fa-file-alt"></i><span>Pages</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="admin-uploads.php">
                        <i class="pr-1 fas fa-file-upload"></i><span>Uploads</span>
                    </a>
                </li>
                <hr>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="admin-settings.php">
                        <i class="pr-1 fas fa-cogs"></i><span>Settings</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="admin-profile.php">
                        <i class="pr-1 fas fa-user"></i><span>Profile</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="#">
                        <i class="pr-1 fas fa-sign-out-alt"></i><span>Log Out</span>
                    </a>
                </li>
            </ul>

            <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        </div>
    </div>
</nav>