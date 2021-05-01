<?
ob_start();

$host = "localhost";
$user = "root";
$pwd = "vpjkglnvd";
$dbname = "rscience_systems";
$conn = mysql_connect($host,$user,$pwd);
mysql_connect($host,$user,$pwd) or die("ไม่สามารถติดต่อHOSTได้");
mysql_select_db($dbname) or die("ไม่สามารถติดต่อDatabaseได้");

mysql_query("SET NAMES UTF8");

?>