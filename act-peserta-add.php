<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Process</title>
<link rel="stylesheet" href="alert/css/sweetalert.css">
</head>
<body>

<?php
$mysqli=new mysqli('localhost', 'root', '', 'educode');
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
	
		swal({
            title: 'Email Sudah Terdaftar',
            text:  '$email',
            type: 'error',
            timer: 3000,
            showConfirmButton: true
        });		
	},10);	
	window.setTimeout(function(){ 
		window.location.replace('./index.php');
	} ,3000);	
  </script>";
  


 
  
}else{
	$save = $mysqli->real_query("INSERT INTO pendaftaran (nama, email, job, tlp, alasan) VALUES ('$nm','$email','$jb','$ph','$al')");
	if($save) {
		
	echo "
	  <script type='text/javascript'>
		setTimeout(function () { 	
			swal({
				title: 'Pendaftaran Berhasil',
				text:  'Selamat $email anda akan diarahkan untuk masuk ke Grup Whatsapp',
				type: 'success',
				timer: 3000,
				showConfirmButton: true
			});		
		},10);	
		window.setTimeout(function(){ 
			window.location.replace('./index.php');
		} ,3000);	
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
			window.location.replace('./index.php');
		} ,3000);	
	  </script>";
		
	}
}
 mysqli_close($conn);
?>

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="alert/js/sweetalert.min.js"></script>
<script src="alert/js/qunit-1.18.0.js"></script>

</body>
</html>
