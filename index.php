<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda - SMK Negeri 64 Jakarta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-modern">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="assets/images/logo1.jpg" alt="Logo SMK">
      SMK Negeri 64 Jakarta
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-home"></i> Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profil.php">
            <i class="fas fa-info-circle"></i> Profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="berita.php">
            <i class="fas fa-newspaper"></i> Berita
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontak.php">
            <i class="fas fa-envelope"></i> Kontak</a>
        </li>
                <li class="nav-item ms-2">
          <a class="btn btn-outline-primary" href="admin/login.php">
            <i class="fas fa-sign-in-alt"></i> Login</a>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<div class="hero-section fade-in text-center p-5">
  <img src="assets/images/logo1.jpg" class="hero-logo" alt="Logo SMK Negeri 64 Jakarta">
  <h1 class="hero-title">SMK Negeri 64 Jakarta</h1>
  <p class="hero-subtitle">Mewujudkan Generasi Digital yang Kreatif dan Profesional</p>
  <div class="mt-4">
    <a href="profil.php" class="btn-modern me-3">
      <i class="fas fa-info-circle"></i> Pelajari Lebih Lanjut
    </a>
    <a href="berita.php" class="btn-modern btn-secondary">
      <i class="fas fa-newspaper"></i> Lihat Berita Terbaru
    </a>
  </div>
</div>

<!-- Konten Profil Sekolah -->
<div class="content-card slide-in container my-5">
  <h2 class="card-title">
    <i class="fas fa-school"></i> Profil Singkat Sekolah
  </h2>
  
  <div class="row">
    <div class="col-md-6">
      <table class="table-modern">
        <tbody>
          <tr>
            <th style="width: 40%;">Nama Sekolah</th>
            <td>SMK Negeri 64 Jakarta</td>
          </tr>
          <tr>
            <th>Alamat</th>
            <td>Jalan Mpok Nori, Cipayung, Jakarta Timur, 13890</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-md-6">
      <table class="table-modern">
        <tbody>
          <tr>
            <th style="width: 40%;">Program Keahlian</th>
            <td>Rekayasa Perangkat Lunak, Desain Komunikasi Visual</td>
          </tr>
          <tr>
            <th>Akreditasi</th>
            <td><span class="badge bg-success" style="font-size: 1rem; padding: 8px 15px;">A</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  
  <div class="text-center mt-4">
    <a href="profil.php" class="btn-modern">
      <i class="fas fa-arrow-right"></i> Lihat Profil Lengkap
    </a>
  </div>
</div>

<!-- Visi Misi Section -->
<div class="content-card slide-in container my-5">
  <h2 class="card-title">
    <i class="fas fa-bullseye"></i> Visi & Misi
  </h2>
  
  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="card h-100" style="border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 15px;">
        <div class="card-body text-center p-4">
          <i class="fas fa-eye" style="font-size: 3rem; color: #667eea; margin-bottom: 20px;"></i>
          <h4 class="card-title" style="color: #4a5568; margin-bottom: 15px;">Visi</h4>
          <p class="card-text" style="color: #718096; line-height: 1.6;">
            Menjadi sekolah menengah kejuruan unggulan yang menghasilkan lulusan berkualitas, 
            berakhlak mulia, dan siap memasuki dunia kerja serta melanjutkan pendidikan tinggi.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card h-100" style="border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 15px;">
        <div class="card-body text-center p-4">
          <i class="fas fa-tasks" style="font-size: 3rem; color: #667eea; margin-bottom: 20px;"></i>
          <h4 class="card-title" style="color: #4a5568; margin-bottom: 15px;">Misi</h4>
          <p class="card-text" style="color: #718096; line-height: 1.6;">
            Menyelenggarakan pendidikan kejuruan yang berkualitas dengan mengembangkan 
            kompetensi siswa sesuai kebutuhan dunia kerja dan perkembangan teknologi.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="footer bg-light text-center py-4 mt-5">
  <div class="container">
    <p>&copy; 2024 SMK Negeri 64 Jakarta. Semua hak dilindungi.</p>
    <p>Website ini dikembangkan dengan ❤️ untuk kalian semua Love you all. Jangan sakit-sakit ya...</p>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
