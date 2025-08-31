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
</head>
<body>

<?php require 'header.php'; ?>

<br>

<div class="welcome">
  <div class="welcomeHeader">
<h2>Welcome to Medicus</h2>
</div>
<p>Medicus is here for you anytime with our 24/7 online call service, offering immediate support <br>
 whenever you need it. For face-to-face care, our clinic is open Monday through Saturday from <br>
 9:00 AM to 10:00 PM. Whether it's day or night, your well-being is always our priority. </p>
</div>

        <img src="Util/img_upload.php?id=6" alt="Doctor" class="doctor">

<div class="number">
<p>CALL US: <a href="tel:+353822179795" class="nu">+353 822179795</a></p>
</div>

<br>
<br>

<div class="Services">
  <h1>Our Services:</h1>
  <div class="serv">
    <br>
    <br>


    <a href="whoops.php" class="servicess">
      <div class="Services">
        <img src="Util/img_upload.php?id=2" alt="Online doctor">
        <h3>Online Doctor</h3>
        <div class="call">Call Us</div>
      </div>
    </a>

    <a href="whoops.php" class="services">
      <div class="Services">
        <img src="Util/img_upload.php?id=1" alt="Call a doctor">
        <h3>Call a Doctor</h3>
        <div class="call">Call Us</div>
      </div>
    </a>

      <a href="whoops.php" class="services">
      <div class="Services">
        <img src="Util/img_upload.php?id=3" alt="Online perescription">
        <h3>Online Prescription</h3>
        <div class="call">Call Us</div>
      </div>
    </a>

          <a href="whoops.php" class="services">
      <div class="Services">
        <img src="Util/img_upload.php?id=4" alt="Schedule an appointment">
        <h3>Schedule am appointment</h3>
        <div class="call">Call Us</div>
      </div>
    </a>
 </div>
  </div>



<br>
<br>

<?php require 'footer.php'; ?>
<br>
<br>
<?php require 'social.php'; ?>

</body>
</html>
