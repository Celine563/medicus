<?php
session_start();
require_once 'Util/connection.php';
$full_name = $_POST['firstname'] . ' ' . $_POST['lastname'];
$type = $_POST['type'];

$stmt = $conn->prepare("INSERT INTO Users (username, password_hash, full_name, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $hashed_password, $full_name, $type);

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/register.css">
</head>
<body>

<?php require 'header.php'; ?>
<br>
<br>

  <div class="box">
    <h1 class="title">REGISTER</h1>

   <div class="Register">
  <form action="Register.php" method="POST">

    <select id="type" name="type" required>
      <option value="">Select user type</option>
      <option value="admin">Admin</option>
      <option value="doctor">Doctor</option>
      <option value="patient">Patient</option>
    </select>

    <input type="text" name="firstname" placeholder="First name" required>
    <input type="text" name="lastname" placeholder="Last name" required>
    <input type="email" name="username" placeholder="Your email" required>
    <input type="password" name="password" placeholder="Your password" required>

    <button type="submit" class="submit">Register</button>
  </form>
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
