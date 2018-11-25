<?php
    // Autonumber
    $today = date("Ymd");
    $carikode = $con->query("SELECT max(kode_returpenjualan) as maxID FROM retur_penjualan WHERE kode_returpenjualan LIKE 'RJ-$today%'");
    $datakode = mysqli_fetch_array($carikode);
    $idMax = $datakode['maxID'];
    $NoUrut = (int) substr($idMax, 11, 4);
    $NoUrut++;
    $NewID = "RJ-".$today .sprintf('%04s', $NoUrut);

    $kode_penjualan = "";
    // Simpan daftar barang
    if (isset($_POST['btn_add'])){
        $kode_penjualan = $_POST['kode_penjualan'];
        $id_baranguncut = $_POST['id_barang'];
        $id_barang = substr($id_baranguncut, 0, 6);
        $nama_barang = $_POST['nama_barang'];
        $harga_jual = $_POST['harga_jual'];
        $qty_barang = $_POST['qty_barang'];
        $qty = $_POST['qty'];
        $totalhargaretur = $harga_jual * $qty;

        if ($nama_barang == "") {
            echo "<script>alert('Barang tidak terdaftar')</script>";
        } else if ($qty > $qty_barang) {
            echo "<script>alert('Qty retur lebih besar dibanding qty jual')</script>";
        } else {
            $con->query("INSERT INTO retur_penjualan_details_temp values ('$NewID', '$' '$kode_penjualan', '$id_barang', '$nama_barang', '$qty', '$harga_jual', '$totalhargaretur')");

            if ($con->affected_rows > 0){
                // Respon berhasil tidak ada
            }else{
                echo "<script>alert('Barang sudah ada dalam list')</script>";
            }
        }
    }

    // Hapus daftar barang
    if (isset($_POST['btn_del'])){
        $id_barang = $_POST['btn_del'];

        $con->query("DELETE FROM retur_penjualan_details_temp WHERE id_barang='$id_barang'");
    }

    // Hitung Grandtotal
    $result = $con->query("SELECT SUM(total_retur) FROM retur_penjualan_details_temp");
    $row = $result->fetch_row();
    $grandtotal = $row[0];

    // Hitung Total Qty
    $result = $con->query("SELECT SUM(qty_retur) FROM retur_penjualan_details_temp");
    $row = $result->fetch_row();
    $total_qty = $row[0];
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=retur-penjualan" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Transaksi Retur Penjualan</div>
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
                                <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="kode_penjualan" id="kode_penjualan" value="<?php echo $kode_penjualan;?>" onkeyup="isi_otomatis_barangretur()" onchange="isi_otomatis_barangretur()" required>
                                    <label>Kode Penjualan</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col form-group">
                                    <input type="text" class="form-control" maxlength="6" name="id_barang" id="id_barang" onkeyup="isi_otomatis_barangretur()" onchange="isi_otomatis_barangretur()" required>
                                    <label>ID Barang</label>
                                </div>
                                <div class="col-5 form-group">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly required>
                                    <!-- <label>Nama Barang</label> -->
                                </div>
                                <div class="col-2 form-group">
                                    <input type="text" class="form-control" name="harga_jual" id="harga_jual" readonly required>
                                    <!-- <label>Harga</label> -->
                                </div>
                                <div class="col-2 form-group">
                                    <input type="text" class="form-control" name="qty_barang" id="qty_barang" readonly required>
                                    <!-- <label>QTY Barang</label> -->
                                </div>
                                <div class="col-1 form-group">
                                    <input type="text" class="form-control" name="qty" onkeypress="return OnlyNumber(event)" required>
                                    <label>QTY</label>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="btn_add" value="1" class="btn btn-secondary btn-fab btn-sm">
                                        <i class="icon-plus"></i>
                                    </button>
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
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $r = $con->query("SELECT * FROM retur_penjualan_details_temp");
                                        while ($rr = $r->fetch_array()) {
                                    ?>
                                    <tr class="table-warning">
                                        <td><?php echo $rr['id_barang'];?></td>
                                        <td><?php echo $rr['nama_barang'];?></td>
                                        <td><?php echo $rr['qty_retur'];?></td>
                                        <td><?php echo $rr['harga_retur'];?></td>
                                        <td><?php echo $rr['total_retur'];?></td>
                                        <td class="text-center">
                                        <form action="" method="POST">
                                            <button type="submit" name="btn_del" value="<?php echo $rr['id_barang'];?>" class="btn btn-danger btn-fab btn-sm">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </form>
                                        </td>
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
                                        <div class="col-12 form-group" hidden>
                                            <input type="text" class="form-control" name="kode_penjualan" value="<?php echo $kode_penjualan;?>" readonly>
                                            <label>Kode Penjualan</label>
                                        </div>
                                        <div class="form-group" hidden>
                                            <input type="text" class="form-control" name="kode_returpenjualan" value="<?php echo $NewID;?>" readonly>
                                            <label>Kode Retur Penjualan</label>
                                        </div>
                                        <div class="col-10 form-group">
                                            <input type="text" class="form-control" name="grandtotal" value="<?php echo $grandtotal;?>" readonly required>
                                            <label>Grand Total</label>
                                        </div>
                                        <div class="col-2 form-group">
                                            <input type="text" class="form-control" name="total_qty" value="<?php echo $total_qty;?>" readonly required>
                                            <label>Total Qty</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-secondary">SIMPAN</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- / CONTENT -->
    </div>

</div>