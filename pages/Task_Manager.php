<?php
session_start();
if (!isset($_SESSION['is_logged_in'])) {
    header('Location:sign_in.php');
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Task_Manager.php">Taken beheren <span class="sr-only"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="Dashboard.php">Dashboard</a>
                </li>
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_id'])): ?>
                    <li> <a class="nav-link" href="">User Id:<?php echo htmlspecialchars($_SESSION['user_id']); ?></a></li>
                <?php else: ?>
                    <li><a class="nav-link" href="sign_in.php">Sign in</a></li>
                <?php endif; ?>
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_id'])): ?>
                    <li><a class="nav-link" href="sign_out.php">Sign out</a></li>
                <?php else: ?>
                    <li><a class="nav-link" href="sign_up.php">Sign up</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2 class="my-4">Taken beheren</h2>
        <h2>Overzicht taken</h2>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Gebruiker Id</th>
                    <th>Titel</th>
                    <th>Beschrijving</th>
                    <th>Status</th>
                    <th>Prioriteit</th>
                    <th>Gemaakt op</th>
                    <th colspan="2">Actie</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "../database/CRUD/get.php";
                ?>
            </tbody>
        </table>
        <a href="../database/CRUD/add.php" class="btn btn-primary mb-3">Taak toevoegen</a>
        <div class="d-flex justify-content-end">
            <a class="btn btn-danger" href="sign_out.php">Sign out</a>
        </div>
    </div>
</body>
</html>