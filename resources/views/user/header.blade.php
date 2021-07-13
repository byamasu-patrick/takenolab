
<div class="col-lg-2">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0" style="background: #6d824a; height:  800px;">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-university" style="font-size: 34px;"></i></div>
                  
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="acceuil.php"><i class="fas fa-tachometer-alt" style="font-size: 22px;"></i>
                      <span>Dashboard</span></a>
                            <a class="nav-link" href="/user/courses"><i class="fas fa-user" style="font-size: 20px;"></i><span>Courses</span></a>
                            <a class="nav-link" href="/user/courses-taught"><i class="fas fa-usd" style="font-size: 20px;"></i><span>Courses Taught</span></a>
                            <a class="nav-link" href="/user/account/ {{ Auth::user()->id }}"><i class="fas fa-blind" style="font-size: 20px;"></i><span>Account Settings</span></a>
                            <a class="nav-link" href="/user/terms-and-conditions"><i class="fas fa-users-cog" style="font-size: 20px;"></i><span>Terms and Conditions</span></a>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
    </nav>
</div>