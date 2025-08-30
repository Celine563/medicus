<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: account.php"); 
    exit();
}
?>
