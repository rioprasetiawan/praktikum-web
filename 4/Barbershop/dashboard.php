<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php');
    exit();
}

// Ambil username dari session
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Barbershop</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .welcome-section {
            background: linear-gradient(135deg, #d2b48c 0%, #f4e1c1 100%);
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            animation: fadeInDown 0.5s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .welcome-section h1 {
            color: #5a2d0c;
            margin-bottom: 0.5rem;
        }

        .welcome-section p {
            color: #666;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .dashboard-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .dashboard-card:nth-child(3) {
            animation-delay: 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .card-icon {
            font-size: 2rem;
        }

        .card-header h3 {
            color: #5a2d0c;
        }

        .card-content {
            color: #666;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: #5a2d0c;
            margin: 0.5rem 0;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-primary {
            background: #5a2d0c;
            color: white;
        }

        .btn-primary:hover {
            background: #8b4513;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(90, 45, 12, 0.3);
        }

        .btn-secondary {
            background: #e0e0e0;
            color: #333;
        }

        .btn-secondary:hover {
            background: #d0d0d0;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
        }

        .user-info {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: #5a2d0c;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem;
            }

            .dashboard-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">BarberShop</div>
        <nav class="nav">
            <ul class="nav-list">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php" style="color: #dc3545;">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="dashboard-container">
        <!-- Welcome Section -->
        <div class="welcome-section">
            <div class="user-info">
                <div class="user-avatar">
                    <?php echo strtoupper(substr($username, 0, 1)); ?>
                </div>
                <span><strong><?php echo htmlspecialchars($username); ?></strong></span>
            </div>
            <h1>Selamat Datang, <?php echo htmlspecialchars($username); ?>! 👋</h1>
            <p>Anda berhasil login ke dashboard Barbershop. Kelola bisnis Anda dengan mudah dari sini.</p>
        </div>

        <!-- Dashboard Cards -->
        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-header">
                    <span class="card-icon">📅</span>
                    <h3>Booking Hari Ini</h3>
                </div>
                <div class="card-content">
                    <div class="stat-number">12</div>
                    <p>Total booking terjadwal untuk hari ini</p>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <span class="card-icon">👥</span>
                    <h3>Antrian Aktif</h3>
                </div>
                <div class="card-content">
                    <div class="stat-number">5</div>
                    <p>Pelanggan sedang menunggu</p>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-header">
                    <span class="card-icon">✂️</span>
                    <h3>Layanan Tersedia</h3>
                </div>
                <div class="card-content">
                    <div class="stat-number">8</div>
                    <p>Jenis layanan barbershop</p>
                </div>
            </div>
        </div>

        <!-- Info User dari Session -->
        <div class="dashboard-card">
            <div class="card-header">
                <span class="card-icon">ℹ️</span>
                <h3>Informasi Login</h3>
            </div>
            <div class="card-content">
                <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
                <p><strong>Session ID:</strong> <?php echo htmlspecialchars(session_id()); ?></p>
                <p><strong>Login Time:</strong> <?php echo date('d/m/Y H:i:s'); ?></p>
                <p><strong>Status:</strong> <span style="color: #28a745; font-weight: bold;">● Aktif</span></p>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="btn-group">
            <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
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
</body>
</html>