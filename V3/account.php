<?php
session_start();
require_once 'Util/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT user_id, username, password_hash, role FROM Users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; 
            header("Location: sessions.php");
            exit();
        } 
        else 
            {
            $error = "Invalid password!";
        }
    } 
    else 
        {
        $error = "User not found!";
   }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/account.css">
</head>
<body>

<?php require 'header.php'; ?>
<br>
<br>

<div class="box">
<h1 class="title">LOGIN</h1>

<div class="login">
        <form action="HomePage.php" method="POST">
            <input type="text" name="username" placeholder="Your email" required>
        <input type="password" name="password" placeholder="Your password" required>
        <button type="submit" class="submit">Login</button>
        </form>  

<form action="Register.php" method="POST">
    <button type="submit" class="register">Register</button>
    </form>
</div>
</div>

<br>
<br>
<?php require 'footer.php'; ?>
<br><br>
<?php require 'social.php'; ?>

</body>
</html>
