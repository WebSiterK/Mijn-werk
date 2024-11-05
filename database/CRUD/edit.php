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
        $taskId = $_POST['taskId'];
        $userId = $_POST['userId'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $db->updateTask($taskId, $userId, $title, $description, $status, $priority);
        echo "Taak bijgewerkt!";
        header("location: ../../pages/Task_Manager.php");
        exit();
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage();
    }
}
$task_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$taskdata = $db->getTaskById($task_id);
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
        <input type="hidden" name="taskId" value="<?php echo isset($taskdata['id']) ? $taskdata['id'] : ''; ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="userId">User  Id</label>
        <input type="text" name="userId" class="form-control" id="userId" 
        value="<?php echo isset($taskdata['user_id']) ? $taskdata['user_id'] : ''; ?>" placeholder="Voer Gebruiker Id in" required>
    </div>
    <br>
    <div class="form-group">
        <label for="titel">Titel</label>
        <input type="text" name="title" class="form-control" id="titel"
        value="<?php echo isset($taskdata['title']) ? $taskdata['title'] : ''; ?>" placeholder="Voer Taak Titel in" required>
    </div>
    <br>
    <div class="form-group">
        <label for="beschrijving">Beschrijving</label>
        <textarea name="description" class="form-control" id="beschrijving"
        value="<?php echo isset($taskdata['description']) ? $taskdata['description'] : ''; ?>" placeholder="Voer Taak Beschrijving in"></textarea>
    </div>
    <br>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status">
        <option value="">Selecteer Status</option>
        <option value="Open">Open</option>
        <option value="In progress">In Behandeling</option>
        <option value="Completed">Voltooid</option>
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="prioriteit">Prioriteit</label>
        <select name="priority" class="form-control" id="prioriteit">
        <option value="">Selecteer Prioriteit</option>
        <option value="Low">Laag</option>
        <option value="Medium">Gemiddeld</option>
        <option value="High">Hoog</option>
    </select>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Taak bijwerken">
</form>
</div>
</body>
</html>