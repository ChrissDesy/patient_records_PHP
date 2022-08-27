<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PMS Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Operations
    </div>
    
    <!-- Nav Item - Admissions -->
    <li class="nav-item">
        <a class="nav-link" href="admissions.php">
            <i class="fas fa-fw fa-user-check"></i>
            <span>Admissions</span></a>
    </li>

    <!-- Nav Item - Prechecks -->
    <li class="nav-item">
        <a class="nav-link" href="prechecks.php">
            <i class="fas fa-fw fa-user-nurse"></i>
            <span>Pre-Checks</span></a>
    </li>

    <!-- Nav Item - consultation -->
    <li class="nav-item">
        <a class="nav-link" href="consultation.php">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Consultations</span></a>
    </li>

    <!-- Nav Item - specialists -->
    <li class="nav-item">
        <a class="nav-link" href="specialist.php">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Specialist</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administration
    </div>

    <!-- Nav Item - Users-->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management:</h6>
                <a class="collapse-item" href="new-user.php">New User</a>
                <a class="collapse-item" href="users.php">All Users</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Patients -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
            aria-expanded="true" aria-controls="collapsePages2">
            <i class="fas fa-fw fa-user-injured"></i>
            <span>Patients</span>
        </a>
        <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Management:</h6>
                <a class="collapse-item" href="new-patient.php">New Patient</a>
                <a class="collapse-item" href="patients.php">All Patient</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>