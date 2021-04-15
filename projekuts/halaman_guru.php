<!DOCTYPE html>
<html>
<head>
	<title>Halaman Guru</title>
	<link rel="stylesheet" type="text/css" href="styleguru.css">
</head>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role_id']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<?php
		include 'koneksi.php';
		$id = $_SESSION['user_id'];
		$data = mysqli_query($koneksi,"select * from user where user_id = '$id'");
		$d = mysqli_fetch_array($data);
		
	?>
	<div class="topnav">
	<a class="active" href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
	</div>
	
	<h1>Halaman Guru</h1>

	<p>Halo <b><?php echo $d['first_name']; ?></b></br> Anda telah login sebagai <b><?php echo "Guru" ?></b>.</p>
	
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nama </th>
			<th>Nilai Tugas</th>
			<th>Nilai UTS</th>
			<th>Nilai UAS</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from grade inner join user where grade.user_id = user.user_id");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['user_id']; ?></td>
				<td><?php echo $d['first_name']; ?></td>
				<td><?php echo $d['nilai_tugas']; ?></td>
				<td><?php echo $d['nilai_uts']; ?></td>
				<td><?php echo $d['nilai_uas']; ?></td>
				<td>
					<a href="edit1.php?user_id=<?php echo $d['user_id'];?>&first_name=<?php echo $d['first_name'];?>">EDIT</a>
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
	

	<br/>
	<br/>

</body>
</html>