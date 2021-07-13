
<div class="col-lg-2" style="margin: 0px; padding: 0px;">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0" style="margin: 0px; padding: 0px;background: #6d824a; height:  800px;">
            <div class="container-fluid d-flex flex-column p-0">
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/student"><i class="fas fa-tachometer-alt" style="font-size: 22px; margin: 5px;"></i>
                      <span>Dashboard</span></a>
                            <a class="nav-link" href="/student/explore"><i class="fas fa-list" style="font-size: 20px;margin: 5px;"></i><span>Explore Courses</span></a>
                            <a class="nav-link" href="/student/courses-in-progress"><i class="fas fa-info-circle" style="font-size: 20px;margin: 5px;"></i><span>Courses in Progress</span></a>
                            <a class="nav-link" href="/student/account/ {{ Auth::user()->id }}"><i class="fas fa-cogs" style="font-size: 20px;margin: 5px;"></i><span>Account Settings</span></a>
                            <a class="nav-link" href="/student/terms-and-conditions"><i class="fas fa-users-cog" style="font-size: 20px;margin: 5px;"></i><span> Terms and Cond</span></a>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
    </nav>
</div>