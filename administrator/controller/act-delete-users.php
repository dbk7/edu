<?php
    include '../includes/config.php';

    $id = $_GET['id'];;

    $con->query("DELETE FROM tb_users WHERE id='$id'");

    if ($con->affected_rows > 0){
        echo "<script>alert('User telah berhasil dihapus');window.location='../index.php?pages=users'</script>";
    }else{
        echo "<script>alert('User telah gagal dihapus');window.location='../index.php?pages=users'</script>";
    }
?>