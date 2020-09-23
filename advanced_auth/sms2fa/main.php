<?php

    // Start Session
    session_start();

    // check user login
    if(empty($_SESSION['user_id']))
    {
        header("Location: login.php");
    }

    // Load PHP files for Database connection
    require 'dbConf.php';
    $db = DB();

    // Load the operation implementations 
    require 'operation.php';
    $app = new Operation($db);
    $user = $app->UserDetails($_SESSION['user_id']);

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Login</title>
<link rel="stylesheet" href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link href="../../css/styles.css" rel="stylesheet" />
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
                    You have logged in by using SMS two factor authentication
                </div>
                <div class="col">
                    
                </div>
            </div>

            <div class="row">
                <div class="col">
                <table class='table table-bordered'>
                    <thead><tr><th scope='col'>Name : </th> <th scope='col'>Phone</th><th scope='col'>Email</th></tr></thead>
                        <tr>
                            <td>
                                <?php  echo $user->name; ?>
                            </td>
                            <td>
                                <?php  echo $user->phone; ?>
                            </td>
                            <td>
                                <?php  echo $user->email; ?>
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