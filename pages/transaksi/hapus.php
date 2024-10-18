<?php
    $id = $_GET["id"];

    $delete = delete("transaksi", "id = '$id'");

    if ($delete) {
        //  header('location : ./?p=obat');
        echo "<script> document.location.href='./?p=transaksi'; </script>";
      }else {
          echo "Data gagal dihapus";
      };
?>