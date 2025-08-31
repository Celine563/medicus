<?php
session_start();
require_once 'Util/connection.php'; 

$success = null;
$error   = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = trim($_POST['firstname'] ?? '');
    $lastname  = trim($_POST['lastname'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $username  = trim($_POST['username'] ?? ''); 
    $password  = $_POST['password'] ?? '';
    $type      = $_POST['type'] ?? '';

    if ($firstname && $lastname && $username && $password && $type) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        try {
            $pdo = Connection::getConnection();

            $stmt = $pdo->prepare("
                INSERT INTO Users (username, email, password_hash, first_name, last_name, role) 
                VALUES (?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([$username, $email, $hashed_password, $firstname, $lastname, $type]);
           $success = " ";
            header("refresh:3;url=Account.php"); 
        } 
        catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
          }
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
<br><br>

<div class="box">
  <h1 class="title">REGISTER</h1>


  <?php if ($success): ?>
      <p class="success"><?= $success ?> Registered</p>
  <?php elseif ($error): ?>
      <p class="error"><?= $error ?>Try again</p>
  <?php endif; ?>


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
      <input type="text" name="username" placeholder="Your username" required>
      <input type="email" name="email" placeholder="Your email" required>
      <input type="password" name="password" placeholder="Your password" required>

      <button type="submit" class="submit">Register</button>
    </form>
  </div>
</div>

<br><br>
<?php require 'footer.php'; ?>
<br><br>
<?php require 'social.php'; ?>

</body>
</html>
