<?php
include('connect.php');
$sqlJob = "SELECT * FROM tb_job WHERE ref_sector_id={$_GET['sector_id']}";
$queryJob = mysql_query($sqlJob);
$jsonJob = array();
while($resultJob = mysql_fetch_assoc($queryJob)) {    
array_push($jsonJob, $resultJob);
}
echo json_encode($jsonJob);
?>