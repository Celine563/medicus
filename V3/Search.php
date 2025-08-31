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
  <link rel="stylesheet" type="text/css" href="CSS/search.css">
  <link rel="stylesheet" type="text/css" href="CSS/homePage.css">
</head>
<body>

<?php require 'header.php'; ?>
<br>
<br>

<div class="search">
<form method="GET" action="">
    <input type="text" name="search" placeholder="Search">
    <button type="submit">Search</button>
</form>
</div>


<br>
<br>
<?php require 'footer.php'; ?>
<br>
<br>
<?php require 'social.php'; ?>

</body>
</html>
