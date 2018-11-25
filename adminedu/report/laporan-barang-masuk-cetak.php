<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
                    
    $r = $con->query("SELECT barang_masuk.kode_barangmasuk, barang_masuk.tgl_barangmasuk, barang_masuk.total_qty, barang_masuk.grandtotal_harga_beli, barang_masuk.grandtotal_harga_jual, users.fullname FROM users INNER JOIN barang_masuk ON users.username = barang_masuk.username WHERE date(tgl_barangmasuk) between DATE('$tgl_mulai') AND DATE('$tgl_akhir') ORDER BY barang_masuk.tgl_barangmasuk ASC");
    
        $html =
        '<!DOCTYPE html>
        <html>
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
            <center><strong><span style="font-size:160%;">Laporan Barang Masuk</span></strong></center>
            <br>
                <table style="width:100%">
                <caption>Dari Tanggal '.$tgl_mulai.' s/d '.$tgl_akhir.'</caption>
                    <tbody>
                        <tr>
                            <th width="20%" scope="col">Kode Barang Masuk</th>
                            <th width="12%" scope="col">Tanggal</th>
                            <th width="8%" scope="col">Total Qty</th>
                            <th width="17%" scope="col">Grandtotal Harga Beli</th>
                            <th width="17%" scope="col">Grandtotal Harga Jual</th>
                            <th width="26%" scope="col">Petugas</th>
                        </tr>';
                        while ($rr = $r->fetch_array()) {
                        $html .='
                        <tr>
                            <td>'.$rr['kode_barangmasuk'].'</td>
                            <td>'.$rr['tgl_barangmasuk'].'</td>
                            <td>'.$rr['total_qty'].'</td>
                            <td>'.$rr['grandtotal_harga_beli'].'</td>
                            <td>'.$rr['grandtotal_harga_jual'].'</td>
                            <td>'.$rr['fullname'].'</td>
                        </tr>';
                        }
                        $html .= '
                    </tbody>
                </table>
        
            </body>
        </html>';

    $date = date("Y-m-d");
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf->render();

    $dompdf->stream('LapBarangMasuk-'.$date, array('Attachment'=>0));
    $output = $dompdf->output();
?>