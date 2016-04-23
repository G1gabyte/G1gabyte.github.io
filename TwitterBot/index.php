<?php

$cmd = "ruby twitterbot.rb";
$output = exec($cmd);
if (!$output) {
	echo "Tweet Post!!!";
} else {
	echo "Fail!!";
}

?>


