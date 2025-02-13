<?php
require 'connect.php'; 
$database="todo";
$conn = new mysqli($servername, $username, $password, $database);

$sql = "CREATE TABLE IF NOT EXISTS to_do_task (
    id INT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    status ENUM('Pending', 'Completed') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql)) {
    die("Error creating table: " . $conn->error);
}
else {
	echo "created successfully";
}
?>