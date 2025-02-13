<?php
include 'connect.php';

$database="todo";
$conn = new mysqli($servername, $username, $password, $database);

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$sql = " DELETE FROM to_do_task WHERE id=$id ";
		if($conn->query($sql)===TRUE)
		{
			header("location:index.php");
			exit();
		}
		else
		{
			echo "Error deleting record:". $conn_error;
		}
	}
?>