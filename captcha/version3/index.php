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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://www.google.com/recaptcha/api.js?render=6Lf7k7oZAAAAAI-I8Gpgc5U9iUWyna8xSnYvrc8h"></script>
<script src="../my.js"></script>
</head>
<body>
<div class="login-form">
	<h2 class="text-center">Create Account with reCAPTCHA3</h2>
	<form id="createaccount" method="post">  
		
		<div id="result"></div>
		           
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="email" placeholder="Username" required="required">	
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">
		</div>       
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="repassword" placeholder="Confirm Password" required="required">
		</div>  
        <div class="form-group clearfix">
			<button type="submit" class="btn btn-primary btn-lg pull-right" name="post">Submit</button>
			<input type="hidden" id="token" name="token">
		</div>	

    </form>
</div>

</body>

<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6Lf7k7oZAAAAAI-I8Gpgc5U9iUWyna8xSnYvrc8h', {action: 'accountform'}).then(function(token) {
        document.getElementById("token").value = token;
      });
  });
  </script>

</html>


