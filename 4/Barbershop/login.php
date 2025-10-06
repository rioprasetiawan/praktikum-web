<?php
session_start();

// Jika user sudah login, redirect ke dashboard
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit();
}

// Kredensial hardcoded
$valid_username = 'admin';
$valid_password = 'admin123';

$error = '';

// Proses login jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validasi tidak boleh kosong
    if (empty($username) || empty($password)) {
        $error = 'Username dan password tidak boleh kosong!';
    } 
    // Validasi kredensial
    elseif ($username === $valid_username && $password === $valid_password) {
        // Login berhasil, simpan ke session
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit();
    } 
    else {
        $error = 'Username atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Barbershop</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #d2b48c 0%, #f4e1c1 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: white;
            padding: 2.5rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 90%;
            max-width: 400px;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            color: #5a2d0c;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #666;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #d2b48c;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #5a2d0c;
            box-shadow: 0 0 0 3px rgba(90, 45, 12, 0.1);
        }

        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 0.8rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid #c62828;
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }

        .btn-login {
            width: 100%;
            padding: 1rem;
            background: #5a2d0c;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #8b4513;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(90, 45, 12, 0.3);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: #5a2d0c;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: #8b4513;
        }

        .credentials-info {
            background: #e3f2fd;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #2196f3;
        }

        .credentials-info p {
            font-size: 0.85rem;
            color: #1565c0;
            margin: 0.2rem 0;
        }

        .credentials-info strong {
            color: #0d47a1;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>🪒 BarberShop</h1>
            <p>Silakan login untuk mengakses dashboard</p>
        </div>

        <!-- Info kredensial untuk demo -->
        <div class="credentials-info">
            <p><strong>Demo Credentials:</strong></p>
            <p>Username: <strong>admin</strong></p>
            <p>Password: <strong>admin123</strong></p>
        </div>

        <?php if ($error): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Masukkan username"
                    value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                >
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password"
                >
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="back-link">
            <a href="index.php">← Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>