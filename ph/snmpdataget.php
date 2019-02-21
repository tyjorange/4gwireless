<?php
// require '../comm/conn.php';
// $data = $database->get ( "T_SNMP", array (
// "SNMPFLAG"
// ) );
// $json_arr = array (
// "result" => $data ["SNMPFLAG"]
// );
// $json_obj = json_encode ( $json_arr );
// echo $json_obj;
if (isset ( $_POST ["snmpselect"] )) {
	exec ( "echo \"" . $_POST ["snmpselect"] . "\"> /usr/datapipe/SNMPD.txt", $output1, $return_var1 );
	exec ( "echo \"" . $_POST ["snmpip"] . "\"> /usr/datapipe/SNMPDIP.txt", $output2, $return_var2 );
	exec ( "echo \"" . $_POST ["snmpport"] . "\"> /usr/datapipe/SNMPDPORT.txt", $output3, $return_var3 );
	exec ( "echo \"" . $_POST ["trapip"] . "\"> /usr/datapipe/SNMPDTRAP.txt", $output4, $return_var4 );
	exec ( "echo \"" . $_POST ["inform"] . "\"> /usr/datapipe/SNMPDINFORM.txt", $output5, $return_var5 );
	if (! $return_var1 && ! $return_var2 && ! $return_var3 && ! $return_var4 && ! $return_var5) {
		$json = json_encode ( "1" );
	} else {
		$json = json_encode ( "0" );
	}
	echo $json;
	
	// $file = fopen ( "/usr/datapipe/snmp/snmpd.conf", "r" ) or die ( "Unable to open file!" );
	// $temp = fopen ( "/usr/datapipe/snmp/snmpd.temp", "w" ) or die ( "Unable to open file!" );
	// while ( ! feof ( $file ) ) {
	// $line = fgets ( $file );
	// $num1 = strchr ( $line, 'trapsink' );
	// $newdata1 = "trapsink\t" . $_POST ["snmpip"] . ":" . $_POST ["snmpport"] . "\tpublic\n";
	// $line = str_replace ( $num1, $newdata1, $line );
	// $num2 = strchr ( $line, 'trap2sink' );
	// $newdata2 = "trap2sink\t" . $_POST ["snmpip"] . ":" . $_POST ["snmpport"] . "\tpublic\n";
	// $line = str_replace ( $num2, $newdata2, $line );
	// $num3 = strchr ( $line, 'informsink' );
	// $newdata3 = "informsink\t" . $_POST ["snmpip"] . ":" . $_POST ["snmpport"] . "\tpublic\n";
	// $line = str_replace ( $num3, $newdata3, $line );
	// fputs ( $temp, $line );
	// }
	// fclose ( $file );
	// fclose ( $temp );
	// unlink ( "/usr/datapipe/snmp/snmpd.conf" );
	// rename ( "/usr/datapipe/snmp/snmpd.temp", "/usr/datapipe/snmp/snmpd.conf" );
	// chmod ( "/usr/datapipe/snmp/snmpd.conf", 0777 );
} else {
	$arr = array (); // 初始化数组
	exec ( "cat /usr/datapipe/SNMPD.txt", $out1, $return1 );
	if ($return1 == "0") {
		$arr [] = $out1 [0];
	} else {
		$arr [] = "1";
		exec ( "echo \"1\"> /usr/datapipe/SNMPD.txt", $output1, $return_var1 );
	}
	exec ( "cat /usr/datapipe/SNMPDIP.txt", $out2, $return2 );
	if ($return2 == "0") {
		$arr [] = $out2 [0];
	} else {
		$arr [] = "0.0.0.0";
		exec ( "echo \"0.0.0.0\"> /usr/datapipe/SNMPDIP.txt", $output2, $return_var2 );
	}
	exec ( "cat /usr/datapipe/SNMPDPORT.txt", $out3, $return3 );
	if ($return3 == "0") {
		$arr [] = $out3 [0];
	} else {
		$arr [] = "161";
		exec ( "echo \"161\"> /usr/datapipe/SNMPDPORT.txt", $output3, $return_var3 );
	}
	exec ( "cat /usr/datapipe/SNMPDTRAP.txt", $out4, $return4 );
	if ($return4 == "0") {
		$arr [] = $out4 [0];
	} else {
		$arr [] = "127.0.0.1";
		exec ( "echo \"127.0.0.1\"> /usr/datapipe/SNMPDTRAP.txt", $output4, $return_var4 );
	}
	exec ( "cat /usr/datapipe/SNMPDINFORM.txt", $out5, $return5 );
	if ($return5 == "0") {
		$arr [] = $out5 [0];
	} else {
		$arr [] = "127.0.0.1";
		exec ( "echo \"127.0.0.1\"> /usr/datapipe/SNMPDINFORM.txt", $output5, $return_var5 );
	}
	$json = json_encode ( $arr );
	echo $json;
}
?>
