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
<html>
<head>
    <title>Session</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <p>Your role: <?php echo htmlspecialchars($role); ?></p>

    <nav>
        <ul>
        <li><a href="Account.php">Profile</a></li>
            <?php if($role === 'admin') echo '<li><a href="admin_panel.php">Admin Panel</a></li>'; ?>
         <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
