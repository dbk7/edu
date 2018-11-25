<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $kode_barangmasuk = $_GET['kode_bm'];
    $r = $con->query("SELECT barang_masuk.kode_barangmasuk, barang_masuk.tgl_barangmasuk, barang_masuk.total_qty, barang_masuk.grandtotal_harga_beli, barang_masuk.grandtotal_harga_jual, users.fullname FROM users INNER JOIN (barang INNER JOIN (barang_masuk INNER JOIN barang_masuk_details ON barang_masuk.kode_barangmasuk = barang_masuk_details.kode_barangmasuk) ON barang.id_barang = barang_masuk_details.id_barang) ON users.username = barang_masuk.username WHERE barang_masuk.kode_barangmasuk = '$kode_barangmasuk'");
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
        <center><strong><span style="font-size:160%;">Surat Bukti Barang Masuk</span></strong></center>
        <br>
          <table width="50%" border="1">
            <tbody>
              <tr>
                <th width="25%" scope="row">Kode Penjualan</th>
                <td width="25%">'.$rr['kode_barangmasuk'].'</td>
              </tr>
              <tr>
                <th scope="row">Tanggal Penjualan</th>
                <td>'.$rr['tgl_barangmasuk'].'</td>
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
                    <th width="15%" style="text-align: center">Harga Beli</th>
                    <th width="20%" style="text-align: right">Harga Jual</th>
                </tr>';
                $s = $con->query("SELECT barang_masuk_details.kode_barangmasuk, barang_masuk_details.id_barang, barang.nama_barang, barang_masuk_details.qty, barang_masuk_details.harga_beli, barang_masuk_details.harga_jual FROM barang INNER JOIN barang_masuk_details ON barang.id_barang = barang_masuk_details.id_barang WHERE barang_masuk_details.kode_barangmasuk='$kode_barangmasuk'");
                while ($ss = $s->fetch_array()) {
                $html .='<tr>
                    <td>'.$ss['id_barang'].'</td>
                    <td>'.$ss['nama_barang'].'</td>
                    <td style="text-align: right">Rp. '.$ss['qty'].'</td>
                    <td style="text-align: center">'.$ss['harga_beli'].'</td>
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
                <td style="text-align: right">Rp. '.$rr['grandtotal_harga_beli'].'</td>
              </tr>
              <tr>
                <th colspan="4">Grandtotal Harga Jual</th>
                <td style="text-align: right">Rp. '.$rr['grandtotal_harga_jual'].'</td>
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

    $dompdf->stream('SuratBuktiBarangMasuk-'.$kode_barangmasuk, array('Attachment'=>0));
    $output = $dompdf->output();
?>