<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Ganti Password</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-ganti-password.php" method="POST">

                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordlama" required/>
                                <label>Password Lama</label>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="passwordbaru" required/>
                                <label>Password Baru</label>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="retypepassword" required/>
                                <label>Ketik Ulang Password Baru</label>
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