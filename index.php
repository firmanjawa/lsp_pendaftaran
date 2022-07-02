<?php 

	//session_start, agar variable session bisa global dan bisa diambil dari file lain
	session_start();
	include 'koneksi.php';

	//if login ditekan
	if(isset($_POST['login'])){

		// cek akun ada apa tidak pada table admin
		$cek_admin = mysqli_query($conn, "SELECT * FROM admin
			WHERE username = '".htmlspecialchars($_POST['user'])."' AND password = '".MD5(htmlspecialchars($_POST['pass']))."' ");
		$cek_peserta = mysqli_query($conn, "SELECT * FROM peserta
			WHERE username = '".htmlspecialchars($_POST['user'])."' AND password = '".MD5(htmlspecialchars($_POST['pass']))."' ");
		//jika akun ada pada search
		if(mysqli_num_rows($cek_admin) > 0){
			$a = mysqli_fetch_object($cek_admin);

			$_SESSION['stat_login'] = true;
			$_SESSION['id'] = $a->id;
			$_SESSION['user'] = 0;
			$_SESSION['nama'] = $a->nama;
			echo '<script>window.location="admin_beranda.php"</script>';
			
		}else if (mysqli_num_rows($cek_peserta) > 0){
			$a = mysqli_fetch_object($cek_peserta);

			$_SESSION['stat_login'] = true;
			$_SESSION['id'] = $a->id;
			$_SESSION['user'] = 1;
			$_SESSION['nama'] = $a->nama;
			echo '<script>window.location="peserta_beranda.php?>"</script>';
		}else{
			echo '<script>alert("Gagal, username atau password salah")</script>';
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

	<!-- bagian main login -->
	<section class="main-login">
		
		<div class="box-login">
			<h2>Login Admin</h2>

			<!-- bagian form login -->
			<form action="" method="post">
				
				<div class="box">
					<table>
						<tr>
							<td>Username</td>
							<td>:</td>
							<td>
								<input type="text" name="user" class="input-control">
							</td>
						</tr>
						<tr>
							<td>Password</td>
							<td>:</td>
							<td>
								<input type="password" name="pass" class="input-control">
							</td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>
								<input type="submit" name="login" value="Login" class="btn-login">
							</td>
						</tr>
					</table>
				</div>

			</form>
		</div>

	</section>

</body>
</html>