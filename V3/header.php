<?php
require_once 'Util/connection.php';

?>

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
            <li><a href="xray.php">X-ray</a></li>
            <li><a href="blood_test.php">Blood Test</a></li>
            <li><a href="consultation.php">Consultation</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <h3>Services</h3>
        <ul class="menu">
            <li><a href="general_care.php">General Care</a></li>
            <li><a href="emergency.php">Emergency</a></li>
            <li><a href="specialists.php">Specialists</a></li>
            <li><a href="online.php">Online Prescription</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <h3>About Us</h3>
        <ul class="menu">
            <li><a href="about.php">Our Story</a></li>
            <li><a href="team.php">Meet the Team</a></li>
        </ul>
    </div>

    <div class="dropdown">
        <h3>Contact Us</h3>
        <ul class="menu">
            <li><a href="contact.php">Contact Form</a></li>
            <li><a href="location.php">Location</a></li>
        </ul>
    </div>

    <a href="search.php"><img src="Images/Search.png" alt="search" class="search"></a>
    <a href="account.php"><img src="Images/Account.png" alt="account" class="account"></a>
</nav>

</body>
</html>
