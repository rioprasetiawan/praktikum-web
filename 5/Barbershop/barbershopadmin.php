<?php
include 'koneksi.php';

session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['name'])) {
    header("Location: loginAdmin.php");
    exit();
}

// Set pagination variables
$limit = 3; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Check for a search term
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$searchQuery = $search ? "WHERE nama_cabang LIKE '%$search%'" : '';

// Get the total number of records for pagination
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM barbershop $searchQuery");
if (!$total_result) {
    die("Error counting records: " . mysqli_error($conn));
}
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Fetch records based on search and pagination
$query = "SELECT * FROM barbershop $searchQuery ORDER BY id ASC LIMIT $start, $limit";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error fetching records: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberShop</title>
    <link rel="stylesheet" href="barbershopadmin.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    <?php include "navbaradmin.php"; ?>

    <main>
        <div class="search-bar">
            <form method="GET" action="">
            <div class="search-form" >
                <label for="">
                <i data-feather="search"></i>
                </label>
                <input type="text" name="search" placeholder="            BAR PENCARIAN" value="<?= htmlspecialchars($search) ?>">
                </div>                              
            </form>
            <a href="formuliradmin.php" class="add-btn">TAMBAH</a>
        </div>

        <div class="container">
            <h2><center>Halaman Daftar Barbershop</center></h2>
            <table>
                <thead>
                    <tr">
                        <th>No</th>
                        <th>Nama BarberShop</th>
                        <th>Foto</th>
                        <th>Nama Kapster</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = $start + 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                        // Decode JSON fields
                        $kapster = json_decode($data['kapster'], true) ?? [];
                        $harga = json_decode($data['harga'], true) ?? [];
                        $gambar = json_decode($data['gambar'], true) ?? [];
                        // Get the first image from the array if it exists
                        $display_image = !empty($gambar) ? $gambar[0] : '';
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($data['nama_cabang']); ?></td>
                        <td>
                            <?php if (!empty($display_image)): ?>
                                <img src="<?php echo htmlspecialchars($display_image); ?>" alt="Foto BarberShop" width="50">
                            <?php else: ?>
                                <img src="images/default.jpg" alt="Default Image" width="50">
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php 
                            if (!empty($kapster)) {
                                foreach ($kapster as $name) {
                                    echo htmlspecialchars($name) . "<br>";
                                }
                            } else {
                                echo "Tidak ada kapster";
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            if (!empty($harga)) {
                                foreach ($harga as $price) {
                                    echo htmlspecialchars($price) . "<br>";
                                }
                            } else {
                                echo "Harga tidak tersedia";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="editAdmin.php?id=<?php echo $data['id']; ?>">
                                <button class="btn btn-edit">Edit</button>
                            </a>
                            <a href="hapusAdmin.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <button class="btn btn-delete">Hapus</button>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="pagination">
            <div class="paginationbackground">
                <?php if($total_pages > 0): ?>
                    <?php if($page > 1): ?>
                        <a href="?page=<?= $page-1 ?>&search=<?= urlencode($search) ?>"><button><< Sebelumnya</button></a>
                    <?php endif;

                    for($i = 1; $i <= $total_pages; $i++):
                        if($i >= $page - 2 && $i <= $page + 2):
                            if($i == $page): ?>
                                <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" class="active"><?= $i ?></a>
                            <?php else: ?>
                                <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                            <?php endif;
                        endif;
                    endfor;

                    if($page < $total_pages): ?>
                        <a href="?page=<?= $page+1 ?>&search=<?= urlencode($search) ?>"><button>Berikutnya >></button></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>

    <script src="script.js"></script>
    <script>
      feather.replace();
    </script>
</body>
</html>