<?php
include 'koneksi.php';

// Validasi apakah ID tersedia di URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid!");
}

$id = intval($_GET['id']);

// Ambil data berdasarkan ID
$query = mysqli_query($conn, "SELECT * FROM barbershop WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data tidak ditemukan!");
}

// Proses pengeditan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_cabang = mysqli_real_escape_string($conn, $_POST['nama_cabang']);
    $kapster = mysqli_real_escape_string($conn, json_encode(explode(",", $_POST['kapster'])));
    $harga = mysqli_real_escape_string($conn, json_encode(explode(",", $_POST['harga'])));

    $update = mysqli_query($conn, "UPDATE barbershop SET nama_cabang='$nama_cabang', kapster='$kapster', harga='$harga' WHERE id=$id");

    if ($update) {
        header("Location: barbershopadmin.php"); // Kembali ke halaman utama
        exit();
    } else {
        echo "Gagal mengedit data!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barbershop</title>
    <link rel="stylesheet" href="editAdmin.css">
</head>
<body>
    <?php include 'navbaradmin.php'; ?>
    <main>
        <div class="container">
            <h2>Edit Barbershop</h2>
            <form method="POST" class="edit-form">
                <label for="nama_cabang">Nama Barbershop</label>
                <input type="text" name="nama_cabang" id="nama_cabang" value="<?php echo htmlspecialchars($data['nama_cabang']); ?>" required>
                
                <label for="kapster">Kapster (pisahkan dengan koma)</label>
                <textarea name="kapster" id="kapster" rows="4"><?php echo htmlspecialchars(implode(",", json_decode($data['kapster']))); ?></textarea>

                <label for="harga">Harga (pisahkan dengan koma)</label>
                <textarea name="harga" id="harga" rows="4"><?php echo htmlspecialchars(implode(",", json_decode($data['harga']))); ?></textarea>

                <button type="submit" class="save-btn">Simpan</button>
                <a href="barbershopadmin.php" class="btn btn-cancel">Batal</a>
            </form>
        </div>
    </main>
    <?php include 'footer.php'; ?>
</body>
</html>
