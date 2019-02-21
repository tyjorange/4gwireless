<?php
require 'medoo.php';
$database = new medoo ( [ 
		'database_type' => 'sqlite',
		'database_file' => '/usr/datapipe/datapipedb'
] );
?>
