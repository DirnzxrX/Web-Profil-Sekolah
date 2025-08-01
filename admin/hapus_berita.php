<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}

include '../config.php';

$pesan = "";
$jenisPesan = "";

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Hapus dari database
  $query = mysqli_query($koneksi, "DELETE FROM berita WHERE id = $id");

  if ($query) {
    $pesan = "Berita berhasil dihapus!";
    $jenisPesan = "success";
  } else {
    $pesan = "Gagal menghapus data!";
    $jenisPesan = "danger";
  }
} else {
  $pesan = "ID tidak ditemukan.";
  $jenisPesan = "danger";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hapus Berita - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="dashboard-container">
    <!-- Header -->
    <div class="header fade-in">
      <h1><i class="fas fa-trash"></i> Hapus Berita</h1>
      <div class="user-info">
        <i class="fas fa-user-circle"></i> Admin: <strong><?= $_SESSION['admin'] ?></strong>
      </div>
    </div>

    <!-- Message Card -->
    <div class="content-card fade-in">
      <div class="text-center">
        <?php if ($jenisPesan == "success"): ?>
          <i class="fas fa-check-circle" style="font-size: 4rem; color: #48bb78; margin-bottom: 20px;"></i>
        <?php else: ?>
          <i class="fas fa-exclamation-triangle" style="font-size: 4rem; color: #f56565; margin-bottom: 20px;"></i>
        <?php endif; ?>
        
        <h3 style="color: #4a5568; margin-bottom: 15px;">
          <?= $jenisPesan == "success" ? "Berita Berhasil Dihapus!" : "Terjadi Kesalahan" ?>
        </h3>
        
        <div class="alert-modern alert-<?= $jenisPesan ?> mb-4">
          <i class="fas fa-<?= $jenisPesan == 'success' ? 'check-circle' : 'exclamation-triangle' ?>"></i>
          <?= $pesan ?>
        </div>
        
        <a href="dashboard.php" class="btn-modern">
          <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
