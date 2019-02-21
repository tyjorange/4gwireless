<!-- start: Header -->
<?php
session_start ();
if (empty ( $_SESSION ['user'] )) {
	echo "<script type='text/javascript'>alert('当前未登录，请登录后再操作');window.location='login.php' </script>";
}
?>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<div class="row-fluid">
				<a class="brand span2" href="net_state.php"
					style="white-space: nowrap;"><span>4G数据透传设备</span></a>
			</div>
			<!-- start: Header Menu -->
			<div class="nav-no-collapse header-nav">
				<ul class="nav pull-right">
					<li class="dropdown hidden-phone"><a class="btn" href="#"
						onclick="logout()"> <i class='icon-off'></i>&nbsp;&nbsp;注销
					</a></li>
				</ul>
			</div>
			<!-- end: Header Menu -->
		</div>
	</div>
</div>
<!-- start: Header -->
<script type="text/javascript"> 
function logout(){
	if (confirm("确定注销？")) {
		location.href = "ph/check_logout.php";
	}
}
</script>