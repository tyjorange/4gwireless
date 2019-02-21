<?php
require '../comm/conn.php';
$datas = $database->select ( "T_CHANNEL", [
		"CHNID",
		"PEERIP",
		"FLTMODE",
		"FLTFLAG"
] );
$json = json_encode ( $datas );
echo $json;
?>
