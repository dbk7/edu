<?php

include '../include/config.php';

$idmitra = $_GET['id_mitra'];

$db = $con->query("DELETE FROM mitra WHERE id_mitra='$idmitra'");

if ($con->affected_rows > 0){
	echo "<script>alert('Mitra telah berhasil dihapus');window.location='../index.php?page=mitra'</script>";
}else{
	echo "<script>alert('Mitra telah gagal dihapus');window.location='../index.php?page=mitra'</script>";
}

?>