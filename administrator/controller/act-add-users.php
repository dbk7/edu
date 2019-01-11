<?php
    include ('../includes/config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    $photo = $_POST['photo'];
    $fullname = $_POST['fullname'];
    $otorisasi = $_POST['otorisasi'];

    $con->query("INSERT INTO tb_users VALUES (null,'$email', '$password', '$photo', '$fullname', '$otorisasi')");

    if ($con->affected_rows > 0){
        echo "<script>alert('User telah berhasil disimpan');window.location='../index.php?pages=users'</script>";
    }else{
        echo "<script>alert('User telah gagal disimpan');window.location='../index.php?pages=users'</script>";
	}
?>