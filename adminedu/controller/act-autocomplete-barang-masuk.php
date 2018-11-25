<?php
	include ('../include/config.php');

	$searchTerm = $_GET['term'];

	$query = $con->query("SELECT * FROM barang_masuk WHERE kode_barangmasuk LIKE '%".$searchTerm."%'");
	while ($row = $query->fetch_assoc()) {
		$view = $row['kode_barangmasuk'];
	    $data[] = $view;
	}
	echo json_encode($data);
?>