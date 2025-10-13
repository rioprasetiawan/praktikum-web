<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking BarberShop</title>
    <link rel="stylesheet" href="bookingbarbershop.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'navbaruser.php'; ?>

    <div class="judulbook">
        <center><h1>BOOKING BARBERSHOP</h1></center>
    </div>
    
    <div class="cabang-container">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM barbershop");
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="cabang-card">';
            // Menampilkan logo
            echo '<img src="' . $row['logo_path'] . '" alt="Logo ' . $row['nama_cabang'] . '" class="cabang-logo">';
            echo '<h2>' . $row['nama_cabang'] . '</h2>';
            echo '<a href="detailbarber.php?id=' . $row['id'] . '" class="btn">Lihat Selengkapnya</a>';
            echo '</div>';
        }
        ?>
    </div>

    <?php include 'footer.php'; ?> 
</body>
</html>