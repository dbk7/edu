<?php

include ('../include/config.php');
session_start();

$kode_barangmasuk = $_POST['kode_barangmasuk'];
$today = date("Y-m-d");
$total_qty = $_POST['total_qty'];
$grandtotal_harga_beli = $_POST['grandtotal_harga_beli'];
$grandtotal_harga_jual = $_POST['grandtotal_harga_jual'];
$username = $_SESSION['username'];

if ($grandtotal_harga_beli == "") {
	echo "<script>alert('Data tidak ada');window.location='../index.php?page=barang-masuk-add'</script>";
} else {
	$con->query("INSERT INTO barang_masuk values ('$kode_barangmasuk', '$today', '$total_qty', '$grandtotal_harga_beli', '$grandtotal_harga_jual', '$username')");

	$con->query("INSERT INTO barang_masuk_details (kode_barangmasuk, id_barang, qty, harga_beli, harga_jual, total_harga_beli, total_harga_jual) SELECT kode_barangmasuk, id_barang, qty, harga_beli, harga_jual, total_harga_beli, total_harga_jual FROM barang_masuk_details_temp");

	$con->query("DELETE FROM barang_masuk_details_temp");

	if ($con->affected_rows > 0){
		echo "<script>
			window.open('../report/struk-barang-masuk.php?kode_bm=$kode_barangmasuk', '_blank');
			alert('Data barang masuk telah berhasil disimpan');
			window.location='../index.php?page=barang-masuk';
		</script>";
	}else{
		echo "<script>alert('Data barang masuk telah gagal disimpan');window.location='../index.php?page=barang-masuk'</script>";
	}
}