<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Ganti Foto</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-ganti-foto.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <input class="form-control" type="file" accept="image/*" name="photo" required>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Ukuran foto maksimal adalah 1mb
                                </small>
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