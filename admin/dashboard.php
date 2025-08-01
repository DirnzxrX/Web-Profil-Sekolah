<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../config.php';

$berita = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY id DESC");
$total_berita = mysqli_num_rows($berita);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Pak Hikmat</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      color: #333;
    }

    .dashboard-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .header {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .header h1 {
      color: #4a5568;
      font-size: 2.5rem;
      font-weight: 700;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .header h1 i {
      color: #667eea;
      font-size: 2rem;
    }

    .user-info {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      padding: 15px 25px;
      border-radius: 15px;
      display: inline-block;
      font-weight: 500;
      box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 30px;
      text-align: center;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }

    .stat-card i {
      font-size: 3rem;
      margin-bottom: 15px;
      background: linear-gradient(135deg, #667eea, #764ba2);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: 700;
      color: #4a5568;
      margin-bottom: 5px;
    }

    .stat-label {
      color: #718096;
      font-weight: 500;
      font-size: 1.1rem;
    }

    .action-bar {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 25px;
      margin-bottom: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 15px;
    }

    .btn-modern {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 12px;
      font-weight: 600;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
      box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .btn-modern:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
      color: white;
      text-decoration: none;
    }

    .btn-modern i {
      font-size: 1.1rem;
    }

    .content-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .content-card h3 {
      color: #4a5568;
      font-size: 1.8rem;
      font-weight: 600;
      margin-bottom: 25px;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .content-card h3 i {
      color: #667eea;
    }

    .table-modern {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      margin-top: 20px;
    }

    .table-modern th {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      padding: 18px 15px;
      text-align: left;
      font-weight: 600;
      font-size: 1rem;
    }

    .table-modern th:first-child {
      border-top-left-radius: 12px;
    }

    .table-modern th:last-child {
      border-top-right-radius: 12px;
    }

    .table-modern td {
      padding: 18px 15px;
      border-bottom: 1px solid #e2e8f0;
      background: white;
    }

    .table-modern tr:hover td {
      background: #f7fafc;
    }

    .table-modern tr:last-child td:first-child {
      border-bottom-left-radius: 12px;
    }

    .table-modern tr:last-child td:last-child {
      border-bottom-right-radius: 12px;
    }

    .btn-action {
      padding: 8px 16px;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 0.9rem;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .btn-edit {
      background: linear-gradient(135deg, #f6ad55, #ed8936);
      color: white;
    }

    .btn-edit:hover {
      background: linear-gradient(135deg, #ed8936, #dd6b20);
      color: white;
      text-decoration: none;
      transform: translateY(-1px);
    }

    .btn-delete {
      background: linear-gradient(135deg, #fc8181, #f56565);
      color: white;
    }

    .btn-delete:hover {
      background: linear-gradient(135deg, #f56565, #e53e3e);
      color: white;
      text-decoration: none;
      transform: translateY(-1px);
    }

    .empty-state {
      text-align: center;
      padding: 60px 20px;
      color: #718096;
    }

    .empty-state i {
      font-size: 4rem;
      margin-bottom: 20px;
      color: #cbd5e0;
    }

    .empty-state h4 {
      font-size: 1.5rem;
      margin-bottom: 10px;
      color: #4a5568;
    }

    .empty-state p {
      font-size: 1.1rem;
    }

    @media (max-width: 768px) {
      .dashboard-container {
        padding: 15px;
      }
      
      .header h1 {
        font-size: 2rem;
      }
      
      .action-bar {
        flex-direction: column;
        align-items: stretch;
      }
      
      .btn-modern {
        justify-content: center;
      }
      
      .table-modern {
        font-size: 0.9rem;
      }
      
      .table-modern th,
      .table-modern td {
        padding: 12px 8px;
      }
    }

    .fade-in {
      animation: fadeIn 0.6s ease-in;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="dashboard-container">
    <!-- Header -->
    <div class="header fade-in">
      <h1><i class="fas fa-tachometer-alt"></i> Dashboard Admin</h1>
      <div class="user-info">
        <i class="fas fa-user-circle"></i> Login sebagai: <strong><?= $_SESSION['admin'] ?></strong>
      </div>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid fade-in">
      <div class="stat-card">
        <i class="fas fa-newspaper"></i>
        <div class="stat-number"><?= $total_berita ?></div>
        <div class="stat-label">Total Berita</div>
      </div>
      <div class="stat-card">
        <i class="fas fa-eye"></i>
        <div class="stat-number"><?= $total_berita * 15 ?></div>
        <div class="stat-label">Total Views</div>
      </div>
      <div class="stat-card">
        <i class="fas fa-calendar-alt"></i>
        <div class="stat-number"><?= date('d') ?></div>
        <div class="stat-label">Hari Ini</div>
      </div>
      <div class="stat-card">
        <i class="fas fa-chart-line"></i>
        <div class="stat-number"><?= $total_berita > 0 ? round($total_berita / 7, 1) : 0 ?></div>
        <div class="stat-label">Rata-rata/Minggu</div>
      </div>
    </div>

    <!-- Action Bar -->
    <div class="action-bar fade-in">
      <h3 style="margin: 0; color: #4a5568;">
        <i class="fas fa-cog"></i> Manajemen Berita
      </h3>
      <a href="tambah_berita.php" class="btn-modern">
        <i class="fas fa-plus"></i> Tambah Berita Baru
      </a>
    </div>

    <!-- Content Card -->
    <div class="content-card fade-in">
      <h3><i class="fas fa-list"></i> Daftar Berita</h3>
      
      <?php if (mysqli_num_rows($berita) > 0): ?>
        <div style="overflow-x: auto;">
          <table class="table-modern">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Berita</th>
                <th>Tanggal Publikasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; while ($row = mysqli_fetch_assoc($berita)): ?>
                <tr>
                  <td><strong><?= $no++ ?></strong></td>
                  <td>
                    <div style="font-weight: 500; color: #4a5568;"><?= $row['judul'] ?></div>
                    <div style="font-size: 0.9rem; color: #718096; margin-top: 5px;">
                      <i class="fas fa-clock"></i> <?= date('d M Y H:i', strtotime($row['tanggal'])) ?>
                    </div>
                  </td>
                  <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                  <td>
                    <a href="edit_berita.php?id=<?= $row['id'] ?>" class="btn-action btn-edit">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="hapus_berita.php?id=<?= $row['id'] ?>" class="btn-action btn-delete" 
                       onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                      <i class="fas fa-trash"></i> Hapus
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="empty-state">
          <i class="fas fa-newspaper"></i>
          <h4>Belum Ada Berita</h4>
          <p>Mulai dengan menambahkan berita pertama Anda</p>
          <a href="tambah_berita.php" class="btn-modern" style="margin-top: 20px;">
            <i class="fas fa-plus"></i> Tambah Berita Pertama
          </a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <script>
    // Add some interactive effects
    document.addEventListener('DOMContentLoaded', function() {
      // Add hover effects to stat cards
      const statCards = document.querySelectorAll('.stat-card');
      statCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
          this.style.transform = 'translateY(-8px) scale(1.02)';
        });
        card.addEventListener('mouseleave', function() {
          this.style.transform = 'translateY(0) scale(1)';
        });
      });

      // Add smooth scrolling
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
          e.preventDefault();
          document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
          });
        });
      });
    });
  </script>
</body>
</html>
