<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk cek apakah username dan password sesuai
    $sql = "SELECT * FROM users WHERE name = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Jika login berhasil, set session dan redirect ke beranda.php
        $_SESSION['name'] = $username;
        header("location: berandaAdmin.php");
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber Shop Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footernav.css">
</head>
<body>
    <?php include "navbaruser.php"; ?>
    <div class="container">
        <div class="login-form">
            <h2>Login Admin</h2>
            <?php if (isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <form method="POST" action="">
                <h1>Username</h1>
                <input type="text" name="username" placeholder="Username" required>
                <h1>Password</h1>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">MASUK</button>
            </form>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>
</html>
