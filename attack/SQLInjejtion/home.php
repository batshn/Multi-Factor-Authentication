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
        <form action="" method="get">
            <div class="form-group">
                <label for="email">Book Title</label>
                <input type="text" class="form-control" name="bookTitle" placeholder="Enter Boot Title: ">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="bookList">
            <div class="row">
                <div class="col">
<?php
    
    if(!empty($_GET['bookTitle'])){
        $bookTitle = $_GET["bookTitle"];
        // Show All records
        $sql = "SELECT * FROM books where book_title= '".$bookTitle."'";
        $result = mysqli_query($link, $sql);
        
        echo "<table class='table table-bordered'>";
        echo "<thead><tr><th scope='col'>ID</th> <th scope='col'>Book Title</th><th scope='col'>Author</th><th scope='col'>Price</th></tr></thead>";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row['id']."</td><td>".$row['book_title']."</td><td>".$row['author']."</td><td>".$row['amount']."</td></tr>";
            }
        }
        else {
            echo "no book list";
        }
        echo "</table>";
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