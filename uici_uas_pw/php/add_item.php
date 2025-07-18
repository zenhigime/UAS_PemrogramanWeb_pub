<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/db.php';

if (isset($_POST['item_name']) && !empty(trim($_POST['item_name']))) {
    $name = trim($_POST['item_name']);

    $stmt = $conn->prepare("INSERT INTO items (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
}

header("Location: ../index.php");
exit;
?>
