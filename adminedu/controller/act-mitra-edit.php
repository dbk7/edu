<?php

include ('../include/config.php');

$id = $_GET['id'];	
$nama = $_POST['nama'];
$seat = $_POST['seat'];
$status = $_POST['status'];

$con->query("UPDATE edu_kelas SET nama_kelas='$nama', seat='$seat', status='$status' WHERE id='$id'");

if ($con->affected_rows > 0){
	echo "<script>alert('Event telah berhasil disimpan');window.location='../index.php?page=mitra'</script>";
}else{
	echo "<script>alert('Event telah gagal disimpan');window.location='../index.php?page=mitra'</script>";
}