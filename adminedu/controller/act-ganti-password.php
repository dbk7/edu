<?php

include ('../include/config.php');
session_start();
$username = $_SESSION['username'];
$passwordlama = md5($_POST['passwordlama']);
$passwordbaru = md5($_POST['passwordbaru']);
$retypepassword = md5($_POST['retypepassword']);

$r = $con->query("SELECT * FROM users WHERE username = '$username'");
foreach ($r as $rr) {
	$password = $rr['password'];
}

if ($passwordlama == $password){
	
	if ($passwordbaru == $retypepassword){
		$con->query("UPDATE users SET `password`='$passwordbaru' WHERE username='$username' ");

		if ($con->affected_rows > 0){
			echo "<script>alert('Password telah berhasil disimpan');window.location='../index.php?page=ganti-password'</script>";
		}else{
			echo "<script>alert('Password telah gagal disimpan');window.location='../index.php?page=ganti-password'</script>";
		}
	} else {
		echo "<script>alert('Password tidak sama');window.location='../index.php?page=ganti-password'</script>";
	}

} else {
	echo "<script>alert('Password lama salah');window.location='../index.php?page=ganti-password'</script>";
}