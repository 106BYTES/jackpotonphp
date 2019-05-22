<?php

error_reporting(E_ALL);
        ini_set("display_errors", 1);


//$command = escapeshellcmd("python -c 'import sensor; sensor.sensoring(".$_GET['ID'].", 98:D3:31:90:39:CC)'");
$command = escapeshellcmd("python sensor.py");
//$command = escapeshellcmd("python --version");
$output = shell_exec($command);
echo "OUTPUT: ".$output;

$arr = explode(",", $output);

echo $arr[0];

$id = $_GET['ID'];;
$moi = $arr[0];
$tem = $arr[1];
$hum = $arr[2];
$wat = $arr[3];

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

        $sql_query_text = "UPDATE plants_table SET ";
	$sql_query_text.= "lux=0,";
	$sql_query_text.= "temperature=".$tem.",";
	$sql_query_text.= "humidity=".$hum.",";
	$sql_query_text.= "water=".$wat.",";
	$sql_query_text.= "moisture=".$moi." where id=".$id;
	
	echo "OUTPUT: ".$output."<br>";
        echo $sql_query_text;

        mysqli_query($sqlconn, "$sql_query_text");
	
	mysqli_close($sqlconn);

?>
