<?php
require '../comm/conn.php';
$datas = $database->select ( "T_FILTER", [
		"[>]T_CHANNEL" => [  "CHNID"  ]
		], [
		"FLTID",
		"CHNID",
		"FLT",
		"FLTFLAG"
] );
$json = json_encode ( $datas );
echo $json;
?>
