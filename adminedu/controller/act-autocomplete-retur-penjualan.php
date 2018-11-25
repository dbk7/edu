<?php
	include ('../include/config.php');

	$searchTerm = $_GET['term'];

	$query = $con->query("SELECT * FROM retur_penjualan WHERE kode_returpenjualan LIKE '%".$searchTerm."%'");
	while ($row = $query->fetch_assoc()) {
		$view = $row['kode_returpenjualan'];
	    $data[] = $view;
	}
	echo json_encode($data);
?>