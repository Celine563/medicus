<?php
session_start();
$loggedIn = isset($_SESSION['user_id']);
$username = $_SESSION['username'] ?? '';

if (!isset($_SESSION['user_id'])) {
    $loggedIn = false;
} 
else 
    {
    $loggedIn = true;
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/homePage.css">
  <link rel="stylesheet" type="text/css" href="CSS/app.css">
</head>
<body>

<?php require 'header.php'; ?>
<br>

<div class="app">
    <img src="Util/img_upload.php?id=8" alt="blood test" class="image">
<div class="left">
        <h1 class="text">Blood test</h1>
    <p>A blood test is a medical procedure where a sample of blood is taken and analyzed in a lab to assess a person's health.</p>
<div class="addToApp">
    <?php if ($loggedIn): ?>
        <form action="Appbooked.php" method="post">
            <input type="hidden" name="service" value="Blood test">
            <button type="submit" class="button">Book a Blood test</button>
        </form>
    <?php else: ?>
        <a href="login.php?redirect=Account.php" class="button">Book a Blood test</a>
    <?php endif; ?>
</div>
</div>
</div>



<br>
<br>
<?php require 'footer.php'; ?>
<br>
<?php require 'social.php'; ?>
</body>
</html>
