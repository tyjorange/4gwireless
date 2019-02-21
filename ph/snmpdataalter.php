<?php
/**Obsolete method*/
require '../comm/conn.php';
header ( "Content-type:text/html;charset=utf-8" );
$snmpip = $_POST ['snmpip'];
$snmpport = $_POST ['snmpport'];
$snmpflag = $_POST ['snmpflag'];
$resultdata = $database->update ( "T_SNMP", array (
		"SNMPIP" => $snmpip,
		"SNMPPORT" => $snmpport,
		"SNMPFLAG" => $snmpflag 
) );
if ($resultdata == 1) {
	$json_arr = array (
			"info" => "修改成功！" 
	);
} else {
	$json_arr = array (
			"info" => "修改失败！" 
	);
}
$json_obj = json_encode ( $json_arr );
echo $json_obj;

$file = fopen ( "/usr/datapipe/snmp/snmpd.conf", "r" ) or die ( "Unable to open file!" );
$temp = fopen ( "/usr/datapipe/snmp/snmpd.temp", "w" ) or die ( "Unable to open file!" );
while ( ! feof ( $file ) ) {
	$line = fgets ( $file );
	$num1 = strchr ( $line, 'trapsink' );
	$newdata1 = "trapsink\t" . $snmpip . ":" . $snmpport . "\tpublic\n";
	$line = str_replace ( $num1, $newdata1, $line );
	$num2 = strchr ( $line, 'trap2sink' );
	$newdata2 = "trap2sink\t" . $snmpip . ":" . $snmpport . "\tpublic\n";
	$line = str_replace ( $num2, $newdata2, $line );
	$num3 = strchr ( $line, 'informsink' );
	$newdata3 = "informsink\t" . $snmpip . ":" . $snmpport . "\tpublic\n";
	$line = str_replace ( $num3, $newdata3, $line );
	fputs ( $temp, $line );
}
fclose ( $file );
fclose ( $temp );
unlink ( "/usr/datapipe/snmp/snmpd.conf" );
rename ( "/usr/datapipe/snmp/snmpd.temp", "/usr/datapipe/snmp/snmpd.conf" );
chmod ( "/usr/datapipe/snmp/snmpd.conf", 0777 );
?>

