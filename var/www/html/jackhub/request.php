<?php

echo "HELLO";

try{
	$code = $_GET["CODE"];
	
	switch($code){
		case "ALL":
			echo "All Sensor";
			break;
	}
}catch(Exception $e)
{
    $s = $e->getMessage() . ' (오류코드:' . $e->getCode() . ')';
}
?>
