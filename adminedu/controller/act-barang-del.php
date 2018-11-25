<?php

include '../include/config.php';

$idbarang = $_GET['id'];

$db = $con->query("DELETE FROM pendaftaran WHERE id='$idbarang'");

if ($con->affected_rows > 0){
	echo "<script>alert('Peserta telah berhasil dihapus');window.location='../index.php?page=barang'</script>";
}else{
	echo "<script>alert('Peserta gagal dihapus');window.location='../index.php?page=barang'</script>";
}

?>