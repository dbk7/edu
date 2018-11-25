<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
                    
    $r = $con->query("SELECT penjualan.kode_penjualan, penjualan.tgl_penjualan, penjualan.total_qty, penjualan.grandtotal, penjualan.bayar, penjualan.kembalian, users.fullname FROM users INNER JOIN penjualan ON users.username = penjualan.username WHERE date(tgl_penjualan) between DATE('$tgl_mulai') AND DATE('$tgl_akhir') ORDER BY penjualan.tgl_penjualan ASC");
    
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
            <center><strong><span style="font-size:160%;">Laporan Penjualan</span></strong></center>
            <br>
                <table style="width:100%">
                <caption>Dari Tanggal '.$tgl_mulai.' s/d '.$tgl_akhir.'</caption>
                    <tbody>
                        <tr>
                            <th width="14%" scope="col">Kode Penjualan</th>
                            <th width="12%" scope="col">Tanggal</th>
                            <th width="8%" scope="col">Total Qty</th>
                            <th width="14%" scope="col">Total Penjualan</th>
                            <th width="14%" scope="col">Bayar</th>
                            <th width="12%" scope="col">Kembalian</th>
                            <th width="26%" scope="col">Petugas</th>
                        </tr>';
                        while ($rr = $r->fetch_array()) {
                        $html .='
                        <tr>
                            <td>'.$rr['kode_penjualan'].'</td>
                            <td>'.$rr['tgl_penjualan'].'</td>
                            <td>'.$rr['total_qty'].'</td>
                            <td>'.$rr['grandtotal'].'</td>
                            <td>'.$rr['bayar'].'</td>
                            <td>'.$rr['kembalian'].'</td>
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

    $dompdf->stream('LapPenjualan-'.$date, array('Attachment'=>0));
    $output = $dompdf->output();
?>