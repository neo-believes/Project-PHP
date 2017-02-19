<?php
$servername="localhost";
$username="user1";$password="pass";
$dbname="backend";
$conn= new mysqli($servername, $username,$password,$dbname);
if($conn->connect_error){
	die("connection failed".$conn->connect_error);
	}
?>

