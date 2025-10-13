<?php
require 'koneksi.php';

// Set pagination variables
$limit = 5; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Check for a search term
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
$searchQuery = $search ? "WHERE nama LIKE '%$search%' OR cabang LIKE '%$search%'" : '';

// Get the total number of records for pagination
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tb_pemesanan $searchQuery");
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Calculate the range of page numbers to display
$range = 2; // Jumlah halaman yang ditampilkan di kiri dan kanan halaman aktif
$initial_num = $page - $range;
$condition_limit_num = ($page + $range) + 1;

// Fetch records based on search and pagination
$result = mysqli_query($conn, "SELECT * FROM tb_pemesanan $searchQuery ORDER BY jadwal ASC LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberShop</title>
    <link rel="stylesheet" href="Antrean user.css">
    <link rel="stylesheet" href="footernav.css">
    <script src="https://unpkg.com/feather-icons"></script>

</head>
<body>
    <?php include "navbaruser.php" ?>
   


    <main>
        <!-- Search Bar and Button -->
        
    
        <!-- Daftar Antrean -->
        
        <div class="queue-list">
        <div class="search-bar">
            <form method="GET" action="">
                <div class="search-form" >
                <label for="">
                <i data-feather="search"></i>
                </label>
                <input type="text" name="search" placeholder="            BAR PENCARIAN" value="<?= htmlspecialchars($search) ?>">
                <button type="submit">CARI</button>        
                </div>      
            </form>
        </div>
            <h2>Daftar Antrean</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Cabang</th>
                        <th>Jadwal</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $counter = $start + 1;
                while($row = mysqli_fetch_assoc($result)):
                ?>
                <tr>
                    <td><?= $counter++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['cabang']); ?></td>
                    <td><?= htmlspecialchars($row['jadwal']); ?></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    
        <!-- Enhanced Pagination -->
        <div class="pagination">
            <div class="paginationbackground">
                <?php if($total_pages > 0): ?>
                    <?php
                    // Previous button
                    if($page > 1): ?>
                       
                        <a href="?page=<?= $page-1 ?>&search=<?= urlencode($search) ?>"><button><< Sebelumnya</button></a>
                    <?php endif;

                    // Numbered pagination
                    for($i = 1; $i <= $total_pages; $i++):
                        if($i >= $page - 2 && $i <= $page + 2):
                            if($i == $page): ?>
                                <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>" class="active"><?= $i ?></a>
                            <?php else: ?>
                                <a href="?page=<?= $i ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
                            <?php endif;
                        endif;
                    endfor;

                    // Next button
                    if($page < $total_pages): ?>
                        <a href="?page=<?= $page+1 ?>&search=<?= urlencode($search) ?>"><button>Berikutnya >></button></a>
                   
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>

    <?php include 'footer.php'; ?>
    <script>
      feather.replace();
    </script>
</body>
</html>