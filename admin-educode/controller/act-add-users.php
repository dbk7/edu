<?php
    include ('../includes/config.php');

    $email = $_POST['email'];
    $password = $_POST['password'];
    // $photo = $_POST['photo'];
    $fullname = $_POST['fullname'];
    $otorisasi = $_POST['otorisasi'];

    $con->query("INSERT INTO tb_users VALUES (null,'$email', '$password', '$fullname', '$otorisasi')");

        if ($con->affected_rows > 0){
            echo "<script>alert('User telah berhasil disimpan');window.location='../index.php?pages=users'</script>";
        }else{
            echo "<script>alert('User telah gagal disimpan');window.location='../index.php?pages=users'</script>";
        }

    // $photo = $_FILES['photo']['name'];
    // $tmp = $_FILES['photo']['tmp_name'];

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    // $photobaru = date('dmYHis').$photo;

    // Set path folder tempat menyimpan fotonya
    // $path = "../assets/images/".$photobaru;

    // if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak

        // $con->query("INSERT INTO tb_users VALUES (null,'$email', '$password', '$photobaru', '$fullname', '$otorisasi')");

        // if ($con->affected_rows > 0){
            // echo "<script>alert('User telah berhasil disimpan');window.location='../index.php?pages=users'</script>";
        // }else{
            // echo "<script>alert('User telah gagal disimpan');window.location='../index.php?pages=users'</script>";
        // }
    
    // }else{
        // Jika gambar gagal diupload, Lakukan :
        // echo "<script>alert('Gambar gagal disimpan');window.location='../index.php?pages=users'</script>";
    // }
?>