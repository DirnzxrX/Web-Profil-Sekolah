<?php
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");
include '../config.php';

$pesan = "";
$jenisPesan = "";

if (isset($_POST['simpan'])) {
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tanggal = $_POST['tanggal'];

  if ($judul == "" || $isi == "" || $tanggal == "") {
    $pesan = "Semua form harus diisi!";
    $jenisPesan = "danger";
  } else {
    $query = mysqli_query($koneksi, "INSERT INTO berita (judul, isi, tanggal) VALUES ('$judul', '$isi', '$tanggal')");

    if ($query) {
      $pesan = "Berita berhasil ditambahkan!";
      $jenisPesan = "success";
    } else {
      $pesan = "Gagal menyimpan: " . mysqli_error($koneksi);
      $jenisPesan = "danger";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Berita - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="dashboard-container">
    <!-- Header -->
    <div class="header fade-in">
      <div class="user-info">
      </div>
    </div>

    <!-- Form Card -->
    <div class="content-card fade-in">
      <h3><i class="fas fa-edit"></i> Form Tambah Berita</h3>
      
      <?php if ($pesan): ?>
        <div class="alert-modern alert-<?= $jenisPesan ?>">
          <i class="fas fa-<?= $jenisPesan == 'success' ? 'check-circle' : 'exclamation-triangle' ?>"></i>
          <?= $pesan ?>
        </div>
      <?php endif; ?>

      <form method="post" class="mt-4">
        <div class="row">
          <div class="col-md-8">
            <div class="form-group">
              <label class="form-label">
                <i class="fas fa-heading"></i> Judul Berita
              </label>
              <input type="text" name="judul" class="form-control" placeholder="Masukkan judul berita" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-label">
                <i class="fas fa-calendar"></i> Tanggal Publikasi
              </label>
              <input type="date" name="tanggal" class="form-control" required>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-file-text"></i> Isi Berita
          </label>
          <textarea name="isi" class="form-control" rows="10" placeholder="Tulis isi berita di sini..." required></textarea>
        </div>
        
        <div class="d-flex gap-3 mt-4">
          <button type="submit" name="simpan" class="btn-modern">
            <i class="fas fa-save"></i> Simpan Berita
          </button>
          <a href="dashboard.php" class="btn-modern btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
          </a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
