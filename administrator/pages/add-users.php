<!-- Page Top -->
<div class="pg-tp">
    <i class="ion-cube"></i>
    <div class="pr-tp-inr">
        <h4>Add Users</h4>
        <span>Admin Template for medium and large web applications with ery clean and aesthetic style.</span>
    </div>
</div>
<!-- Page Top -->

<div class="panel-content">
	<div class="widget pad50-65">

		<!-- <div class="widget-title2">
            <h4>Hoverable Table</h4>
        </div> -->

		<form class="form-wrp" action="controller/act-add-users.php" method="POST">
            <div class="row mrg20">

                <div class="col-md-12 col-sm-12 col-lg-12">
                	<strong>Fullname</strong>
                    <input class="brd-rd5" name="fullname" type="text" placeholder="Fullname*" required/>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12">
                	<strong>Email</strong>
                    <input class="brd-rd5" name="email" type="email" placeholder="admin@educode.com*" required/>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12">
                	<strong>Password</strong>
                    <input class="brd-rd5" name="password" type="password" placeholder="******" required/>
                </div>
                
                <div class="col-md-12 col-sm-12 col-lg-12">
                	<strong>Photo</strong>
                	<input type="file" name="photo">
            	</div>

                <div class="col-md-12 col-sm-12 col-lg-12">
                	<strong>Otorisasi</strong>
                    <div class="slct-bx">
                        <span>
                            <select name="otorisasi">
                                <option>Administrator</option>
                                <option>User</option>
                            </select>
                        </span>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12">
                    <button class="brd-rd5 btn btn-info" type="submit"> Submit</button>
                </div>
            </div>
        </form>
	</div>
</div>