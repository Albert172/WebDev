<!DOCTYPE html>
<html>
<head>
	<title>Halaman Murid</title>
	<link rel="stylesheet" type="text/css" href="stylemurid.css">
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
	
	<h1>Halaman Murid</h1>

	<ul><p>Halo <b><?php echo $d['first_name']; ?><br/></b> Anda telah login sebagai <b><?php echo "Murid"?></b>.</p></ul>
	
	<li>
	<p> Nama 	: <b><?php echo $d['first_name']." ".$d['last_name']; ?></b> </p>
	<p> ID 		: <b><?php echo $_SESSION['user_id']; ?></b> </p>
	
	<p> Ringkasan Nilai : </p>
	</li>
		<table border="1">
		<tr>
			<th>Nilai TUGAS</th>
			<th>Nilai UTS</th>
			<th>Nilai UAS</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$id = $_SESSION['user_id'];
		$data = mysqli_query($koneksi,"select * from grade where user_id = '$id'");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $d['nilai_tugas']; ?></td>
				<td><?php echo $d['nilai_uts']; ?></td>
				<td><?php echo $d['nilai_uas']; ?></td>

			</tr>
			<?php 
		}
		?>
	</table>
	
	<?php 
		include 'koneksi.php';
		$id = $_SESSION['user_id'];
		$data = mysqli_query($koneksi,"select * from grade where user_id = '$id'");
		$d = mysqli_fetch_array($data);
		
		$nilai1 = $d['nilai_tugas'];
		$nilai2 = $d['nilai_uts'];
		$nilai3 = $d['nilai_uas'];
		$nilaiakhir = (($nilai1 + $nilai2 + $nilai3)/3);
		$nilaigrade = $nilaiakhir;
		
		switch (true) {
    case $nilaigrade >= 80:
        $grade = 'A';
        break;

    case $nilaigrade >= 65:
        $grade = 'B';
        break;

    case $nilaigrade >= 45:
        $grade = 'C';
        break;

    default:
        $grade = 'D';
        break;
}
		
	?>
	
	<div class="nilai">
	<p> Rata-rata Nilai : <b><?php echo $nilaiakhir ?></b> </p>
	</div>
	<div class="grade">
	<p> Grade 			: <b><?php echo $grade ?></b></p>
	<p> Lulus/Tidak Lulus : 
	<b><?php 
					if($grade == "D"){
						echo "<div class='warna1'>Tidak Lulus</div>";
					}else{
						echo "<div class='warna'>Lulus</div>";
					}  ?></b> </p>
	</div>


	<br/>
	<br/>

</body>
</html>