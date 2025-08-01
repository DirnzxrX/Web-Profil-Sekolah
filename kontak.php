<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontak Kami - SMK Negeri 64 Jakarta</title>
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
    <i class="fas fa-envelope"></i> Hubungi Kami
  </h1>
  <p class="hero-subtitle">Kami siap membantu dan menjawab pertanyaan Anda</p>
</div>

<!-- Informasi Kontak -->
<div class="content-card slide-in">
  <h2 class="card-title">
    <i class="fas fa-info-circle"></i> Informasi Kontak
  </h2>
  
  <div class="contact-info">
    <div class="contact-item">
      <div class="contact-icon">
        <i class="fas fa-map-marker-alt"></i>
      </div>
      <div class="contact-title">Alamat</div>
      <div class="contact-text">
        Jalan Mandor Munding<br>
        Jakarta Timur, Jakarta 13630
      </div>
    </div>
    
    <div class="contact-item">
      <div class="contact-icon">
        <i class="fas fa-envelope"></i>
      </div>
      <div class="contact-title">Email</div>
      <div class="contact-text">
        info@smkn64jkt.sch.id<br>
        humas@smkn64jkt.sch.id
      </div>
    </div>
    
    <div class="contact-item">
      <div class="contact-icon">
        <i class="fas fa-phone"></i>
      </div>
      <div class="contact-title">Telepon</div>
      <div class="contact-text">
        (021) 1234 5678<br>
        (021) 1234 5679
      </div>
    </div>
    
    <div class="contact-item">
      <div class="contact-icon">
        <i class="fas fa-clock"></i>
      </div>
      <div class="contact-title">Jam Operasional</div>
      <div class="contact-text">
        Senin - Jumat: 07:00 - 16:00<br>
        Sabtu: 07:00 - 12:00
      </div>
    </div>
  </div>
</div>

<!-- Form Kontak -->
<div class="content-card slide-in">
  <h2 class="card-title">
    <i class="fas fa-paper-plane"></i> Kirim Pesan
  </h2>
  
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="form-modern" style="max-width: 100%; margin: 0;">
        <form method="post" action="">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="contoh@email.com" required>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="form-label">Subjek</label>
            <input type="text" class="form-control" name="subjek" placeholder="Subjek pesan" required>
          </div>
          
          <div class="form-group">
            <label class="form-label">Pesan</label>
            <textarea class="form-control" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required></textarea>
          </div>
          
          <div class="text-center">
            <button type="submit" name="kirim" class="btn-modern">
              <i class="fas fa-paper-plane"></i> Kirim Pesan
            </button>
          </div>
        </form>

        <?php
        if (isset($_POST['kirim'])) {
          echo '<div class="alert-modern alert-success mt-4">
                    <i class="fas fa-check-circle"></i> Pesan berhasil dikirim! Kami akan segera menghubungi Anda.
                  </div>';
        }
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Peta Lokasi -->
<div class="content-card slide-in">
  <h2 class="card-title">
    <i class="fas fa-map"></i> Lokasi Kami
  </h2>
  
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card" style="border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 15px; overflow: hidden;">
        <div class="card-body p-0">
          <div style="background: #f7fafc; padding: 40px; text-align: center;">
            <i class="fas fa-map-marked-alt" style="font-size: 4rem; color: #667eea; margin-bottom: 20px;"></i>
            <h4 style="color: #4a5568; margin-bottom: 15px;">Peta Lokasi</h4>
            <p style="color: #718096; margin-bottom: 20px;">
              SMK Negeri 64 Jakarta berlokasi di Jalan Mandor Munding, Jakarta Timur
            </p>
            <a href="https://maps.google.com" target="_blank" class="btn-modern">
              <i class="fas fa-external-link-alt"></i> Lihat di Google Maps
            </a>
          </div>
        </div>
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
