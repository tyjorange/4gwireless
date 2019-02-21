<?php
require '../comm/conn.php';

	header("Content-type:text/html;charset=utf-8");
	$cp = $_POST['cp'];
	$srcip = $_POST['srcip'];
	$srcport = $_POST['srcport'];
	$desip = $_POST['desip'];
	$desport = $_POST['desport'];
	$chnid = $_POST['chnid'];

	$datas = $database->insert("T_FILTER", array("FLTID"=>uniqid(),"CHNID"=>$chnid,"PROTOCOL"=>$cp,"SRCIP"=>$srcip,"SRCPORT"=>$srcport,"DESIP"=>$desip,"DESPORT"=>$desport)); 
	if($datas!=0){
		$json_arr = array("info"=>"增加成功！");
	}else{
		$json_arr = array("info"=>"增加失败！");
	}
	$json = json_encode ($json_arr);
	echo $json;
?>
