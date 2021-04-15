<!DOCTYPE html>
<html>
<head>
	<title>View Profile</title>
	<link rel="stylesheet" type="text/css" href="styleview.css">
</head>
<body>
	
	<?php
		include 'koneksi.php';
		$id = $_GET['user_id'];
		$data = mysqli_query($koneksi,"select * from user where user_id = '$id'");
		$d = mysqli_fetch_array($data);
		
	?>
	
	<div class="topnav">
	<a class="active" href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>
	<a href="halaman_admin.php">RETURN</a>
	<a href="edit.php?user_id=<?php echo $d['user_id']; ?>">UPDATE</a>
	</div>
	
	<h1>View Profile</h1>

	<table border="1">
		<tr>
			<th>Nama</th>
			<th>ID</th>
			<th>Role</th>
			<th>Alamat</th>
		</tr>
		<tr>
	<td> <b><?php echo $d['first_name']." ".$d['last_name']; ?></b> </td>
	<td> <b><?php echo $d['user_id']; ?></b> </td>	
	<td> <b><?php if($d['role_id'] == "1"){
						echo "Admin";
					}elseif($d['role_id'] == "2"){
						echo "Guru";
					}else{
						echo "Murid";
					} ?></b> </td>	
	<td> <b><?php echo $d['address']; ?></b> </td>	
		</tr>

	

	<br/>
	<br/>

</body>
</html>