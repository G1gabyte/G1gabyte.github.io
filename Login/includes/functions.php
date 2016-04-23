<?php 

session_start();


function dbconnect($db_name = "local") {
	return new mysqli("localhost", "root", "root", $db_name);
}

$mysqli = dbconnect();

function includeHeader() {
	echo "<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
    	<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title> Anonym0use </title>
		<link rel='stylesheet' media='screen' href='includes/main.css' />
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type='text/javascript'></script>
		<script src='includes/main.js'></script>
	</head>";
}


?>

