<?php
    require_once("../dompdf/autoload.inc.php");
    require_once('../include/config.php');

    use Dompdf\Dompdf;

    $tgl_mulai = $_POST['tgl_mulai'];
    $tgl_akhir = $_POST['tgl_akhir'];
                    
    $r = $con->query("SELECT retur_penjualan.kode_returpenjualan, retur_penjualan.tgl_returpenjualan, retur_penjualan.kode_penjualan, retur_penjualan.totalqty_barangretur, retur_penjualan.grandtotal_barangretur, users.fullname FROM users INNER JOIN retur_penjualan ON users.username = retur_penjualan.username WHERE date(tgl_returpenjualan) between DATE('$tgl_mulai') AND DATE('$tgl_akhir') ORDER BY retur_penjualan.tgl_returpenjualan ASC");
    
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
            <center><strong><span style="font-size:160%;">Laporan Retur Penjualan</span></strong></center>
            <br>
                <table style="width:100%">
                <caption>Dari Tanggal '.$tgl_mulai.' s/d '.$tgl_akhir.'</caption>
                    <tbody>
                        <tr>
                            <th width="18%" scope="col">Kode Retur Penjualan</th>
                            <th width="12%" scope="col">Tanggal</th>
                            <th width="15%" scope="col">Kode Penjualan</th>
                            <th width="12%" scope="col">Total Qty Retur</th>
                            <th width="17%" scope="col">Grandtotal Retur</th>
                            <th width="26%" scope="col">Petugas</th>
                        </tr>';
                        while ($rr = $r->fetch_array()) {
                        $html .='
                        <tr>
                            <td>'.$rr['kode_returpenjualan'].'</td>
                            <td>'.$rr['tgl_returpenjualan'].'</td>
                            <td>'.$rr['kode_penjualan'].'</td>
                            <td>'.$rr['totalqty_barangretur'].'</td>
                            <td>'.$rr['grandtotal_barangretur'].'</td>
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