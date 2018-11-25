<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $kode_returpenjualan = $_GET['kode_rp'];
    // $kode_returpenjualan = 'RJ-201808140001';
    $r = $con->query("SELECT retur_penjualan.kode_returpenjualan, retur_penjualan.kode_penjualan, retur_penjualan.tgl_returpenjualan, users.fullname, retur_penjualan.totalqty_barangretur, retur_penjualan.grandtotal_barangretur FROM users INNER JOIN (retur_penjualan INNER JOIN (barang INNER JOIN retur_penjualan_details ON barang.id_barang = retur_penjualan_details.id_barang) ON retur_penjualan.kode_returpenjualan = retur_penjualan_details.kode_returpenjualan) ON users.username = retur_penjualan.username WHERE retur_penjualan.kode_returpenjualan = '$kode_returpenjualan'");
    foreach ($r as $rr) { 

    $html =
    '<html>
        <head>
            <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: left;
            }
            </style>
        </head>
    
        <body>
    
        <img src="../assets/images/backgrounds/mart212.jpg" width="15%"></img>
        <center><strong><span style="font-size:160%;">Surat Bukti Retur Penjualan</span></strong></center>
        <br>
          <table width="50%" border="1">
            <tbody>
              <tr>
                <th width="25%" scope="row">Kode Retur Penjualan</th>
                <td width="25%">'.$rr['kode_returpenjualan'].'</td>
              </tr>
              <tr>
                <th scope="row">Tanggal Retur</th>
                <td>'.$rr['tgl_returpenjualan'].'</td>
              </tr>
              <tr>
                <th scope="row">Kode Penjualan</th>
                <td>'.$rr['kode_penjualan'].'</td>
              </tr>
              <tr>
                <th scope="row">Petugas</th>
                <td>'.$rr['fullname'].'</td>
              </tr>
            </tbody>
          </table>
          <br>
          <table width="100%" border="1">
            <tbody>
                <tr>
                    <th width="10%">ID</th>
                    <th width="40%">Nama Barang</th>
                    <th width="15%" style="text-align: right">Qty</th>
                    <th width="15%" style="text-align: center">Harga</th>
                    <th width="20%" style="text-align: right">Total</th>
                </tr>';
                $s = $con->query("SELECT retur_penjualan_details.id_barang, barang.nama_barang, retur_penjualan_details.qty_retur, retur_penjualan_details.harga_retur, retur_penjualan_details.total_retur FROM retur_penjualan INNER JOIN (barang INNER JOIN retur_penjualan_details ON barang.id_barang = retur_penjualan_details.id_barang) ON retur_penjualan.kode_returpenjualan = retur_penjualan_details.kode_returpenjualan WHERE retur_penjualan.kode_returpenjualan = '$kode_returpenjualan'");
                while ($ss = $s->fetch_array()) {
                $html .='<tr>
                    <td>'.$ss['id_barang'].'</td>
                    <td>'.$ss['nama_barang'].'</td>
                    <td style="text-align: center">'.$ss['qty_retur'].'</td>
                    <td style="text-align: right">Rp. '.$ss['harga_retur'].'</td>
                    <td style="text-align: right">Rp. '.$ss['total_retur'].'</td>
                </tr>';
                }
            $html .='
            </tbody>
          </table>
          <br>
          <table width="100%" border="1">
            <tbody>
              <tr>
                <th width="80%" colspan="4">Total Qty</th>
                <td width="20%" style="text-align: right">'.$rr['totalqty_barangretur'].'</th>
              </tr>
              <tr>
                <th colspan="4">Grandtotal Harga Beli</th>
                <td style="text-align: right">Rp. '.$rr['grandtotal_barangretur'].'</td>
              </tr>
            </tbody>
          </table>
        </body>
    </html>';
    }

    $date = date("Y-m-d");
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream('SuratBuktiReturPenjualan-'.$kode_returpenjualan, array('Attachment'=>0));
    $output = $dompdf->output();
?>