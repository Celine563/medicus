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
    <img src="Util/img_upload.php?id=9" alt="Consultation" class="image">
<div class="left">
        <h1 class="text">Consultation</h1>
    <p>a meeting in which a doctor talks to a person about a problem, question, etc.</p>
<div class="addToApp">
    <?php if ($loggedIn): ?>
        <form action="Appbooked.php" method="post">
            <input type="hidden" name="service" value="Consultation">
            <button type="submit" class="button">Consultation</button>
        </form>
    <?php else: ?>
        <a href="login.php?redirect=Account.php" class="button">Consultation</a>
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
