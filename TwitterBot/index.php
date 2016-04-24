<?php

$cmd = "ruby twitterbot.rb";
$output = exec($cmd);
if (!$output) {
	echo "Tweet Post!!!<br>";
} else {
	echo "Fail!!";
}

?>


