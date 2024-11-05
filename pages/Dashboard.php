<?php
session_start();
if (!isset($_SESSION['is_logged_in']) && !isset($_SESSION['user_id'])) {
    header('Location:sign_in.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taken beheren</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Task_Manager.php">Taken beheren</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
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
        <h1>Welcome</h1>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>