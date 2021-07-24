<?php include"chk_user.php"; ?>
<?php
$souID = $_POST['oldSouid'];
$souQ = $_POST['quantity'];
$souNum = $_POST['oldNumber'];

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
                    <h1 class="h3 mb-4 text-gray-800">กำลังประมวลผล</h1>
                    <div class="row">

                    <!-- เชคว่ากรอกจำนวนที่เบิกเกินกว่าจำนวนที่มี -->
                    <?php if($souQ <= 0 or $souQ > $souNum) { ?>

                        <div class="col-xl-6 col-md-12 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-6">
                                            <div class="text font-weight-bold text-danger text-uppercase mb-1">
                                                Error</div>
                                            <div class="h2 mb-0 font-weight-bold text-gray-800">กรุณาอย่ากรอกข้อมูลเล่น ใส่จำนวนเท่าที่มีให้เบิกครับ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times fa-2x text-gray-600"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <meta http-equiv="refresh" content="4;URL=tack-Souvenir.php">
                        <!-- จบการเชคว่ากรอกจำนวนที่เบิกเกินกว่าจำนวนที่มี -->
                    <?php }else{ 
                        // ทำการบันทึกรายการของที่ต้องการเบิก
                        $sqlSave = mysql_query("INSERT INTO tb_detailtakesouvenir VALUES ('','$sess_id','$souQ','$souID')");
                            if($sqlSave)
                            {
                    ?>                                       
                            <meta http-equiv="refresh" content="0;URL=tack-Souvenir.php">    
                    <?php   }else{?>
                            <div class="alert alert-danger">
                                <strong>! Error <?php echo $pn; ?> ไม่สามารถทำรายการได้กรุณาทำรายการใหม่อีกครั้ง</strong>
                            </div>					
                            <meta http-equiv="refresh" content="4;URL=tack-Souvenir.php">
                    <?php
                            }
                        }
                    ?>
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