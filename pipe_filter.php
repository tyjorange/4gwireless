<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
<meta charset="utf-8" />
<title>通道及过滤设置</title>
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
<link href="css/switch_btn.css" rel="stylesheet" />
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
								<i class="icon-tasks"></i><span class="break">连接参数&emsp;&emsp;</span>
								<i class="icon-question-sign"
									style="background: #36A9E1; margin-right: 0px;"></i><a
									href="datapipe_help.html" target="_blank">关于连接参数</a>
							</h2>
						</div>
						<div class="box-content" style="margin-left: 25%;">
							<table>
								<tr>
									<td style="padding-right: 10px;">
										<div class="control-group">
											<div class="controls">
												<div>Socket模式:</div>
												<select id="select">
													<option>服务端</option>
													<option>客户端</option>
												</select>
											</div>
										</div>
									</td>
									<td style="padding-right: 10px;">
										<div class="control-group">
											<div class="controls">
												<div>Socket端口:</div>
												<input id="PORT" type="text">
											</div>
										</div>
									</td>
									<td>
										<div class="control-group">
											<button id="submit" type="button" class="btn btn-primary"
												style="margin-top: 10px;">保存</button>
										</div>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<!--/span-->
				</div>
				<div class="row-fluid">
					<div class="box span12">
						<div class="box-header" data-original-title="">
							<h2>
								<i class="icon-tasks"></i><span class="break">通道及过滤&emsp;&emsp;</span>
								<i class="icon-question-sign"
									style="background: #36A9E1; margin-right: 0px;"></i><a
									href="datapipe_help2.html" target="_blank">关于通道及过滤</a>
							</h2>
							<div class="box-icon">
								<i class="icon-repeat"></i><a href="pipe_filter.php"
									class="btn-no">刷新列表</a>
							</div>
							<div class="box-icon">
								<a href="#" class="btn-setting1"><i class="icon-plus"></i>新增通道</a>
							</div>
						</div>
						<div class="box-content">
							<form action="#" method="POST" class="form-horizontal">
								<div class="control-group">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th style="width: 5%">删除通道</th>
												<th style="width: 10%">对端的IP地址</th>
												<th style="width: 10%">过滤方式</th>
												<th style="width: 10%">是否启用过滤</th>
												<th style="width: 10%">过滤规则</th>
											</tr>
										</thead>
										<tbody id="na1">

										</tbody>
									</table>
								</div>
								<div style="text-align: center;">
									<font color="red">注：当前版本服务端模式只能添加[<span id="span1"></span>]条通道.
									</font>
								</div>
							</form>
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
				<h3>添加</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="input1">对端的IP地址</label>
							<div class="controls">
								<input type="text" id="input1">
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#" id="can" class="btn" data-dismiss="modal">取消</a> <a
					href="#" id="add" class="btn btn-primary">添加</a>
			</div>
		</div>
		<div class="clearfix"></div>
		<?php
		require 'comm/footer.php';
		?>
	</div>
	<!-- start: JavaScript-->
	<script src="js/commjs/jquery-1.10.2.min.js"></script>
	<script src="js/pipe_filter.js"></script>
	<script src="js/commjs/jquery.autosize.min.js"></script>
	<script src="js/commjs/jquery.placeholder.min.js"></script>
	<script src="js/commjs/core.min.js"></script>

	<script src="js/commjs/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="js/commjs/bootstrap.min.js"></script>
	<script src='js/commjs/jquery.dataTables.min.js'></script>
	<script src="js/commjs/jquery.chosen.min.js"></script>
	<script src="js/commjs/jquery.uniform.min.js"></script>
	<script src="js/commjs/jquery.cleditor.min.js"></script>
	<script src="js/commjs/jquery.elfinder.min.js"></script>
	<script src="js/commjs/jquery.raty.min.js"></script>
	<script src="js/commjs/jquery.uploadify-3.1.min.js"></script>
	<script src="js/commjs/jquery.sparkline.min.js"></script>
	<script src="js/commjs/wizard.min.js"></script>
	<script src="js/commjs/custom.min.js"></script>
	<!-- end: JavaScript-->
</body>
</html>
