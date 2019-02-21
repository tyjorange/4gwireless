<?php
require '../comm/conn.php';
$chnid = $_POST['chnid'];
$datas = $database->select("T_FILTER", array("FLTID","PROTOCOL","SRCIP","SRCPORT","DESIP","DESPORT"),array("CHNID"=>$chnid)); 
$json = json_encode ( $datas );
echo $json;
?>
