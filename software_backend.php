<?php
require_once 'db.php';

// Handle Add Software
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name']) && isset($_POST['short_name'])) {
    $name = $_POST['name'];
    $short_name = $_POST['short_name'];
    $color = isset($_POST['color']) ? $_POST['color'] : '#1a73e8';
    $category = isset($_POST['category']) ? $_POST['category'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;

    $stmt = $conn->prepare("INSERT INTO software (name, short_name, color, category, description) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $short_name, $color, $category, $description);
    $stmt->execute();
    $stmt->close();
    header('Location: software.php');
    exit;
}
?>
