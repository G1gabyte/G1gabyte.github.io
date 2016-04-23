<?php

require("../Login/includes/functions.php");
// require("includes/functions.php");

global $mysqli;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$id = str_replace(array("'", "\\"), "", $_GET['id']);
	$result = $mysqli->query("SELECT `id` FROM `users` WHERE `id` = $id")or die(mysql_error());	
	if ($result) {
		while($res = $result->fetch_assoc()) {
			echo $res['id'];
		}
	} else {
		echo "id not found";
	}
}

?>