<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Transaksi</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Tambah Data</h1>

    <br>

    <?php
    if (isset($_POST["btnCari"])) {
        $kdobat = $_POST["kdobat"];

        $tabel = "apotik_obat";
        $field = "*";
        $where = "WHERE kdobat = $kdobat";
        $query = getRecord($tabel, $field, $where);

        if (count_rows($query) == 0) {
            echo '<div class="alert alert-danger">Data Tidak Ditemukan</div>';
        } else {
            $row = fetch($query);
        }
    }
    ?>

    <form action="" method="post">
        <table class="table table-bordered">
            <tr>
                <td>Id Transaksi</td>
                <td>:</td>
                <td><input class="form-control" required type="text" name="idtrans"></td>
            </tr>
            <tr>
                <td>Tanggal Transaksi</td>
                <td>:</td>
                <td><input class="form-control" required type='date' name="tgltrans"></td>
            </tr>
            <tr>
                <td>Kode Obat</td>
                <td>:</td>
                <td>
                    <select name='kdobat' id='kdobat' class="form-select" onchange='updateBiaya()'>
                        <?php
                            $cek = getRecord('apotik_obat', 'kdobat', '');

                            while ($r = fetch($cek)){
                                echo "<option value='". $r['kdobat'] ."'>". $r['kdobat'] ."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah Beli</td>
                <td>:</td>
                <td><input class="form-control" required type="text" id='jumlah' name='jmlhbeli' oninput='updateBiaya()'></td>
            </tr>
            <tr>
                <td>Total</td>
                <td>:</td>
                <td><input class="form-control" required type="text" id='total' name="total" readonly></td>
            </tr>
            <tr>
                <td>Diskon</td>
                <td>:</td>
                <td><input class="form-control" required type="text" id='diskon' name="diskon" readonly></td>
            </tr>
            <tr>
                <td>Total Bayar</td>
                <td>:</td>
                <td><input class="form-control" required type="text" id='totalbayar' name="totalbayar" readonly></td>
            </tr>
        </table>

        <br>

        <div class="text-center">
            <button class="btn btn-success" type="submit" name="btnSimpan">Simpan</button>
            <a class="btn btn-danger" href="./?p=transaksi">Batal</a>
        </div>
         <!-- Tombol Kembali -->
         <a href="./?p=transaksi" class="btn btn-secondary mt-3">Kembali</a>
    </form>

    <?php
    if (isset($_POST['btnSimpan'])) {
        $idtrans = $_POST["idtrans"];
        $tgltrans = $_POST["tgltrans"];
        $kdobat = $_POST["kdobat"];
        $jmlhbeli = $_POST['jmlhbeli'];
        $total = $_POST['total'];
        $diskon = $_POST['diskon'];
        $totalbayar = $_POST['totalbayar'];

        $tabel = 'apotik_transaksi';
        $field = '(idtrans, tgltrans, kdobat, jmlhbeli, total, diskon, totalbayar)';
        $value = "('$idtrans', '$tgltrans', '$kdobat', '$jmlhbeli', '$total', '$diskon', '$totalbayar')";

        $query = insert($tabel, $field, $value);

        if ($query) {
            echo '<script> alert("Data Berhasil Disimpan"); </script>';
            echo "<script> document.location.href='./?p=transaksi'; </script>";
        } else {
            echo '<script> alert("Data Gagal Disimpan"); </script>';
        }
    }
    ?>

</div>

<script>
    function updateBiaya() {
        var kdobat = document.getElementById("kdobat").value;
        var jumlah = document.getElementById("jumlah").value;

        var txtTotal = document.getElementById("total");
        var txtDiskon = document.getElementById("diskon");
        var txtJumlahBayar = document.getElementById("totalbayar");

        if (kdobat === "OBT001") {
            var total = jumlah * 2600;
            var diskon = total * 0.1;
        } else if (kdobat === "OBT002") {
            var total = jumlah * 3300;
            var diskon = total * 0.15;
        } else {
            var total = jumlah * 12000;
            var diskon = total * 0.2;
        }

        txtTotal.value = total.toFixed(2);
        txtDiskon.value = diskon.toFixed(2);
        txtJumlahBayar.value = (total - diskon).toFixed(2);
    }
</script>

<!-- Link to Bootstrap JS -->
<script src="assets\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
