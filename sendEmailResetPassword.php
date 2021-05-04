<?php
include "connect.php";
$inputEmail = $_POST['Email'];

/* ตั้งค่ารหัสผ่านใหม่โดยการสุ่ม  */
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
//echo  generateRandomString();
$newPass = generateRandomString();
/*-------------------*/

/*##### Setconfig send mail por@rscience.go.th#####*/
require("PHPMailer/PHPMailerAutoload.php");  // ประกาศใช้ class phpmailer กรุณาตรวจสอบ ว่าประกาศถูก path
$mail = new PHPMailer();

$body = "ทดสอบการส่งอีเมล์ภาษาไทย UTF-8 ผ่าน SMTP Server ด้วย PHPMailer.";

$mail->CharSet = "utf-8";
$mail->IsSMTP();
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->isHTML(true);
$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "912rangsitsc@dei.ac.th"; // account SMTP
$mail->Password = "mhv'ahk0e]v'iy'lb9"; // รหัสผ่าน SMTP

$mail->From = "912rangsitsc@dei.ac.th"; // "name@yourdomain.com";
//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
$mail->FromName = "Webmaster RSCE";  // set from Name
$mail->Subject = "Reset password การเข้าใช้งานระบบ ศว.รังสิต"; 
$mail->Body = "ระบบได้ทำการตั้งค่ารหัสผ่านของท่านใหม่คือ $newPass";
$mail->AddAddress($inputEmail); // to Address
$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low

/* ------------------------------------------------------------------------------------------------------------- */

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
                if(!$mail->Send()){
                    echo "Mailer Error: " . $mail->ErrorInfo;
                ?>

                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="alert alert-danger">
                                        <strong>ไม่สามารถส่งอีเมลได้!</strong> กรุณาลองใหม่อีกครั้ง <a href="login.php" class="alert-link">กลับไปหน้า Login</a>.
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
                                    <div class="alert alert-success">
                                        <strong>รีเซ็ตรหัสผ่านแล้ว!</strong> กรุณาตรวจสอบอีเมลของท่าน <a href="login.php" class="alert-link">กลับไปหน้า Login</a>.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                <?php 
                    /*เมื่อส่งอีเมลสำเร็จทำการอัพเดทรหัสผ่านใหม่ไปยัง Database*/
                    $updatePass = md5($newPass);
                    $sqlUpdatePWD = mysql_query("UPDATE tb_users SET user_password ='$updatePass' WHERE user_email='$inputEmail'");
                    if($sqlUpdatePWD){
                        echo OK;
                    }else{
                        echo Error;
                    }exit();
                }
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

</body>

</html>