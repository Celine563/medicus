<?php
require_once 'connection.php';

$id = $_GET['id'] ?? 0;

$pdo = Connection::getConnection();
$stmt = $pdo->prepare("SELECT image_data, image_type FROM Images WHERE image_id = ?");
$stmt->execute([$id]);
$image = $stmt->fetch(PDO::FETCH_ASSOC);

if ($image && !empty($image['image_data'])) {
    header("Content-Type: " . $image['image_type']);
    echo $image['image_data'];
    exit;
} 
else 
{
    header("Content-Type: Images/png");
    readfile('Images/doctor.png');
    exit;
}
?>
