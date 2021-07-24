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
                    <h1 class="h3 mb-4 text-gray-800">รายการของที่ต้องการเบิก</h1>
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">กรุณาคลิกที่ปุ่มเพื่อนทำรายการ</h6>
                                </div>
                                <div class="card-body">
                                    <a href="form-takeSouvenir.php" class="btn btn-info btn-icon-split btn-lg">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-cart-plus"></i>
                                        </span>
                                        <span class="text">เพิ่มรายการเบิก</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    //ดึงรายการจองที่กำลังทำ
                    $sql_showtake=mysql_query("SELECT * FROM tb_detailtakesouvenir WHERE take_session='$sess_id'");
                    $record_showtake=mysql_fetch_array($sql_showtake);
                    if($record_showtake != '')
                    {
                    ?>
                    <!-- DataTales -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ข้อมูลรายการของ</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>รายการ</th>
                                            <th>จำนวน</th>                            
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>รายการ</th>
                                            <th>จำนวน</th>                                            
                                            <th>ลบ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php  
                                    $i=0;
                                    $sql_show=mysql_query("SELECT * FROM tb_detailtakesouvenir LEFT JOIN tb_souvenir ON tb_detailtakesouvenir.ref_sou_id=tb_souvenir.sou_id WHERE take_session='$sess_id'");
                                    while($result_show=mysql_fetch_array($sql_show)){
                                        $i=$i+1;
                                    ?>
                                        <tr>
                                            <td><?php echo $result_show['sou_name'] ?></td>
                                            <td><?php echo $result_show['take_quantity'] ?></td>                                            
                                            <td>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $result_show['sou_id'];?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>         
                                            </td>
                                        </tr>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="DeleteModal-<?php echo $result_show['sou_id'];?>" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="DeleteModalLabel">ยืนยันการลบข้อมูล</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">ท่านแน่ใจแล้วใช่มั้ยที่จะลบข้อมูล <?php echo $result_show['sou_name']; ?></div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="del-detailtakeSouvenir.php?DellsouID=<?php echo $result_show['sou_id']; ?>">Confirm</a>
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
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <a href="del-detailtakeSouvenir.php?DellsouID=" class="btn btn-danger btn-icon-split btn-lg" onclick="return confirm('คุณแน่ใจแล้วใช่มั้ยที่จะลบทุกรายการ')">
                                <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                                </span>
                                <span class="text">ลบทุกรายการ</span>
                            </a>
                        </div>
                    </div>        
                <?php } ?>	
                                            
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

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