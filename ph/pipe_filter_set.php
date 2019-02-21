<?php
require '../comm/conn.php';
$ch = exec ( "cat /usr/datapipe/ch.conf", $out, $res );
$chout = 0;
if ($res == 0) { // [ch.conf] defined
	if (is_numeric ( $ch )) { // is a number
		$chout = $ch;
	} else if (is_string ( $ch )) { // not a number
		$chout = 1;
	}
} else { // [ch.conf] not defined
	$chout = 1;
}
if (isset ( $_POST ["FLTFLAG"] )) {
	$data = $database->update ( "T_CHANNEL", [ 
			"FLTFLAG" => $_POST ["FLTFLAG"] 
	], [ 
			"CHNID" => $_POST ["CHNID"] 
	] );
} else if (isset ( $_POST ["FLTMODE"] )) {
	$data = $database->update ( "T_CHANNEL", [ 
			"FLTMODE" => $_POST ["FLTMODE"] 
	], [ 
			"CHNID" => $_POST ["CHNID"] 
	] );
} else if (isset ( $_POST ["PEERIP"] )) {
// 	if (filter_var ( $_POST ["PEERIP"], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )) {
		$smode = $database->get ( "T_SOCKET", [ 
				"MODE" 
		] );
		$count = $database->count ( "T_CHANNEL", "*" );
		if ($smode ["MODE"] == 1) {
			$CID = $database->select ( "T_CHANNEL", [ 
					"CHNID" 
			], [ 
					"PEERIP" => $_POST ["PEERIP"] 
			] );
			if ($count < $chout) {
				if (sizeof ( $CID ) == 0) {
					$data = $database->insert ( "T_CHANNEL", [ 
							"CHNID" => uniqid (),
							"PEERIP" => $_POST ["PEERIP"],
							"FLTFLAG" => 0,
							"FLTMODE" => 0 
					] );
				} else {
					$data = "err0";
				}
			} else {
				$data = "err1";
			}
		} else if ($smode ["MODE"] == 0) { // client (only 1 channel)
			if ($count == 0) {
				$data = $database->insert ( "T_CHANNEL", [ 
						"CHNID" => uniqid (),
						"PEERIP" => $_POST ["PEERIP"],
						"FLTFLAG" => 0,
						"FLTMODE" => 0 
				] );
			} else {
				$data = "err2";
			}
		}
// 	}
} else if (isset ( $_POST ["DEL"] )) {
	$data = $database->delete ( "T_CHANNEL", [ 
			"CHNID" => $_POST ["CHNID"] 
	] );
	$data = $database->delete ( "T_FILTER", [ 
			"CHNID" => $_POST ["CHNID"] 
	] );
} else if (isset ( $_POST ["CH"] )) {
	$data = $chout;
}
echo $data;
?>
