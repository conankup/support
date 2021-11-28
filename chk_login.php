<?php session_start();?>
<?php require_once"connect.php"; ?>

<?php
	$em = $_POST["email"];
	$pwd = md5($_POST["password"]);

	$check_log = mysql_query("select * from tb_users where user_email ='$em' and user_password ='$pwd' ");
	$num = mysql_num_rows($check_log);	
	if($num <=0) //ถ้าหากค่าที่ได้ออกมามีค่าต่ำกว่า 1
	{                                  
			echo"<meta http-equiv='refresh' content='0;URL=login.php?login=error'>";	
	} else {
			while ($data = mysql_fetch_array($check_log) ) 
				{
					$sess_id=session_id();
					$_SESSION[ses_privilage] = $data['privilage'];     //สร้าง session สำหรับเก็บค่า สถานะความเป็น Admin
					$_SESSION[ses_uid] = $data['user_id'];
					$date_time = date("Y-m-d H:i:s");
					$last_login = $data['now_login'];
					$now_login = $date_time;
					$sql_login = mysql_query("update tb_users set last_login='$last_login',now_login='$now_login' where user_email='$em' ");
					echo"<meta http-equiv='refresh' content='0;URL=dashboard.php'>";
				}
	}

?>