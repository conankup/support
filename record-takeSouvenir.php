<?php include"chk_user.php"; ?>
<?php
$uid=$_SESSION['ses_uid'];
$sqlUser=mysql_query("SELECT * FROM tb_users WHERE user_id='$uid'");
$resultUser=mysql_fetch_array($sqlUser);

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
                    <h1 class="h3 mb-4 text-gray-800">ประวัติการเบิกของ</h1>              

                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ข้อมูลรายการของ <?php echo $resultUser['name'];  ?> &nbsp; <?php echo $resultUser['lastname'];  ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>เลขที่รายการเบิก</th>
                                            <th>วันที่ทำรายการ</th>                            
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>เลขที่รายการเบิก</th>
                                            <th>วันที่ทำรายการ</th>                            
                                            <th>สถานะ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        //SELECT * FROM tb_takesouvenir RIGHT JOIN tb_detailtakesouvenir ON tb_takesouvenir.take_id = tb_detailtakesouvenir.take_id RIGHT JOIN tb_souvenir ON tb_detailtakesouvenir.ref_sou_id = tb_souvenir.sou_id
                                        $show_takeSouvenir = mysql_query("SELECT * FROM tb_takesouvenir  WHERE ref_user_id = '$uid'");
                                        while($result_takeSouvenir=mysql_fetch_array($show_takeSouvenir)){
                                        $takeStatus = $result_takeSouvenir['take_status'];      
                                        if($takeStatus == '1'){
                                            $textStatus = "รอดำเนินการ";
                                            $btColor = "warning";
                                        }else if($takeStatus == '2'){
                                            $textStatus = "ดำเนินการสำเร็จ";
                                            $btColor = "success";
                                        }else if($takeStatus == '0'){
                                            $textStatus = "ยกเลิกรายการ";
                                            $btColor = "danger";
                                        }
                                        $TakeID = $result_takeSouvenir['take_id'];
                                    ?>
                                        <tr>
                                            <td><a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#showDetail-<?php echo $TakeID;?>"><?php echo $TakeID; ?></a></td>
                                            <td><?php echo $result_takeSouvenir['take_date']; ?></td>                                            
                                            <td><button type="button" class="btn btn-<?php echo $btColor; ?> btn-block"><?php echo $textStatus; ?></button></td>
                                        </tr>


                                        <!-- Delete showDetailtakeSou-->
                                        <?php
                                            $sqlshowlist = mysql_query("SELECT * FROM tb_detailtakesouvenir RIGHT JOIN tb_souvenir ON tb_detailtakesouvenir.ref_sou_id = tb_souvenir.sou_id WHERE take_id ='$TakeID'");
                                        ?>
                                        <div class="modal fade" id="showDetail-<?php echo $TakeID;?>" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="DeleteModalLabel">รายละเอียดรายการที่เบิก</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php  
                                                        while($result_showlist=mysql_fetch_array($sqlshowlist)){
                                                        ?>
                                                            <?php echo $result_showlist['sou_name']; ?> : <?php echo $result_showlist['take_quantity'];?><br>
                                                        <?php } ?>
                                                                                                 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>                                                        
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