<?php
    $kode_returpenjualan = $_GET['kode_returpenjualan'];
    $r = $con->query("SELECT retur_penjualan.kode_returpenjualan, retur_penjualan.tgl_returpenjualan, retur_penjualan.kode_penjualan, retur_penjualan.totalqty_barangretur, retur_penjualan.grandtotal_barangretur, users.fullname FROM users INNER JOIN retur_penjualan ON users.username = retur_penjualan.username WHERE kode_returpenjualan = '$kode_returpenjualan'");
    foreach ($r as $rr) {
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=retur-penjualan" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Detail Transaksi Retur Penjualan</div>
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
                                    <input type="text" class="form-control"value="<?php echo $rr['kode_returpenjualan'];?>" readonly required>
                                    <label>Kode Retur Penjualan</label>
                                </div>
                                <div class="col-2 form-group">
                                    <input type="text" class="form-control" value="<?php echo $rr['kode_penjualan'];?>" readonly required>
                                    <label>Kode Penjualan</label>
                                </div>
                                <div class="col-2 form-group">
                                    <input type="text" class="form-control" value="<?php echo $rr['tgl_returpenjualan'];?>" readonly required>
                                    <label>Tanggal Retur</label>
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control" value="<?php echo $rr['fullname'];?>" readonly required>
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
                                        <th>Total Harga Retur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s = $con->query("SELECT retur_penjualan_details.id_barang, barang.nama_barang, retur_penjualan_details.qty_retur, retur_penjualan_details.harga_retur, retur_penjualan_details.total_retur FROM barang INNER JOIN retur_penjualan_details ON barang.id_barang = retur_penjualan_details.id_barang WHERE kode_returpenjualan='$kode_returpenjualan'");
                                        while ($ss = $s->fetch_array()) {
                                    ?>
                                    <tr class="table-warning">
                                        <td><?php echo $ss['id_barang'];?></td>
                                        <td><?php echo $ss['nama_barang'];?></td>
                                        <td><?php echo $ss['qty_retur'];?></td>
                                        <td><?php echo $ss['harga_retur'];?></td>
                                        <td><?php echo $ss['total_retur'];?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <form action="controller/act-retur-penjualan-add.php" method="POST">

                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-10 form-group">
                                            <input type="text" class="form-control" name="grandtotal" value="<?php echo $rr['grandtotal_barangretur'];?>" readonly required>
                                            <label>Grand Total</label>
                                        </div>
                                        <div class="col-2 form-group">
                                            <input type="text" class="form-control" name="total_qty" value="<?php echo $rr['totalqty_barangretur'];?>" readonly required>
                                            <label>Total Qty</label>
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