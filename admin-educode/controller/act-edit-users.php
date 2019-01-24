<?php
    include ('../includes/config.php');

    $id_lama = $_GET['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $photo = $_POST['photo'];
    $fullname = $_POST['fullname'];
    $otorisasi = $_POST['otorisasi'];

    $con->query("UPDATE tb_users SET email='$email', `password`='$password', fullname='$fullname', otorisasi='$otorisasi' WHERE id='$id_lama' ");

        if ($con->affected_rows > 0){
            echo "<script>alert('User telah berhasil diedit');window.location='../index.php?pages=users'</script>";
        }else{
            echo "<script>alert('User telah gagal diedit');window.location='../index.php?pages=users'</script>";
        }

    // $photo = $_FILES['photo']['name'];
    // $tmp = $_FILES['photo']['tmp_name'];

    // Rename nama fotonya dengan menambahkan tanggal dan jam upload
    // $photobaru = date('dmYHis').$photo;

    // Set path folder tempat menyimpan fotonya
    // $path = "../assets/images/".$photobaru;

    // if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak

        // Query untuk menampilkan data users berdasarkan id yang dikirim
        // $r = $con->query("SELECT * FROM tb_users WHERE id = '$id_lama'");
	    // foreach ($r as $rr) {
        // Cek apakah file foto sebelumnya ada di folder images
        // if(is_file("assets/images/".$rr['photo'])) // Jika foto ada
        // unlink("assets/images/".$rr['photo']); // Hapus file foto sebelumnya yang ada di folder images
        // }

        // $con->query("UPDATE tb_users SET email='$email', `password`='$password', photo='$photobaru', fullname='$fullname', otorisasi='$otorisasi' WHERE id='$id_lama' ");

        // if ($con->affected_rows > 0){
            // echo "<script>alert('User telah berhasil diedit');window.location='../index.php?pages=users'</script>";
        // }else{
            // echo "<script>alert('User telah gagal diedit');window.location='../index.php?pages=users'</script>";
        // }
        
    // }
?>