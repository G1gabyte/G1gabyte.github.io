<html>
	<head>
		<title> Admin Page Finder </title>
		<link rel="stylesheet" type="text/css" href="main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>

	<body>
	<h2>Page created by Anonymouse</h2>
	<h3>Insert URL below: </h3>

	<form method="POST">
		<input type="text" name="url">
		<button type="submit">Submit</button>
	</form>

	</body>
</html>

<?php
	if(!isset($_POST["url"]) || $_POST["url"] == "" || $_POST["url"] == " ") {

	} else {
		$website = $_POST["url"];

		echo "<p> Scanning ".$website."</p>";

			// Adding http://
			if (substr($website, 0, 3) == "www") {
				$website = "http://".$website;
			}	

		$allpossible = array('admin.php','admin/','admin/login.jsp','administrator/','moderator/','webadmin/','adminarea/','bb-admin/','adminLogin/','admin_area/','panel-administracion/','instadmin/','memberadmin/','administratorlogin/','adm/','admin/account.php','admin/index.php','admin/login.php','admin/admin.php','admin/account.php','joomla/administrator','login.php','admin_area/admin.php','admin_area/login.php','siteadmin/login.php','siteadmin/index.php','siteadmin/login.html','admin/account.html','admin/index.html','admin/login.html','admin/admin.html','admin_area/index.php','bb-admin/index.php','bb-admin/login.php','bb-admin/admin.php','admin/home.php','admin_area/login.html','admin_area/index.html','admin/controlpanel.php','admincp/index.asp','admincp/login.asp','admincp/index.html','admin/account.html','adminpanel.html','webadmin.html','webadmin/index.html','webadmin/admin.html','webadmin/login.html','admin/admin_login.html','admin_login.html','panel-administracion/login.html','admin/cp.php','cp.php','administrator/index.php','administrator/login.php','nsw/admin/login.php','webadmin/login.php','admin/admin_login.php','admin_login.php','administrator/account.php','administrator.php','admin_area/admin.html','pages/admin/admin-login.php','admin/admin-login.php','admin-login.php','bb-admin/index.html','bb-admin/login.html','bb-admin/admin.html','admin/home.html','modelsearch/login.php','moderator.php','moderator/login.php','moderator/admin.php','account.php','pages/admin/admin-login.html','admin/admin-login.html','admin-login.html','controlpanel.php','admincontrol.php','admin/adminLogin.html','adminLogin.html','admin/adminLogin.html','home.html','rcjakar/admin/login.php','adminarea/index.html','adminarea/admin.html','webadmin.php','webadmin/index.php','webadmin/admin.php','admin/controlpanel.html','admin.html','admin/cp.html','cp.html','adminpanel.php','moderator.html','administrator/index.html','administrator/login.html','user.html','administrator/account.html','administrator.html','login.html','modelsearch/login.html','moderator/login.html','adminarea/login.html','panel-administracion/index.html','panel-administracion/admin.html','modelsearch/index.html','modelsearch/admin.html','admincontrol/login.html','adm/index.html','adm.html','moderator/admin.html','user.php','account.html','controlpanel.html','admincontrol.html','panel-administracion/login.php','wp-login.php','adminLogin.php','admin/adminLogin.php','home.php','adminarea/index.php','adminarea/admin.php','adminarea/login.php','panel-administracion/index.php','panel-administracion/admin.php','modelsearch/index.php','modelsearch/admin.php','admincontrol/login.php','adm/admloginuser.php','admloginuser.php','admin2.php','admin2/login.php','admin2/index.php','adm/index.php','adm.php','affiliate.php','adm_auth.php','memberadmin.php','administratorlogin.php');

		if (filter_var($website, FILTER_VALIDATE_URL) === FALSE) {
			echo "Invalid URL. Try again";
		} else {
			$headers = get_headers($website);
			if ($headers == "") {
				echo "Url doesn't exist";
			} else if (substr($headers[0], 8, 2) == "40") {
				echo $headers[0]."<br>";
				echo "Website is down!";
			} else {
				echo $headers[0]."<br>";
				echo "Website is up! <br>";
			}
		}
		echo "<h3>Scanning admin pages...</h3><br>";
		ob_flush();
		flush();	

		$matches = array();
		foreach ($allpossible as $page) {
			// Adding slash in case input does not have it
			if (substr($website, -1) == '/'){
				$full_website = $website."".$page;
			} else {
				$full_website = $website."/".$page;
			}

			$headers = get_headers($full_website);

			if (preg_match("/\b200\b/i", $headers[0])) {
				array_push($matches, $full_website);
				echo "<b>[+] ".$full_website."<br></b>";
			}
		}
		if (count($matches) == 0) {
			echo "Nothing found";
		}
		ob_flush();
		flush();	

	}



?>
