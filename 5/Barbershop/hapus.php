    <?php
    require 'koneksi.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Hapus data dengan ID yang ditentukan
        $sql = "DELETE FROM tb_pemesanan WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Rearrange ID setelah data dihapus
            $conn->query("SET @num = 0");
            $conn->query("UPDATE tb_pemesanan SET id = (@num := @num + 1) ORDER BY id");

            // Set AUTO_INCREMENT ke nilai ID terakhir + 1
            $conn->query("ALTER TABLE tb_pemesanan AUTO_INCREMENT = 1");
        }

        $stmt->close();
        $conn->close();

        // Redirect ke halaman antrean
        header('Location: antrean.php');
        exit();
    }
    ?>
