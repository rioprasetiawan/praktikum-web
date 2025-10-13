<?php
include 'koneksi.php';
session_start();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foundation BarberShop</title>
    <link rel="stylesheet" href="beranda.css">
    <link rel="stylesheet" href="footernav.css">

</head>
<body>
    
    <?php include 'navbaruser.php'; ?>

    <div class="image-text">
        <img src="assets/image.png" alt="Deskripsi Gambar" class="1.jpeg">
    </div>
    

    <!-- Hero Section -->
    <section class="hero">
        <h1>"Selamat datang di Foundation Barbershop! Kami siap memberikan pengalaman
             potong rambut terbaik untuk Anda. Temukan gaya dan layanan yang tepat di
             setiap cabang kami!"</h1>
        <a href="bookingbarbershop.php" class="cta-button">Pesan Sekarang</a>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>
