<?php
// db_connect.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_managements";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>