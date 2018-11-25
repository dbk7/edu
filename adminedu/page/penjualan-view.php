<?php
    $kode_penjualan = $_GET['kode_penjualan'];
    $r = $con->query("SELECT penjualan.kode_penjualan, penjualan.tgl_penjualan, penjualan.total_qty, penjualan.grandtotal, penjualan.bayar, penjualan.kembalian, users.fullname FROM users INNER JOIN penjualan ON users.username = penjualan.username WHERE kode_penjualan = '$kode_penjualan'");
    foreach ($r as $rr) {
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=penjualan" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Detail Transaksi Penjualan</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="" method="POST">

                            <div class="form-row">
                                <div class="col-2 form-group">
                                    <input type="text" class="form-control" name="kode_penjualan" value="<?php echo $kode_penjualan; ?>" readonly>
                                    <label>Kode Penjualan</label>
                                </div>
                                <div class="col-1 form-group">
                                    <input type="text" class="form-control" name="tgl_penjualan" value="<?php echo $rr['tgl_penjualan']; ?>" readonly>
                                    <label>Tanggal</label>
                                </div>
                                <div class="col-9 form-group">
                                    <input type="text" class="form-control" name="petugas" value="<?php echo $rr['fullname']; ?>" readonly>
                                    <label>Petugas</label>
                                </div>
                            </div>
                        
                        </form>

                        <div class="form-row">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s = $con->query("SELECT penjualan_details.id_barang, barang.nama_barang, penjualan_details.qty, penjualan_details.harga_jual, penjualan_details.total FROM barang INNER JOIN ((users INNER JOIN penjualan ON users.username = penjualan.username) INNER JOIN penjualan_details ON penjualan.kode_penjualan = penjualan_details.kode_penjualan) ON barang.id_barang = penjualan_details.id_barang WHERE penjualan_details.kode_penjualan='$kode_penjualan'");
                                        while ($ss = $s->fetch_array()) {
                                    ?>
                                    <tr class="table-warning">
                                        <td><?php echo $ss['id_barang'];?></td>
                                        <td><?php echo $ss['nama_barang'];?></td>
                                        <td><?php echo $ss['qty'];?></td>
                                        <td><?php echo $ss['harga_jual'];?></td>
                                        <td><?php echo $ss['total'];?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <form action="controller/act-penjualan-add.php" method="POST">

                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group" hidden>
                                            <input type="text" class="form-control" name="kode_penjualan" value="<?php echo $NewID;?>" readonly>
                                            <label>Kode Penjualan</label>
                                        </div>
                                        <div class="col-7 form-group">
                                            <input type="text" class="form-control" name="grandtotal" value="<?php echo $rr['grandtotal']; ?>" readonly>
                                            <label>Grand Total</label>
                                        </div>
                                        <div class="col-1 form-group">
                                            <input type="text" class="form-control" name="total_qty" value="<?php echo $rr['total_qty']; ?>" readonly>
                                            <label>Total Qty</label>
                                        </div>
                                        <div class="col-2 form-group">
                                            <input type="text" class="form-control" name="bayar" value="<?php echo $rr['bayar']; ?>" required>
                                            <label>Bayar</label>
                                        </div>
                                        <div class="col-2 form-group">
                                            <input type="text" class="form-control" name="kembalian" value="<?php echo $rr['kembalian']; ?>" readonly>
                                            <label>Kembalian</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- / CONTENT -->
    </div>

</div>

<?php
    }
?>