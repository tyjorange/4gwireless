<?php
require '../comm/conn.php';
$datas = $database->select ( "T_TERM", [ 
		"DESC",
		"COMMENT",
		"ENCRYPT",
		"MODE",
		"SYSSRVIP",
		"SYSSRVPORT" 
] );
$json = json_encode ( $datas );
echo $json;
?>
