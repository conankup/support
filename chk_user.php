<?php
	ob_start();
	session_start();
	require_once"connect.php";
	$sess_id=session_id();
	if(empty($_SESSION["ses_privilage"])){
		header("Location: login.php");
	}else{
		$sql_user = mysqli_query($con,"select * from tb_users where user_id ='$_SESSION[ses_uid]'");
		$record_user = mysqli_fetch_array($sql_user);
	}
?>