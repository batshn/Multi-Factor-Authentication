<?php
		// Start Session
		session_start();

		// Database connection
		require 'dbConf.php';
		$db = DB();

		// Load the operation implementations 
		require 'operation.php';
		$app = new Operation($db);

		require_once "GoogleAuthenticator.php";
		$pga = new PHPGangsta_GoogleAuthenticator();
		$secret = $pga->createSecret();

		$error = '';

		// check Register request
		if($_SERVER["REQUEST_METHOD"] == "POST") {	

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$error = 'Invalid email address!';
			} else if ($app->isEmail($_POST['email'])) {
				$error = 'Email is already in use!';
			} else if ($app->isUsername($_POST['username'])) {
				$error = 'Username is already in use!';
			} else {
				$user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $secret);
				// set session and redirect user to the profile page
				$_SESSION['user_id'] = $user_id;
				header("Location: confirm_auth.php");
			}
		}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Create Account</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../../css/main.css" rel="stylesheet" />

</head>
<body>
<div class="login-form">
	<h2 class="text-center">Create Account-google 2FA </h2>
	<form method="post" action="register.php">  
		<?php
		  if ($error != "") {
			echo '<div class="alert alert-danger"><strong>Warning: </strong> ' . $error . '</div>';
		  }
		 ?>
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="name" placeholder="Name" required="required">	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="email" placeholder="Email address" required="required">	
        </div>
		<div class="form-group">
            <input type="text" class="form-control input-lg" name="username" placeholder="Username" required="required">
		</div>       
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">
		</div>  
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary btn-lg pull-right" name="btnRegister">Register</button>
		</div>	

    </form>
</div>

</body>
</html>


