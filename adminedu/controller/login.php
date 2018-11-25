<?php
	session_start();
	include '../include/config.php';

	$user = $_POST['username'];
	$pass = md5($_POST['password']);

	$r = $con->query("SELECT * FROM users WHERE username = '$user' AND password = '$pass'");
	if ($r -> num_rows > 0){
		while ($rr = $r->fetch_array()){
			$_SESSION['username'] = $rr['username'];
			$_SESSION['fullname'] = $rr['fullname'];
			$_SESSION['authorization'] = $rr['authorization'];
			$_SESSION['photo'] = $rr['photo'];
		}
		header("location:../index.php");
	}else{
		$_SESSION['error'] = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<strong>Kombinasi Salah
		</div>';
		header("location:../login.php");
	}
?>