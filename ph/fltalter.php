<!-- 链接数据库 -->
<?php
	require '../comm/conn.php';
?>
<!--  根据id修改通道规则     -->
<?php
header("Content-type:text/html;charset=utf-8");
	$fltid = $_POST['id'];
	$cp=$_POST['cp'];
	$srcip=$_POST['srcip'];
	$srcport=$_POST['srcport'];
	$desip=$_POST['desip'];
	$desport=$_POST['desport'];
	$resultdata = $database->update("T_FILTER", array("PROTOCOL"=>$cp,"SRCIP"=>$srcip,"SRCPORT"=>$srcport,"DESIP"=>$desip,"DESPORT"=>$desport),array("FLTID"=>$fltid));
	if ($resultdata==1){
		$json_arr = array("info"=>"修改成功！");	
	}else{
		$json_arr = array("info"=>"修改失败！");
	}
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>

