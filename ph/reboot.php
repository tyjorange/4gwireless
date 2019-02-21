<?php
session_start ();
if (empty ( $_SESSION ['user'] )) {
	echo "<script type='text/javascript'>alert('当前未登录，请登录后再操作');window.location='login.php' </script>";
} else {
	session_destroy();
	sleep(3);
	exec ( "reboot" );
}
?>