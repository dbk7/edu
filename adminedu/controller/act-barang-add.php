<?php

include ('../include/config.php');

$carikode = $con->query("SELECT MAX(id_barang) FROM barang");
$datakode = mysqli_fetch_array($carikode);

if ($datakode) {
	$nilaikode = substr($datakode[0], 2);
	$kode = (int) $nilaikode;
	$kode = $kode + 1;
	$kode_otomatis = "BG".str_pad($kode, 4, "0", STR_PAD_LEFT);
} else {
	$kode_otomatis = "BG0001";
}

$namabarang = $_POST['nama'];
$satuanbarang = $_POST['satuan'];
$kategoribarang = $_POST['kategori'];
// $hargabeli = $_POST['harga_beli'];
// $hargajual = $_POST['harga_jual'];
$mitra = $_POST['mitra'];

$con->query("INSERT INTO barang values ('$kode_otomatis', '$namabarang', '$satuanbarang', '$kategoribarang', '0', '0', '0', '$mitra')");

if ($con->affected_rows > 0){
	echo "<script>alert('Barang telah berhasil disimpan');window.location='../index.php?page=barang'</script>";
}else{
	echo "<script>alert('Barang telah gagal disimpan');window.location='../index.php?page=barang'</script>";
}