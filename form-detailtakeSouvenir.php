<?php include"chk_user.php"; ?>
<?php
$souid=$_GET['souID'];
$show_Souvenir = mysql_query("SELECT * FROM tb_souvenir");
$result_Souvenir=mysql_fetch_array($show_Souvenir);
?>
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
                    <h1 class="h3 mb-4 text-gray-800">จัดการข้อมูลรายการของที่สามารถเบิกได้</h1>
                    <div class="row">

                        <div class="col-lg-4">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">กรุณาใส่ข้อมูลให้ครบถ้วนก่อนคลิกปุ่ม บันทึก</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="save-detailtakeSouvenir.php">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="souName" name="souName"
                                                value="<?php echo $result_Souvenir["sou_name"]; ?>"  disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">                                            
                                            <div class="col-sm-3 mb-3 mb-sm-0">
                                                <lable for="souNumber">จำนวนคงเหลือ</lable>
                                                <input type="number" class="form-control form-control-user" id="souNumber" name="souNumber"
                                                value="<?php echo $result_Souvenir["sou_number"]; ?>" disabled>                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-4 mb-3 mb-sm-0">
                                                <lable for="quantity">จำนวนที่ต้องการเบิก</lable>
                                                <input type="number" class="form-control form-control-user" id="quantity" name="quantity" required>
                                            </div>
                                        </div>
                                        <input type="hidden" name="oldSouid" value="<?php echo $souid; ?>">
                                        <input type="hidden" name="oldNumber" value="<?php echo $result_Souvenir["sou_number"]; ?>">
                                        <a href="form-takeSouvenir.php" class="btn btn-google btn-user btn-block"><i class="fas fa-undo-alt"></i>
                                        ย้อนกลับ</a>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" >บันทึก</button>                                                     
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
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