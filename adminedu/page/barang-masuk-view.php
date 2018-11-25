<?php
    $kode_barangmasuk = $_GET['kode_barangmasuk'];
    $r = $con->query("SELECT barang_masuk.kode_barangmasuk, barang_masuk.tgl_barangmasuk, barang_masuk.total_qty, barang_masuk.grandtotal_harga_beli, barang_masuk.grandtotal_harga_jual, users.fullname FROM users INNER JOIN barang_masuk ON users.username = barang_masuk.username WHERE kode_barangmasuk = '$kode_barangmasuk'");
    foreach ($r as $rr) {
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=barang-masuk" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Detail Transaksi Barang Masuk</div>
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
                                    <input type="text" class="form-control" name="kode_barangmasuk" value="<?php echo $kode_barangmasuk; ?>" readonly>
                                    <label>Kode Barang Masuk</label>
                                </div>
                                <div class="col-1 form-group">
                                    <input type="text" class="form-control" name="tgl_barangmasuk" value="<?php echo $rr['tgl_barangmasuk']; ?>" readonly>
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
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Qty</th>
                                        <th>Total Harga Beli</th>
                                        <th>Total Harga Jual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s = $con->query("SELECT barang_masuk_details.id_barang, barang.nama_barang, barang_masuk_details.harga_beli, barang_masuk_details.harga_jual, barang_masuk_details.qty, barang_masuk_details.total_harga_beli, barang_masuk_details.total_harga_jual FROM barang INNER JOIN barang_masuk_details ON barang.id_barang = barang_masuk_details.id_barang");
                                        while ($ss = $s->fetch_array()) {
                                    ?>
                                    <tr class="table-warning">
                                        <td><?php echo $ss['id_barang'];?></td>
                                        <td><?php echo $ss['nama_barang'];?></td>
                                        <td><?php echo $ss['harga_beli'];?></td>
                                        <td><?php echo $ss['harga_jual'];?></td>
                                        <td><?php echo $ss['qty'];?></td>
                                        <td><?php echo $ss['total_harga_beli'];?></td>
                                        <td><?php echo $ss['total_harga_jual'];?></td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <form action="" method="POST">

                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-5 form-group">
                                            <input type="text" class="form-control" name="grandtotal_harga_beli" value="<?php echo $rr['grandtotal_harga_beli'];?>" readonly required>
                                            <label>Grandtotal Harga Beli</label>
                                        </div>
                                        <div class="col-5 form-group">
                                            <input type="text" class="form-control" name="grandtotal_harga_jual" value="<?php echo $rr['grandtotal_harga_jual'];?>" readonly required>
                                            <label>Grandtotal Harga Jual</label>
                                        </div>
                                        <div class="col-2 form-group">
                                            <input type="text" class="form-control" name="total_qty" value="<?php echo $rr['total_qty'];?>" readonly required>
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