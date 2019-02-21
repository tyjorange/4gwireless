<?php
require '../comm/conn.php';
if(isset ( $_POST ["LOCAL"] )){
	$datas = $database->update ( "T_INTERFACE", [
			"LOCAL" => $_POST ["LOCAL"],
			"PPP" => $_POST ["PPP"],
	] );
}else{
	$datas = $database->select ( "T_INTERFACE", [ 
			"LOCAL",
			"PPP",
	] );
}
$json = json_encode ( $datas );
echo $json;
?>