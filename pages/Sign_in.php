<?php
session_start();
require "../database/User.php";
require_once  "../database/DatabaseConnection.php";
$db = new DatabaseConnection();
$user = new User($db);
if (isset($_SESSION['is_logged_in'])) {
    header('Location:dashboard.php');
    exit();
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $userdata = $user->signin($_POST['username'], $_POST['password']);
    if ($userdata) {
        header("Location:dashboard.php");
        exit();
    } else {
        echo "verkeerde gebruikersnaam of wachtwoord";
        exit();
    }
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign in</title>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Wachtwoord:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <br>
    <a href="Sign_up.php" class="btn btn-secondary">Sign up</a>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>