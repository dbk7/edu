<!DOCTYPE html>
<?php
	include ('../include/config.php');
	
?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<link rel="shortcut icon" href="./img/favicon.ico">
		<title>EDUCODE - Free Online Training Courses</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<script type="text/javascript" src="dist/sweetalert.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="../">
							<img src="./img/logo-alt.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="../">Home</a></li>
						<li><a href="./">Contact</a></li>
						<li><a href="#">Courses</a></li>
						<li><a href="../blog">Blog</a></li>
						<li><a href="../contact">Developer</a></li>
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

		<!-- Home -->
		<div id="home" class="hero-area">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/course02.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<h1 class="white-text">Kelas Educode Batch#1 / 2</h1>
							<h3 class="white-text"> Aplikasi Bekal Skripsi 2018 Berbasis Web</h3>
							<p class="lead white-text">F r e e</p>
							<button class="main-button icon-button" onclick="scrollWin()" style="position:fixed;">Daftar Sekarang!</button>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /Home -->
		<?php
                                $result = $con->query("SELECT COUNT(*) FROM pendaftaran");
                                $row = $result->fetch_row();

                                
                               
                          
                        
             ?>            
                   
<?php

$r = $con->query("SELECT * FROM edu_kelas where id='1' ");
                        $rr = $r->fetch_array();
                        $statusq =  $rr['status']; 
                        $seat= $rr['seat'];;  
                        
        if ($statusq == "close") { 
			header('Location: http:../whoops/');

			  exit; }
     
  
                             $seatt = $seat - $row[0];
                                if ($seatt <= "0") {

header('Location: http:../seatfull');
  exit;

} 
                          ?>
		<!-- About -->
		<div id="about" class="section">

			<!-- container -->
			<div class="container">


                    

<div >
                       
                       
</div><div id="formbuka">
				<!-- row -->
				<div class="row" >
					<div class="col-md-12">
						<div class="section-header" align="text-center">
							

							<h3 align="center">Registration Form</h3>
							<h4 align="center">Educode Batch #1 / 2</h4>
							<h4 align="center">Sisa : <?php echo  $seatt?> Seat</h4>
					</div>
				</div>
			</div>
			<!-- Contact -->
		

				<!-- row -->
				<div class="row">

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<form   method="post" id="email" action="subscribe_act.php">
								<input class="input" type="text" name="name" placeholder="Nama Lengkap" maxlength="70" required>
								<input class="input" type="email" name="email" placeholder="Email" maxlength="40" required><label>*Link konfirmasi join group akan dikirimkan melalui email</label>
								
								<input class="input" type="number" name="tlp" placeholder="No. Handphone" required>
								<input class="input" type="text" name="job" placeholder="Pekerjaan" maxlength="25" required>
								
								<textarea class="input" name="message" placeholder="Alasan Mengikuti Kelas ini "required></textarea >
								<button class="main-button icon-button pull-right">Daftar !</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>Informasi Terkait</h4>
						<ul class="contact-details">
							<li><i class="fa fa-calendar"></i>02 Desember 2018 [ 09:00 WIB - Selesai ]</li>
							<li><i class="fa fa-code"></i>Educode Batch #1 / 2</li>
							<li><i class="fa fa-map-marker"></i>STIE-STMIK Insan Pembangunan</li>
						</ul>

						<!-- contact map -->
						<div id="contact-map"></div>
						<!-- /contact map -->

					</div>
					<!-- contact information -->
</div>
				</div>
				<!-- /row -->

		

		<!-- Why us -->
		<div id="why-us" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				
				</div>
				<!-- /row -->

				<hr class="section-hr">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<h3>Android Studio : How to make project hello word</h3>
						<p class="lead">Berikut adalah contoh Materi pemrograman dengan android studio</p>
					</div>

					<div class="col-md-5 col-md-offset-1">
						<a class="about-video" href="https://www.youtube.com/watch?v=Id1v41rNLHc&t=69s">
							<img src="./img/course01.jpg" alt="">
							<i class="play-icon fa fa-play"></i>
						</a>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Why us -->

		<!-- Contact CTA -->
		<div id="contact-cta" class="section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/cta2-background.jpg)"></div>
			<!-- Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-8 col-md-offset-2 text-center">
						<h2 class="white-text">Contact Us</h2>
						<p class="lead white-text"></p>
						<a class="main-button icon-button" href="https://wa.me/08984390948?text=Saya%20tertarik%20untuk%20menghubungi%20Dna%20Educode">Contact Us Now</a>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact CTA -->

		<!-- Footer -->
		<footer id="footer" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- footer logo -->
					<div class="col-md-6">
						<div class="footer-logo">
							<a class="logo" href="index.php">
								<img src="./img/logo.png" alt="logo">
							</a>
						</div>
					</div>
					<!-- footer logo -->

					<!-- footer nav -->
					<div class="col-md-6">
						<ul class="footer-nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Courses</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
					<!-- /footer nav -->

				</div>
				<!-- /row -->

				<!-- row -->
				<div id="bottom-footer" class="row">

					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						<ul class="footer-social">
							<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
							<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<!-- /social -->

					<!-- copyright -->
					<div class="col-md-8 col-md-pull-4">
						<div class="footer-copyright">
							<span>&copy; Copyright 2018. All Rights Reserved. | Design  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://dbk.findcode.co.id">dbk</a></span>
						</div>
					</div>
					<!-- /copyright -->

				</div>
				<!-- row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->
		<!--Scripts-->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>
		<script>
function scrollWin() {
    window.scrollBy(0, 490);
}
</script>


		<!-- jQuery Plugins -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>

	</body>
</html>
