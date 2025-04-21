<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role']; // Get role from form

    // Check if the user exists with the selected role
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['role'] = $role;
        $_SESSION['username'] = $username;
        
        // Redirect based on role
        if ($role == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit();
    } else {
        echo "<script>alert('Enter correct details !!!! ')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet/login.css">
</head>
<body>
<div id = "Form">
        
        <form method="POST" action="login.php">
        <h1>Login Form</h1> 
        <h3>Welcome back!! Please enter your details</h3>
        <label>Role:</label>
        <select name="role">
             <option value="user">User</option>
              <option value="admin">Admin</option>
         </select>
            <br><br><br>
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label> 
        <input type="password" name="password" required>
        <button type="submit">Login</button>
                <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            </form>
    
        </div>
        <label>
    
</label>
</body>
</html>