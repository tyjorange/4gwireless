<?php
$command = "../sh/conn_status.sh " . $_POST ["ip"];
$daw = exec ( $command );
if (strlen ( $daw ) > 0) {
	echo "1";
} else {
	echo "0";
}
?>