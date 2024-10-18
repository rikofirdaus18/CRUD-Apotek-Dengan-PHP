<?php
$kdobat = $_GET['id'];
$query = getRecord("apotik_obat", "*", "WHERE kdobat='$kdobat'");
$row = fetch($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Obat</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Ubah Data Obat</h1>

        <!-- Form Ubah Data Obat -->
        <form action="" method="post">
            <div class="mb-3">
                <label for="kdobat" class="form-label">Kode Obat</label>
                <input type="text" class="form-control" id="kdobat" name="kdobat" value="<?= $kdobat ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="nmobat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nmobat" name="nmobat" value="<?= $row['nmobat'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="jnsobat" class="form-label">Jenis Obat</label>
                <input type="text" class="form-control" id="jnsobat" name="jnsobat" value="<?= $row['jnsobat'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="hrgobat" class="form-label">Harga Obat</label>
                <input type="number" class="form-control" id="hrgobat" name="hrgobat" value="<?= $row['hrgobat'] ?>" required>
            </div>

            <div class="mb-3">
                <label for="stokobat" class="form-label">Stok Obat</label>
                <input type="number" class="form-control" id="stokobat" name="stokobat" value="<?= $row['stokobat'] ?>" required>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='./?p=obat'">Batal</button>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $nmobat = $_POST["nmobat"];
            $jnsobat = $_POST["jnsobat"];
            $hrgobat = $_POST["hrgobat"];
            $stokobat = $_POST["stokobat"];

            $tabel = 'apotik_obat';
            $where = "kdobat = '$kdobat'";
            $value = "nmobat = '$nmobat', jnsobat = '$jnsobat', hrgobat = '$hrgobat', stokobat = '$stokobat'";

            $query = update($tabel, $value, $where);

            if ($query) {
                echo '<script>alert("Data Berhasil Diubah");</script>';
                echo "<script>document.location.href='./?p=obat';</script>";
            } else {
                echo '<script>alert("Data Gagal Diubah");</script>';
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
