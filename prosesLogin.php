<?php
session_start();
include 'koneksi.php';

$username=$_POST['username'];
$password=$_POST['password'];

// Memeriksa Username dan Password
$login=mysqli_query($conn,"SELECT * FROM login WHERE username='$username' and password='$password'");
$cek=mysqli_num_rows($login);

if ($cek > 0) {
	$data=mysqli_fetch_assoc($login);

	if ($data['role']=="admin") {
		$_SESSION['username']=$username;
		$_SESSION['role']="admin";
		//untuk mengalihkan ke halaman admin
		header("location:dashboard.php");

	}elseif ($data['role']=="user") {
		$_SESSION['username']=$username;
		$_SESSION['role']="user";
		//untuk mengalihkan ke halaman user
		header("location:karyawan.php");
	}else{
		header("location:login.php?pesan=gagal");
		# code...
	}
	# code...
}else{
	header("location:login.php?pesan=gagal");
}
?>