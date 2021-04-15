<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['user_id'];
$n1 = $_POST['first_name'];
$n2 = $_POST['last_name'];
$n3 = $_POST['role_id'];
$n4 = $_POST['address'];
$n5 = md5($_POST['password']);

// update data ke database
mysqli_query($koneksi,"update user SET first_name='$n1', last_name='$n2', role_id='$n3', address='$n4', password='$n5'  where user_id='$id'");
 
// mengalihkan halaman kembali ke halaman_admin.php
header("location:halaman_admin.php");
 
?>