<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion admin-navbar-dark p-0">
    <div class="container-fluid d-flex flex-column p-0">
       
        <!-- Title of NavBar -->
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-text mx-3"><span><?php echo "Admin"; ?></span></div>
        </a>
        <hr class="sidebar-divider my-0">
        
        <!-- Navbar Items -->
        <ul class="nav navbar-nav" id="accordionSidebar">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="index.php">
                    <i class="fas fa-columns"></i><span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="#">
                    <i class="fas fa-file"></i><span>Posts</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="#">
                    <i class="fas fa-file-alt"></i><span>Pages</span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" href="#">
                    <i class="fas fa-file-upload"></i><span>Uploads</span>
                </a>
            </li>
        </ul>
        
        <!-- Navbar collapse button -->
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>