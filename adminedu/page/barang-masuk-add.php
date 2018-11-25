<?php
    // Autonumber
    $today = date("Ymd");
    $carikode = $con->query("SELECT max(kode_barangmasuk) as maxID FROM barang_masuk WHERE kode_barangmasuk LIKE 'BM-$today%'");
    $datakode = mysqli_fetch_array($carikode);
    $idMax = $datakode['maxID'];
    $NoUrut = (int) substr($idMax, 11, 4);
    $NoUrut++;
    $NewID = "BM-".$today .sprintf('%04s', $NoUrut);

    // Simpan daftar barang
    if (isset($_POST['btn_add'])){
        $id_baranguncut = $_POST['id_barang'];
        $id_barang = substr($id_baranguncut, 0, 6);
        $nama_barang = $_POST['nama_barang'];
        $harga_beli = $_POST['harga_beli'];
        $harga_jual = $_POST['harga_jual'];
        $qty = $_POST['qty'];
        $total_harga_beli = $harga_beli * $qty;
        $total_harga_jual = $harga_jual * $qty;

        if ($nama_barang == "") {
            echo "<script>alert('Barang tidak terdaftar')</script>";
        } else if ($harga_beli > $harga_jual){
            echo "<script>alert('Harga beli lebih besar dibanding harga jual')</script>";
        } else {
            $con->query("INSERT INTO barang_masuk_details_temp values ('$NewID', '$id_barang', '$nama_barang', '$qty', '$harga_beli', '$harga_jual', '$total_harga_beli', '$total_harga_jual')");

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

        $con->query("DELETE FROM barang_masuk_details_temp WHERE id_barang='$id_barang'");
    }

    // Hitung Grandtotal Harga Beli
    $result = $con->query("SELECT SUM(total_harga_beli) FROM barang_masuk_details_temp");
    $row = $result->fetch_row();
    $grand_total_harga_beli = $row[0];

    // Hitung Grandtotal Harga Jual
    $result = $con->query("SELECT SUM(total_harga_jual) FROM barang_masuk_details_temp");
    $row = $result->fetch_row();
    $grand_total_harga_jual = $row[0];

    // Hitung Total Qty
    $result = $con->query("SELECT SUM(qty) FROM barang_masuk_details_temp");
    $row = $result->fetch_row();
    $total_qty = $row[0];
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=barang-masuk" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Transaksi Barang Masuk</div>
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
                                <div class="col-1 form-group">
                                    <input type="text" class="form-control" maxlength="6" name="id_barang" id="id_barang" onkeyup="isi_otomatis_barang()" onchange="isi_otomatis_barang()" required>
                                    <label>ID Barang</label>
                                </div>
                                <div class="col form-group">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" readonly required>
                                    <!-- <label>Nama Barang</label> -->
                                </div>
                                <div class="col-2 form-group">
                                    <input type="text" class="form-control" name="harga_beli" onkeypress="return OnlyNumber(event)" required>
                                    <label>Harga Beli</label>
                                </div>
                                <div class="col-2 form-group">
                                    <input type="text" class="form-control" name="harga_jual" onkeypress="return OnlyNumber(event)" required>
                                    <label>Harga Jual</label>
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
                                        <th>Harga Beli</th>
                                        <th>Harga Jual</th>
                                        <th>Qty</th>
                                        <th>Total Harga Beli</th>
                                        <th>Total Harga Jual</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $r = $con->query("SELECT * FROM barang_masuk_details_temp");
                                        while ($rr = $r->fetch_array()) {
                                    ?>
                                    <tr class="table-warning">
                                        <td><?php echo $rr['id_barang'];?></td>
                                        <td><?php echo $rr['nama_barang'];?></td>
                                        <td><?php echo $rr['harga_beli'];?></td>
                                        <td><?php echo $rr['harga_jual'];?></td>
                                        <td><?php echo $rr['qty'];?></td>
                                        <td><?php echo $rr['total_harga_beli'];?></td>
                                        <td><?php echo $rr['total_harga_jual'];?></td>
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

                        <form action="controller/act-barang-masuk-add.php" method="POST">

                            <div class="card mt-5">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group" hidden>
                                            <input type="text" class="form-control" name="kode_barangmasuk" value="<?php echo $NewID;?>" readonly>
                                            <label>Kode Barang Masuk</label>
                                        </div>
                                        <div class="col-5 form-group">
                                            <input type="text" class="form-control" name="grandtotal_harga_beli" value="<?php echo $grand_total_harga_beli;?>" readonly required>
                                            <label>Grandtotal Harga Beli</label>
                                        </div>
                                        <div class="col-5 form-group">
                                            <input type="text" class="form-control" name="grandtotal_harga_jual" value="<?php echo $grand_total_harga_jual;?>" readonly required>
                                            <label>Grandtotal Harga Jual</label>
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