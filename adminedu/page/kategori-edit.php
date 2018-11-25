<?php
	$id = $_GET['id_kategori'];
	$r = $con->query("SELECT * FROM kategori WHERE id_kategori = '$id'");
	foreach ($r as $rr) {
        $idkategori = $rr['id_kategori'];
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=kategori" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Edit Kategori</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-kategori-edit.php?id_kategori=<?php echo $idkategori; ?>" method="POST">

                            <div class="form-group">
                                <input type="text" class="form-control" name="kategori" value="<?php echo $rr['nama_kategori'];?>" required/>
                                <label>Kategori</label>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" name="deskripsi" rows="5" required><?php echo $rr['deskripsi_kategori'];?></textarea>
                                <label>Deskripsi</label>
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