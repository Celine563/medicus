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
    <img src="Util/img_upload.php?id=7" alt="X-ray" class="image">
<div class="left">
        <h1 class="text">X-ray</h1>
    <p>X-rays are a form of electromagnetic radiation used <br> in medicine to create images of the inside of the body, <br> such as bones, tissues, and organs</p>
<div class="addToApp">
    <?php if ($loggedIn): ?>
        <form action="Appbooked.php" method="post">
            <input type="hidden" name="service" value="X-ray">
            <button type="submit" class="button">Book an X-ray</button>
        </form>
    <?php else: ?>
        <a href="login.php?redirect=Account.php" class="button">Book an X-ray</a>
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
