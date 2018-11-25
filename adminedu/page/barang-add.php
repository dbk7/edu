<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=barang" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Tambah Barang</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-barang-add.php" method="POST">

                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" required/>
                                <label>Nama</label>
                            </div>

                            <!-- <div class="form-group">
                                <textarea class="form-control" aria-describedby="product description" rows="5"></textarea>
                                <label>Product Description</label>
                            </div> -->

                            <div class="form-group">
                            <label for="satuan">Satuan</label>
                                <select class="form-control" id="satuan" name="satuan" required>
                                    <option></option>
                                    <option value="PCS">PCS</option>
                                    <option value="SACHET">SACHET</option>
                                    <option value="LITER">LITER</option>
                                    <option value="DUS">DUS</option>
                                    <option value="KG">KG</option>
                                </select>
                            </div>

                            <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control" name="kategori" id="kategori" required>
                                <option></option>
                                <?php
                                    $r = $con->query("SELECT * FROM kategori");
                                    foreach ($r as $rr) {
                                ?>
                                    <option value="<?php echo $rr['id_kategori'];?>"><?php echo $rr['nama_kategori'];?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            </div>

                            <!-- <div class="form-group">
                                <input type="text" class="form-control" name="harga_beli" onkeypress="return OnlyNumber(event)" required/>
                                <label>Harga Beli</label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="harga_jual" onkeypress="return OnlyNumber(event)" required/>
                                <label>Harga Jual</label>
                            </div> -->

                            <div class="form-group">
                            <label for="mitra">Mitra</label>
                                <select class="form-control" name="mitra" id="mitra" required>
                                    <option></option>
                                    <?php
                                        $r = $con->query("SELECT * FROM mitra");
                                        foreach ($r as $rr) {
                                    ?>
                                        <option value="<?php echo $rr['id_mitra'];?>"><?php echo $rr['nama_mitra'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-secondary">SIMPAN</button>
                            <button type="reset" class="btn btn-primary">ATUR ULANG</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- / CONTENT -->
    </div>

</div>