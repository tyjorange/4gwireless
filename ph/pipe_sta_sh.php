<?php
if (isset ( $_POST ["mode"] )) {
	if ($_POST ["mode"] == 0) { // client
		//netstat -ant | grep
		$command = "../sh/conn_status.sh " . $_POST ["ip"];// . ":" . $_POST ["port"];
	} elseif ($_POST ["mode"] == 1) { // server
		//netstat -ant | grep
		$command = "../sh/conn_status.sh " . ":" . $_POST ["port"] . " | grep  " . $_POST ["ip"];
	}
} else {
	echo "error:json is ";
}
exec ( $command, $array );
$json = json_encode ( $array );
echo $json;
?>