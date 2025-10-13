<?php
require_once 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $no_telpon = $_POST['telepon'];
    $jadwal = $_POST['jadwal'];
    $detail_pesanan = $_POST['detail'];
    $kapster = $_POST['kapster'];
    $cabang = $_POST['cabang'];
    $pembayaran = $_POST['pembayaran'];
    $status_pemesanan = 'lanjutkan'; // Default status

    // Prepared statement untuk insert data
    $sql = "INSERT INTO tb_pemesanan (nama, no_telpon, jadwal, detail_pesanan, kapster, cabang, pembayaran, status_pemesanan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $nama, $no_telpon, $jadwal, $detail_pesanan, $kapster, $cabang, $pembayaran, $status_pemesanan);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        // Redirect to antrean.php after successful insertion
        header('Location: antrean user.php');
        exit;
    } else {
        $error_message = "Error: " . $stmt->error; // Set error message
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pemesanan BarberShop</title>
    <link rel="stylesheet" href="formulir.css">
    <link rel="stylesheet" href="footernav.css">
</head>
<body>

    <?php include "navbaruser.php" ?>

    <main class="main-content">
        <section class="form-container">
            <h2>FORMULIR PEMESANAN</h2>
            <form method="POST" action="formulir.php">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>

                <label for="telepon">No Telepon</label>
                <input type="tel" id="telepon" name="telepon" required>

                <label for="jadwal">Jadwal</label>
                <input type="datetime-local" id="jadwal" name="jadwal" required>

                <label for="detail">Detail Pesanan</label>
                <select id="detail" name="detail" required>
                    <option value="">Pilih Layanan</option>
                    <option value="Potong Rambut">Potong Rambut</option>
                    <option value="Cuci Rambut">Cuci Rambut</option>
                    <option value="Cukur Jenggot">Cukur Jenggot</option>
                </select>

                <label for="kapster">Hairdresser/ Kapster</label>
                <select id="kapster" name="kapster" required>
                    <option value="">Pilih Kapster</option>
                    <option value="Kapster A">Kapster A</option>
                    <option value="Kapster B">Kapster B</option>
                    <option value="Kapster C">Kapster C</option>
                </select>

                <label for="cabang">Cabang</label>
                <select id="cabang" name="cabang" required>
                    <option value="">Pilih Cabang</option>
                    <option value="Cabang 1">Cabang 1</option>
                    <option value="Cabang 2">Cabang 2</option>
                    <option value="Cabang 3">Cabang 3</option>
                    <option value="Cabang 3">Cabang 4</option>
                    <option value="Cabang 3">Cabang 5</option>
                </select>

                <label for="pembayaran">Pembayaran</label>
                <select id="pembayaran" name="pembayaran" required>
                    <option value="">Pemilihan Transaksi</option>
                    <option value="Cash">Cash</option>
                    <option value="Debit">Debit</option>
                    <option value="Transfer">Transfer</option>
                </select>

                <label for="uploadFoto">Unggah Foto</label>
                <input type="file" id="uploadFoto" name="uploadFoto">

                <div class="buttons">
                    <button type="submit" class="btn continue">Lanjutkan</button>
                    <a href="antrean.php" class="btn cancel">Batal</a>
                </div>
            </form>
        </section>
    </main>

    <?php include "footer.php" ?>

</body>
</html>
