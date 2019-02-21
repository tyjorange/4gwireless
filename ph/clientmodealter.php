<?php
require '../comm/conn.php';
$mode = $_POST ['mode'];
$serip = $_POST ['serip'];
$serport = $_POST ['serport'];
$encrypt = $_POST ['encrypt'];
if (isset ( $_POST ["desc"] )) {
	$resultdata = $database->update ( "T_TERM", [ 
			"DESC" => $_POST ["desc"],
			"COMMENT" => $_POST ["comment"] 
	] );
} else {
	$resultdata = $database->update ( "T_TERM", [ 
			"ENCRYPT" => $encrypt,
			"MODE" => $mode,
			"SYSSRVIP" => $serip,
			"SYSSRVPORT" => $serport 
	] );
}

if ($resultdata == 1) {
	$json_arr = array (
			"info" => "修改成功！" 
	);
} else {
	$json_arr = array (
			"info" => "修改失败！" 
	);
}
$json_obj = json_encode ( $json_arr );
echo $json_obj;
?>

