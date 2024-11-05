<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    header('Location:sign_in.php');
} 

if (isset($_SESSION['is_logged_in']) || !isset($_GET['id'])) {
    header('Location:../../Task_Manager.php');
} 

try {
    require "../Task.php";
    require_once  "../DatabaseConnection.php";
    $db = new DatabaseConnection();
    $db = new Task($db);
    $db->deleteTask($_GET['id']);
    echo "Taak verwijderd.";
    header("location:../../pages/Task_Manager.php");
    exit();
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>