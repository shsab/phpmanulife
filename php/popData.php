<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
global $_GET, $_POST;

	include('./../misc/MYSQLDB.php');

	$db = new MYSQLDB();
	if (isset($_GET['view'])) $cur_view = $_GET['view'];
	if (isset($_POST['view'])) $cur_view = $_POST['view'];
	if (isset($_GET['pickedDate'])) $cur_pickedDate = $_GET['pickedDate'];
	if (isset($_POST['pickedDate'])) $cur_pickedDate = $_POST['pickedDate'];	
	
	switch ($cur_view){
		case 'HOME':
			$sql = "SELECT `svs_id`, `svs_date`, `svs_url`, `svs_visits` FROM `ML_SITE_VISIT_STAT` order by svs_date desc, svs_visits desc";
			break;
		case 'TOPFIVE':
			$sql = "SELECT `svs_id`, `svs_date`, `svs_url`, `svs_visits` FROM `ML_SITE_VISIT_STAT` WHERE svs_date = str_to_date('$cur_pickedDate','%d/%m/%Y') order by svs_visits desc limit 5";
			break;
		case 'DETAILLIST':
			$sql = "SELECT `svs_id`, `svs_date`, `svs_url`, `svs_visits` FROM `ML_SITE_VISIT_STAT` order by svs_date desc, svs_visits desc";
			break;
		default:
			$sql = "SELECT `svs_id`, `svs_date`, `svs_url`, `svs_visits` FROM `ML_SITE_VISIT_STAT` order by svs_date desc, svs_visits desc";
			break;
	}
	//echo $sql;
	$data = $db->execute($sql);
	echo json_encode($data);
	
	?>