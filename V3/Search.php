<?php
require_once 'Util/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="CSS/search.css">
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
