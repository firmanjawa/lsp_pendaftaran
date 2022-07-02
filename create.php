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

	//Selesai mengisi data dan menekan tombol submit
	if(isset($_POST['submit'])){

		// proses insert jika admin yang isi data
		if($_SESSION['user'] == 0){
			$insert = mysqli_query($conn, "INSERT INTO daftar VALUES (
				DEFAULT,
				0,
				'".date('Y-m-d')."',
				'".$_POST['no_kk']."',
				'".$_POST['nik']."',
				'".$_POST['domisili']."',
				'".$_POST['no_akte']."',
				'".$_POST['institut']."',
				'".$_POST['tujuan']."',
				'".$_POST['nama']."',
				'".$_POST['agama']."',
				'".$_POST['jk']."',
				'".$_POST['tmpt_lahir']."',
				'".$_POST['tgl_lahir']."',
				'".$_POST['alamat']."',
				'".$_POST['wali']."',
				'".$_POST['no_tlp']."'
			)");

			if($insert){
			echo '<script>window.location="admin_beranda.php?id='.$generateId.'"</script>';
			}else{
				echo 'Error '.mysqli_error($conn);
			}

		}

		if($_SESSION['user'] == 1){
			$insert = mysqli_query($conn, "INSERT INTO daftar VALUES (
				DEFAULT,
				'".$_SESSION['id']."',
				'".date('Y-m-d')."',
				'".$_POST['no_kk']."',
				'".$_POST['nik']."',
				'".$_POST['domisili']."',
				'".$_POST['no_akte']."',
				'".$_POST['institut']."',
				'".$_POST['tujuan']."',
				'".$_POST['nama']."',
				'".$_POST['agama']."',
				'".$_POST['jk']."',
				'".$_POST['tmpt_lahir']."',
				'".$_POST['tgl_lahir']."',
				'".$_POST['alamat']."',
				'".$_POST['wali']."',
				'".$_POST['no_tlp']."'
			)");
			if($insert){
			echo '<script>window.location="peserta_beranda.php?id='.$generateId.'"</script>';
			}else{
				echo 'Error '.mysqli_error($conn);
			}
		}
		
		

		//jika berhasil insert
		


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

	<!-- bagian box formulir -->
	<section class="box-formulir">
		
		<h2>Formulir Pendaftaran Institut Pendidikan Online</h2>

		<!-- bagian form -->
		<form action="" method="post">

			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>No. Kartu Keluarga</td>
						<td>:</td>
						<td>
							<input type="text" name="no_kk" class="input-control">
						</td>
					</tr>

					<tr>
						<td>NIK</td>
						<td>:</td>
						<td>
							<input type="text" name="nik" class="input-control">
						</td>
					</tr>

					<!-- inputan jenis radio button -->
					<tr>
						<td>Domisili</td>
						<td>:</td>
						<td>
							<input type="radio" name="domisili" class="input-control" value="Dalam Provinsi"> Dalam Provinsi &nbsp;&nbsp;&nbsp;
							<input type="radio" name="domisili" class="input-control" value="Luar Provinsi"> Luar Provinsi
						</td>
					</tr>

					<tr>
						<td>No. Akte Kelahiran</td>
						<td>:</td>
						<td>
							<input type="text" name="no_akte" class="input-control">
						</td>
					</tr>

					<!-- inputan jenis scrolldown -->
					<tr>
						<td>Institut</td>
						<td>:</td>
						<td>
							<select class="input-control" name="institut">
								<option value="">--Pilih--</option>
								<option value="SD">SD</option>
								<option value="SMAP">SMP</option>
								<option value="SMA">SMA</option>
							</select>
						</td>
					</tr>

					<tr>
						<td>Tujuan Sekolah</td>
						<td>:</td>
						<td>
							<input type="text" name="tujuan" class="input-control">
						</td>
					</tr>

				</table>
			</div>

			<h3>Data Kependudukan</h3>
			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td>
							<input type="text" name="nama" class="input-control">
						</td>
					</tr>


					<!-- inputan jenis scrolldown -->
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<select class="input-control" name="agama">
								<option value="">--Pilih--</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Hindu">Hindu</option>
								<option value="Buddha">Buddha</option>
								<option value="Katolik">Katolik</option>
								<option value="Khonghucu">Khonghucu</option>
							</select>
						</td>
					</tr>


					<!-- inputan jenis radio button -->
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>
							<input type="radio" name="jk" class="input-control" value="Pria"> Pria &nbsp;&nbsp;&nbsp;
							<input type="radio" name="jk" class="input-control" value="Wanita"> Wanita
						</td>
					</tr>

					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>
							<input type="text" name="tmpt_lahir" class="input-control">
						</td>
					</tr>

					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>
							<input type="date" name="tgl_lahir" class="input-control">
						</td>
					</tr>


					<!-- inputan jenis textarea -->
					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="alamat"></textarea>
						</td>
					</tr>

					<tr>
						<td>Nama Orangtua/Wali</td>
						<td>:</td>
						<td>
							<input type="text" name="wali" class="input-control">
						</td>
					</tr>

					<tr>
						<td>No. Telepon</td>
						<td>:</td>
						<td>
							<input type="text" name="no_tlp" class="input-control">
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