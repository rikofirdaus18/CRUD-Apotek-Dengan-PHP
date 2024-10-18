<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Entry Obat</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Form Entry Obat</h2>

        <!-- Form Entry Obat -->
        <form action="" method="POST">
            <div class="mb-3">
                <label for="kdobat" class="form-label">Kode Obat</label>
                <input type="text" class="form-control" id="kdobat" name="kdobat" placeholder="Masukkan Kode Obat" required>
            </div>

            <div class="mb-3">
                <label for="nmobat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nmobat" name="nmobat" placeholder="Masukkan Nama Obat" required>
            </div>

            <div class="mb-3">
                <label for="jnsobat" class="form-label">Jenis Obat</label>
                <input type="text" class="form-control" id="jnsobat" name="jnsobat" placeholder="Masukkan Jenis Obat" required>
            </div>

            <div class="mb-3">
                <label for="hrgobat" class="form-label">Harga Obat</label>
                <input type="number" class="form-control" id="hrgobat" name="hrgobat" placeholder="Masukkan Harga Obat" required>
            </div>

            <div class="mb-3">
                <label for="stokobat" class="form-label">Stok Obat</label>
                <input type="number" class="form-control" id="stokobat" name="stokobat" placeholder="Masukkan Stok Obat" required>
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                <button type="button" class="btn btn-secondary" onclick="window.location.href='./?p=obat'">Batal</button>
            </div>
        </form>

        <?php
            if (isset($_POST['simpan'])) {    
                $kdobat = $_POST['kdobat'];
                $nmobat = $_POST['nmobat'];
                $jnsobat = $_POST['jnsobat'];
                $hrgobat = $_POST['hrgobat'];
                $stokobat = $_POST['stokobat'];
                
                $tabel = "apotik_obat";
                $field = "(kdobat, nmobat, jnsobat, hrgobat, stokobat)";
                $value = "('$kdobat', '$nmobat', '$jnsobat', '$hrgobat', '$stokobat')";
                $simpan = insert($tabel, $field, $value);
                
                if ($simpan){
                    header('location:./?p=obat');
                } else {
                    echo "<div class='alert alert-danger mt-3'>Data Gagal Disimpan!</div>";
                }
            }
        ?>
         <!-- Tombol Kembali -->
         <a href="./?p=obat" class="btn btn-secondary mt-3">Kembali</a>
    </div>

    <!-- Link to Bootstrap JS -->
    <script src="assets\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
