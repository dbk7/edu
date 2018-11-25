<?php
    require_once('../include/config.php');

    $kode_penjualan = 'JL-201808100001';
    $r = $con->query("SELECT penjualan.kode_penjualan, penjualan.tgl_penjualan, penjualan.total_qty, penjualan.grandtotal, penjualan.bayar, penjualan.kembalian, users.fullname FROM users INNER JOIN penjualan ON users.username = penjualan.username WHERE kode_penjualan = '$kode_penjualan'");
    foreach ($r as $rr) { 

?>
<!doctype html>
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
    <center><strong><span style="font-size:160%;">Struk Penjualan</span></strong></center>
    <br>
        <table width="20%" border="1">
		  <tbody>
			<tr>
			  <th width="15%" scope="row">Kode Penjualan</th>
			  <td width="5%"><?php echo $rr['kode_penjualan']; ?></td>
			</tr>
			<tr>
			  <th scope="row">Tanggal Penjualan</th>
			  <td><?php echo $rr['tgl_penjualan']; ?></td>
			</tr>
		  </tbody>
		</table>

        <br>
        <table width="100%" border="1">
		    <tbody>
                <tr>
                    <th width="10%">ID Barang</th>
                    <th width="40%">Nama Barang</th>
                    <th width="15%" style="text-align: right">Harga</th>
                    <th width="15%" style="text-align: center">Qty</th>
                    <th width="20%" style="text-align: right">Total</th>
                </tr>
            <?php
                $s = $con->query("SELECT penjualan_details.id_barang, barang.nama_barang, penjualan_details.qty, penjualan_details.harga_jual, penjualan_details.total FROM barang INNER JOIN ((users INNER JOIN penjualan ON users.username = penjualan.username) INNER JOIN penjualan_details ON penjualan.kode_penjualan = penjualan_details.kode_penjualan) ON barang.id_barang = penjualan_details.id_barang WHERE penjualan_details.kode_penjualan='$kode_penjualan'");
                while ($ss = $s->fetch_array()) {
            ?>
                <tr>
                    <td><?php echo $ss['id_barang'];?></td>
                    <td><?php echo $ss['nama_barang'];?></td>
                    <td style="text-align: right">Rp. <?php echo $ss['harga_jual'];?></td>
                    <td style="text-align: center"><?php echo $ss['qty'];?></td>
                    <td style="text-align: right">Rp. <?php echo $ss['total'];?></td>
                </tr>
            <?php
                }
            ?>
		    </tbody>
		</table>

        <br>
        <table width="100%" border="1">
		  <tbody>
			<tr>
			  <th width="80%" colspan="4">Total Qty</th>
              <td width="20%" style="text-align: right"><?php echo $rr['total_qty']; ?></th>
			</tr>
			<tr>
			  <th colspan="4">Grandtotal</th>
			  <td style="text-align: right">Rp. <?php echo $rr['grandtotal']; ?></td>
			</tr>
            <tr>
			  <th colspan="4">Bayar</th>
			  <td style="text-align: right">Rp. <?php echo $rr['bayar']; ?></td>
			</tr>
            <tr>
			  <th colspan="4">Kembalian</th>
			  <td style="text-align: right">Rp. <?php echo $rr['kembalian']; ?></td>
			</tr>
		  </tbody>
		</table>
    </body>
</html>

<?php
    }
?>