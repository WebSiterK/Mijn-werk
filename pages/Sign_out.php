<?php
session_start();
$_SESSION['is_logged_in'] = false;
session_destroy();
header("Location:sign_in.php");
?>