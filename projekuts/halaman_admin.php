<!DOCTYPE html>
<html>
<head>
	<title>Halaman admin</title>
	<link rel="stylesheet" type="text/css" href="styleadmin.css">
</head>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['role_id']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
	<div class="topnav">
	<a class="active" href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
	<a href="tambah.php">TAMBAH USER</a>
	</div>
	<h1>Halaman Admin</h1>

	<p>Halo <b> ID <?php echo $_SESSION['user_id']; ?></b> Anda telah login sebagai <b><?php echo "Admin"; ?></b>.</p>
	
	<br/>
	<table border="1">
		<tr>
			<th>ID</th>
			<th>Nama Depan</th>
			<th>Nama Belakang</th>
			<th>Role</th>
			<th>OPSI</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$data = mysqli_query($koneksi,"select * from user where role_id != '1' order by role_id");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['user_id']; ?></td>
				<td><?php echo $d['first_name']; ?></td>
				<td><?php echo $d['last_name']; ?></td>
				<td>
				<?php 
				
					if($d['role_id'] == "1"){
						echo "Admin";
					}elseif($d['role_id'] == "2"){
						echo "Guru";
					}else{
						echo "Murid";
					}
			
				?>
				</td>
				<td>
					<a href="view.php?user_id=<?php echo $d['user_id']; ?>">VIEW</a>
					<a href="hapus.php?user_id=<?php echo $d['user_id']; ?>" onclick="return confirm('Delete Confirmation!');">HAPUS</a>
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