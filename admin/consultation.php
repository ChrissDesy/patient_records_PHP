<?php 

    session_start();
    include('./controllers/dbcon.php');
    include('./controllers/patientCon.php');

    // if(!isset($_SESSION['username'])){
    //     echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    // }

    //get employees
    $sql = "select p.patid, fname, lname, email, phone, gender, natid, v.status, v.id as vid from patients as p, visits as v where p.patid = v.patid and v.status = 'active' and v.stage='precheck'";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    
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
                    <h1 class="h3 mb-4 text-gray-800">Consultations</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Active Visits List</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Visit ID</th>
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
                                            $nam = $r['fname'] . ' '.$r['lname'];
                                            ?>
                                            <tr>
                                                <td><?php echo $r['vid']; ?></td>
                                                <td><?php echo $r['patid']; ?></td>
                                                <td><?php echo $nam ; ?></td>
                                                <td><?php echo $r['natid']; ?></td>
                                                <td><?php echo $r['email']; ?></td>
                                                <td><?php echo $r['gender']; ?></td>
                                                <td><?php echo $r['phone']; ?></td>
                                                <td>
                                                    <span class="text-primary" data-target="#precheck" data-toggle="modal" data-myname="<?php echo $nam; ?>" data-myvid="<?php echo $r['vid']; ?>" data-myid="<?php echo $r['patid']; ?>">
                                                        <i class="fa fa-notes-medical"></i>
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

            <div class="modal fade" id="precheck">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Patient Consultation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    Visit ID
                                                    <input type="text" id="myVid2" name="visit" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    Patient ID
                                                    <input type="text" id="myId2" name="patid" required readonly class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    Patient Name
                                                    <input type="text" id="myName2" readonly  class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Temperature</td>
                                                            <td>
                                                                <span class="float-right">
                                                                    <b id="myTemp"></b>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Blood Pressure</td>
                                                            <td>
                                                                <span class="float-right">
                                                                    <b id="myBlood"></b>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Weight</td>
                                                            <td>
                                                                <span class="float-right">
                                                                    <b id="myWeight"></b>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                                <label>Notes:</label> <br>
                                                <span class="mt-2">
                                                    <b id="myNotes"></b>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        Notes
                                                        <textarea name="desc" cols="30" class="form-control" rows="7" placeholder="Type here..." required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        Prescription (optional)
                                                        <textarea name="prescription" cols="30" class="form-control" rows="5" placeholder="Type here..."></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        Refer to Specialist (optional)
                                                        <select name="refer" class="form-control">
                                                            <option value="" selected disabled>choose...</option>
                                                            <option value="Laboratory">Laboratory</option>
                                                            <option value="Maternity">Maternity</option>
                                                            <option value="Physiotherapy">Physiotherapy</option>
                                                            <option value="Radiograph">Radiograph</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="text-center">
                                        <button type="submit" name="addCon" class="btn btn-sm btn-primary">
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
        $("#precheck").on('show.bs.modal', function (e) {
            
            var Id = $(e.relatedTarget).data('myid');
            var Vid = $(e.relatedTarget).data('myvid');
            var Name = $(e.relatedTarget).data('myname');

            // console.log(obj);
			$('#myId2').val(Id);
			$('#myName2').val(Name);
			$('#myVid2').val(Vid);

            getChecks(Vid);
        });

        function getChecks(ref){
            $.ajax({
                url: './controllers/patient-checks.php',
                method: 'POST',
                data: {vid : ref},
                success: function(res){
                    let resp = JSON.parse(res);
                    // console.log(resp);
                    $('#myTemp').html(resp[0].temprature);
                    $('#myBlood').html(resp[0].blood);
                    $('#myWeight').html(resp[0].weight);
                    $('#myNotes').html(resp[0].other);
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
    </script>

</body>

</html>