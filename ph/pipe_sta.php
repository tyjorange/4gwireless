<?php
require '../comm/conn.php';
$datas = $database->select ( "T_CHANNEL", [ 
		"CHNID",
		"PEERIP",
		"FLTFLAG",
		"FLTMODE"
] );
$json = json_encode ( $datas );
echo $json;
?>
