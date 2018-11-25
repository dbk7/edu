<?php
	$id = $_GET['id'];
	$r = $con->query("SELECT * FROM pendaftaran WHERE id = '$id'");
	foreach ($r as $rr) {
        $idbarang = $rr['id'];
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=barang" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Edit Peserta</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-barang-edit.php?id=<?php echo $idbarang; ?>" method="POST">

                            <div class="form-group">
                                <input type="text" class="form-control" name="nam" value="<?php echo $rr['nama'];?>" required/>
                                <label>Nama</label>
                            </div>

                            <!-- <div class="form-group">
                                <textarea class="form-control" aria-describedby="product description" rows="5"></textarea>
                                <label>Product Description</label>
                            </div> -->

                            
                            <div class="form-group">
                                <input type="text" class="form-control" name="eml" value="<?php echo $rr['email'];?>" required/>
                                <label>Email</label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="jb" value="<?php echo $rr['job'];?>" required/>
                                <label>Job</label>
                            </div>

                            <!-- <div class="form-group">
                                <input type="text" class="form-control" name="harga_beli" onkeypress="return OnlyNumber(event)" value="<?php echo $rr['harga_beli'];?>" required/>
                                <label>Harga Beli</label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="harga_jual" onkeypress="return OnlyNumber(event)" value="<?php echo $rr['harga_jual'];?>" required/>
                                <label>Harga Jual</label>
                            </div> -->

                           <div class="form-group">
                                <input type="text" class="form-control" name="tlp" value="<?php echo $rr['tlp'];?>" required/>
                                <label>Telpon</label>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="al" value="<?php echo $rr['alasan'];?>" required/>
                                <label>alasan</label>
                            </div>

                            <button type="submit" class="btn btn-secondary">EDIT</button>

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