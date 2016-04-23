<?php
	session_start();

	require("includes/functions.php");

	global $mysqli;

	$result = $mysqli->query("SELECT * FROM `users`");
	if (!$result) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		// header('Location: /Login/welcome.php');
	}
?>



<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title> Anonym0use </title>
		<link rel="stylesheet" media="screen" href="includes/main.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="includes/main.js"></script>
	</head>

    <body>


<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      console.log(response.authResponse.accessToken);
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 	'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1704931459781509',
      xfbml      : true,
      version    : 'v2.5'
    });

      FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      // window.location = "/Login/welcome.php";
      
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }

  FB.logout(function(response) {
   // Person is now logged out
});
</script>


	  <div class="container">
	    <div class="login-container">
	      <div class="login-inner top50">
			<fb:login-button autologoutlink="true"></fb:login-button>
			<!-- <span id="status"></span> -->
			    <form  action="login.php" method="POST" id="user_login" class="form-inline" accept-charset="UTF-8">
			<?php
	          	if (isset($_GET['error'])) {
	          		echo "<span id='user_email_error' class='error-text'>Invalid Credentials. Please try again. </span>";
	          	}
	        ?>
	        <input type='hidden' name='submitted' id='submitted' value='1'/>
	          <div class="input-group input-group-lg">
	            <span class="input-group-addon"><img src="media/email.png"></span>
	            <input placeholder="Email/Username" class="form-control" type="text" value="" name="email" id="user_email" />
	            <span id="user_email_error" class="error-text"></span>
	          </div>
	          <div class="input-group input-group-lg top10">
	            <span class="input-group-addon"><img src="media/pass.png"></span>
	            <input placeholder="Password" class="form-control" type="password" name="password" id="user_password" />
	            <span id="user_password_error" class="error-text"></span>
	          </div>
	          <a href=/Login/register.php class="forgottext top10">New Here? Register instead!</a>
	          <a href=/admins/forgot_password class="forgottext top10">Forgot password?</a>
	          <button type="submit" class="btn btn-default top30 btn-new" onclick = "return validateLoginForm();">Login</button>
			</form>      
		  </div>
	    </div>
	  <div>
	</body>
</html>
