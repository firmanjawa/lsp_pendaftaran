<?php 
	include 'koneksi.php';

	//mencari field sesuai id pada barisan tabel dan menghapusnya
	if(isset($_GET['id'])){
		$delete = mysqli_query($conn, "DELETE FROM daftar WHERE id_daftar = '".$_GET['id']."' ");
		echo '<script>window.location="data-peserta.php"</script>';
	}
?>