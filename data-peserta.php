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
		<h2>Data Peserta</h2>
		<div class="box">
			<table class="table" border="1">
				<thead>
					<tr>
						<!-- field columnya -->
						<th>No</th>
						<th>ID Pendaftaran</th>
						<th>Tanggal Daftar</th>
						<th>Nama</th>
						<th>Domisili</th>
						<th>Institut</th>
						<th>Tujuan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<!-- Looping recordnya -->
					<?php 
						$no = 1;
						$list_peserta = mysqli_query($conn, "SELECT * FROM daftar");
						while($row = mysqli_fetch_array($list_peserta)){
					?>
					<tr>
						<!-- datanya-->
						<td><?php echo $no++ ?></td>
						<td><?php echo $row['id_daftar'] ?></td>
						<td><?php echo $row['tgl_daftar'] ?></td>
						<td><?php echo $row['nama'] ?></td>
						<td><?php echo $row['domisili'] ?></td>
						<td><?php echo $row['institut'] ?></td>
						<td><?php echo $row['tujuan'] ?></td>
						<td>
							<a href="detail.php?id=<?php echo $row['id_daftar'] ?>">Detail</a> ||
							<a href="update.php?id=<?php echo $row['id_daftar'] ?>">Update</a> ||
							<a href="hapus.php?id=<?php echo $row['id_daftar'] ?>" onclick="return confirm('Yakin ?')">Hapus</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</section>

</body>
</html>