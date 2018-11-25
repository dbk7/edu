<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=users" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Tambah User</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-users-add.php" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" class="form-control" name="username" required/>
                                <label>Username</label>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" required/>
                                <label>Password</label>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="fullname" required/>
                                <label>Nama Lengkap</label>
                            </div>

                            <div class="form-group">
                            <label for="otorisasi">Otorisasi</label>
                                <select class="form-control" id="otorisasi" name="authorization" required>
                                    <option></option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Kepala Toko">Kepala Toko</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                            </div>

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