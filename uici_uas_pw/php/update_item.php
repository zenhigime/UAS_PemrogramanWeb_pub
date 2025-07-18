<?php
include '../includes/db.php';

if (isset($_POST['id']) && isset($_POST['new_name'])) {
    $id = intval($_POST['id']);
    $newName = trim($_POST['new_name']);

    if (!empty($newName)) {
        $stmt = $conn->prepare("UPDATE items SET name = ? WHERE id = ?");
        $stmt->bind_param("si", $newName, $id);
        $stmt->execute();
    }
}

header("Location: ../index.php");
exit;
?>
