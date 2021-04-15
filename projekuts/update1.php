<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['user_id'];
$n1 = $_POST['nilai_tugas'];
$n2 = $_POST['nilai_uts'];
$n3 = $_POST['nilai_uas'];

// update data ke database
mysqli_query($koneksi,"update grade SET nilai_tugas='$n1', nilai_uts='$n2', nilai_uas='$n3' where user_id='$id'");
 
// mengalihkan halaman kembali ke halaman_guru.php
header("location:halaman_guru.php");
 
?>