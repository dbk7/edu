<?php

include ('../include/config.php');

$nama = $_POST['nama'];
$seat = $_POST['seat'];
$status = $_POST['stat'];

$con->query("INSERT INTO edu_kelas (nama_kelas, seat, status) values ('$nama', '$seat', '$status')");

if ($con->affected_rows > 0){
	echo "<script>alert('Event telah berhasil disimpan');window.location='../index.php?page=mitra'</script>";
}else{
	echo "<script>alert('Event telah gagal disimpan');window.location='../index.php?page=mitra'</script>";
}