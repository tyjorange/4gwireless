<?php
require '../comm/conn.php';
$smode = $database->get ( "T_SOCKET", [ 
		"MODE" 
] );
if ($smode ["MODE"] == 1) {
	if ($_POST ["MODE"] == 0) {
		$data = $database->delete ( "T_CHANNEL" );
		$data = $database->delete ( "T_FILTER" );
	}
}
$datas = $database->update ( "T_SOCKET", [ 
		"MODE" => $_POST ["MODE"],
		"PORT" => $_POST ["PORT"] 
] );
$json = json_encode ( $datas );
echo $json;

?>
