<?php
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['uid']);
	echo "<meta http-equiv=refresh content='0; url=../login.php '>";
	exit;  
?>
