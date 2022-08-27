<?php 
    if(!isset($_REQUEST['id'])){
        exit("Error: No reference found");
    }
    else{
        $ref = $_REQUEST['id'];
    }

    session_start();
    include('./controllers/dbcon.php');
    include('./controllers/patientCon.php');

    // if(!isset($_SESSION['username'])){
    //     echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    // } 

    $sql = "SELECT * FROM patients WHERE id='".$ref."'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    if(sizeof($result) > 0){
        $r = $result[0];
    }
    else{
        $_SESSION['errorMessage'] = 'Patient Not Found';
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
                    <h4 class="mb-4 text-gray-800">Patients</h4>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Create New Patient</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                                if($_SESSION['errorMessage'] ?? "" != ""){
                            ?>
                                <div class="alert alert-danger">
                                    <?php echo $_SESSION['errorMessage']; $_SESSION['errorMessage'] = null; ?>
                                </div>
                                <br>
                            <?php } ?>
                            <form method="post">
                                <fieldset>
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Firstname
                                                <input type="text" name="fname" value="<?php echo $r['fname']; ?>" required placeholder="Firstname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Lastname
                                                <input type="text" name="lname" value="<?php echo $r['lname']; ?>" required placeholder="Lastname" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                National Id
                                                <input type="text" name="natid" value="<?php echo $r['natid']; ?>" required placeholder="National Id" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Email
                                                <input type="email" name="email" value="<?php echo $r['email']; ?>" required placeholder="Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Phone Number
                                                <input type="text" name="phone" value="<?php echo $r['phone']; ?>" required placeholder="Phone Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Gender
                                                <select name="gender" value="<?php echo $r['gender']; ?>" required class="form-control">
                                                    <option value="" selected disabled>choose...</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                Address
                                                <input type="text" value="<?php echo $r['address']; ?>" name="address" required placeholder="Address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                Next of Kin Name
                                                <input type="text" value="<?php echo $r['kin_name']; ?>" name="kname" required placeholder="Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                Next of Kin Email
                                                <input type="email" value="<?php echo $r['kin_email']; ?>" name="kemail" required placeholder="Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                Next of Kin Phone
                                                <input type="text" value="<?php echo $r['kin_phone']; ?>" name="kphone" required placeholder="Phone Number" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                        <button type="submit" name="editPat" class="btn btn-sm btn-primary">
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