<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Berita - SMK Negeri 64 Jakarta</title>
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
    <i class="fas fa-newspaper"></i> Berita & Informasi
  </h1>
  <p class="hero-subtitle">Informasi terbaru dan kegiatan sekolah kami</p>
</div>

<!-- Berita Section -->
<div class="content-card slide-in">
  <?php
  $berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
  $total_berita = mysqli_num_rows($berita);
  ?>
  
  <?php if ($total_berita > 0): ?>
    <div class="news-grid">
      <?php while ($row = mysqli_fetch_assoc($berita)): ?>
        <div class="news-card">
          <div class="news-card-body">
            <div class="news-date">
              <i class="fas fa-calendar-alt"></i>
              <?= date('j F Y', strtotime($row['tanggal'])) ?>
            </div>
            <h3 class="news-title"><?= $row['judul'] ?></h3>
            <p class="news-excerpt">
              <?= substr($row['isi'], 0, 200) ?>
              <?= strlen($row['isi']) > 200 ? '...' : '' ?>
            </p>
            <a href="berita_detail.php?id=<?= $row['id'] ?>" class="news-link">
              Baca Selengkapnya <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="text-center" style="padding: 60px 20px;">
      <i class="fas fa-newspaper" style="font-size: 4rem; color: #cbd5e0; margin-bottom: 20px;"></i>
      <h4 style="color: #4a5568; margin-bottom: 10px;">Belum Ada Berita</h4>
      <p style="color: #718096; font-size: 1.1rem;">
        Saat ini belum ada berita yang dipublikasikan. Silakan cek kembali nanti.
      </p>
    </div>
  <?php endif; ?>
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
