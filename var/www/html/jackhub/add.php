<?php

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

/* $name = "jack.pot0";
$code = 0;
$mac = NULL; */
	
	$sqlconn = mysqli_connect("localhost", "default", "1234");
	
	if(!$sqlconn) {
		echo "E: SQL Connection failed!";
		return false;
	}

	$db = mysqli_select_db($sqlconn, "plants");
	
	if(!$db) {
		echo "E: DB Connection failed!";
		return false;
	}
	
	$mac = str_replace("_", ":", $_GET['MAC']);
	
	$sql_query_text = "INSERT  INTO plants_table (mac, name, plant, lux, temperature, humidity, water, moisture) VALUES ('";
	$sql_query = $sql_query_text.$mac."', '".$_GET['NAME']."', '".$_GET['PLANT']."', 0,0,0,0,0);";
	
	//echo "$sql_query";
	
	echo $_GET['NAME']."를 추가하였습니다.";
	
	mysqli_query($sqlconn, "$sql_query");
?>
