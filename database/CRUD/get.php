<?php 
require "../database/Task.php";
require_once  "../database/DatabaseConnection.php";
$db = new DatabaseConnection();
$db = new Task($db);

if (!isset($_SESSION['is_logged_in'])) {
    header('Location:sign_in.php');
} else {
    if (isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id'];
    } else {
        echo "User Id is niet ingesteld in de sessie.";
        exit;
    }
}
$tasks = $db->readTasks($userId);
    foreach ($tasks as $task) {
        echo "<tr>";
        echo "<td>".$task['id']."</td>";
        echo "<td>".$task['user_id']."</td>";
        echo "<td>".$task['title']."</td>";
        echo "<td>".$task['description']."</td>";
        echo "<td>".$task['status']."</td>";
        echo "<td>".$task['priority']."</td>";
        echo "<td>".$task['created_at']."</td>";
        echo "<td> <a class='btn btn-primary' href='../database/CRUD/edit.php?id=".$task['id']."'>Edit</a></td>";
        echo "<td> <a class='btn btn-danger' href='../database/CRUD/delete.php?id=".$task['id']."'>Delete</a></td>";
        echo "</tr>";
    }
?>