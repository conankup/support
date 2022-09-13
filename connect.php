<?php
date_default_timezone_set("Asia/Bangkok");
$con = mysqli_connect("localhost","root","vpjkglnvd","db_support");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_query($con, "SET NAMES 'utf8'");
$thaiMonth = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

?>