<?php 
	session_start();
	include 'koneksi.php';

	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}

	//mencari record dari id yang diambil di tabel data-peserta
	if($_SESSION['user'] == 0){
		$update = mysqli_query($conn, "SELECT * FROM daftar WHERE id_daftar = '".$_GET['id']."' ");
	}

	//jika usernya peserta
	if($_SESSION['user'] == 1){
		$update = mysqli_query($conn, "SELECT * FROM daftar WHERE id_user = '".$_SESSION['id']."' ");
	}

	$u = mysqli_fetch_assoc($update);

		//Selesai mengisi data dan menekan tombol submit
	if(isset($_POST['submit'])){

		if($_SESSION['user'] == 0){

			// proses insert data baru
			$insertupdate = mysqli_query($conn, "UPDATE daftar SET
					no_kk = '".$_POST['no_kk']."',
					nik = '".$_POST['nik']."',
					domisili = '".$_POST['domisili']."',
					no_akte = '".$_POST['no_akte']."',
					institut = '".$_POST['institut']."',
					tujuan = '".$_POST['tujuan']."',
					nama = '".$_POST['nama']."',
					agama = '".$_POST['agama']."',
					jk = '".$_POST['jk']."',
					tmpt_lahir = '".$_POST['tmpt_lahir']."',
					tgl_lahir = '".$_POST['tgl_lahir']."',
					alamat = '".$_POST['alamat']."',
					wali = '".$_POST['wali']."',
					no_tlp ='".$_POST['no_tlp']."'
				WHERE id_daftar = '".$_GET['id']."' ");

				//jika berhasil update
				if($insertupdate){
					echo '<script>window.location="data-peserta.php?id='.$generateId.'"</script>';
				}else{
					echo 'Error '.mysqli_error($conn);
				}
			}

		//jika usernya peserta
		if($_SESSION['user'] == 1){

			// proses insert data baru
			$insertupdate = mysqli_query($conn, "UPDATE daftar SET
				no_kk = '".$_POST['no_kk']."',
				nik = '".$_POST['nik']."',
				domisili = '".$_POST['domisili']."',
				no_akte = '".$_POST['no_akte']."',
				institut = '".$_POST['institut']."',
				tujuan = '".$_POST['tujuan']."',
				nama = '".$_POST['nama']."',
				agama = '".$_POST['agama']."',
				jk = '".$_POST['jk']."',
				tmpt_lahir = '".$_POST['tmpt_lahir']."',
				tgl_lahir = '".$_POST['tgl_lahir']."',
				alamat = '".$_POST['alamat']."',
				wali = '".$_POST['wali']."',
				no_tlp ='".$_POST['no_tlp']."'
			WHERE id_user = '".$_SESSION['id']."' ");

			//jika berhasil update
			if($insertupdate){
				echo '<script>window.location="detail.php?id='.$generateId.'"</script>';
			}else{
				echo 'Error '.mysqli_error($conn);
			}

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
			<li><a href="keluar.php">Keluar</a></li>
		</ul>
	</header>

	<!-- bagian box formulir -->
	<section class="box-formulir">
		
		<h2>Update</h2>

		<!-- bagian form -->
		<form action="" method="post">

			<div class="box">
				<table border="0" class="table-form">
					<tr>
						<td>No. Kartu Keluarga</td>
						<td></td>
						<td>
							<input type="text" name="no_kk" class="input-control" value="<?php echo $u['no_kk'] ?>" >
						</td>
					</tr>

					<tr>
						<td>NIK</td>
						<td>:</td>
						<td> 
							<input type="text" name="nik" class="input-control" value="<?php echo $u['nik'] ?>">
						</td>
					</tr>

					<tr>
						<td>Domisili</td>
						<td>:</td>
						<td>
							<input type="radio" name="domisili" class="input-control" <?php if($u['domisili']=="Dalam Provinsi") echo "checked";?> value="Dalam Provinsi"> Dalam Provinsi &nbsp;&nbsp;&nbsp;
							<input type="radio" name="domisili" class="input-control" <?php if($u['domisili']=="Luar Provinsi") echo "checked";?> value="Luar Provinsi"> Luar Provinsi
						</td>
					</tr>

					<tr>
						<td>No. Akte Kelahiran</td>
						<td>:</td>
						<td>
							<input type="text" name="no_akte" class="input-control"  value="<?php echo $u['no_akte'] ?>">
						</td>
					</tr>

					<!-- inputan jenis radio button -->
					<tr>
						<td>Institut</td>
						<td>:</td>
						<td>
							<select class="input-control" name="institut">
								<option value="<?php echo $u['institut'] ?>"><?php echo $u['institut'] ?></option>
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
							<input type="text" name="tujuan" class="input-control"  value="<?php echo $u['tujuan'] ?>">
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
							<input type="text" name="nama" class="input-control"  value="<?php echo $u['nama'] ?>">
						</td>
					</tr>

					<!-- inputan jenis scrolldown -->
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>
							<select class="input-control" name="agama" value="<?php echo $u['agama'] ?>">
								<option value="<?php echo $u['agama'] ?>"><?php echo $u['agama'] ?></option>
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
							<input type="radio" name="jk" class="input-control" <?php if($u['jk']=="Pria") echo "checked";?> value="Pria"> Pria &nbsp;&nbsp;&nbsp;
							<input type="radio" name="jk" class="input-control" <?php if($u['jk']=="Wanita") echo "checked";?> value="Wanita"> Wanita
						</td>
					</tr>

					<tr>
						<td>Tempat Lahir</td>
						<td>:</td>
						<td>
							<input type="text" name="tmpt_lahir" class="input-control"  value="<?php echo $u['tmpt_lahir'] ?>">
						</td>
					</tr>

					<tr>
						<td>Tanggal Lahir</td>
						<td>:</td>
						<td>
							<input type="date" name="tgl_lahir" class="input-control"  value="<?php echo $u['tgl_lahir'] ?>">
						</td>
					</tr>

					<!-- inputan jenis textarea -->
					<tr>
						<td>Alamat Lengkap</td>
						<td>:</td>
						<td>
							<textarea class="input-control" name="alamat" > <?php echo $u['alamat'] ?></textarea>
						</td>
					</tr>

					<tr>
						<td>Nama Orangtua/Wali</td>
						<td>:</td>
						<td>
							<input type="text" name="wali" class="input-control"  value="<?php echo $u['wali'] ?>">
						</td>
					</tr>

					<tr>
						<td>No. Telepon</td>
						<td>:</td>
						<td>
							<input type="text" name="no_tlp" class="input-control"  value="<?php echo $u['no_tlp'] ?>">
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