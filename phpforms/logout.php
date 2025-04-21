<?php
session_start();
session_unset();
session_destroy(); // Destroy the session

// Clear cookies
setcookie("username", "", time() - 3600, "/"); // Expire the cookie
setcookie("role", "", time() - 3600, "/"); // Expire the cookie
setcookie("theme", "", time() - 3600, "/"); // Expire the cookie
setcookie("last_login", "", time() - 3600, "/"); // Expire the cookie

header("Location: login.php");
?>
