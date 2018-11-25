<?php
	include ('../include/config.php');

	$searchTerm = $_GET['term'];

	$query = $con->query("SELECT * FROM barang WHERE id_barang LIKE '%".$searchTerm."%' OR nama_barang LIKE '%".$searchTerm."%'");
	while ($row = $query->fetch_assoc()) {
		$view = $row['id_barang'] ." - ". $row['nama_barang'];
	    $data[] = $view;
	}
	echo json_encode($data);
?>