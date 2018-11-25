<?php
    include ('../include/config.php');

    $kode_penjualan = $_GET['kode_penjualan'];
    $id_barang = $_GET['id_barang'];
    $id_barangcut = substr($id_barang, 0, 6);
    $query = mysqli_query($con, "SELECT penjualan.kode_penjualan, barang.nama_barang, penjualan_details.harga_jual, penjualan_details.qty FROM barang INNER JOIN (penjualan INNER JOIN penjualan_details ON penjualan.kode_penjualan = penjualan_details.kode_penjualan) ON barang.id_barang = penjualan_details.id_barang WHERE penjualan_details.id_barang='$id_barangcut' AND penjualan.kode_penjualan='$kode_penjualan'");
    $barang = mysqli_fetch_array($query);
    $data = array(
                'nama_barang'  =>  $barang['nama_barang'],
                'harga_jual'   =>  $barang['harga_jual'],
                'qty_barang'   =>  $barang['qty'],);
    echo json_encode($data);
?>