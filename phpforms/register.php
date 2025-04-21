<?php
// Start the session
session_start();
include 'db_connect.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect the form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $job_title = $_POST['job_title'];
    $city = $_POST['city'];
    $balance = $_POST['balance'];
    $outstanding_payment = $_POST['outstanding_payment'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to insert data into the users table
    $stmt = $conn->prepare("INSERT INTO users (username, password, name, email, job_title, city, balance, outstanding_payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt) {
        // Bind the parameters to the SQL query
        $stmt->bind_param("ssssssdd", $username, $hashed_password, $name, $email, $job_title, $city, $balance, $outstanding_payment);

        // Execute the query
        if ($stmt->execute()) {
           echo "<script>alert('Thank you for registering! Please visit our nearest branch with proof of employment.'); window.location.href = 'login.php';</script>";
            exit();
        } else {
            echo "<p style='color:red;'>Error: Could not register user. Please try again.</p>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<p style='color:red;'>Error: " . $conn->error . "</p>";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYP<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="stylesheet/register.css">
</head>
<body>
    <h2>Register To Join Our Hire Purchase</h2>
    <form action="register.php" method="POST">
        <label>Username:</label>
        <input type="text" name="username" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Job Title:</label>
        <input type="text" name="job_title"><br>

        <label>City:</label>
        <input type="text" name="city"><br>

        <label>Balance:</label>
        <input type="number" step="0.01" name="balance" required><br>

        <label>Outstanding Payment:</label>
        <input type="number" step="0.01" name="outstanding_payment" required><br>

        <label>Role:</label>
        <input type="text" name="city"><br>
        <p>Already have an account? <a href="login.php">Login here.</a></p>

        <button type="submit">Register</button>
    </form>
    
</body>
</html>