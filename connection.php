<?php 
// // Connection to database 

$servername="localhost";
$username="root";
$password="";
$dbname="inventory";

// Create a connection 
$conn = mysqli_connect($servername,$username,$password,$dbname);



if (!$conn) {
    die("Connection Failed") .mysqli_error($con);
}




?>