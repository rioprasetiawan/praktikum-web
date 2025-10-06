<?php
session_start();

// Cek apakah user sudah login untuk menampilkan link yang berbeda
$is_logged_in = isset($_SESSION['username']);
$username = $is_logged_in ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbershop</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- Header -->
  <header class="header">
    <div class="logo">BarberShop</div>
    <nav class="nav">
      <ul class="nav-list">
        <li><a href="index.php">Beranda</a></li>
        <li><a href="#" id="tentang-btn">Tentang Kami</a></li>
        <li><a href="#booking">Booking</a></li>
        <li><a href="#" id="antrian-btn">Antrian</a></li>
        <?php if ($is_logged_in): ?>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="logout.php" style="color: #dc3545;">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <!-- Hero Section -->
  <main>
    <section class="hero" id="hero">
      <div class="hero-image">
        <img src="image.png" alt="Barbershop" class="fade-in">
      </div>
      <div class="hero-text">
        <?php if ($is_logged_in): ?>
          <p style="font-size: 1.2rem; color: #5a2d0c; font-weight: bold;">
            Halo, <?php echo htmlspecialchars($username); ?>! 👋
          </p>
        <?php endif; ?>
        <p>
          "Selamat datang di Barbershop! Kami siap memberikan pengalaman 
          potong rambut terbaik untuk Anda. Temukan gaya dan layanan yang tepat di setiap cabang kami!"
        </p>
        <a href="#booking" class="btn hover-btn">Pesan Sekarang</a>
      </div>
    </section>
  </main>

  <!-- Modal Tentang Kami -->
  <div id="tentang-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Tentang Kami</h2>
      <p>Barbershop adalah tempat potong rambut profesional yang telah melayani pelanggan sejak tahun 2020.</p>
      <h3>Layanan Kami:</h3>
      <ul>
        <li>Potong Rambut Pria</li>
        <li>Styling & Coloring</li>
        <li>Cukur Jenggot</li>
        <li>Hair Treatment</li>
        <li>Kids Haircut</li>
      </ul>
      <p><strong>Buka Setiap Hari:</strong> 09:00 - 21:00 WIB</p>
    </div>
  </div>

  <!-- Modal Antrian -->
  <div id="antrian-modal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2>Informasi Antrian</h2>
      <div class="antrian-info">
        <p>Nomor Antrian Saat Ini:</p>
        <div class="queue-number">15</div>
        <p>Status: <span class="status active">Aktif</span></p>
        <p>Estimasi Waktu Tunggu: <span class="time">45 menit</span></p>
        <p style="margin-top: 1rem; font-size: 0.9rem; color: #666;">
          *Nomor antrian diperbarui secara real-time
        </p>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-info">
      <p><strong>Informasi</strong></p>
      <p>Email: barbershop@email.com</p>
      <p>Telp: 081369696969</p>
    </div>
    <div class="footer-copy">
      <p>&copy; 2025 Foundation Barbershop. All Rights Reserved</p>
    </div>
    <div class="footer-social">
      <p><strong>Ikuti Kami!</strong></p>
      <div class="social-icons">
        <a href="#" class="social-link">IG</a>
        <a href="#" class="social-link">FB</a>
        <a href="https://hairnerds.id/" class="social-link" aria-label="X">X</a>
      </div>
    </div>
  </footer>

  <script src="script.js"></script>
</body>
</html>