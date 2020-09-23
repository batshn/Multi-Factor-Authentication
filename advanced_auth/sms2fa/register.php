<?php
		// Start Session
		session_start();

		// Database connection
		require 'dbConf.php';
		$db = DB();

		// Load the operation implementations 
		require 'operation.php';
		$app = new Operation($db);

		require_once "vendor/autoload.php";
		use telesign\sdk\messaging\MessagingClient;

		$customer_id = "C17BABF3-9FE1-4487-98CF-8C2CE5ABA98F";
		$api_key = "IDID8mta8durmOmxw3Tb96oHMMMC3BIm/gXgEDOS9c3HtRs4uFMCsjIPSYLktJrWFVdMB2o+q8s1EgF1h/q4Uw==";

		$error = '';

		// check Register request
		if($_SERVER["REQUEST_METHOD"] == "POST") {

			if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				$error = 'Invalid email address!';
			} else if ($app->isEmail($_POST['email'])) {
				$error = 'Email is already in use!';
			} else if ($app->isPhone($_POST['phone'])) {
				$error = 'Phone is already in use!';
			} else {

				$pin= rand(100000, 999999);

				$user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['password'],  $_POST['phone'], $pin);
				// set session and redirect user to the profile page
				$_SESSION['user_id'] = $user_id;

				$phone= $_POST['phone'];

				// send SMS by TeleSign API
				$messaging = new MessagingClient($customer_id, $api_key);
				$response = $messaging->message($phone, "Your 2-factor authentication code is: ". $pin, "OTP");

				//print_r($response->json);
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
	<h2 class="text-center">Create Account-SMS 2FA </h2>
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
            <input type="text" class="form-control input-lg" name="phone" placeholder="Phone number" required="required">
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


