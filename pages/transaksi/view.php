<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="header text-center">
        <h1>Data Transaksi</h1>
    </div>

    <br>

    <!-- Tombol Tambah Data -->
    <a class="btn btn-primary mb-3" href="./?p=transaksi&a=tambah">Tambah Data</a>

    <!-- Tabel Data Transaksi -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Id Transaksi</th>
                <th>Tanggal Transaksi</th>
                <th>Kode Obat</th>
                <th>Jumlah Beli</th>
                <th>Total</th>
                <th>Diskon</th>
                <th>Total Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            $tabel = 'apotik_transaksi';
            $field = '*';
            $where = '';
            $query = getRecord($tabel, $field, $where);

            if (mysqli_num_rows($query) == 0) :
            ?>
                <tr>
                    <td colspan="9" class="text-center">Data Kosong</td>
                </tr>
            <?php else :
                while ($row = fetch($query)) :
            ?>
                <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= $row['idtrans'] ?></td>
                    <td><?= $row['tgltrans'] ?></td>
                    <td><?= $row['kdobat'] ?></td>
                    <td><?= $row['jmlhbeli'] ?></td>
                    <td><?= $row['total'] ?></td>
                    <td><?= $row['diskon'] ?></td>
                    <td><?= $row['totalbayar'] ?></td>
                    <td class="text-center">
                        <a class="btn btn-danger btn-sm" href="./?p=transaksi&a=hapus&idtrans=<?= $row['idtrans']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile ?>
            <?php endif ?>
        </tbody>
    </table>

    <br>

    <!-- Tombol Kembali -->
    <a class="btn btn-secondary" href="./?p=home">Kembali</a>
</div>

<!-- Link to Bootstrap JS -->
<script src="assets\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
