<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="stylesheet" href="alert/css/sweetalert.css">
</head>
<body>

<?php	
$mysqli=new mysqli('localhost','root','','educode');
// <?php	
// $mysqli=new mysqli('localhost','u897928144_fedu','bismillah','u897928144_edu');
$mysqli->query("SET NAMES 'utf8'");

$nm = $_POST['name'];
$email = $_POST['email'];
$jb = $_POST['job'];
$ph = $_POST['tlp'];
$al = $_POST['message'];

$sql="SELECT * FROM pendaftaran WHERE email = '$email'";
$result=mysqli_query($mysqli,$sql);
if (mysqli_num_rows($result)>0){ 
 
  echo "
  <script type='text/javascript'>
	setTimeout(function () { 
	
	},0);	
	window.setTimeout(function(){ 
		window.location = '../status/galat.html';
		
	} ,0);	
  </script>";
  
}else{
	$save = $mysqli->real_query("INSERT INTO pendaftaran (nama, email, job, tlp, alasan) VALUES ('$nm','$email','$jb','$ph','$al')");
	if($save) {
		
	echo " 
	  <script type='text/javascript'>
		{ 	
			window.location = 'http://findcode.co.id/smtp/PHPMailer/examples/gmail.php?&email10=$email';
		};	
		window.setTimeout(function(){ 
		window.location = 'http://findcode.co.id/smtp/PHPMailer/examples/gmail.php?&email10=$email';
		} ,8000);	
	  </script>";
		
		
	}else{
		
	echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Subscribe Failed',
				text:  'For $email',
				type: 'success',
				timer: 3000,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.history.go(-1);
		} ,3000);	
	  </script>";
		
	}}
?> 

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>

</body>
</html>
