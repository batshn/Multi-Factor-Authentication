<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page (index.html)
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link href="../css/styles.css" rel="stylesheet" />
</head>
<body>

    <header class="masthead bg-attack text-white text-center">
            <div class="container d-flex align-items-center flex-column"></div>
                <h4>Welcome to our E-Commerce Site.</h4>
            </div>
    </header>
        <div class="row">
            <div class="col-sm">
            </div>
            <div class="col-sm">
            </div>
            <div class="col-sm">
                <a href="logout.php" class="btn btn-outline-danger btnLog">Sign Out of Your Account</a>
        </div>
            
 
    </div>
	<div class="container">
            <div class="row">
                <div class="col">
                    You have been logged successfully by using valid 2FA secret code.
                </div>
                <div class="col">
                    
                </div>
            </div>

            <div class="row">
                <div class="col">
                <table class='table table-bordered'>
                    <thead><tr><th scope='col'>Firstname : </th> <th scope='col'>email</th></tr></thead>
                        <tr>
                            <td>
                                <?php echo $_SESSION["fname"]; ?>
                            </td>
                            <td>
                                <?php echo $_SESSION["email"]; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col">
                    
                </div>
            </div>
	</div>
    
</body>
</html>