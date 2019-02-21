<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
<meta charset="utf-8" />
<title>CONSOLE设置</title>
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
<script type="text/javascript"> 
window.onload=function(){
	dataget();
};
</script>
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
								<i class="icon-tasks"></i><span class="break">CONSOLE设置</span>
							</h2>
						</div>
						<br> <br> <br>
						<div align="center">
							<table style="min-width: 20%;">
								<tr>
									<th>IP地址：</th>
									<td><input style="margin-bottom: 0px" id="ipaddr" type="text"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th>子网掩码：</th>
									<td><input style="margin-bottom: 0px" id="netmask" type="text"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th></th>
									<td><input type="hidden" style="margin-bottom: 0px" id="gateway" type="text"></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<th colspan="2"><input type="button" value="保存"
										class="btn btn-primary" /></th>
								</tr>
							</table>
							<br> <br>
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
	<!-- start: JavaScript-->
	<script src="js/commjs/jquery-1.10.2.min.js"></script>
	<script src='js/ipportcheckutil.js'></script>
	<script src="js/console_conf.js"></script>
	<script src="js/commjs/jquery.autosize.min.js"></script>
	<script src="js/commjs/jquery.placeholder.min.js"></script>
	<script src="js/commjs/core.min.js"></script>
	<!-- end: JavaScript-->
</body>
</html>
