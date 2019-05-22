<?php

error_reporting(E_ALL); $sqlconn = mysqli_connect("localhost", "default", "1234");
ini_set("display_errors", 1);

$db = mysqli_select_db($sqlconn, "plants");

$query = mysqli_query($sqlconn, "SELECT * FROM plants_table WHERE id=".$_GET['ID'].";");

$str = "";

if($row = mysqli_fetch_array($query)){

        if($row['id']==null) $row['id'] = "ER";
        if($row['name']==null) $row['name'] = "ER";
        if($row['plant']==null) $row['plant'] = "ER";
        if($row['lux']==null) $row['lux'] = "ER";
        if($row['temperature']==null) $row['temperature'] = "ER";
        if($row['humidity']==null) $row['humidity'] = "ER";
        if($row['water']==null) $row['water'] = "ER";
        if($row['moisture']==null) $row['moisture'] = "ER";
        if($row['mac']==null) $row['mac'] = "ER";
	
        $str .= $row['id'].",";
        $str .= $row['name'].",";
        $str .= $row['plant'].",";
        $str .= $row['lux'].",";
        $str .= $row['temperature'].",";
        $str .= $row['humidity'].",";
        $str .= $row['water'].",";
        $str .= $row['moisture'].",";
	$str .= $row['mac'];
}

echo "$str";

?>
