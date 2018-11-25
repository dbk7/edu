<?php

include ('../include/config.php');
session_start();

$kode_returpenjualan = $_POST['kode_returpenjualan'];
$today = date("Y-m-d");
$kode_penjualan = $_POST['kode_penjualan'];
$grandtotal = $_POST['grandtotal'];
$total_qty = $_POST['total_qty'];
$grandtotal = $_POST['grandtotal'];
$username = $_SESSION['username'];

if ($grandtotal == "") {
	echo "<script>alert('Data tidak ada');window.location='../index.php?page=penjualan-add'</script>";
} else {
	$con->query("INSERT INTO retur_penjualan values ('$kode_returpenjualan', '$today', '$kode_penjualan', '$total_qty', '$grandtotal', '$username')");

	$con->query("INSERT INTO retur_penjualan_details (kode_returpenjualan, id_barang, qty_retur, harga_retur, total_retur) SELECT kode_returpenjualan, id_barang, qty_retur, harga_retur, total_retur FROM retur_penjualan_details_temp");

	$con->query("DELETE FROM retur_penjualan_details_temp");

	if ($con->affected_rows > 0){
		echo "<script>
			window.open('../report/struk-retur-penjualan.php?kode_rp=$kode_returpenjualan', '_blank');
			alert('Data retur penjualan telah berhasil disimpan');
			window.location='../index.php?page=retur-penjualan';
		</script>";
		echo "<script>alert('Data retur penjualan telah berhasil disimpan');window.location='../index.php?page=retur-penjualan'</script>";
	}else{
		echo "<script>alert('Data retur penjualan telah gagal disimpan');window.location='../index.php?page=retur-penjualan'</script>";
	}
}