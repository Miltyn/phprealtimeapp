<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'db_connect.php';

$query = "SELECT * FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="stylesheet/admin.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Dashboard</h1>
            <a href="logout.php" class="logout-button">Logout</a>
        </header>

        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Job Title</th>
                    <th>City</th>
                    <th>Balance</th>
                    <th>Outstanding Payment</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['job_title']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo number_format($row['balance'], 2); ?></td>
                        <td><?php echo number_format($row['outstanding_payment'], 2); ?></td>
                        <td><a href="delete_user.php?id=<?php echo $row['id']; ?>" class="delete-button" onclick="return confirm('Are you sure?')">Delete</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>