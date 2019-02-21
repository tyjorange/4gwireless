<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
<meta charset="utf-8" />
<title>工作模式</title>
<!-- end: Meta -->
<!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- end: Mobile Specific -->
<!-- start: CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" />
<link href="css/style.min.css" rel="stylesheet" />
<link href="css/style-responsive.min.css" rel="stylesheet" />
<link href="css/retina.css" rel="stylesheet" />
<!-- end: CSS -->
<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
<!-- start: Favicon and Touch Icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144"
	href="ico/apple-touch-icon-144-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114"
	href="ico/apple-touch-icon-114-precomposed.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72"
	href="ico/apple-touch-icon-72-precomposed.png" />
<link rel="apple-touch-icon-precomposed"
	href="ico/apple-touch-icon-57-precomposed.png" />
<link rel="shortcut icon" href="ico/favicon.png" />
<!-- end: Favicon and Touch Icons -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- start: JavaScript-->
<script src="js/commjs/jquery-1.10.2.min.js"></script>
<script src='js/ipportcheckutil.js'></script>
<script src="js/clientdataalter.js"></script>
<script src="js/commjs/jquery.autosize.min.js"></script>
<script src="js/commjs/jquery.placeholder.min.js"></script>
<script src="js/commjs/core.min.js"></script>
<!-- end: JavaScript-->
</head>
<body>
	<!-- end: Header -->
<?php
require 'comm/head.php';
?>
<!-- start: Header -->
	<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Main Menu -->
			<?php
			require 'comm/sidebar.php';
			?>
			<!-- end: Main Menu -->
			<!-- start: Content -->
			<div id="content" class="span10" style="min-height: 999px">
				<div class="row-fluid">
					<div class="box span12">
						<div class="box-header" data-original-title="">
							<h2>
								<i class="icon-tasks"></i><span class="break">工作模式</span>
							</h2>
						</div>
						<div class="box-content">
							<div align="center">
								<span>是否启用加密：</span> <select id="encrypt">
									<option value="1">启用</option>
									<option value="0">不启用</option>
								</select>
							</div>
						</div>
						<!-- 模式选择  -->
						<div class="box-content">
							<div align="center">
								<span>&emsp;&emsp;终端模式：</span> <select id="modeselect">
									<option value="1">中心模式</option>
									<option value="0">本地模式</option>
								</select>
							</div>
						</div>
						<!-- 模式编辑  -->
						<div class="box-content">
							<div align="center" id="centerinfo">
								<table style="min-width: 20%">
									<tr>
										<td>中心服务器IP：</td>
										<td><input id="serip" type="text" value=""></td>
									</tr>
									<tr>
										<td>中心服务器端口：</td>
										<td><input id="serport" type="text" value=""></td>
									</tr>
								</table>
							</div>
						</div>
						<div class="control-group"
							style="text-align: center; padding-left: 0px;">
							<button type="button" class="btn btn-primary">保存</button>
						</div>
					</div>
					<!--/span-->
				</div>
			</div>
			<!-- end: Content -->
		</div>
		<!--/fluid-row-->
		<div class="clearfix"></div>
		<?php
		require 'comm/footer.php';
		?>
	</div>
</body>
</html>
