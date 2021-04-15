<!DOCTYPE html>
<html>
<head>
	<title>Edit Grade</title>
	<link rel="stylesheet" type="text/css" href="styleeditguru.css">
</head>
<body>

	<div class="topnav">
	<a class="active" href="halaman_guru.php">Return</a>
	</div>
	<br/>
	<h3>EDIT GRADE MAHASISWA</h3>
	<br/>
	<?php
	include 'koneksi.php';
	$id = $_GET['user_id'];
	$nama = $_GET['first_name'];
	$data = mysqli_query($koneksi,"select * from grade where user_id='$id'");	
	
	while($d = mysqli_fetch_array($data)){
		?>

		<form method="post" action="update1.php">
			<table>
				<tr>			
					<td>ID</td>
					<td>
						<input type="text" name="user_id" value="<?php echo $d['user_id'];?>"readonly>
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td><input type="text" name="Nama" value="<?php echo $nama ?>"readonly></td>
				</tr>
				<tr>
					<td>Nilai Tugas</td>
					<td><input type="number" name="nilai_tugas" value="<?php echo $d['nilai_tugas']; ?>" required="required" min="0" max="100"></td>					
				</tr>
				<tr>
					<td>Nilai UTS</td>
					<td><input type="number" name="nilai_uts" value="<?php echo $d['nilai_uts']; ?>" required="required" min="0" max="100"></td>					
				</tr>
				<tr>
					<td>Nilai UAS</td>
					<td><input type="number" name="nilai_uas" value="<?php echo $d['nilai_uas']; ?>" required="required" min="0" max="100"></td>					
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