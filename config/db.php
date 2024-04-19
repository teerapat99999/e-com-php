<?php 
$servar = 'localhost';
$username = 'root';
$password = "";
$dbname = "project";

$conn = new mysqli($servar,$username,$password,$dbname);

if($conn->connect_error){
    die("connect error :" . $conn->connect_error);
}

?>