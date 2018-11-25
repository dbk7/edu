<?php
    if (isset($_POST['btn_clear'])){
        $db = $con->query("DELETE FROM barang_masuk_details_temp");

        echo "<script>window.location='index.php?page=barang-masuk-add'</script>";
    }
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-products" class="page-layout carded full-width">

        <div class="top-bg bg-secondary"></div>

        <!-- CONTENT -->
        <div class="page-content-wrapper">

            <!-- HEADER -->
            <div class="page-header light-fg row no-gutters align-items-center justify-content-between">

                <!-- APP TITLE -->
                <div class="col-12 col-sm">

                    <div class="logo row no-gutters justify-content-center align-items-start justify-content-sm-start">
                        <div class="logo-icon mr-3 mt-1">
                            <i class="icon-cube-outline s-6"></i>
                        </div>
                        <div class="logo-text">
                            <div class="h4">Barang Masuk</div>
                            <?php
                                $today = date("Y-m-d");
                                $result = $con->query("SELECT COUNT(*) FROM barang_masuk WHERE tgl_barangmasuk='$today'");
                                $row = $result->fetch_row();
                            ?>
                            <div class="">Penjualan hari ini: <?php echo $row[0]; ?></div>
                        </div>
                    </div>

                </div>
                <!-- / APP TITLE -->

                <!-- SEARCH -->
                <div class="col search-wrapper px-2">

                    <div class="input-group">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-icon">
                                <i class="icon icon-magnify"></i>
                            </button>
                        </span>
                        <input id="search-input" type="text" class="form-control" placeholder="Search" aria-label="Search" />
                    </div>

                </div>
                <!-- / SEARCH -->

                <div class="col-auto">
                    <form action="" method="POST">
                        <button type="submit" value="1" name="btn_clear" class="btn btn-light">Tambah</button>
                    </form>
                </div>

            </div>
            <!-- / HEADER -->

            <div class="page-content-card">

                <table id="sample-data-table" class="table dataTable">
                    <thead>
                        <tr>
                            <th>
                                <div class="table-header">
                                    <span class="column-title">ID</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header">
                                    <span class="column-title">Tanggal</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header">
                                    <span class="column-title">Total Qty</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header">
                                    <span class="column-title">Total Harga Beli</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header">
                                    <span class="column-title">Total Harga Jual</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header">
                                    <span class="column-title">Petugas</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header text-center">
                                    <span>Aksi</span>
                                </div>
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                    <?php
                        $r = $con->query("SELECT barang_masuk.kode_barangmasuk, barang_masuk.tgl_barangmasuk, barang_masuk.total_qty, barang_masuk.grandtotal_harga_beli, barang_masuk.grandtotal_harga_jual, users.fullname FROM users INNER JOIN barang_masuk ON users.username = barang_masuk.username ORDER BY barang_masuk.tgl_barangmasuk ASC");
                        while ($rr = $r->fetch_array()) {
                    ?>

                        <tr>
                            <td><?php echo $rr['kode_barangmasuk'];?></td>
                            <td><?php echo $rr['tgl_barangmasuk'];?></td>
                            <td><?php echo $rr['total_qty'];?></td>
                            <td><?php echo $rr['grandtotal_harga_beli'];?></td>
                            <td><?php echo $rr['grandtotal_harga_jual'];?></td>
                            <td><?php echo $rr['fullname'];?></td>
                            <td class="text-center">
                                <a href="index.php?page=barang-masuk-view&kode_barangmasuk=<?php echo $rr['kode_barangmasuk'];?>" class="shortcut-button btn btn-icon mx-1">
                                    <i class="icon icon-eye s-4"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- / CONTENT -->
    </div>
</div>