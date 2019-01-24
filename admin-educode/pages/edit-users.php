<?php
    $id = $_GET['id'];

    $r = $con->query("SELECT * FROM tb_users WHERE id = '$id'");
    foreach ($r as $rr) {
        // $id = $rr['id'];
?>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
        	<h3 class="box-title m-b-0">Update User</h3>
            <p class="text-muted m-b-30 font-13"> Edit Otorisasi Back Office Educode </p>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <form action="controller/act-edit-users.php?id=<?php echo $id; ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputuname">Full Name</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-user"></i></div>
                                <input type="hidden" name="id" class="form-control" id="exampleInputuname" value="<?php echo $rr['id'];?>" required>
                                <input type="text" name="fullname" class="form-control" id="exampleInputuname" value="<?php echo $rr['fullname'];?>" required> </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-email"></i></div>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $rr['email'];?>" required> </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputpwd1">Password</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                <input type="password" name="password" class="form-control" id="exampleInputpwd1" required> </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputpwd2">Otorisasi</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                <select class="form-control" name="otorisasi" required>
                                    <option <?php if($rr['otorisasi']=='Administrator'){echo "selected"; } ?> >Administrator</option>
                                    <option <?php if($rr['otorisasi']=='User'){echo "selected"; } ?> >User</option>
                                </select>
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-inverse waves-effect waves-light  m-r-10"><a href="index.php?pages=users" style="color:white;">Cancel</a></button>
	                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
?>