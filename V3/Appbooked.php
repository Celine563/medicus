<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: Account.php?redirect=Appbooked.php");
    exit();
}

$username = $_SESSION['username'] ?? '';
$role = $_SESSION['role'] ?? '';
if (!isset($_SESSION['appointments'])) {
    $_SESSION['appointments'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service'])) {
    $service = htmlspecialchars($_POST['service']);
    $_SESSION['appointments'][] = $service;
}

if (isset($_GET['remove'])) {
    if ($role === 'admin' || $role === 'doctor') {
        $removeIndex = (int)$_GET['remove'];
        if (isset($_SESSION['appointments'][$removeIndex])) {
            unset($_SESSION['appointments'][$removeIndex]);
            $_SESSION['appointments'] = array_values($_SESSION['appointments']);
        }
    } 
    else 
      {
        echo "<p style='color:red;'>You do not have permission to remove appointments.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Appointments</title>
</head>
<body>
    <h1>Your Appointment List</h1>

    <?php if (empty($_SESSION['appointments'])): ?>
        <p>No appointments booked yet.</p>
    <?php else: ?>
      <ul>
        <?php foreach ($_SESSION['appointments'] as $index => $service): ?>
          <li>
            <?php echo htmlspecialchars($service); ?>
            <?php if ($role === 'admin' || $role === 'doctor'): ?>
              <a href="Appbooked.php?remove=<?php echo $index; ?>">Remove</a>
              <?php endif; ?>
            </li>
            <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          
<a href="HomePage.php">Back to Home</a>
</body>
</html>
