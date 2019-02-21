<!-- 链接数据库 -->
<?php
	require '../comm/conn.php';
?>
<!--  根据id删除通道规则     -->
<?php
header("Content-type:text/html;charset=utf-8");
	$fltid = $_POST['id'];
	$resultdata = $database->delete("T_FILTER",["AND"=>["FLTID"=>$fltid]]); 
	if ($resultdata==1){
		$json_arr = array("info"=>"成功删除！");	
	}else{
		$json_arr = array("info"=>"删除失败！");
	}
	$json_obj = json_encode($json_arr);
	echo $json_obj;
?>

