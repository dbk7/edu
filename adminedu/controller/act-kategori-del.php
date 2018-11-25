<?php

include '../include/config.php';

$idkategori = $_GET['id_kategori'];

$db = $con->query("DELETE FROM kategori WHERE id_kategori='$idkategori'");

if ($con->affected_rows > 0){
	echo "<script>alert('Kategori telah berhasil dihapus');window.location='../index.php?page=kategori'</script>";
}else{
	echo "<script>alert('Kategori telah gagal dihapus');window.location='../index.php?page=kategori'</script>";
}

?>