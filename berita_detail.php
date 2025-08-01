<?php
include 'config.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
  die("ID berita tidak ditemukan.");
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM berita WHERE id = $id");
$berita = mysqli_fetch_assoc($query);

if (!$berita) {
  die("Berita tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $berita['judul'] ?> - SMK Negeri 64 Jakarta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>

<!-- Hero Section -->
<div class="hero-section fade-in">
  <h1 class="hero-title">
    <i class="fas fa-newspaper"></i> Detail Berita
  </h1>
  <p class="hero-subtitle">Informasi lengkap dan terbaru dari SMK Negeri 64 Jakarta</p>
</div>

<!-- Berita Detail -->
<div class="content-card slide-in">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card" style="border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 15px;">
        <div class="card-body p-5">
          <!-- Header Berita -->
          <div class="text-center mb-4">
            <div class="news-date" style="justify-content: center; margin-bottom: 20px;">
              <i class="fas fa-calendar-alt"></i>
              <?= date('j F Y', strtotime($berita['tanggal'])) ?>
            </div>
            <h1 class="news-title" style="font-size: 2.5rem; margin-bottom: 20px;"><?= $berita['judul'] ?></h1>
            <hr style="border: 2px solid #e2e8f0; width: 100px; margin: 0 auto;">
          </div>
          
          <!-- Konten Berita -->
          <div class="news-content" style="color: #4a5568; line-height: 1.8; font-size: 1.1rem;">
            <?= nl2br($berita['isi']) ?>
          </div>
          
          <!-- Tombol Kembali -->
          <div class="text-center mt-5">
            <a href="berita.php" class="btn-modern btn-secondary">
              <i class="fas fa-arrow-left"></i> Kembali ke Berita
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Berita Terkait -->
<div class="content-card slide-in">
  <h2 class="card-title">
    <i class="fas fa-link"></i> Berita Terkait
  </h2>
  
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="text-center" style="padding: 40px 20px;">
        <i class="fas fa-newspaper" style="font-size: 3rem; color: #cbd5e0; margin-bottom: 20px;"></i>
        <h4 style="color: #4a5568; margin-bottom: 15px;">Lihat Berita Lainnya</h4>
        <p style="color: #718096; margin-bottom: 25px;">
          Temukan informasi menarik lainnya dari SMK Negeri 64 Jakarta
        </p>
        <a href="berita.php" class="btn-modern">
          <i class="fas fa-list"></i> Semua Berita
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <p>&copy; 2024 SMK Negeri 64 Jakarta. Semua hak dilindungi.</p>
    <p>Website ini dikembangkan dengan ❤️ untuk kalian semua Love you all. Jangan sakit-sakit ya...</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
