
<div class="col-lg-2" style="margin: 0px; padding: 0px;">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion p-0" style="background: #6d824a; height:  800px;  -webkit-box-shadow: 22px 3px 61px -55px rgba(109,130,74,0.57);
-moz-box-shadow: 22px 3px 61px -55px rgba(109,130,74,0.57); box-shadow: 22px 3px 61px -55px rgba(109,130,74,0.57);">
            <div class="container-fluid d-flex flex-column p-0"  style="padding-top: 10px;">               
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="/{{ Auth::user()->account_type }}"><i class="fas fa-tachometer-alt" style="font-size: 22px; margin-right: 5px;"></i>
                      <span>Dashboard</span></a>
                            <a class="nav-link" href="/teacher/courses"><i class="fas fa-user" style="font-size: 20px; margin-right: 5px;"></i><span>Courses</span></a>
                            <a class="nav-link" href="/teacher/courses-taught"><i class="fas fa-list" style="font-size: 20px; margin-right: 5px;"></i><span>Courses Taught</span></a>
                            <a class="nav-link" href="/teacher/assignments"><i class="fas fa-pen" style="font-size: 20px; margin-right: 5px;"></i><span>Assignments</span></a>
                            <a class="nav-link" href="/teacher/groups"><i class="fas fa-users" style="font-size: 20px; margin-right: 5px;"></i><span>Groups</span></a>
                            <a class="nav-link" href="/teacher/grade_books"><i class="fas fa-book" style="font-size: 20px; margin-right: 5px;"></i><span>Grade Books</span></a>
                            <a class="nav-link" href="/teacher/announcements"><i class="fas fa-info-circle" style="font-size: 20px; margin-right: 5px;"></i><span>Announcements</span></a>
                            <a class="nav-link" href="/teacher/account/ {{ Auth::user()->id }}"><i class="fas fa-cogs" style="font-size: 20px; margin-right: 5px;"></i><span>Account Settings</span></a>
                            <a class="nav-link" href="/teacher/terms-and-conditions"><i class="fas fa-users-cog" style="font-size: 20px; margin-right: 5px;"></i><span>Terms and Conditions</span></a>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
    </nav>
</div>