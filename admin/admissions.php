<?php 

    session_start();
    include('./controllers/dbcon.php');
    include('./controllers/patientCon.php');

    // if(!isset($_SESSION['username'])){
    //     echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    // }

    //get employees
    $sql = "select p.patid, fname, lname, email, phone, gender, natid, v.status from patients as p, visits as v where p.patid = v.patid and v.status = 'active'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();

    $sql2 = "SELECT * FROM patients WHERE status != 'deleted'";
    $statement2 = $db->prepare($sql2);
    $statement2->execute();
    $result2 = $statement2->fetchAll();
    
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
                    <h1 class="h3 mb-4 text-gray-800">Admissions</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Active Visits List</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-sm btn-outline-primary" data-target="#patient" data-toggle="modal" >
                                        <i class="fa fa-plus"></i> &nbsp;&nbsp; Add Patient
                                    </button>
                                    &nbsp;&nbsp;
                                    <button class="btn btn-sm btn-outline-primary" data-target="#book" data-toggle="modal" >
                                        <i class="fa fa-plus"></i> &nbsp;&nbsp; Book Visit
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Patient ID</th>
                                            <th>Name</th>
                                            <th>National ID</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $r) {
                                            ?>
                                            <tr>
                                                <td><?php echo $r['patid']; ?></td>
                                                <td><?php echo $r['fname'] . ' '.$r['lname'] ; ?></td>
                                                <td><?php echo $r['natid']; ?></td>
                                                <td><?php echo $r['email']; ?></td>
                                                <td><?php echo $r['gender']; ?></td>
                                                <td><?php echo $r['phone']; ?></td>
                                                <td>
                                                    <span class="text-danger" data-target="#docs" data-toggle="modal" data-myid="<?php echo $r['patid']; ?>">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <div class="modal fade" id="docs">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Discharge Patient</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <div align="center">
                                    <h3>Confirm Discharge Patient.?</h3>
                                    <input type="text" class="form-control" id="myId2" name="patid" style="display:none;">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-sm btn-danger" type="submit" name="addDis" class="form-control">Discharge</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="book">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Book Patient Visit</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                Patient <br>
                                                <select id="patList" name="patid" required class="form-control w-100">
                                                    <option value="" selected disabled>choose...</option>
                                                    <?php foreach ($result2 as $r) {
                                                        ?>
                                                        <option value="<?php echo $r['patid']; ?>"><?php echo $r['patid']. " - ", $r['fname'] . ' '.$r['lname']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                        <button type="submit" name="addVis" class="btn btn-sm btn-primary">
                                            Book Patient
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="patient">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Patient</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <fieldset>
                                    <div class="row">                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Firstname
                                                <input type="text" name="fname" required placeholder="Firstname" class="form-control">
                                                <input type="text" name="returnUrl" value="admissions.php" hidden class="form-control">
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                Address
                                                <input type="text" name="address" required placeholder="Address" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                Next of Kin Name
                                                <input type="text" name="kname" required placeholder="Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                Next of Kin Email
                                                <input type="email" name="kemail" required placeholder="Email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                Next of Kin Phone
                                                <input type="text" name="kphone" required placeholder="Phone Number" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="text-center">
                                        <button type="reset" class="btn btn-sm btn-danger">Reset</button>
                                        <button type="submit" name="addPat" class="btn btn-sm btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- Footer -->
            <?php include('./includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <?php include('./includes/scripts.php'); ?>

    <script>
        $(document).ready(function() {
            $('#patList').select2();
        });

        $("#docs").on('show.bs.modal', function (e) {
            
            var Id = $(e.relatedTarget).data('myid');

            // console.log(obj);
			$('#myId2').val(Id);
        });
    </script>

</body>

</html>