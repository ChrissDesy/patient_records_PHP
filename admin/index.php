<?php 
    session_start();

    include('./controllers/dbcon.php');

    if(!isset($_SESSION['username'])){
        echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    }

    //get employees
    $sql = "select p.patid, fname, lname, email, phone, gender, natid, v.status, stage from patients as p, visits as v where p.patid = v.patid and v.status = 'active'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    $sql2 = "
        SELECT
            (SELECT COUNT(*) FROM users) AS users,
            (SELECT COUNT(*) FROM patients) AS patients,
            (SELECT COUNT(*) FROM visits WHERE STATUS='active') AS visits,
            (SELECT COUNT(*) FROM prescription WHERE status = 'active') AS presc
    ";
    $statement2 = $db->prepare($sql2);
    $statement2->execute();
    $stats = $statement2->fetchAll();
    
    include('./includes/header.php'); 
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('./includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('./includes/navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Patients </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats[0]['patients']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-injured fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Active Visits </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats[0]['visits']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-list-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Active Prescriptions
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $stats[0]['presc']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                System Users</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats[0]['users']; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Active Patients Visits</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Patient ID</th>
                                                    <th>Name</th>
                                                    <th>National ID</th>
                                                    <th>Gender</th>
                                                    <th>Phone</th>
                                                    <th>Stage</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $r) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $r['patid']; ?></td>
                                                        <td><?php echo $r['fname'] . ' '.$r['lname'] ; ?></td>
                                                        <td><?php echo $r['natid']; ?></td>
                                                        <td><?php echo $r['gender']; ?></td>
                                                        <td><?php echo $r['phone']; ?></td>
                                                        <td><?php echo $r['stage']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <div class="card-footer text-right">
                                    <span class="text-secondary">
                                        <i class="fa fa-list"></i> &nbsp;&nbsp; Manage Admissions
                                    </span>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('./includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include('./includes/scripts.php'); ?>

</body>

</html>