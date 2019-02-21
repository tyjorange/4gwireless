<?php
require '../comm/conn.php';
$username = htmlspecialchars ( $_POST ['username'] );
$password = htmlspecialchars ( $_POST ['password'] );
$count = $database->count ( "T_USER", "*", [ 
		"AND" => [ 
				"USERNAME" => $username,
				"PASSWORD" => $password 
		] 
] );
if ($count > 0) {
	session_start ();
	$_SESSION ['user'] = $username;
	echo "1";
} else {
	echo "0";
}

?>
