<?php
	require '../comm/conn.php';
	$datas = $database->get("T_TERM", array("ID","DESC","VERSION","COMPANY")); 
	$json = json_encode ( $datas );
	echo $json;
?>
