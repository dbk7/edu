<?php

include ('../include/config.php');

$username = $_POST['username'];
$password = md5($_POST['password']);
$fullname = $_POST['fullname'];
$authorization = $_POST['authorization'];

$ekstensi_diperbolehkan	= array('png','jpg');
$photo = $_FILES['photo']['name'];
$x = explode('.', $photo);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['photo']['size'];
$file_tmp = $_FILES['photo']['tmp_name'];	

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 1044070){			
		move_uploaded_file($file_tmp, '../assets/images/avatars/'.$photo);
		$con->query("INSERT INTO users values ('$username', '$password', '$fullname', '$authorization', 'assets/images/avatars/$photo')");

		if ($con->affected_rows > 0){
			echo "<script>alert('User telah berhasil disimpan');window.location='../index.php?page=users'</script>";
		}else{
			echo "<script>alert('User telah gagal disimpan');window.location='../index.php?page=users'</script>";
		}

	}else{
		echo "<script>alert('Ukuran file terlalu besar');window.location='../index.php?page=users'</script>";
	}
}else{
	echo "<script>alert('Ekstensi file tidak diperbolehkan');window.location='../index.php?page=users'</script>";
}