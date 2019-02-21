<?php
require '../comm/conn.php';
$datas = $database->select ( "T_SOCKET", [ 
				"MODE",
				"PORT"
] );
$json = json_encode ( $datas );
echo $json;
?>
