<?php

error_reporting(E_ALL); $sqlconn = mysqli_connect("localhost", "default", "1234");
ini_set("display_errors", 1);

$db = mysqli_select_db($sqlconn, "plants");

$query = mysqli_query($sqlconn, "SELECT id,name,plant FROM plants_table;");

$str = "";

while($row = mysqli_fetch_array($query)){
	if($str != "") $str .= "$";
	if($row['id']==null) $row['id'] = " ";
	if($row['name']==null) $row['name'] = " ";
	if($row['plant']==null) $row['plant'] = " ";
	$str .= $row['id'].",".$row['name'].",".$row['plant'];
}

echo "$str";

?>
