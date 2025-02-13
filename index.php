<?php
include 'connect.php';
$database="todo";
$conn = new mysqli($servername, $username, $password, $database);
session_start();

/*if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}
*/
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task_name"])) {
    $task_name = $_POST["task_name"];
    $sql = "INSERT INTO to_do_task(task_name) VALUES ('$task_name')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit;
    }
}

$result = $conn->query("SELECT * FROM to_do_task");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">To-Do List</h2>
    <form method="post" class="mb-4">
        <div class="input-group">
            <input type="text" name="task_name" class="form-control" placeholder="Enter task..." required>
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['task_name']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?= $row['created_at']; ?></td>
                <td>
                    <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Update</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>


