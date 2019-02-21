<?php
require '../comm/conn.php';
$datas = $database->select ( "T_NETDEV", [ 
				"IFNAME",
				"MAC",
				"IP",
				"NETMASK",
				"BYTES_R" ,
				"BYTES_T"
] ,["ORDER" => "T_NETDEV.IFNAME ASC"]);
$json = json_encode ( $datas );
echo $json;
?>
