<!DOCTYPE html>
<html>
<head>
	<title>UPDATE USER</title>
	<link rel="stylesheet" type="text/css" href="styleedit.css">
</head>
<body>
	<div class="topnav">
	<a class="active" href="halaman_admin.php">Return</a>
	</div>
	<h3>EDIT DATA USER</h3>

	<?php
	include 'koneksi.php';
	$id = $_GET['user_id'];
	$data = mysqli_query($koneksi,"select * from user where user_id='$id'");	
	
	while($d = mysqli_fetch_array($data)){
		?>

		<form method="post" action="update.php">
			<table>
				<tr>			
					<td>ID</td>
					<td>
						<input type="text" name="user_id" value="<?php echo $d['user_id'];?>"readonly>
					</td>
				</tr>
				<tr>
					<td>Nama Depan</td>
					<td><input type="text" name="first_name" value="<?php echo $d['first_name']; ?>" required="required"></td>
				</tr>
				<tr>
					<td>Nama Belakang</td>
					<td><input type="text" name="last_name" value="<?php echo $d['last_name']; ?>" required="required"></td>
				</tr>
				<tr>
					<td>Role</td>
					<td><select name="role_id">
					<option value="2">Guru</option>
					<option value="3">Murid</option>
					</select>
					</td>					
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="address" value="" required="required" ></td>					
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="password" value="<?php md5($d['password']); ?>" placeholder="Enter Password" required="required"></td>					
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