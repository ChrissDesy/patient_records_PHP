<?php 

    session_start();
    include('./controllers/dbcon.php');
    include('./controllers/usersCon.php');

    if(!isset($_SESSION['username'])){
        echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    } 
    
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
                    <h4 class="mb-4 text-gray-800">Users</h4>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create New User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post">
                                <fieldset>
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Firstname
                                                <input type="text" name="fname" required placeholder="Firstname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Lastname
                                                <input type="text" name="lname" required placeholder="Lastname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                National Id
                                                <input type="text" name="natid" required placeholder="National Id" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Email
                                                <input type="email" name="email" required placeholder="Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Phone Number
                                                <input type="text" name="phone" required placeholder="Phone Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Gender
                                                <select name="gender" required class="form-control">
                                                    <option value="" selected disabled>choose...</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Department
                                                <select name="dpt" required class="form-control">
                                                    <option value="" selected disabled>choose...</option>
                                                    <option value="Admissions">Admissions</option>
                                                    <option value="Laboratory">Laboratory</option>
                                                    <option value="Maternity">Maternity</option>
                                                    <option value="Pharmacy">Pharmacy</option>
                                                    <option value="Physiotherapy">Physiotherapy</option>
                                                    <option value="Radiograph">Radiograph</option>
                                                    <option value="Staff">Staff</option>
                                                    <option value="System">System</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                User Type
                                                <select name="typ" required class="form-control">
                                                    <option value="" selected disabled>choose...</option>
                                                    <option value="Doctor">Doctor</option>
                                                    <option value="Clerk">Clerk</option>
                                                    <option value="Nurse">Nurse</option>
                                                    <option value="Pharmacy">Pharmacy</option>
                                                    <option value="Specialist">Specialist</option>
                                                    <option value="Admin">System Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Username
                                                <input type="text" name="uname" required placeholder="Username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Password
                                                <input type="password" name="pwd" id="pass1" required placeholder="Password" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                        <button type="submit" name="addRec" class="btn btn-sm btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <!-- /.card-body -->
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