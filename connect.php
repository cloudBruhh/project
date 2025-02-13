<?php
$servername="localhost";
$username="root";
$password="";
	$conn= new mysqli($servername,$username,$password);
	if($conn->connect_error)
	{
		die("connection failed");
	}
	else 
	{
		echo "connection successful";
	}
?>