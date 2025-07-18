<?php
include '../includes/db.php';

if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Ambil status sekarang
    $result = $conn->query("SELECT is_checked FROM items WHERE id = $id");
    $row = $result->fetch_assoc();
    $currentStatus = $row['is_checked'];

    // Toggle status: 1 -> 0, 0 -> 1
    $newStatus = $currentStatus ? 0 : 1;

    $stmt = $conn->prepare("UPDATE items SET is_checked = ? WHERE id = ?");
    $stmt->bind_param("ii", $newStatus, $id);
    $stmt->execute();
}

header("Location: ../index.php");
exit;
?>
