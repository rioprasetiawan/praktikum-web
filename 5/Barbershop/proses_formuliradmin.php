<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'koneksi.php';

    // Sanitasi input
    $nama_cabang = mysqli_real_escape_string($conn, $_POST['nama_cabang']);
    $kapster = json_encode(array_map('trim', explode(',', $_POST['kapster'])));
    $harga = json_encode(array_map('trim', explode(',', $_POST['harga'])));
    $lokasi = mysqli_real_escape_string($conn, $_POST['lokasi']);
    $deskripsi = isset($_POST['deskripsi']) ? mysqli_real_escape_string($conn, $_POST['deskripsi']) : null;

    // Directory setup
    $uploadDir = 'uploads/';
    $logoDir = 'uploads/logos/';
    
    // Buat direktori jika belum ada
    foreach ([$uploadDir, $logoDir] as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
    }

    // Konfigurasi upload
    $maxFiles = 5;
    $allowedTypes = ['image/jpeg', 'image/png'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    $uploadedFiles = [];
    $errors = [];
    
    // Proses upload logo
    $logo_path = '';
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logoFile = $_FILES['logo'];
        $logoType = $logoFile['type'];
        $logoSize = $logoFile['size'];
        
        // Validasi logo
        if (!in_array($logoType, $allowedTypes)) {
            $errors[] = "Format logo tidak valid. Hanya JPG/PNG yang diperbolehkan.";
        } elseif ($logoSize > $maxFileSize) {
            $errors[] = "Ukuran logo terlalu besar. Maksimal 2MB.";
        } else {
            $logoName = uniqid('logo_') . '-' . basename($logoFile['name']);
            $logoDestination = $logoDir . $logoName;
            
            if (move_uploaded_file($logoFile['tmp_name'], $logoDestination)) {
                $logo_path = $logoDestination;
            } else {
                $errors[] = "Gagal mengupload logo.";
            }
        }
    } else {
        $errors[] = "Logo harus diunggah.";
    }

    // Proses upload gambar galeri
    if (isset($_FILES['gambar'])) {
        $files = $_FILES['gambar'];

        if (count($files['name']) > $maxFiles) {
            $errors[] = "Maksimal 5 file yang dapat diunggah.";
        }

        for ($i = 0; $i < count($files['name']); $i++) {
            if ($files['error'][$i] === UPLOAD_ERR_OK) {
                $fileName = $files['name'][$i];
                $fileType = $files['type'][$i];
                $fileSize = $files['size'][$i];
                $fileTmp = $files['tmp_name'][$i];

                // Validasi file
                if (!in_array($fileType, $allowedTypes)) {
                    $errors[] = "File $fileName tidak valid. Hanya JPG/PNG yang diperbolehkan.";
                    continue;
                }
                if ($fileSize > $maxFileSize) {
                    $errors[] = "File $fileName terlalu besar. Maksimal 2MB.";
                    continue;
                }

                // Generate nama unik dan simpan file
                $newFileName = uniqid('gallery_') . '-' . basename($fileName);
                $destination = $uploadDir . $newFileName;
                
                if (move_uploaded_file($fileTmp, $destination)) {
                    $uploadedFiles[] = $destination;
                } else {
                    $errors[] = "Gagal menyimpan file $fileName.";
                }
            } else {
                $errors[] = "Error saat upload file " . $files['name'][$i];
            }
        }
    }

    // Konversi array file yang terupload ke JSON
    $gambar = json_encode($uploadedFiles);

    // Cek apakah ada error
    if (!empty($errors)) {
        echo "<h3>Error:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<br><a href='javascript:history.back()'>Kembali</a>";
        exit;
    }

    // Prepared statement untuk insert data
    $sql = "INSERT INTO barbershop (nama_cabang, logo_path, kapster, harga, lokasi, gambar, deskripsi) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
            
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssssss", 
        $nama_cabang,
        $logo_path,
        $kapster,
        $harga,
        $lokasi,
        $gambar,
        $deskripsi
    );

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                alert('Cabang berhasil ditambahkan!');
                window.location.href = 'barbershopadmin.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href = 'formuliradmin.php';
              </script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>