<?php
session_start(); // Ensure the session is started

if (isset($_SESSION['user_id'])==null) {
    header("Location: ../../../app/view/404.php");
    exit(); // Ensure that the script stops execution after redirection
}

if ($_SESSION['type_id'] == 2) {
    header("Location: ../../../app/view/404.php");
    exit(); // Ensure that the script stops execution after redirection
}
?>