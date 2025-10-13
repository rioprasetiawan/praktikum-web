<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title>
    <link rel="stylesheet" href="formuliradminn.css">
</head>
<body>

    <?php include 'navbaradmin.php'; ?>

    <main>
        <div class="form-container">
            <h2>FORMULIR ADMIN</h2>
            <form action="proses_formuliradmin.php" method="post" enctype="multipart/form-data">
                <label>Nama Barbershop</label>
                <input type="text" name="nama_cabang" required><br>
                
                <label>Logo Barbershop</label>
                <input type="file" name="logo" accept=".jpg,.png" required><br>
                <small class="file-info">Format yang diizinkan: JPG, PNG (Maks. 2MB)</small><br>
        
                <label>Nama Kapster</label>
                <input type="text" name="kapster" placeholder="(Pisahkan dengan koma)" required><br>
        
                <label>Harga</label>
                <input type="text" name="harga" placeholder="(Format: layanan-harga, pisahkan dengan koma)" required><br>
        
                <label>Lokasi</label>
                <input type="text" name="lokasi" placeholder="(Link google maps)" required><br>
        
                <label>Unggah Foto (Maksimal 5, format JPG/PNG):</label>
                <input type="file" name="gambar[]" accept=".jpg,.png" multiple required>
                <small class="file-info">Pilih hingga 5 foto untuk galeri barbershop</small>

                <div class="button-group">
                    <button type="submit" class="btn btn-submit">Masukan</button>
                    <button type="button" class="btn btn-cancel" onclick="window.location.href='barbershopadmin.php';">Batal</button>
                </div>
            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>

</body>
</html>