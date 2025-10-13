<?php
include 'koneksi.php';

// Validasi apakah ID tersedia di URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid!");
}

$id = intval($_GET['id']);

// Hapus data berdasarkan ID
$delete = mysqli_query($conn, "DELETE FROM barbershop WHERE id = $id");

if ($delete) {
    header("Location: barbershopadmin.php"); // Kembali ke halaman utama
    exit();
} else {
    echo "Gagal menghapus data!";
}
?>
