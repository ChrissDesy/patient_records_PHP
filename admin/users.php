<?php 

    session_start();
    include('./controllers/dbcon.php');
    include('./controllers/usersCon.php');

    // if(!isset($_SESSION['username'])){
    //     echo "<script type='text/javascript'> document.location ='./controllers/logout.php'; </script>";
    // }

    //get employees
    $sql = "SELECT * FROM users";
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
                    <h1 class="h3 mb-4 text-gray-800">Users</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="./new-user.php" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-plus"></i> &nbsp;&nbsp; Add User
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Name</th>
                                            <th>National ID</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Phone</th>
                                            <th>Type</th>
                                            <th>Department</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $r) {
                                            ?>
                                            <tr>
                                                <td><?php echo $r['uname']; ?></td>
                                                <td><?php echo $r['fname'] . ' '.$r['lname'] ; ?></td>
                                                <td><?php echo $r['natid']; ?></td>
                                                <td><?php echo $r['email']; ?></td>
                                                <td><?php echo $r['gender']; ?></td>
                                                <td><?php echo $r['phone']; ?></td>
                                                <td><?php echo $r['type']; ?></td>
                                                <td><?php echo $r['department']; ?></td>
                                                <td><?php echo $r['status']; ?></td>
                                                <td>
                                                    <a class="text-warning mr-2" href="./edit-user.php?id=<?php echo $r['id']; ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <span class="text-danger" data-target="#docs" data-toggle="modal" data-myid="<?php echo $r['id']; ?>">
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
                            <h4 class="modal-title">Delete Record</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <div align="center">
                                    <h3>Confirm Delete Record.?</h3>
                                    <input type="text" class="form-control" id="myId2" name="id" style="display:none;">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-sm btn-danger" type="submit" name="deleteRec" class="form-control">Delete</button>
                                </div>
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
        $("#docs").on('show.bs.modal', function (e) {
            
            var Id = $(e.relatedTarget).data('myid');

            // console.log(obj);
			$('#myId2').val(Id);
        });
    </script>

</body>

</html>