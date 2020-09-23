		
<?php
        session_start();
        
		require 'dbConf.php';
        $db = DB();
        
        require 'operation.php';
        
		$app = new Operation($db);
        $user = $app->UserDetails($_SESSION['user_id']);
        
        $error = '';
        
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			$code = $_POST['code'];
			if ($code == "") {
				$error = 'Please enter authentication code to validated!';
			}
			else
			{
                if($user->pin == $code) {
                    $app->UpdatePin($_SESSION['user_id'],"");
                    header("Location: main.php");
                }   
				else
					$error = 'Invalid Authentication Code!';
			}
		}
?>
		

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Confirm</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../../css/main.css" rel="stylesheet" />

</head>
<body>
<div class="login-form">
	<h2 class="text-center">Verfiy OTP </h2>
	<form id="authform" method="post" action="confirm_auth.php">  

        <?php
            if ($error != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $error. '</div>';
             }
        ?>
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="code" placeholder="Enter Authentication Code" required="required">	
        </div>
       
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary btn-lg pull-right" name="btnVerify">Verify</button>
		</div>	

    </form>
</div>

</body>
</html>
