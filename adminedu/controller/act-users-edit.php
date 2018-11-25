<?php

include ('../include/config.php');
session_start();

$username = $_SESSION['username'];
$usernamelama = $_GET['username'];
$usernamebaru = $_POST['username'];
$password = md5($_POST['password']);
$fullname = $_POST['fullname'];
$authorization = $_POST['authorization'];

$con->query("UPDATE users SET username='$usernamebaru', `password`='$password', fullname='$fullname', authorization='$authorization' WHERE username='$usernamelama' ");

if ($con->affected_rows > 0){
	if ($username == $usernamelama) {
		if ($usernamelama == $usernamebaru) {
			echo "<script>alert('User telah berhasil disimpan');window.location='../index.php?page=users'</script>";
		} else {
			$_SESSION['username'] = "$usernamebaru";
			echo "<script>alert('User telah berhasil disimpan');window.location='../index.php?page=users'</script>";
		}
	} else {
		echo "<script>alert('User telah berhasil disimpan');window.location='../index.php?page=users'</script>";
	}
}else{
	echo "<script>alert('User telah gagal disimpan');window.location='../index.php?page=users'</script>";
}