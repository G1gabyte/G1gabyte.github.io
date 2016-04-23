<?php

	session_start();

	require("includes/functions.php");

	global $mysqli;

	if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['fullname']) && isset($_POST['password'])) {
	$email = $_POST['email'];
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$password = md5($_POST['password']);


	if (mysqli_query($mysqli, "INSERT INTO `users` (`Email`, `username`, `FullName`, `password`) VALUES ('$email', '$username', '$fullname', '$password')")) {
		echo "ha";
	} else {
		echo mysqli_error($mysqli);	
	}
	//$mysqli->query("INSERT INTO `users` (`Email`, `username`, `FullName`, `password`) VALUES ('$email', '$username', '$fullname', '$password')");

	header('Location: /Login/index.php');
	}

?>