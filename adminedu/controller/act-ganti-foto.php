<?php

include ('../include/config.php');

session_start();
$username = $_SESSION['username'];

$r = $con->query("SELECT * FROM users WHERE username = '$username'");
foreach ($r as $rr) {
	$foto = $rr['photo'];
}
unlink("../$foto");

$ekstensi_diperbolehkan	= array('png','jpg');
$photo = $_FILES['photo']['name'];
$x = explode('.', $photo);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['photo']['size'];
$file_tmp = $_FILES['photo']['tmp_name'];	

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 1044070){			
		move_uploaded_file($file_tmp, '../assets/images/avatars/'.$photo);
		$con->query("UPDATE users SET photo='assets/images/avatars/$photo' WHERE username='$username'");

		if ($con->affected_rows > 0){
			$_SESSION['photo'] = "assets/images/avatars/$photo";
			echo "<script>alert('Foto telah berhasil disimpan');window.location='../index.php?page=ganti-foto'</script>";
		}else{
			echo "<script>alert('Foto telah gagal disimpan');window.location='../index.php?page=ganti-foto'</script>";
		}

	}else{
		echo "<script>alert('Ukuran file terlalu besar');window.location='../index.php?page=ganti-foto'</script>";
	}
}else{
	echo "<script>alert('Ekstensi file tidak diperbolehkan');window.location='../index.php?page=ganti-foto'</script>";
}