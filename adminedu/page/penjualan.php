<?php
    if (isset($_POST['btn_clear'])){
        $db = $con->query("DELETE FROM penjualan_details_temp");

        echo "<script>window.location='index.php?page=penjualan-add'</script>";
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
                            <div class="h4">Penjualan</div>
                            <?php
                                $today = date("Y-m-d");
                                $result = $con->query("SELECT COUNT(*) FROM penjualan WHERE tgl_penjualan='$today'");
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
                                    <span class="column-title">Grandtotal</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header">
                                    <span class="column-title">Bayar</span>
                                </div>
                            </th>

                            <th>
                                <div class="table-header">
                                    <span class="column-title">Kembalian</span>
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
                        $r = $con->query("SELECT penjualan.kode_penjualan, penjualan.tgl_penjualan, penjualan.total_qty, penjualan.grandtotal, penjualan.bayar, penjualan.kembalian, users.fullname FROM users INNER JOIN penjualan ON users.username = penjualan.username ORDER BY penjualan.tgl_penjualan ASC");
                        while ($rr = $r->fetch_array()) {
                    ?>

                        <tr>
                            <td><?php echo $rr['kode_penjualan'];?></td>
                            <td><?php echo $rr['tgl_penjualan'];?></td>
                            <td><?php echo $rr['total_qty'];?></td>
                            <td><?php echo $rr['grandtotal'];?></td>
                            <td><?php echo $rr['bayar'];?></td>
                            <td><?php echo $rr['kembalian'];?></td>
                            <td><?php echo $rr['fullname'];?></td>
                            <td class="text-center">
                                <a href="index.php?page=penjualan-view&kode_penjualan=<?php echo $rr['kode_penjualan'];?>" class="shortcut-button btn btn-icon mx-1">
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