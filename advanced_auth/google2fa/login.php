<?php

	// Start Session
	session_start();

	// Load PHP files for Database connection
	require 'dbConf.php';
	$db = DB();

	// Load the operation implementations 
	require 'operation.php';
	$app = new Operation($db);


	$error = '';

	// check Login request
	if($_SERVER["REQUEST_METHOD"] == "POST") {

			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			$user_id = $app->Login($email, $password); // check user login
			if($user_id > 0)
			{
				$_SESSION['user_id'] = $user_id; 
				header("Location: verify_login.php"); 
			}
			else
			{
				$error= 'Invalid login details!';
			}
	}
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>2FA</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../../css/main.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
<div class="login-form">
	<h2 class="text-center">Login - Google2FA</h2>
	<form id="loginform" method="post" action="login.php">  
		
		
		<div class="avatar">
			<img src="../../assets/img/avatar.png" alt="Avatar">
		</div> 

		<?php
		  if ($error != "") {
			echo '<div class="alert alert-danger"><strong>Warning: </strong> ' . $error . '</div>';
		  }
		 ?>

        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="email" placeholder="Email address" required="required">	
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">
		</div>         
		
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary btn-lg pull-left">Login</button>
		</div>	
    </form>
	<div class="hint-text">Don't have an account? <a href="register.php">Create a new account</a></div>
</div>

</body>
</html>


