<?php

    $msg="";

if(isset($_POST["log_otp"])) {

    require_once "db_config.php";
    $stmt = $conn->prepare('SELECT * FROM users_login WHERE otp = ? AND expired!=1 AND NOW() <= DATE_ADD(otp_datetime, INTERVAL 1 HOUR)');
    $stmt->bind_param('i', $_POST["log_otp"]);
    $stmt->execute();
    $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $stmt = $conn->prepare('UPDATE users_login SET expired=1 WHERE otp = ? ');
            $stmt->bind_param('i', $_POST["log_otp"]);
            $stmt->execute();

            session_start();
            $_SESSION["loggedin"]=true;
            header("location: main.php");
        }
        else $msg="OTP is invalid";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login OTP</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/main.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>
<body>
<div class="login-form">
	<h2 class="text-center">Enter OTP</h2>
	<form id="log_otp_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
        <div id="result"><?php echo $msg ?></div>
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="log_otp" placeholder="Enter the code" required="required">	
        </div>        
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary btn-lg pull-left">Verify</button>
		</div>	
    </form>
</div>

</body>
</html>


