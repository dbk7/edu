<?php
    include ('../include/config.php');

    $bayar = $_GET['bayar'];

    // Hitung Grandtotal
    $result = $con->query("SELECT SUM(total) FROM penjualan_details_temp");
    $row = $result->fetch_row();
    $grandtotal = $row[0];

    $kembalian = $bayar - $grandtotal;
    
    $data = array(
                'kembalian'   =>  $kembalian,);
    echo json_encode($data);
?>