<?php
session_start();
require_once 'Util/connection.php'; 

$success = "";
$error   = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'] ?? '';
    $lastname  = $_POST['lastname'] ?? '';
    $username  = $_POST['username'] ?? ''; 
    $password  = $_POST['password'] ?? '';
    $type      = $_POST['type'] ?? '';

    if (!empty($username) && !empty($password) && !empty($type) && !empty($firstname) && !empty($lastname)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $pdo = Connection::getConnection();

            $stmt = $pdo->prepare("
                INSERT INTO Users (username, email, password_hash, first_name, last_name, role) 
                VALUES (?, ?, ?, ?, ?, ?)
            ");

            if ($stmt->execute([$username, $username, $hashed_password, $firstname, $lastname, $type])) {
                $success = "🎉 Congrats, you registered successfully! Redirecting to login...";
                header("refresh:3;url=login.php"); 
                $error = "Database insert failed.";
            }
        } 
        catch (PDOException $e) {
            $error = "Database error: " . $e->getMessage();
        }
    } 
    else {
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
<br><br>

<div class="box">
  <h1 class="title">REGISTER</h1>

  <?php if ($success): ?>
      <p style="color: green; font-weight: bold;"><?= $success ?></p>
  <?php elseif ($error): ?>
      <p style="color: red; font-weight: bold;"><?= $error ?></p>
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
      <input type="email" name="username" placeholder="Your email" required>
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
