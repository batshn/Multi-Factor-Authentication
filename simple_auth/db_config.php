<?php
/* 
Define Database credentials. 
In MySQL server with default setting:
user is 'root' with no password 
*/

$server_name = 'localhost:3308';
$user_name = 'root';
$db_password = '';
$db_name = 'ecommercedb';
 
/* Connect to MySQL database */
$conn = mysqli_connect($server_name, $user_name, $db_password, $db_name);
 
// Check database connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>