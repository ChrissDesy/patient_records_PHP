<?php 

    session_start();
    include('./controllers/dbcon.php');
    include('./controllers/patientCon.php');

    if(!isset($_SESSION['username'])){
        echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    }

    //get employees
    $sql = "select r.id as ref, fname, lname, v.date as vdate, p.patid, v.id as vid, r.date as pdate, r.done_by, r.description 
            from patients as p, visits as v, prescription as r 
            where p.patid = r.patid 
            and v.id = r.visitid
            and r.status = 'active'";
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
                    <h1 class="h3 mb-4 text-gray-800">Pharmacy</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Active Prescription List</h6>
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
                                            <th>Reference</th>
                                            <th>Date</th>
                                            <th>Visit ID</th>
                                            <th>Visit Date</th>
                                            <th>Patient ID</th>
                                            <th>Name</th>
                                            <th>Done By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $r) {
                                            $nam = $r['fname'] . ' '.$r['lname'];
                                            ?>
                                            <tr>
                                                <td><?php echo $r['ref']; ?></td>
                                                <td><?php echo $r['pdate']; ?></td>
                                                <td><?php echo $r['vid']; ?></td>
                                                <td><?php echo $r['vdate']; ?></td>
                                                <td><?php echo $r['patid']; ?></td>
                                                <td><?php echo $nam ; ?></td>
                                                <td><?php echo $r['done_by']; ?></td>
                                                <td>
                                                    <span class="text-primary" data-target="#precheck" data-toggle="modal" data-myname="<?php echo $nam; ?>" data-mydat="<?php echo $r['pdate']; ?>" data-myid="<?php echo $r['ref']; ?>" data-mydesc="<?php echo $r['description']; ?>">
                                                        <i class="fa fa-file-medical"></i>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Approve Patient Prescription</h4>
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
                                                Prescription ID
                                                <input type="text" id="myId2" name="ref" required readonly class="form-control">
                                            </div>
                                        </div>                                       
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                Prescription Date
                                                <input type="text" id="myDat2" readonly class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                Patient Name
                                                <input type="text" id="myName2" readonly  class="form-control">
                                            </div>
                                        </div> 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                Notes
                                                <textarea id="myDesc2" cols="30" class="form-control" rows="6" placeholder="Type here..." readonly></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                Dispense Prescription
                                                <select name="status" class="form-control" required>
                                                    <option value="" selected disabled>choose...</option>
                                                    <option value="approve">Approve</option>
                                                    <option value="denied">Deny</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="text-center">
                                        <button type="submit" name="addDisp" class="btn btn-sm btn-primary">
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
            var Dat = $(e.relatedTarget).data('mydat');
            var Name = $(e.relatedTarget).data('myname');
            var Desc = $(e.relatedTarget).data('mydesc');

            // console.log(obj);
			$('#myId2').val(Id);
			$('#myName2').val(Name);
			$('#myDat2').val(Dat);
			$('#myDesc2').val(Desc);
        });

    </script>

</body>

</html>