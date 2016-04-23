<?php

	session_start();

	require("includes/functions.php");

	global $mysqli;

	includeHeader();

?>


<body>
	<div class="container">
	<p> Please enter your information below: </p>
		<form action="registerform.php" method="post">
			<div class="register-form">
				<input placeholder="Email" class="form-control" type="text" value="" name="email" id="user_email" required />
				<input placeholder="Username" class="form-control" type="text" name="username" id="user_username" required />
				<input placeholder="Full Name" class="form-control" type="text" value="" name="fullname" id="user_fullname" required />
				<input placeholder="Password" class="form-control" type="password" name="password" id="user_password" onChange="doublepassCheck()" required />
				<input placeholder="Repeat Password" class="form-control" type="password" id="user_password2" onChange="doublepassCheck()" 	required />
				<span id="password_error"></span>
				<button type="submit" id="register-button" class="btn btn-default top30 btn-new">submit</button>
			</div>
		</form>
	</div>
</body>


<?php

?>