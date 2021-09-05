<?php
include "connect.php";
$inputName = $_POST['FirstName'];
$inputLname = $_POST['LastName'];
$inputSectorID = $_POST['sector_id'];
$inputJobID = $_POST['job_id'];
$inputEmail = $_POST['Email'];
$inputInPWD = md5($_POST['InPWD']);
$dateToday = date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="Refresh" content="3; url='forgot-password.html'" />
    <title>ระบบขอใช้บริการส่วนส่งเสริมและบริการ</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">

                <?php
                //##### Check Email same
                $sql_ckEmail = mysql_query("SELECT user_email FROM tb_users WHERE user_email='$inputEmail'");                      
                if (mysql_num_rows($sql_ckEmail) > 0){

                ?>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="alert alert-danger">
                                        <strong>ข้อมูลนี้มีอยู่ในระบบแล้ว</strong> กรุณาทำรายการใหม่อีกครั้ง
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <meta http-equiv="refresh" content="2;URL=login.php">  
                <?php
                }else{
					$sqlAddRegister = mysql_query("insert into tb_users values ('','$inputEmail','$inputInPWD','$inputName','$inputLname','2','null','$inputJobID','$dateToday','','')");
					if($sqlAddRegister){	
				?>	
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="alert alert-success">
                                        <strong>บันทึกข้อมูลสำเร็จ</strong> กรุณารอซักครู่
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                <?php
                    }else{                 
                ?>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="alert alert-danger">
                                        <strong>ไม่สามารถบันทึกข้อมูลได้</strong> กรุณาทำรายการใหม่อีกครั้ง
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                <?php
                    }
                }
                exit();
                ?>
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

    <!-- เรียกใช้การเลือกส่วน และงาน -->
    <script src="js/script.js"></script>
</body>

</html>