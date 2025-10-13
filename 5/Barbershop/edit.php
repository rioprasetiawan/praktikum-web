<?php
require 'koneksi.php';

if (!isset($_GET['id'])) {
    die('ID tidak ditemukan.');
}

$id = intval($_GET['id']);
$result = mysqli_query($conn, "SELECT * FROM tb_pemesanan WHERE id = $id");

if (mysqli_num_rows($result) === 0) {
    die('Data tidak ditemukan.');
}

$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $conn->real_escape_string($_POST['nama']);
    $cabang = $conn->real_escape_string($_POST['cabang']);
    $jadwal = $conn->real_escape_string($_POST['jadwal']);

    $query = "UPDATE tb_pemesanan SET 
                nama = '$nama', 
                cabang = '$cabang', 
                jadwal = '$jadwal' 
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header('Location: antrean.php');
        exit();
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
     
<?php include "navbaradmin.php"; ?>

    <div class="form-container">
    <h2>Edit Data Antrean</h2>
        <form method="POST" action="edit.php?id=<?= $id; ?>">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?= isset($data['nama']) ? htmlspecialchars($data['nama']) : ''; ?>" required>

            <label for="cabang">Cabang:</label>
            <input type="text" name="cabang" id="cabang" value="<?= isset($data['cabang']) ? htmlspecialchars($data['cabang']) : ''; ?>" required>

            <label for="jadwal">Jadwal:</label>
            <input type="datetime-local" name="jadwal" id="jadwal" 
                value="<?= isset($data['jadwal']) ? htmlspecialchars($data['jadwal']) : ''; ?>" 
                min="<?= date('Y-m-d\TH:i'); ?>" required>

            <button type="submit">Simpan</button>
            <a href="antrean.php" class="button">Batal</a>
        </form>
    </div>

    <?php include "footer.php"; ?>

</body>
</html>
