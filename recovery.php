<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/progressbar.css">
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="css/style.min.css" rel="stylesheet" />
<link href="css/style-responsive.min.css" rel="stylesheet" />
<link href="css/retina.css" rel="stylesheet" />
<script src="js/commjs/jquery-1.10.2.min.js"></script>
<title>恢复出厂设置</title>
<script type="text/javascript">
var a=6; 
setInterval("refer()",1000);
var t=0;
function refer(){
    if(t==a){ 
        location="net_state.php";
    }
    t++;
	$("div.bar").css("width", t/a*100+"%");
} 
</script>
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<center>
		<h5>正在恢复出厂设置，请稍候...</h5>
	</center>
	<br>
	<div class="progress progress-warning progress-striped active"
		style="margin-bottom: 9px;">
		<div class="bar" style="width: 0%"></div>
	</div>
	<?php
	// echo "正在恢复设置...<br>";
	exec ( "/usr/datapipe/reset.sh" );
	// echo "设置已恢复.默认账户：admin 默认密码：admin";
	?>
</body>
</html>
