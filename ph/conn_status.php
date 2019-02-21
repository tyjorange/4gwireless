<?php
$res = exec("/var/www/html/sh/conn_status.sh ".$_GET["ip"]);
if(strlen($res) == 0){
	echo "no";
}else{
	echo "yes";
};
?>
