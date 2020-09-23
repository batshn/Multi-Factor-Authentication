<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page (index.html)
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.html");
    exit;
}

require_once "../db_config.php";
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>User Login</title>
<link rel="stylesheet" 
href=https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<link href="../../css/styles.css" rel="stylesheet" />
</head>
<body>

    <header class="masthead bg-attack text-white text-center">
            <div class="container d-flex align-items-center flex-column"></div>
                <h2 class="page-section-heading text-center text-uppercase  mb-0">Hi, <?php echo $_SESSION["first_name"]." ".$_SESSION["last_name"]; ?> </h2>
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
        <div class="bookList">
            <div class="row">
                <div class="col">
<?php

    if ($_COOKIE["IsUserAdmin"]==1) {
        // Show All records
        $sql = "SELECT * FROM users";
        $result = mysqli_query($link, $sql);
        
        echo "Hello!, Web administrator";
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th scope='col'>Fist Name</th> <th scope='col'>Last Name</th><th scope='col'>Email</th><th scope='col'>Is Admin</th></tr></thead>";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['email']."</td><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['IsAdmin']."</td></tr>";
            }
        }
        else {
            echo "no user list";
        }
        echo "</table>";

    }
    else {
        echo "Hello!, Web User";
    }

?>
                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>
	</div>
    
</body>
</html>