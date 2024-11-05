<?php
session_start();
require "../Task.php";
require_once  "../DatabaseConnection.php";
$db = new DatabaseConnection();
$db = new Task($db);

if (!isset($_SESSION['is_logged_in'])) {
    header('Location:sign_in.php');
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $userId = $_POST['userId'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $db->addTask($userId, $title, $description, $priority);
        echo "Taak toegevoegd!";
        header("location: ../../pages/Task_Manager.php");
        exit();
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taken beheren</title>
</head>
<body>
<div class="container">
<form method="POST" class="w-50">
    <div class="form-group">
        <label for="userId">User Id</label>
        <input type="text" name="userId" class="form-control" id="userId" placeholder="Voer Gebruiker Id in" required>
    </div>
    <br>
    <div class="form-group">
        <label for="titel">Titel</label>
        <input type="text" name="title" class="form-control" id="titel" placeholder="Voer Taak Titel in" required>
    </div>
    <br>
    <div class="form-group">
        <label for="beschrijving">Beschrijving</label>
        <textarea name="description" class="form-control" id="beschrijving" placeholder="Voer Taak Beschrijving in" required></textarea>
    </div>
    <br>
    <div class="form-group">
        <label for="prioriteit">Prioriteit</label>
        <select name="priority" class="form-control" id="prioriteit">
            <option value="low">Laag</option>
            <option value="medium">Gemiddeld</option>
            <option value="high">Hoog</option>
        </select>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Taak toevoegen">
</form>
</div>
</body>
</html>