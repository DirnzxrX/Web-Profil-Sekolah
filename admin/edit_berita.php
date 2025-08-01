<?php
session_start();
if (!isset($_SESSION['admin'])) header("Location: login.php");
include '../config.php';

// Ambil data berdasarkan ID
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = $id");
$berita = mysqli_fetch_assoc($data);

$pesan = "";
$jenisPesan = "";

// Jika form disubmit
if (isset($_POST['update'])) {
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  $tanggal = $_POST['tanggal'];

  if ($judul == "" || $isi == "" || $tanggal == "") {
    $pesan = "Form tidak boleh kosong!";
    $jenisPesan = "danger";
  } else {
    $query = mysqli_query($koneksi, "UPDATE berita SET judul='$judul', isi='$isi', tanggal='$tanggal' WHERE id=$id");
    if ($query) {
      $pesan = "Berita berhasil diperbarui!";
      $jenisPesan = "success";
    } else {
      $pesan = "Gagal mengedit berita.";
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
  <title>Edit Berita - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="dashboard-container">
    <!-- Header -->
    <div class="header fade-in">
      <h1><i class="fas fa-edit"></i> Edit Berita</h1>
      <div class="user-info">
        <i class="fas fa-user-circle"></i> Admin: <strong><?= $_SESSION['admin'] ?></strong>
      </div>
    </div>

    <!-- Form Card -->
    <div class="content-card fade-in">
      <h3><i class="fas fa-pencil-alt"></i> Form Edit Berita</h3>
      
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
              <input type="text" name="judul" class="form-control" value="<?= $berita['judul'] ?>" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="form-label">
                <i class="fas fa-calendar"></i> Tanggal Publikasi
              </label>
              <input type="date" name="tanggal" class="form-control" value="<?= $berita['tanggal'] ?>" required>
            </div>
          </div>
        </div>
        
        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-file-text"></i> Isi Berita
          </label>
          <textarea name="isi" class="form-control" rows="10" required><?= $berita['isi'] ?></textarea>
        </div>
        
        <div class="d-flex gap-3 mt-4">
          <button type="submit" name="update" class="btn-modern">
            <i class="fas fa-save"></i> Update Berita
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
