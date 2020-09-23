<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>2FA</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/main.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="../my.js"></script>
</head>
<body>
<div class="login-form">
	<h2 class="text-center">Login - 2FA</h2>
	<form id="loginform" method="post" action="check_cred_login.php">  
		
		<div id="result"></div>
		<div class="avatar">
			<img src="../assets/img/avatar.png" alt="Avatar">
		</div> 
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


