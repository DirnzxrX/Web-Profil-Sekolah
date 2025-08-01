<?php
session_start();
include '../config.php';

$pesanError = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
 
  $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  if (mysqli_num_rows($query) == 1) {
    $_SESSION['admin'] = $username;   
    header("Location: dashboard.php");
    exit;
  } else {
    $pesanError = "Login gagal! Username atau password salah.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - SMK Negeri 64 Jakarta</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <style>
    .login-container {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    
    .login-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 25px;
      padding: 50px 40px;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
      max-width: 450px;
      width: 100%;
      text-align: center;
    }
    
    .login-logo {
      width: 80px;
      height: 80px;
      border-radius: 20px;
      margin: 0 auto 30px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }
    
    .login-title {
      font-size: 2rem;
      font-weight: 700;
      color: #4a5568;
      margin-bottom: 10px;
    }
    
    .login-subtitle {
      color: #718096;
      margin-bottom: 40px;
      font-size: 1.1rem;
    }
    
    .form-group {
      margin-bottom: 25px;
      text-align: left;
    }
    
    .form-label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #4a5568;
      font-size: 1rem;
    }
    
    .form-control {
      width: 100%;
      padding: 15px 20px;
      border: 2px solid #e2e8f0;
      border-radius: 12px;
      font-size: 1rem;
      transition: all 0.3s ease;
      background: white;
    }
    
    .form-control:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .btn-login {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1.1rem;
      width: 100%;
      transition: all 0.3s ease;
      box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
      margin-top: 10px;
    }
    
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 30px rgba(102, 126, 234, 0.4);
      color: white;
    }
    
    .alert-error {
      background: linear-gradient(135deg, #f56565, #e53e3e);
      color: white;
      padding: 15px 20px;
      border-radius: 12px;
      margin-bottom: 25px;
      border: none;
      font-weight: 500;
    }
    
    .back-link {
      color: #667eea;
      text-decoration: none;
      font-weight: 500;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-top: 20px;
      transition: all 0.3s ease;
    }
    
    .back-link:hover {
      color: #764ba2;
      transform: translateX(-5px);
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-card fade-in">
      <img src="../assets/images/logo1.jpg" class="login-logo" alt="Logo SMK">
      <h1 class="login-title">Login Admin</h1>
      <p class="login-subtitle">Masuk ke panel administrasi SMK Negeri 64 Jakarta</p>

      <?php if ($pesanError): ?>
        <div class="alert-error">
          <i class="fas fa-exclamation-triangle"></i> <?= $pesanError ?>
        </div>
      <?php endif; ?>

      <form method="post">
        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-user"></i> Username
          </label>
          <input type="text" class="form-control" name="username" placeholder="Masukkan username" required>
        </div>
        
        <div class="form-group">
          <label class="form-label">
            <i class="fas fa-lock"></i> Password
          </label>
          <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
        </div>
        
        <button type="submit" name="login" class="btn-login">
          <i class="fas fa-sign-in-alt"></i> Login
        </button>
      </form>
      
      <a href="../index.php" class="back-link">
        <i class="fas fa-arrow-left"></i> Kembali ke Website
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
