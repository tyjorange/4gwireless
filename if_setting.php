<!DOCTYPE html>
<html lang="en">
<head>
<!-- start: Meta -->
<meta charset="utf-8" />
<title>IF设置</title>
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
								<i class="icon-tasks"></i><span class="break">IF设置</span>
							</h2>
						</div>
						<div class="box-content">
							<fieldset>
								<form class="form-horizontal">
									<div class="control-group" style="margin-left: 27%;">
										<label class="control-label" >加密传输网络接口:</label>
										<div class="controls">
											<select id="select2">
												<option></option>
											</select> 
											<span id="s2"></span>
										</div>
									</div>
									<div class="control-group" style="margin-left: 27%;">
										<label class="control-label" >本地数据网络接口:</label>
										<div class="controls">
											<select id="select1">
												<option></option>
											</select> 
											<span id="s1"></span>
										</div>
									</div>
									<div class="control-group"
										style="text-align: center; padding-left: 0px;">
										<button type="button" class="btn btn-primary">保存</button>
									</div>
								</form>
							</fieldset>
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
	<script src="js/if_set.js"></script>
	<script src="js/commjs/jquery.autosize.min.js"></script>
	<script src="js/commjs/jquery.placeholder.min.js"></script>
	<script src="js/commjs/core.min.js"></script>
	<!-- end: JavaScript-->
</body>
</html>
