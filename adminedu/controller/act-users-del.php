<?php
include '../include/config.php';

$username = $_GET['username'];
$r = $con->query("SELECT * FROM users WHERE username = '$username'");
foreach ($r as $rr) {
	$photo = $rr['photo'];
}

unlink("../$photo");
$db = $con->query("DELETE FROM users WHERE username='$username'");

if ($con->affected_rows > 0){
	echo "<script>alert('User telah berhasil dihapus');window.location='../index.php?page=users'</script>";
}else{
	echo "<script>alert('User telah gagal dihapus');window.location='../index.php?page=users'</script>";
}

?>