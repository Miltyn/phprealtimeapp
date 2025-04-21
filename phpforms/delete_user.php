<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';
$userId = $_GET['id'];

if ($userId) {
    $query = "DELETE FROM users WHERE id = $userId";
    $conn->query($query);
    header("Location: admin_dashboard.php");
}
?>
