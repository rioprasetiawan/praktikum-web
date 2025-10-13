<?php 
include 'koneksi.php'; 
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM barbershop WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=dexvice-width, initial-scale=1.0">
    <title>Detail BarberShop</title>
    <link rel="stylesheet" href="detailbarber.css">
</head>
<body>

    <?php include 'navbaruser.php'; ?>
    
        <div class="shop-name" style="">
            <h1><?php echo $data['nama_cabang']; ?></h1>
        </div>
    
            <div class="map-container">
            <iframe src="<?php echo $data['lokasi']; ?>" width="100%" height="250" style="border:0;" allowfullscreen loading="lazy"></iframe>
        </div>
    
        <div class="info">
            <div class="info-box">
            <h2>Kapster</h2>
            <ul>
                <?php foreach (json_decode($data['kapster']) as $kapster) {
                    echo "<li>$kapster</li>";
                } ?>
            </ul>
            </div>
                
            <div class="info-box">
            <h2>Price list / Harga</h2>
            <ul>
                <?php foreach (json_decode($data['harga']) as $harga) {
                    echo "<li>$harga</li>";
                } ?>
            </ul>
            </div>

        </div>
        <div class="gallery-box">
            <div class="img">
            <?php foreach (json_decode($data['gambar']) as $gambar) {
                echo "<img src='$gambar' alt='Galeri' style='width:150px; margin:10px;'>";
            } ?>
            </div>
        </div>

        <div class="button-lanjut">
                <a href="formulir.php" class="btn">LANJUTKAN PEMESANAN</a>
            </div>
    

    <?php include 'footer.php'; ?>

</body>
</html>
