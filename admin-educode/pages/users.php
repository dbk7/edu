<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <h3 class="box-title m-b-0">Data Users <button style="float: right;" class="btn btn-success waves-effect waves-light"><a href="index.php?pages=add-users" style="color: white;">Add User</a></button></h3>
            <p class="text-muted m-b-30">Data User Educode Back Office</p>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Otorisasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                            $r = $con->query("SELECT * FROM tb_users");
                            while ($rr = $r->fetch_array()) {
                        ?>

                        <tr>
                            <td><center>-</center></td>
                            <td><?php echo $rr['fullname'];?></td>
                            <td><?php echo $rr['email'];?></td>
                            <td><?php echo $rr['otorisasi'];?></td>
                            <th><a href="index.php?pages=edit-users&id=<?php echo $rr['id'];?>"><i class="fa fa-pencil"></i></a> | <a href="controller/act-delete-users.php?id=<?php echo $rr['id'];?>" onclick="return confirm('Yakin ingin hapus data?')"><i class="fa fa-trash"></i></a></th>
                        </tr>

                        <?php
                            }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>