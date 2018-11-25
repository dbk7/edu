<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
    $mitra = $_POST['mitra'];
    $r = $con->query("SELECT mitra.nama_mitra, SUM(barang_masuk_details.qty) AS total_qty, SUM(barang_masuk_details.total_harga_beli) AS total_hargabeli, SUM(barang_masuk_details.total_harga_jual) AS total_hargajual FROM mitra INNER JOIN (barang INNER JOIN (barang_masuk INNER JOIN barang_masuk_details ON barang_masuk.kode_barangmasuk = barang_masuk_details.kode_barangmasuk) ON barang.id_barang = barang_masuk_details.id_barang) ON mitra.id_mitra = barang.id_mitra WHERE barang.id_mitra = '$mitra' AND date(tgl_barangmasuk) between DATE('$tgl_mulai') AND DATE('$tgl_akhir')");
    foreach ($r as $rr) { 
    $keuntungan = $rr['total_hargajual'] - $rr['total_hargabeli'];

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
        <center><strong><span style="font-size:160%;">Laporan Barang Masuk Berdasarkan Mitra</span></strong></center>
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
                        <th width="15%" style="text-align: center">Qty</th>
                        <th width="15%" style="text-align: center">Harga Beli</th>
                        <th width="20%" style="text-align: right">Harga Jual</th>
                    </tr>';
                    $s = $con->query("SELECT mitra.nama_mitra, barang_masuk.tgl_barangmasuk, barang_masuk_details.kode_barangmasuk, barang_masuk_details.id_barang, barang.nama_barang, barang_masuk_details.qty, barang_masuk_details.harga_beli, barang_masuk_details.harga_jual FROM mitra INNER JOIN (barang INNER JOIN (barang_masuk INNER JOIN barang_masuk_details ON barang_masuk.kode_barangmasuk = barang_masuk_details.kode_barangmasuk) ON barang.id_barang = barang_masuk_details.id_barang) ON mitra.id_mitra = barang.id_mitra WHERE barang.id_mitra = '$mitra' AND date(tgl_barangmasuk) between DATE('$tgl_mulai') AND DATE('$tgl_akhir') ORDER BY barang_masuk.tgl_barangmasuk ASC");
                    while ($ss = $s->fetch_array()) {
                    $html .='<tr>
                        <td>'.$ss['id_barang'].'</td>
                        <td>'.$ss['nama_barang'].'</td>
                        <td style="text-align: center">'.$ss['qty'].'</td>
                        <td style="text-align: right">Rp. '.$ss['harga_beli'].'</td>
                        <td style="text-align: right">Rp. '.$ss['harga_jual'].'</td>
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
                  <th colspan="4">Grandtotal Harga Beli</th>
                  <td style="text-align: right">Rp. '.$rr['total_hargabeli'].'</td>
                </tr>
                <tr>
                  <th colspan="4">Grandtotal Harga Jual</th>
                  <td style="text-align: right">Rp. '.$rr['total_hargajual'].'</td>
                </tr>
                <tr>
                  <th colspan="4">Keuntungan Yang Akan Didapat</th>
                  <td style="text-align: right">Rp. '.$keuntungan.'</td>
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

    $dompdf->stream('LapBarangMasuk-'.$mitra, array('Attachment'=>0));
    $output = $dompdf->output();
?>