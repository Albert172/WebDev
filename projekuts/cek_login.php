<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$user_id = $_POST['user_id'];
$password = md5($_POST['password']);

// menyeleksi data user dengan user_id dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where user_id='$user_id' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah user_id dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['role_id']=="1"){

		// buat session login dan user_id
		$_SESSION['user_id'] = $user_id;
		$_SESSION['role_id'] = "1";
		// alihkan ke halaman dashboard admin
		header("location:halaman_admin.php");

	// cek jika user login sebagai pegawai
	}else if($data['role_id']=="2"){
		// buat session login dan user_id
		$_SESSION['user_id'] = $user_id;
		$_SESSION['role_id'] = "2";
		// alihkan ke halaman dashboard pegawai
		header("location:halaman_guru.php");

	// cek jika user login sebagai pengurus
	}else if($data['role_id']=="3"){
		// buat session login dan user_id
		$_SESSION['user_id'] = $user_id;
		$_SESSION['role_id'] = "3";
		// alihkan ke halaman dashboard pengurus
		header("location:halaman_murid.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>