<?php 
	session_start();
	include 'koneksi.php';
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}

	if($_SESSION['user'] == 0){
		$user = 'admin';
	} else{
		$user = 'peserta';
	}


	//jika usernya admin
	if($_SESSION['user'] == 0){
		$peserta = mysqli_query($conn, "SELECT * FROM daftar WHERE id_daftar = '".$_GET['id']."' ");
	}

	//jika usernya peserta
	if($_SESSION['user'] == 1){
		$peserta = mysqli_query($conn, "SELECT * FROM daftar WHERE id_user = '".$_SESSION['id']."' ");
	}

	$p = mysqli_fetch_object($peserta);

	//jika menekan tombol kembali
	if(isset($_POST['submit'])){
		if($_SESSION['user'] == 0){
			$a = $_GET['id'];
			echo '<script>window.location="update.php?id=<?php echo $a ?>"</script>';
		}else {
			$a = $_SESSION['id'];
			echo '<script>window.location="update.php?id=<?php echo $a ?>"</script>';
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
			<li><a href=<?php echo $user; ?>_beranda.php>Beranda</a></li>
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian content -->
	<section class="content">

		<!-- tombol kembali -->
		<form action="" method="post">
			<input type="submit" name="submit" class="btn-daftar" value="Update">
		</form>

		<!-- form data -->
		<h2>Detail Peserta</h2>
		<div class="box">
			
			<table class="table-data" border="0">
			<tr>
				<td>ID Pendaftaran</td>
				<td>:</td>
				<td><?php echo $p->id_daftar ?></td>
			</tr>
			<tr>
				<td>Tanggal Daftar</td>
				<td>:</td>
				<td><?php echo $p->tgl_daftar ?></td>
			</tr>
			<tr>
				<td>No. Kartu Keluarga</td>
				<td>:</td>
				<td><?php echo $p->no_kk ?></td>
			</tr>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td><?php echo $p->nik ?></td>
			</tr>
			<tr>
				<td>Domisili</td>
				<td>:</td>
				<td><?php echo $p->domisili ?></td>
			</tr>
			<tr>
				<td>No. Akte Kelahiran</td>
				<td>:</td>
				<td><?php echo $p->no_akte ?></td>
			</tr>
			<tr>
				<td>Jenis Institut</td>
				<td>:</td>
				<td><?php echo $p->institut ?></td>
			</tr>
			<tr>
				<td>Tujuan Sekolah</td>
				<td>:</td>
				<td><?php echo $p->tujuan ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $p->nama ?></td>
			</tr>
			<tr>
				<td>Agama</td>
				<td>:</td>
				<td><?php echo $p->agama ?></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td>:</td>
				<td><?php echo $p->jk ?></td>
			</tr>
			<tr>
				<td>Tempat, Tanggal Lahir</td>
				<td>:</td>
				<td><?php echo $p->tmpt_lahir.', '.$p->tgl_lahir ?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><?php echo $p->alamat ?></td>
			</tr>
			<tr>
				<td>Orang Tua/Wali</td>
				<td>:</td>
				<td><?php echo $p->wali ?></td>
			</tr>
			<tr>
				<td>No. Telepon</td>
				<td>:</td>
				<td><?php echo $p->no_tlp ?></td>
			</tr>
			</table>

		</div>
	</section>

</body>
</html>