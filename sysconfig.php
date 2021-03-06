<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
<meta charset="utf-8" />
<title>系统管理</title>
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



<!-- 弹窗 -->
<script>
 function openn(url,widthh,heightt){
	var left = (screen.width-widthh)/2;
	var top = (screen.height-heightt)/2;
	var newwin = window.open(url,' ',"left=" +left+",top="+top+",width="+widthh+",height="+heightt);
	newwin.focus();
	return newwin;	
}
</script>
<!-- 弹窗 -->
<!-- 重启系统 -->
<script type="text/javascript"> 

function reboot() { 
	if(confirm("重启系统？")) {
	location.href="reboot.php"; 
	} 
	
	} 

</script> 
<!-- 还原设置 -->
<script type="text/javascript"> 

function recovery() { 
	if(confirm("恢复出厂设置？")) {
	location.href="recovery.php"; 
	} 
	} 

</script> 
</head>
<body>
<?php
	require 'comm/conn.php';
?>
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
			<div id="content" class="span10" style="min-height:999px">
				<div class="row-fluid">
					<div class="box span12">
						<div class="box-header" data-original-title="">
							<h2>
								<i class="icon-tasks"></i><span class="break">系统设置</span>
							</h2>
							
						</div>
						<div class="box-content">
							<table
								class="table table-striped table-bordered bootstrap-datatable datatable">
								
								<tbody>
									<tr>
										<th><div >
											<input type="button" value="密码修改" 
											onclick="openn('pswconfig.php','400','250')" style="background-color:#36A9E1" />
										</div></th>
										
										
									</tr>
									<tr>
										<th><div >
											<input type="button" value="重启系统" onclick="reboot()" style="background-color:#36A9E1" />
										</div></th>
									</tr>
									<tr>
										<th><div >
											<input type="button" value="还原设置"
											 onclick="recovery()" 
											 style="background-color:#36A9E1" />
										</div></th>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<!--/span-->
				</div>
			</div>
			<!-- end: Content -->
		</div>
		<!--/fluid-row-->
		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a> <a href="#"
					class="btn btn-primary">Save changes</a>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php
			require 'comm/footer.php';
		?>
	</div>
	<!-- start: JavaScript-->
	<script src="js/commjs/jquery-1.10.2.min.js"></script>
	<script src="js/commjs/jquery.autosize.min.js"></script>
	<script src="js/commjs/jquery.placeholder.min.js"></script>
	<script src="js/commjs/core.min.js"></script>
	<!-- end: JavaScript-->
</body>
</html>
