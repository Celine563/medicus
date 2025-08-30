<?php
session_start();
require_once 'Util/connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname  = $_POST['lastname'] ?? '';
    $full_name = trim($firstname . ' ' . $lastname);
    $type      = $_POST['type'] ?? '';
    $username  = $_POST['username'] ?? '';
    $password  = $_POST['password'] ?? '';

    if (!empty($username) && !empty($password) && !empty($type)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $pdo = Connection::getConnection();

            $stmt = $pdo->prepare("INSERT INTO Users (username, password_hash, full_name, role) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$username, $hashed_password, $full_name, $type])) {
                header("Location: account.php");
                exit();
            } else {
                $error = "Database insert failed.";
            }
        } catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    } else {
        $error = "Please fill in all required fields.";
    }
}
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
