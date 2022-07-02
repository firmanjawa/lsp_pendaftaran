<?php 
	include 'koneksi.php';

	//Selesai mengisi data dan menekan tombol submit
	if(isset($_POST['submit'])){

		// proses insert
		$insert = mysqli_query($conn, "INSERT INTO peserta VALUES (
				DEFAULT,
				'".$_POST['nama']."',
				'".$_POST['username']."',
				'".md5($_POST['password'])."'
			)");

		//jika berhasil insert
		if($insert){
			echo '<script>window.location="index.php"</script>';
		}else{
			echo 'Error '.mysqli_error($conn);
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PIPOnline</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>
<body>

	<!-- bagian header -->
	<header>
		<h1><a>PIPOnline</a></h1>
		<ul>
			<li><a href="beranda.php">Beranda</a></li>
			<li><a href="create.php">Tambah Data</a></li>
			<li><a href="data-peserta.php">Data Peserta</a></li>
			<li><a href="register.php">Register</a></li>
		</ul>
	</header>

	<!-- bagian box formulir -->
	<section class="box-formulir">
		
		<h2>Formulir Pendaftaran Institut Pendidikan Online</h2>

		<!-- bagian form -->
		<form action="" method="post">

			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>
							<input type="text" name="nama" class="input-control">
						</td>
					</tr>

					<tr>
						<td>Username</td>
						<td>:</td>
						<td>
							<input type="text" name="username" class="input-control">
						</td>
					</tr>

					<tr>
						<td>Password</td>
						<td>:</td>
						<td>
							<input type="text" name="password" class="input-control">
						</td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="submit" class="btn-daftar" value="Submit">
						</td>
					</tr>

				</table>
			</div>
		</form>

	</section>

</body>
</html>