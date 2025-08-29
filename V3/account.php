<?php
require_once 'Util/connection.php';

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
      <form action="login.php" method="POST">
              <input type="username" name="username" placeholder="Your email" required>
              <input type="password" name="password" placeholder="Your password" required>
              <button type="submit">Subscribe</button>
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
