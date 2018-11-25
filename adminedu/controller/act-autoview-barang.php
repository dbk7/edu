<?php
    include ('../include/config.php');

    $id_barang = $_GET['id_barang'];
    $id_barangcut = substr($id_barang, 0, 6);
    $query = mysqli_query($con, "SELECT * FROM barang WHERE id_barang='$id_barangcut'");
    $barang = mysqli_fetch_array($query);
    $data = array(
                'nama_barang'  =>  $barang['nama_barang'],
                'harga_jual'   =>  $barang['harga_jual'],
                'stock_barang'  =>  $barang['stock_barang'],);
    echo json_encode($data);
?>