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
                    <h1 class="h3 mb-4 text-gray-800">จัดการข้อมูลลายเซ็นหัวหน้าส่วน</h1>
                    
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">รายชื่อหัวหน้าส่วน</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ชื่อ - สกุล</th>
                                            <th>ส่วนงาน</th>
                                            <th>ลายเซ็น</th>                            
                                            <th>Upload ลายเซ็น</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>รายการ</th>
                                            <th>ส่วนงาน</th>
                                            <th>ลายเซ็น</th>                                            
                                            <th>Upload ลายเซ็น</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php                                       
                                       $show_User = mysql_query("SELECT * FROM tb_users JOIN tb_job ON tb_users.ref_job_id = tb_job.job_id JOIN tb_sector ON tb_job.ref_sector_id = tb_sector.sector_id JOIN tb_signature ON tb_users.user_id = tb_signature.user_id WHERE privilage='5'");
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
                                            <td><img src="img/<?php echo $result_User['sig_img']  ?>" alt=""></td>                                       
                                            <td>
                                                <a href="form-Signature.php?UID=<?php echo $result_User[user_id] ?>" class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-image"></i>
                                                </a>
                                            </td>
                                        </tr>                                 

                                        
                                    <?php }?>                                                                                                                                                    
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