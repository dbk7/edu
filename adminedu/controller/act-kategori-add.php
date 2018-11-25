<?php

include ('../include/config.php');

$carikode = $con->query("SELECT MAX(id_kategori) FROM kategori");
$datakode = mysqli_fetch_array($carikode);

if ($datakode) {
	$nilaikode = substr($datakode[0], 2);
	$kode = (int) $nilaikode;
	$kode = $kode + 1;
	$kode_otomatis = "KG".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
	$kode_otomatis = "KG001";
}

$namakategori = $_POST['kategori'];
$deskripsikategori = $_POST['deskripsi'];

$con->query("INSERT INTO kategori values ('$kode_otomatis', '$namakategori', '$deskripsikategori')");

if ($con->affected_rows > 0){
	echo "<script>alert('Kategori telah berhasil disimpan');window.location='../index.php?page=kategori'</script>";
}else{
	echo "<script>alert('Kategori telah gagal disimpan');window.location='../index.php?page=kategori'</script>";
}