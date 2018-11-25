<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $mitra = $_POST['mitra'];
    $r = $con->query("SELECT mitra.nama_mitra, SUM(retur_penjualan_details.qty_retur) AS total_qty, SUM(retur_penjualan_details.total_retur) AS grandtotal FROM mitra INNER JOIN ((penjualan INNER JOIN retur_penjualan ON penjualan.kode_penjualan = retur_penjualan.kode_penjualan) INNER JOIN (barang INNER JOIN retur_penjualan_details ON barang.id_barang = retur_penjualan_details.id_barang) ON retur_penjualan.kode_returpenjualan = retur_penjualan_details.kode_returpenjualan) ON mitra.id_mitra = barang.id_mitra WHERE barang.id_mitra = '$mitra' AND date(retur_penjualan.tgl_returpenjualan) between DATE('$tgl_mulai') AND DATE('$tgl_akhir')");
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
        <center><strong><span style="font-size:160%;">Laporan Retur Penjualan Berdasarkan Mitra</span></strong></center>
        <br>
            <table width="50%" border="1">
              <tbody>
                <tr>
                  <th width="25%" scope="row">Mitra</th>
                  <td width="25%">'.$rr['nama_mitra'].'</td>
                </tr>
                <tr>
                  <th scope="row">Tanggal Penjualan</th>
                  <td>'.$tgl_mulai.' - '.$tgl_akhir.'</td>
                </tr>
              </tbody>
            </table>
    
            <br>
            <table width="100%" border="1">
                <tbody>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="40%">Nama Barang</th>
                        <th width="15%" style="text-align: right">Harga</th>
                        <th width="15%" style="text-align: center">Qty</th>
                        <th width="20%" style="text-align: right">Total</th>
                    </tr>';
                    $s = $con->query("SELECT mitra.nama_mitra, retur_penjualan.tgl_returpenjualan, retur_penjualan_details.kode_returpenjualan, retur_penjualan_details.id_barang, barang.nama_barang, retur_penjualan_details.qty_retur, retur_penjualan_details.harga_retur, retur_penjualan_details.total_retur FROM mitra INNER JOIN (((penjualan INNER JOIN (barang INNER JOIN penjualan_details ON barang.id_barang = penjualan_details.id_barang) ON penjualan.kode_penjualan = penjualan_details.kode_penjualan) INNER JOIN retur_penjualan ON penjualan.kode_penjualan = retur_penjualan.kode_penjualan) INNER JOIN retur_penjualan_details ON (retur_penjualan.kode_returpenjualan = retur_penjualan_details.kode_returpenjualan) AND (barang.id_barang = retur_penjualan_details.id_barang)) ON mitra.id_mitra = barang.id_mitra WHERE barang.id_mitra = '$mitra' AND date(retur_penjualan.tgl_returpenjualan) between DATE('$tgl_mulai') AND DATE('$tgl_akhir') ORDER BY retur_penjualan.tgl_returpenjualan ASC");
                    while ($ss = $s->fetch_array()) {
                    $html .='<tr>
                        <td>'.$ss['id_barang'].'</td>
                        <td>'.$ss['nama_barang'].'</td>
                        <td style="text-align: right">Rp. '.$ss['harga_retur'].'</td>
                        <td style="text-align: center">'.$ss['qty_retur'].'</td>
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
                  <td width="20%" style="text-align: right">'.$rr['total_qty'].'</th>
                </tr>
                <tr>
                  <th colspan="4">Grandtotal</th>
                  <td style="text-align: right">Rp. '.$rr['grandtotal'].'</td>
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

    $dompdf->stream('LapReturPenjualan-'.$mitra, array('Attachment'=>0));
    $output = $dompdf->output();
?>