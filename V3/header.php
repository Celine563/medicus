<?php

$loggedIn = isset($_SESSION['user_id']);
$username = $loggedIn ? $_SESSION['username'] : '';
?>

<div class="welcome">
 <?php if ($loggedIn): ?>
        <p>Welcome, <?= htmlspecialchars($username) ?>!</p>
    <?php endif; ?>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medicus</title>
    <link rel="stylesheet" type="text/css" href="CSS/header.css">
</head>
<body>
<nav class="top">
   
    <h1><a href="HomePage.php">Medicus</a></h1>
    

    <div class="dropdown">
        <h3>Appointments</h3>
        <ul class="menu">
            <li><a href="X-ray.php">X-ray</a></li>
            <li><a href="bloodTest.php">Blood Test</a></li>
            <li><a href="consultation.php">Consultation</a></li>
            <li><a href="Appbooked.php">Booked appointments</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <h3>Services</h3>
        <ul class="menu">
            <li><a href="whoops.php">General Care</a></li>
            <li><a href="whoops.php">Emergency</a></li>
            <li><a href="whoops.php">Specialists</a></li>
            <li><a href="whoops.php">Online Prescription</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <h3>About Us</h3>
        <ul class="menu">
            <li><a href="whoops.php">Our Story</a></li>
            <li><a href="whoops.php">Meet the Team</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <h3>Contact Us</h3>
        <ul class="menu">
            <li><a href="whoops.php">Contact Form</a></li>
            <li><a href="whoops.php">Location</a></li>
        </ul>
    </div>

    <a href="search.php"><img src="Images/Search.png" alt="search" class="search"></a>
<?php if ($loggedIn): ?>
    <a href="profile.php"><img src="Images/Account.png" alt="account" class="account"></a>
<?php else: ?>
    <a href="account.php"><img src="Images/Account.png" alt="account" class="account"></a>
<?php endif; ?>


</nav>

</body>
</html>
