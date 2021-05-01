<?php
	ob_start();
	session_start();
	require_once"connect.php";
	if(empty($_SESSION[ses_privilage])){
		header("Location: login.php");
	}else{
		$sql_user = mysql_query("select * from tb_users where user_id ='$_SESSION[ses_uid]'");
		$record_user = mysql_fetch_array($sql_user);
	}
?>