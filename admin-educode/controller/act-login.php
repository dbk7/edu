<?php
	session_start();
	include '../includes/config.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$r = $con->query("SELECT * FROM tb_users WHERE email = '$email' AND `password` = '$password'");
	if ($r -> num_rows > 0){
		while ($rr = $r->fetch_array()){
			$_SESSION['id'] = $rr['id'];
			$_SESSION['email'] = $rr['email'];
			$_SESSION['fullname'] = $rr['fullname'];
			$_SESSION['otorisasi'] = $rr['otorisasi'];
		}
		header("location:../index.php");
	}else{
		$_SESSION['error'] = '<div class="text-center p-t-12"><span class="txt1">Email and Password does not match</span></div>';
		header("location:../login.php");
	}
?>