<?php
if (isset ( $_POST ["apn"] )) {
	exec ( "echo \"" . $_POST ["apn"] . "\"> /usr/datapipe/APN.txt", $output1, $return_var1 );
	exec ( "echo \"" . $_POST ["user"] . "\"> /usr/datapipe/APNUSER.txt", $output2, $return_var2 );
	exec ( "echo \"" . $_POST ["pass"] . "\"> /usr/datapipe/APNPASS.txt", $output3, $return_var3 );
	if (! $return_var1 && ! $return_var2 && ! $return_var3) {
		$json = json_encode ( "1" );
		exec ( "/usr/datapipe/set_apn.sh" );
	} else {
		$json = json_encode ( "0" );
	}
	echo $json;
} else {
	$arr = array (); // 初始化数组
	$arr [] = exec ( "cat /usr/datapipe/APN.txt" );
	$arr [] = exec ( "cat /usr/datapipe/APNUSER.txt" );
	$arr [] = exec ( "cat /usr/datapipe/APNPASS.txt" );
	$json = json_encode ( $arr );
	echo $json;
}
?> 