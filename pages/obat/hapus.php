<?php 
 	$id = $_GET['id'];
 	$delete = delete("apotik_obat","kdobat='$id'");
 	header('location: ./?p=obat');
?>