<?php
include 'connect.php';
$database="todo";
$conn = new mysqli($servername, $username, $password, $database);
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM to_do_task WHERE id = $id");
$task = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status = $_POST["status"];
    $sql = "UPDATE to_do_task SET status = '$status' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php"); 
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">Update Task</h2>
    
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body">
            <h5 class="card-title"><?= $task['task_name']; ?></h5>
            <form method="post">
                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Pending" <?= ($task['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                        <option value="Completed" <?= ($task['status'] == 'Completed') ? 'selected' : ''; ?>>Completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Update</button>
                <a href="index.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
