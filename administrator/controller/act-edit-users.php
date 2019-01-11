<?php
    include ('../includes/config.php');

    $id_lama = $_GET['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_POST['photo'];
    $fullname = $_POST['fullname'];
    $otorisasi = $_POST['otorisasi'];

    $con->query("UPDATE tb_users SET email='$email', `password`='$password', photo='$photo', fullname='$fullname', otorisasi='$otorisasi' WHERE id='$id_lama' ");

    if ($con->affected_rows > 0){
        echo "<script>alert('User telah berhasil diedit');window.location='../index.php?pages=users'</script>";
    }else{
        echo "<script>alert('User telah gagal diedit');window.location='../index.php?pages=users'</script>";
	}
?>