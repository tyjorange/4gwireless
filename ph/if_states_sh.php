<?php
$command = "../sh/if_status.sh";
exec ( $command, $array );
$json = json_encode ( $array );
echo $json;
?>