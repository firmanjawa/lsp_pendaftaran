<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}

	if($_SESSION['user'] == 1){
		$cek_data = mysqli_query($conn, "SELECT * FROM daftar WHERE id_user = '".$_SESSION['id']."' ");
		if(mysqli_num_rows($cek_data) > 0){
			$link = '';
			$tittle = 'Sudah Daftar';
		} else{
			$link = 'create.php';
			$tittle = 'Isi Data';
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
			<li><a href="peserta_beranda.php?id=<?php echo $_SESSION['id'] ?>">Beranda</a></li>
			<li><a href=<?php echo $link; ?>><?php echo $tittle ?></a></li>
			<li><a href="detail.php?id=<?php echo $_SESSION['id'] ?>">Lihat Data</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian content -->
	<section class="content">
		<h2>Beranda</h2>
		<div class="box">
			<h3>Selamat datang kepada, <?php echo $_SESSION['nama'] ?></h3>
		</div>
	</section>

</body>
</html>