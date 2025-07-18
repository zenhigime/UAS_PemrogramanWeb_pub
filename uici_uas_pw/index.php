<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Rencana Belanja</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <?php include 'includes/header.php'; ?>

  <main class="container">
    <h2>Daftar Belanja</h2>

    <!-- Form tambah item -->
    <form action="php/add_item.php" method="POST" class="add-form">
      <input type="text" name="item_name" placeholder="Nama barang..." required>
      <button type="submit">➕ Tambah</button>
    </form>

    <!-- List belanjaan -->
    <ul class="item-list">
      <?php
        $result = $conn->query("SELECT * FROM items ORDER BY created_at DESC");
        if ($result->num_rows > 0):
          while($row = $result->fetch_assoc()):
      ?>
        <li class="<?= $row['is_checked'] ? 'checked' : '' ?>">
          <span><?= htmlspecialchars($row['name']) ?></span>
          <div class="actions">
            <form action="php/toggle_item.php" method="POST" style="display:inline;">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <button type="submit">✅</button>
            </form>
            <button class="edit-btn" data-id="<?= $row['id'] ?>" data-name="<?= htmlspecialchars($row['name']) ?>">✏️</button>
            <form action="php/delete_item.php" method="POST" style="display:inline;">
              <input type="hidden" name="id" value="<?= $row['id'] ?>">
              <button type="submit" onclick="return confirm('Hapus item ini?')">🗑</button>
            </form>
          </div>
        </li>
      <?php endwhile; else: ?>
        <li>Belum ada item.</li>
      <?php endif; ?>
    </ul>
  </main>

  <!-- Modal Edit (kosong dulu, nanti diisi JS) -->
  <div id="editModal" class="modal hidden">
    <form action="php/update_item.php" method="POST" class="modal-content">
      <input type="hidden" name="id" id="edit-id">
      <input type="text" name="new_name" id="edit-name" required>
      <button type="submit">💾 Simpan</button>
      <button type="button" onclick="closeModal()">✖️ Batal</button>
    </form>
  </div>

  <?php include 'includes/footer.php'; ?>
  <script src="assets/js/main.js"></script>
</body>
</html>
