<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Meta-Information -->
    <title>Back Office Educode</title>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Vendor: Bootstrap 4 Stylesheets  -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

    <!-- Our Website CSS Styles -->
    <link rel="stylesheet" href="assets/css/icons.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">

    <!-- Color Scheme -->
    <link rel="stylesheet" href="css/color-schemes/color.css" type="text/css" title="color3">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color1.css" title="color1">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color2.css" title="color2">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color4.css" title="color4">
    <link rel="alternate stylesheet" href="assets/css/color-schemes/color5.css" title="color5">
</head>
<body>

<div class="lgn-wrp grysh">
    <!-- <div class="bg-img" style="background-image: url(assets/images/resource/bg-img1.png);"></div> -->

    <div class="lgn-innr">
      <div class="widget lgn-frm">
          <div class="frm-tl">
              <h4>Login to Admin</h4>
              <span>Fill your detail to get in</span>
          </div>
          <form action="controller/act-login.php" method="POST">
              <div class="row mrg10">
                  <div class="col-md-12 col-sm-12 col-lg-12">
                      <input class="brd-rd5" name="email" type="email" placeholder="admin@educode.com" />
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                      <input class="brd-rd5" name="password" type="password" placeholder="******" />
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                      <span class="chbx"><input type="checkbox" id="chk1" /><label for="chk1">Remember Me</label></span>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                      <button class="green-bg brd-rd5" type="submit">Login Now</button>
                  </div>

                  <?php  isset($_SESSION['error']) ? $e=$_SESSION['error'] : $e=""; echo $e; session_destroy();?>

                  <div class="col-md-12 col-sm-12 col-lg-12">
                      <a href="#" title="" class="frgt">Forget password?</a>
                  </div>
                  <div class="col-md-12 col-sm-12 col-lg-12">
                      <a class="brd-rd5 blue-bg act-btn" href="#" title="">Create An Account</a>
                  </div>
              </div>
          </form>
      </div>
  </div>

</div>
<!-- Login Wrapper -->

<!-- Vendor: Javascripts -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<!-- Vendor: Followed by our custom Javascripts -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/js/select2.min.js" type="text/javascript"></script>
<script src="assets/js/slick.min.js" type="text/javascript"></script>

<!-- Our Website Javascripts -->
<script src="assets/js/isotope.min.js" type="text/javascript"></script>
<script src="assets/js/isotope-int.js" type="text/javascript"></script>
<script src="assets/js/jquery.counterup.js" type="text/javascript"></script>
<script src="assets/js/waypoints.min.js" type="text/javascript"></script>
<script src="assets/js/highcharts.js" type="text/javascript"></script>
<script src="assets/js/exporting.js" type="text/javascript"></script>
<script src="assets/js/highcharts-more.js" type="text/javascript"></script>
<script src="assets/js/moment.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.circliful.min.js" type="text/javascript"></script>
<script src="assets/js/fullcalendar.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.downCount.js" type="text/javascript"></script>
<script src="assets/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.formtowizard.js" type="text/javascript"></script>
<script src="assets/js/form-validator.min.js" type="text/javascript"></script>
<script src="assets/js/form-validator-lang-en.min.js" type="text/javascript"></script>
<script src="assets/js/cropbox-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/js/ion.rangeSlider.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.poptrox.min.js" type="text/javascript"></script>
<script src="assets/js/styleswitcher.js" type="text/javascript"></script>
<script src="assets/js/main.js" type="text/javascript"></script>
</body>
</html>