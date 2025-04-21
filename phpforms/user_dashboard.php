<?php
session_start();
if ($_SESSION['role'] != 'user') {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($query);
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update job title and city
    $job_title = $_POST['job_title'];
    $city = $_POST['city'];
    $update_query = "UPDATE users SET job_title='$job_title', city='$city' WHERE username='$username'";
    $conn->query($update_query);
    
    // Set user theme preference cookie
    if (isset($_POST['theme'])) {
        setcookie("theme", $_POST['theme'], time() + (30 * 24 * 60 * 60), "/"); 
    }

    header("Refresh:0"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="stylesheet/user.css"> <!-- Link to your CSS file -->
</head>
<body class="<?php echo isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light'; ?>">
<body>

    <div class="container">
        <header>
            <h1>User Dashboard</h1>
            <a href="logout.php" class="logout-button">Logout</a>
        </header>

        <div class="user-info">
            <h2>Profile Information</h2>
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            <p><strong>Balance:</strong> <?php echo number_format($user['balance'], 2); ?></p>
            <p><strong>Outstanding Payment:</strong> <?php echo number_format($user['outstanding_payment'], 2); ?></p>
        </div>

        <form method="POST" class="update-form">
            <h2>Update Information</h2>
            <div class="form-group">
                <label for="job_title">Job Title:</label>
                <input type="text" name="job_title" id="job_title" value="<?php echo $user['job_title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" id="city" value="<?php echo $user['city']; ?>" required>
            </div>
            <label for="theme">Select Theme:</label>
            <select name="theme" id="theme">
               <option value="light" <?php if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'light') echo 'selected'; ?>>Light</option>
               <option value="dark" <?php if (isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'dark') echo 'selected'; ?>>Dark</option>
             </select><br>
            <button type="submit" class="update-button">Update</button>
        </form>
    </div>

</body>
</html>