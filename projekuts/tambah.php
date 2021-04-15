<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
	<link rel="stylesheet" type="text/css" href="styletambah.css">
</head>
<body>
 
	<div class="topnav">
	<a class="active" href="halaman_admin.php">Return</a>
	</div>

	<h3>TAMBAH USER</h3>

	<?php
	include 'koneksi.php';
	
	$data = mysqli_query($koneksi,"select user_id from user order by user_id desc limit 1");	
	
	while($d = mysqli_fetch_array($data)){
		?>

	<form method="post" action="tambah_aksi.php">
		<table>
			<tr>			
				<td>ID</td>
				<td><input type="text" name="user_id" value="<?php echo ++$d['user_id'];?>"readonly></td>
			</tr>
			<tr>			
				<td>Nama Depan</td>
				<td><input type="text" name="first_name" required="required"></td>
			</tr>
			<tr>
				<td>Nama Belakang</td>
				<td><input type="text" name="last_name"></td>
			</tr>
			
			<tr>
			<td>Role</td>
			<td>
				<select name="role_id">
					<option value="2">Guru</option>
					<option value="3">Murid</option>
				</select>
			</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><input type="textbox" name="address" required="required"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" required="required"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="SIMPAN"></td>
			</tr>	
		</table>
	</form>
	<?php 
	}
	?>
	
</body>
</html>