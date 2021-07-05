<?php include"chk_user.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php include "text_title.php"; ?>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@200;300;400;500;600&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">        
        <?php
            include "mainmenu.php";
        
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include "topbar.php"; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">จัดการข้อมูลหัวหน้าส่วน</h1>
                    
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายการผู้ใช้งาน</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ - สกุล</th>
                                            <th>ส่วนงาน</th>
                                            <th>สถานะสิทธิ์</th>                            
                                            <th>ให้สิทธิ์หัวหน้าส่วน</th>
                                            <th>ยกเลิกสิทธิ์</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>รายการ</th>
                                            <th>ส่วนงาน</th>
                                            <th>สถานะสิทธิ์</th>                                            
                                            <th>ให้สิทธิ์หัวหน้าส่วน</th>
                                            <th>ยกเลิกสิทธิ์</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                       // $show_User = mysql_query("SELECT * FROM tb_users LEFT JOIN tb_job ON tb_users.ref_job_id = tb_job.job_id");
                                       $show_User = mysql_query("SELECT * FROM tb_users JOIN tb_job ON tb_users.ref_job_id = tb_job.job_id JOIN tb_sector ON tb_job.ref_sector_id = tb_sector.sector_id");
                                        while($result_User=mysql_fetch_array($show_User)){

                                        $statusPrivilage = $result_User['privilage'];
                                        if($statusPrivilage == 5){
                                            $fasPrivilage = "<a href='#' class='btn btn-success btn-circle btn-sm' disable>
                                            <i class='fas fa-user-shield'></i></a>";
                                        
                                        }else{
                                            $fasPrivilage = "<a href='#' class='btn btn-primary btn-circle btn-sm'>
                                            <i class='fas fa-user-shield'></i></a>";
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $result_User['name']; ?>&nbsp;&nbsp;&nbsp;<?php echo $result_User['lastname']; ?></td>
                                            <td><?php echo $result_User['sector_name']; ?></td>     
                                            <td><?php echo $fasPrivilage; ?></td>                                       
                                            <td>
                                                <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#ChangModal-<?php echo $result_User['user_id'];?>">
                                                    <i class="fas fa-user-shield"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $result_User['user_id'];?>">
                                                    <i class="fas fa-user-shield"></i>
                                                </a>         
                                            </td>
                                        </tr>
                                        <!-- Chang Modal-->
                                        <div class="modal fade" id="ChangModal-<?php echo $result_User['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="ChangModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="DeleteModalLabel">ยืนยันการให้สิทธิ์หัวหน้าส่วน</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">ท่านแน่ใจแล้วใช่มั้ยที่จะให้สิทธิ์หัวหน้าส่วนแก่ <?php echo $result_User['name']; ?>&nbsp;&nbsp;&nbsp;<?php echo $result_User['lastname'];  ?></div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="changPrivilage.php?UID=<?php echo $result_User['user_id']; ?>">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="DeleteModal-<?php echo $result_User['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="DeleteModalLabel">ยืนยันการกยกเลิกสิทธิ์หัวหน้าส่วน</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">ท่านแน่ใจแล้วใช่มั้ยที่จะยกเลิกสิทธิ์หัวหน้าส่วน <?php echo $result_User['name']; ?>&nbsp;&nbsp;&nbsp;<?php echo $result_User['lastname'];  ?></div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="changLeader.php?chLeader=<?php echo $result_User['user_id']; ?>">Confirm</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>                                                                                                                                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End DataTales -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "footer.php";  ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Include Modal logout -->
    <?php include "modalLogout.php" ?>
    
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>