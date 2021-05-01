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

    <!-- DatePicker -->
    <script src="js/picker_dateTH.js"></script>
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
                    <h1 class="h3 mb-4 text-gray-800">แบบฟอร์มขอรับบริการส่วนส่งเสริมและบริการ</h1>
                    <div class="row">

                        <div class="col-lg-4">
                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">กรุณาใส่ข้อมูลให้ครบถ้วนก่อนคลิกปุ่ม ยืนยัน</h6>
                                </div>
                                <div class="card-body">
                                    <form class="user" method="POST" action="save_leader.php">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="exampleFormControlSelect1">เลือกส่วนงาน</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>ส่วนอำนวยการ</option>
                                                    <option>ส่วนวิชาการ</option>
                                                    <option>ส่วนท้องฟ้าจำลอง</option>
                                                    <option>ส่วนอาคารสถานที่</option>
                                                    <option>ส่วนส่งเสริมและบริการ</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <label for="exampleFormControlSelect1">เลือกงาน</label>
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>งาน1</option>
                                                    <option>งาน2</option>
                                                    <option>งาน3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <input type="text" class="form-control" id="PositionLeader" name="PositionLeader"
                                                    placeholder="ชื่อหรือหัวข้องาน" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label for="exampleFormControlTextarea1">รายละเอียด</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 mb-3 mb-sm-0">
                                                <label for="exampleFormControlTextarea1">กำหนดวันที่แล้วเสร็จ</label>                                              
                                                <input id="dateJobEnd" name="dateJobEnd" class="form-control" required />
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" >ยืนยัน</button>                                                     
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

    <script>
       //กำหนดให้ textbox ที่มี id เท่ากับ my_date เป็นตัวเลือกแบบ ปฎิทิน
        picker_date(document.getElementById("dateJobEnd"),{year_range:"0:+1"});
        /*{year_range:"-12:+10"} คือ กำหนดตัวเลือกปฎิทินให้ แสดงปี ย้อนหลัง 12 ปี และ ไปข้างหน้า 10 ปี*/
    </script>
</body>

</html>