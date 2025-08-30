<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: account.php");
    exit();
}
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" type="text/css" href="CSS/account.css"> 
    <link rel="stylesheet" type="text/css" href="CSS/homePage.css">
</head>
<body>

<?php require 'header.php'; ?>
<br><br>

<div class="box">
    <h1 class="title">LOGOUT</h1>

    <form action="logout.php" method="POST">
        <button type="submit" class="logout">Logout</button>
    </form>
</div>

<br><br>
<?php require 'footer.php'; ?>
<br><br>
<?php require 'social.php'; ?>

</body>
</html>

