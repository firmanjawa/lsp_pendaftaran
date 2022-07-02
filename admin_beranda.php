<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
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
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian content -->
	<section class="content">
		<h2>Beranda</h2>
		<div class="box">
			<h3><?php echo $_SESSION['nama'] ?></h3>
		</div>
	</section>

</body>
</html>