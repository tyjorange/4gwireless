<?php
require '../comm/conn.php';

header ( "Content-type:text/html;charset=utf-8" );
$oldpsw = $_POST ['oldpsw'];
$newpsw = $_POST ['newpsw'];
$newpswtoo = $_POST ['newpswtoo'];
$checkdata = $database->get ( "T_USER", array (
		"PASSWORD" 
), array (
		"UID" => 0 
) );
if ($checkdata ["PASSWORD"] == $oldpsw) {
	$resultdata = $database->update ( "T_USER", array (
			"UID" => 0,
			"PASSWORD" => $newpsw 
	), array (
			"UID" => 0 
	) );
	if ($resultdata = 1) {
		$json_arr = array (
				"info" => 1 
		);
		// $json_arr = array("info"=>"修改成功,请重新登录！");
	} else {
		$json_arr = array (
				"info" => 0 
		);
		// $json_arr = array("info"=>"修改失败,请重新登录！");
	}
	$json_obj = json_encode ( $json_arr );
	echo $json_obj;
} else {
	$json_arr = array (
			"info" => "原密码错误！" 
	);
	$json_obj = json_encode ( $json_arr );
	echo $json_obj;
}
?>

