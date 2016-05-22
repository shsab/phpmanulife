<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

	include('MYSQLDB.php');

	$db = new MYSQLDB();
	$data = $db->execute('select * from ML_SITE_VISIT_STAT');
	echo json_encode($data);
	
	?>