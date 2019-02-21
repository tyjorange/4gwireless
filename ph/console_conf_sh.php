<?php
$filedir = "/usr/datapipe/ip.conf";
$webfdir = "/usr/datapipe/web-ppc1010/config/lighttpd.conf";
$method = "r";
$device = "eth1";
$file = fopen ( $filedir, $method ) or die ( "Unable to open file!" );
$index = 0;
$startline = 0;
$endline = 0;
$arr = array (); // 初始化数组
while ( ! feof ( $file ) ) {
	$line = fgets ( $file );
	if (strpos ( $line, $device ) == 1) {
		$startline = $index + 1;
		$endline = $index + 3;
	}
	$index ++;
} // 找到需要的n行数据
fclose ( $file );

if (isset ( $_POST ["ipaddr"] )) {
	$ipf = fopen ( $filedir, $method ) or die ( "Unable to open file!" );
	$tempf = fopen ( "/usr/datapipe/ip.temp", "w" ) or die ( "Unable to open file!" );
	for($i = 0; $i <= $endline; $i ++) {
		$line = fgets ( $ipf );
		if ($i >= $startline) {
			$num1 = strchr ( $line, 'ipaddr' );
			$newdata1 = "ipaddr=" . $_POST ["ipaddr"] . "\n";
			$line = str_replace ( $num1, $newdata1, $line );
			$num2 = strchr ( $line, 'netmask' );
			$newdata2 = "netmask=" . $_POST ["netmask"] . "\n";
			$line = str_replace ( $num2, $newdata2, $line );
			$num3 = strchr ( $line, 'gateway' );
			$newdata3 = "gateway=" . $_POST ["gateway"] . "\n";
			$line = str_replace ( $num3, $newdata3, $line );
		}
		fputs ( $tempf, $line );
	} // 修改n行
	fclose ( $ipf );
	fclose ( $tempf );
	unlink ( "/usr/datapipe/ip.conf" );
	rename ( "/usr/datapipe/ip.temp", "/usr/datapipe/ip.conf" );
	$res1 = chmod ( "/usr/datapipe/ip.conf", 0666 );
	// --------------------------------
	$webf = fopen ( $webfdir, $method ) or die ( "Unable to open file!" );
	$tempw = fopen ( "/usr/datapipe/web-ppc1010/config/lighttpd.temp", "w" ) or die ( "Unable to open file!" );
	while ( ! feof ( $webf ) ) {
		$line = fgets ( $webf );
		$num1 = strchr ( $line, 'server.bind' );
		$newdata1 = "server.bind                 = \"" . $_POST ["ipaddr"] . "\"\n";
		$line = str_replace ( $num1, $newdata1, $line );
		fputs ( $tempw, $line );
	}
	fclose ( $webf );
	fclose ( $tempw );
	unlink ( "/usr/datapipe/web-ppc1010/config/lighttpd.conf" );
	rename ( "/usr/datapipe/web-ppc1010/config/lighttpd.temp", "/usr/datapipe/web-ppc1010/config/lighttpd.conf" );
	$res2 = chmod ( "/usr/datapipe/web-ppc1010/config/lighttpd.conf", 0666 );
	// ------------------------------------
	if ($res1 && $res2) {
		$arr [] = "1";
		//exec ( "/usr/datapipe/set_ip.sh" );
	} else {
		$arr [] = "0";
	}
} else {
	// READ
	$arr = get_ip_conf ( $filedir, $method, $startline, $endline, $arr );
}
$json = json_encode ( $arr );
echo $json;

// 读取ip.conf配置信息
function get_ip_conf($filedir, $method, $startline, $endline, $arr) {
	// 跳过前n行
	$fp = fopen ( $filedir, $method ) or die ( "Unable to open file!" );
	for($i = 0; $i < $startline; $i ++) {
		fgets ( $fp );
	}
	// 跳过前n行
	for($i = 0; $i <= $endline; $i ++) {
		if ($i >= $startline) {
			$arr [] = explode ( "=", fgets ( $fp ) ) [1];
		}
	} // 读出n行
	fclose ( $fp );
	return $arr;
}