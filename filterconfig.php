<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
<meta charset="utf-8" />
<title>过滤规则列表</title>
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
	<script src="js/filterconfig.js"></script>
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
			<div id="content" class="span10" style="min-height:999px">
				<div class="row-fluid">
					<div class="box span12">
						<div class="box-header" data-original-title="">
							<h2>
								<i class="icon-tasks"></i><span class="break">过滤规则</span>
							</h2>
							<div class="box-icon">
								<a href="pipe_filter.php" class="btn-close"><i class="icon-repeat"></i>返回通道列表</a>
							</div>
							<div class="box-icon">
								<a href="#" id="adddiv" onclick="toggle()" class="btn-close"><i class="icon-plus"></i>新增规则</a>
							</div>
						</div>
						<!-- 规则新增  -->
						<div class="box-content">
							<center><div id="addwindow" style="background-color:#36A9E1;width:40%">
								<table><tr><td>&nbsp;</td><td>&nbsp;</td></tr>
									<tr>
										<td><label for="cp">协议：</label></td>
										<td><select id="cpselect">
											<option selected>请选择</option>
											<option value="TCP">TCP</option>
											<option value="UDP">UDP</option></select>
										</td>
									<tr>
									<tr>
										<td><label for="srcip">源IP：</label></td>
										<td><input id="srcip" name="srcip" type="text" /> </td>
									<tr>
									<tr>
										<td><label for="srcport">源端口：</label></td>
										<td><input id="srcport" name="srcport" type="text" /></td>
									<tr>
									<tr>
									<tr>
										<td>&nbsp;</td>
										<td><p><font color="red">注：0表示所有端口.</font></p></td>
									</tr>
									<tr>
									<tr>
										<td><label for="desip">目标IP：</label></td>
										<td><input id="desip" name="desip" type="text" /> </td>
									<tr>
									<tr>
										<td><label for="desport">目标端口：</label></td>
										<td><input id="desport" name="desport" type="text" /></td>
									<tr>
										<td>&nbsp;</td>
										<td><p><font color="red">注：0表示所有端口.</font></p></td>
									</tr>
										<td align="center" colspan="2"><p><input id="addbtn" type="button" value="确认添加" onclick="hidediv()"/>
										<input id="addbtn" type="button" value="取消" onclick="cancel()"/></p></td>
									<tr>	
									</table>
							</div></center>
							
						</div>
						<!-- 规则列表  -->
						<div class="box-content">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th style="width: 10%">协议</th>
										<th style="width: 10%">源IP</th>
										<th style="width: 10%">源端口</th>
										<th style="width: 10%">目标IP</th>
										<th style="width: 10%">目标端口</th>
										<th style="width: 10%">操作</th>
									</tr>
								</thead>
								<tbody id="tbody">

								</tbody>
							</table>
						</div>
						<div class="box-content" style="text-align: center;">
							<a href="pipe_filter.php" class="btn" style="margin-top: 10px;">返回通道列表</a>
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
