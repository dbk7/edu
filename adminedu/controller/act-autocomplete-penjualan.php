<?php
	include ('../include/config.php');

	$searchTerm = $_GET['term'];

	$query = $con->query("SELECT * FROM penjualan WHERE kode_penjualan LIKE '%".$searchTerm."%'");
	while ($row = $query->fetch_assoc()) {
		$view = $row['kode_penjualan'];
	    $data[] = $view;
	}
	echo json_encode($data);
?>