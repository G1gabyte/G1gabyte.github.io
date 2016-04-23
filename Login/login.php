<?php
	
	require("includes/functions.php");

	global $mysqli;

	if (isset($_POST['email']) && isset($_POST['password'])) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;

		$passmd5 = md5($password);

		$result = $mysqli->query("SELECT `Email`, `password` FROM `users` WHERE `Email`='$email' AND `password`='$passmd5'");

		if (!$result || $result->num_rows <= 0)
    		{
    			$_SESSION['loggedin'] = false;
        		header('Location: /Login/index.php?error=1');
    		} else {
    			echo "Welcome ".$email;
    			$_SESSION['loggedin'] = true;
    		}

	} else {
		header('Location: /Login/index.php');
	}

?>