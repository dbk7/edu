<?php

include ('../include/config.php');

$idps = $_GET['id'];	
$nmps = $_POST['nam'];
$emlps = $_POST['eml'];
$jbps = $_POST['jb'];
$tlps = $_POST['tlp'];
// $hargabeli = $_POST['harga_beli'];
// $hargajual = $_POST['harga_jual'];
$alps = $_POST['al'];

// $con->query("INSERT INTO barang values ('$kode_otomatis', '$nmps', '$emlps', '$jbps', '$hargabeli', '$hargajual', '0', '$mitra')");
$con->query("UPDATE pendaftaran SET nama='$nmps', email='$emlps', job='$jbps', tlp='$tlps' , alasan='$alps' WHERE id='$idps'");

if ($con->affected_rows > 0){
	echo "<script>alert('Peserta telah berhasil disimpan');window.location='../index.php?page=barang'</script>";
}else{
	echo "<script>alert('Peserta telah gagal disimpan');window.location='../index.php?page=barang'</script>";
}