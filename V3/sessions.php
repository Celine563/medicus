<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: Account.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Your role: <?php echo htmlspecialchars($role); ?></p>

    <nav>
        <ul>
            <li><a href="Account.php">Profile</a></li>
            <?php if ($role === 'admin'): ?>
                <li><a href="admin_panel.php">Admin Panel</a></li>
            <?php endif; ?>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="HomePage.php">Home Page</a></li>
            <li><a href="Appbooked.php">Appointments booked</a></li>
        </ul>
    </nav>
</body>
</html>
