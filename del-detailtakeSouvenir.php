<?php include"chk_user.php"; ?>
<?php
$SOUID = $_GET['DellsouID'];

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
            <?php
               if(empty($SOUID)) 
            {
                //ลบทั้งหมด
                $sql_delAll=mysql_query("DELETE FROM tb_detailtakesouvenir");
                if($sql_delAll){
            ?>
                <!-- ข้อความแจ้งเตือนการบันทึกข้อมูล -->
                    <div class="col-xl-6 col-md-6">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h3 mb-0 font-weight-bold text-success">
                                                ลบข้อมูลสำเร็จ
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <meta http-equiv="refresh" content="2;URL=tack-Souvenir.php">	
            <?php
                }else{
            ?>
                    <!-- ข้อความแจ้งเตือนการบันทึกข้อมูล -->
                    <div class="col-xl-6 col-md-6">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h3 mb-0 font-weight-bold text-danger">
                                                เกิดข้อผิดพลาดระบบไม่สามารถลบข้อมูลได้
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            
            <?php  
                    } 
            }else{ 
            //ลบทีละรายการ 
                $sql_del=mysql_query("DELETE FROM tb_detailtakesouvenir WHERE ref_sou_id='$SOUID'");
                if($sql_del){
            ?>
                <!-- ข้อความแจ้งเตือนการบันทึกข้อมูล -->
                <div class="col-xl-6 col-md-6">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 mb-0 font-weight-bold text-success">
                                        ลบข้อมูลสำเร็จ
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <meta http-equiv="refresh" content="2;URL=tack-Souvenir.php">	
                <?php
                }else{
                ?>
                <!-- ข้อความแจ้งเตือนการบันทึกข้อมูล -->
                <div class="col-xl-6 col-md-6">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h3 mb-0 font-weight-bold text-danger">
                                    เกิดข้อผิดพลาดระบบไม่สามารถลบข้อมูลได้
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            <?php
                }
            } exit();
            ?>
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

</body>

</html>