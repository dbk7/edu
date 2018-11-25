<?php

include ('../include/config.php');
session_start();

$kode_penjualan = $_POST['kode_penjualan'];
$today = date("Y-m-d");
$total_qty = $_POST['total_qty'];
$grandtotal = $_POST['grandtotal'];
$total_qty = $_POST['total_qty'];
$grandtotal = $_POST['grandtotal'];
$bayar = $_POST['bayar'];
$kembalian = $_POST['kembalian'];
$username = $_SESSION['username'];

if ($bayar < $grandtotal) {
	echo "<script>alert('Uang pembayaran kurang');window.location='../index.php?page=penjualan-add'</script>";
} else if ($grandtotal == "") {
	echo "<script>alert('Data tidak ada');window.location='../index.php?page=penjualan-add'</script>";
} else {
	$con->query("INSERT INTO penjualan values ('$kode_penjualan', '$today', '$total_qty', '$grandtotal', '$bayar', '$kembalian', '$username')");

	$con->query("INSERT INTO penjualan_details (kode_penjualan, id_barang, qty, harga_jual, total) SELECT kode_penjualan, id_barang, qty, harga_jual, total FROM penjualan_details_temp");

	$con->query("DELETE FROM penjualan_details_temp");

	if ($con->affected_rows > 0){
		echo "<script>
			window.open('../report/struk-penjualan.php?kode_p=$kode_penjualan', '_blank');
			alert('Data penjualan telah berhasil disimpan');
			window.location='../index.php?page=penjualan';
		</script>";
	}else{
		echo "<script>alert('Data penjualan telah gagal disimpan');window.location='../index.php?page=penjualan'</script>";
	}
}