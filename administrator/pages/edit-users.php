<?php
	$id = $_GET['id'];

	$r = $con->query("SELECT * FROM tb_users WHERE id = '$id'");
	foreach ($r as $rr) {
        // $id = $rr['id'];
?>

<!-- Page Top -->
<div class="pg-tp">
    <i class="ion-cube"></i>
    <div class="pr-tp-inr">
        <h4>Edit Users</h4>
        <span>Admin Template for medium and large web applications with ery clean and aesthetic style.</span>
    </div>
</div>
<!-- Page Top -->

<div class="panel-content">
	<div class="widget pad50-65">
		<div class="row">

		<!-- <div class="widget-title2">
            <h4>Hoverable Table</h4>
        </div> -->
        <form class="form-wrp" action="controller/act-edit-users.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
        	<div class="row">
        	<div class="col-md-3 col-sm-12 col-lg-3">
	        	<div class="col-md-12 col-sm-12 col-lg-12">
	                <div class="profile-info-wrp edit-prf">
	                        <div class="insta-wrp">
	                            <span>
									<img id="rslt-img" class="brd-rd50" src='assets/images/<?php echo $rr['photo'];?>' width='100px' height='100px' alt="" />
	                            	<!-- <img id="rslt-img" class="brd-rd50" src="assets/images/resource/insta-dp.jpg" alt="" /> -->
	                            	<span class="sts online"></span>
	                            	<label class="fileContainer brd-rd50"><i class="fa fa-camera"></i>
	                            	<input id="upld-file" type="file" name="photo" /></label>
	                            </span>
	                        </div>
	                </div>
	        	</div>
	        </div>

	        <div class="col-md-9 col-sm-12 col-lg-9">
	        	<!-- <form class="form-wrp"> -->
		            <div class="row mrg20">

		                <!-- <div class="col-md-6 col-sm-6 col-lg-6">
		                    <input class="brd-rd5" type="text" placeholder="First Name*" />
		                </div>
		                <div class="col-md-6 col-sm-6 col-lg-6">
		                    <input class="brd-rd5" type="text" placeholder="Last Name*" />
		                </div> -->

		                <div class="col-md-12 col-sm-12 col-lg-12">
		                	<strong>Fullname</strong>
		                	<input class="brd-rd5" type="hidden" name="id" value="<?php echo $rr['id'];?>" required/>
		                    <input class="brd-rd5" type="text" name="fullname" value="<?php echo $rr['fullname'];?>" required/>
		                </div>

		                <div class="col-md-12 col-sm-12 col-lg-12">
		                	<strong>Email</strong>
		                    <input class="brd-rd5" type="email" name="email" value="<?php echo $rr['email'];?>" required/>
		                </div>

		                <div class="col-md-12 col-sm-12 col-lg-12">
		                	<strong>Password</strong>
		                    <input class="brd-rd5" type="password" name="password" value="<?php echo $rr['password'];?>" required/>
		                </div>

		                <div class="col-md-12 col-sm-12 col-lg-12">
		                	<strong>Otorisasi</strong>
		                    <div class="slct-bx">
		                        <span>
		                            <select name="otorisasi">
		                                <option <?php if($rr['otorisasi']=='Administrator'){echo "selected"; } ?> >Administrator</option>
		                                <option <?php if($rr['otorisasi']=='User'){echo "selected"; } ?> >User</option>
		                            </select>
		                        </span>
		                    </div>
		                </div>

		                <div class="col-md-12 col-sm-12 col-lg-12">
		                    <button class="brd-rd5 btn btn-info" type="submit">Submit</button>
		                </div>
		            </div>
		        <!-- </form> -->
	        </div>
	    	</div>
        </form>
	        
    	</div>
	</div>
</div>

<?php
	}
?>