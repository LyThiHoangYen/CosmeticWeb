<?php
session_start();
// IF not session or not logged in
if (!isset($_SESSION['user_id'])) {
    include '../../resources/includes/header.php';
} else {
    include '../../resources/includes/headerLogged.php';
}
?>