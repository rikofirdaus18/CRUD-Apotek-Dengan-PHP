<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Obat</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <!-- Tombol Tambah Obat -->
        <a href="./?p=obat&a=tambah" class="btn btn-primary mb-3">Tambah Obat</a>

        <!-- Form Pencarian -->
        <form class="d-flex mb-3">
            <input class="form-control me-2" type="text" name="cari" placeholder="Filter nasabah">
            <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>

        <!-- Tabel Data Obat -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Jenis Obat</th>
                    <th>Harga Obat</th>
                    <th>Stok Obat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $tabel = "apotik_obat";
                    $field = "*";
                    $where = "";
                    $query = getRecord($tabel, $field, $where);
                    while($row = fetch($query)){
                ?>
                <tr>
                    <td align="center"><?= $no;?></td>
                    <td align="center"><?= $row['kdobat'];?></td>
                    <td align="center"><?= $row['nmobat'];?></td>
                    <td><?= $row['jnsobat'];?></td>
                    <td align="center"><?= $row['hrgobat'];?></td>
                    <td align="right"><?= $row['stokobat'];?></td>
                    <td align="center">
                        <a href="./?p=obat&a=edit&id=<?= $row['kdobat'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="./?p=obat&a=hapus&id=<?= $row['kdobat'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php
                    $no++;
                    }
                ?>
            </tbody>
        </table>

        <!-- Tombol Kembali -->
        <a href="./?p=home" class="btn btn-secondary mt-3">Kembali</a>
    </div>

   <!-- Link to Bootstrap JS -->
   <script src="assets\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
