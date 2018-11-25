<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $kategori = $_POST['kategori'];
    $r = $con->query("SELECT kategori.nama_kategori, SUM(penjualan_details.qty) AS total_qty, SUM(penjualan_details.total) AS grandtotal FROM penjualan INNER JOIN ((kategori INNER JOIN barang ON kategori.id_kategori = barang.id_kategori) INNER JOIN penjualan_details ON barang.id_barang = penjualan_details.id_barang) ON penjualan.kode_penjualan = penjualan_details.kode_penjualan WHERE barang.id_kategori = '$kategori' AND date(penjualan.tgl_penjualan) between DATE('$tgl_mulai') AND DATE('$tgl_akhir')");
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
        <center><strong><span style="font-size:160%;">Laporan Penjualan Berdasarkan Kategori</span></strong></center>
        <br>
            <table width="50%" border="1">
              <tbody>
                <tr>
                  <th width="25%" scope="row">Kategori</th>
                  <td width="25%">'.$rr['nama_kategori'].'</td>
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
                    $s = $con->query("SELECT kategori.nama_kategori, penjualan.tgl_penjualan, penjualan_details.kode_penjualan, penjualan_details.id_barang, barang.nama_barang, penjualan_details.qty, penjualan_details.harga_jual, penjualan_details.total FROM penjualan INNER JOIN ((kategori INNER JOIN barang ON kategori.id_kategori = barang.id_kategori) INNER JOIN penjualan_details ON barang.id_barang = penjualan_details.id_barang) ON penjualan.kode_penjualan = penjualan_details.kode_penjualan WHERE barang.id_kategori = '$kategori' AND date(tgl_penjualan) between DATE('$tgl_mulai') AND DATE('$tgl_akhir') ORDER BY penjualan.tgl_penjualan ASC");
                    while ($ss = $s->fetch_array()) {
                    $html .='<tr>
                        <td>'.$ss['id_barang'].'</td>
                        <td>'.$ss['nama_barang'].'</td>
                        <td style="text-align: right">Rp. '.$ss['harga_jual'].'</td>
                        <td style="text-align: center">'.$ss['qty'].'</td>
                        <td style="text-align: right">Rp. '.$ss['total'].'</td>
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

    $dompdf->stream('LapPenjualan-'.$kategori, array('Attachment'=>0));
    $output = $dompdf->output();
?>