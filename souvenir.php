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
                    <h1 class="h3 mb-4 text-gray-800">จัดการข้อมูลรายการของที่สามารถเบิกได้</h1>
                    <div class="row">

                        <div class="col-lg-4">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">กรุณาใส่ข้อมูลให้ครบถ้วนก่อนคลิกปุ่ม ยืนยัน</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="save-souvenir.php">
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="ProductName" name="ProductName"
                                                    placeholder="ชื่อรายการ" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="number" class="form-control form-control-user" id="ProductNumber" name="ProductNumber"
                                                    placeholder="จำนวน" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" >ยืนยัน</button>                                                     
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

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
                                            <th>แก้ไข</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>รายการ</th>
                                            <th>จำนวน</th>                                            
                                            <th>แก้ไข</th>
                                            <th>ลบ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $show_Product = mysql_query("SELECT * FROM tb_souvenir");
                                        while($result_Product=mysql_fetch_array($show_Product)){
                                    ?>
                                        <tr>
                                            <td><?php echo $result_Product['sou_name'] ?></td>
                                            <td><?php echo $result_Product['sou_number'] ?></td>                                            
                                            <td>
                                                <a href="edit-souvenir.php?PROID=<?php echo $result_Product['sou_id']; ?>" class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-circle btn-sm" data-toggle="modal" data-target="#DeleteModal-<?php echo $result_Product['sou_id'];?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>         
                                            </td>
                                        </tr>
                                        <!-- Delete Modal-->
                                        <div class="modal fade" id="DeleteModal-<?php echo $result_Product['sou_id'];?>" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="DeleteModalLabel">ยืนยันการลบข้อมูล</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">ท่านแน่ใจแล้วใช่มั้ยที่จะลบข้อมูล <?php echo $result_Product['sou_name']; ?></div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                        <a class="btn btn-primary" href="delete-souvenir.php?DellPROID=<?php echo $result_Product['sou_id']; ?>">Confirm</a>
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