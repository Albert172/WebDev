<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['user_id'];
$nama1 = $_POST['first_name'];
$nama2 = $_POST['last_name'];
$role = $_POST['role_id'];
$alamat = $_POST['address'];
$pass = md5($_POST['password']);
 
// menginput data ke database
mysqli_query($koneksi,"insert into user values('$id','$pass','$nama1','$nama2','$role','$alamat')");
 
// mengalihkan halaman kembali ke index.php
header("location:halaman_admin.php");
 
?>