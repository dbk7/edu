<?php
	$id = $_GET['username'];
	$r = $con->query("SELECT * FROM users WHERE username = '$id'");
	foreach ($r as $rr) {
        $username = $rr['username'];
?>

<div class="content custom-scrollbar">

    <div id="e-commerce-product" class="page-layout simple tabbed">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto row no-gutters align-items-center justify-content-between p-6">

            <div class="row no-gutters align-items-center">

                <a href="index.php?page=users" class="btn btn-icon mr-4">
                    <i class="icon icon-arrow-left"></i>
                </a>

                <div class="h2">Edit User</div>
            </div>

        </div>
        <!-- / HEADER -->

        <!-- CONTENT -->
        <div class="page-content">

            <div class="tab-content">

                <div class="tab-pane fade show active" id="basic-info-tab-pane" role="tabpanel" aria-labelledby="basic-info-tab">

                    <div class="card p-6">

                        <form action="controller/act-users-edit.php?username=<?php echo $username; ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="text" class="form-control" name="username" value="<?php echo $rr['username'];?>" required/>
                                <label>Username</label>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" required/>
                                <label>Password</label>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Masukan password baru
                                </small>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" name="fullname" value="<?php echo $rr['fullname'];?>" required/>
                                <label>Nama Lengkap</label>
                            </div>

                            <div class="form-group">
                            <label for="otorisasi">Otorisasi</label>
                                <select class="form-control" id="otorisasi" name="authorization" required>
                                    <option></option>
                                    <option value="Administrator" <?php if($rr['authorization'] == "Administrator"){echo "selected";}?>>Administrator</option>
                                    <option value="Kepala Toko" <?php if($rr['authorization'] == "Kepala Toko"){echo "selected";}?>>Kepala Toko</option>
                                    <option value="Kasir" <?php if($rr['authorization'] == "Kasir"){echo "selected";}?>>Kasir</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <img height="100px" src="<?php echo $rr['photo'];?>">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Foto tidak bisa diubah, gunakan fitur ganti foto
                                </small>
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