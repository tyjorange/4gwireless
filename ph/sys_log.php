<?php
if (isset ( $_POST ["data"] )) {
	$command = "../sh/sys_log.sh " . $_POST ["data"];
	exec ( $command, $arr, $res );
	$json = json_encode ( $arr );
	echo $json;
} else if (isset ( $_POST ["logday"] )) {
	require '../comm/conn.php';
	$datas = $database->update ( "T_TERM", [ 
			"LOGDAYS" => $_POST ["logday"] 
	] );
	$json = json_encode ( $datas );
	echo $json;
} else if (isset ( $_POST ["logdayget"] )) {
	require '../comm/conn.php';
	$datas = $database->select ( "T_TERM", [ 
			"LOGDAYS" 
	] );
	$json = json_encode ( $datas );
	echo $json;
} else {
	$command = "../sh/sys_logs.sh ";
	exec ( $command, $arr, $res );
	$json = json_encode ( $arr );
	echo $json;
}
?>

