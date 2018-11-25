<?php

include ('../include/config.php');

$idkategori = $_GET['id_kategori'];	
$namakategori = $_POST['kategori'];
$deskripsikategori = $_POST['deskripsi'];

$con->query("UPDATE kategori SET nama_kategori='$namakategori', deskripsi_kategori='$deskripsikategori' WHERE id_kategori='$idkategori'");

if ($con->affected_rows > 0){
	echo "<script>alert('Kategori telah berhasil disimpan');window.location='../index.php?page=kategori'</script>";
}else{
	echo "<script>alert('Kategori telah gagal disimpan');window.location='../index.php?page=kategori'</script>";
}