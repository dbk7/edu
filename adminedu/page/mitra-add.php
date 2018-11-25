<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=barang" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Tambah Event</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-mitra-add.php" method="POST">

                            <div class="form-group">
                                <input type="text" class="form-control" name="nama" required/>
                                <label>Nama Event</label>
                            </div>

                            <div class="form-group">
                                <input type="number" class="form-control" name="seat" required>
                                <label>Seat</label>
                            </div>

                            <div class="form-group">
                            <label for="otorisasi">Status</label>
                                <select class="form-control" id="stat" name="stat" required>
                                    <option></option>
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                    
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