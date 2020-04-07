<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="password";
	$dbname="login";
	
	$conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	} 
	
?>