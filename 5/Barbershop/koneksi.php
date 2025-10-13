<?php
$host = "localhost";      // Nama host, biasanya "localhost"
$user = "root";           // Username MySQL
$password = "";           // Password MySQL
$dbname = "barbershop"; // Nama database yang ingin diakses

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
