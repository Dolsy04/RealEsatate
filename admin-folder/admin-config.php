<?php 
$host = "localhost";
$user = "root";
$pass = "";
$database = "real_estate_website";

$conn = mysqli_connect($host, $user, $pass, $database);

if($conn->connect_error){
    die("Failed to connect to Database".$conn->connect_error);
}
?>