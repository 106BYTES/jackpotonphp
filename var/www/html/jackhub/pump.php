<?php

$command = escapeshellcmd("python pump.py");
//$command = escapeshellcmd("python --version");
$output = shell_exec($command);

echo $output;
?>
