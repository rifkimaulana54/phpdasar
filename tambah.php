<?php
session_start();
	if(!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	include 'functions.php';

	if( isset($_POST["submit"]) ) {

		//cek apakah data berhasil ditambahkan atau tidak 
		if( tambah($_POST) > 0 ) {
			echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href = 'index.php'
			</script>
			";
		} else {
			echo "
			<script>
				alert('data gagal ditambahkan ditambahkan');
				document.location.href = 'index.php'
			</script>
			";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah data mahasiswa</title>
</head>
<body>
	<h1>Tambah Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required autocomplete="off">
			</li>
			<li>
				<label for="nim">Nim :</label>
				<input type="text" name="nim" id="nim" required autocomplete="off">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required autocomplete="off">
			</li>
			<li>
				<label for="jurusan">Jurusan  :</label>
				<input type="text" name="jurusan" id="jurusan" required autocomplete="off">
			</li>
			<li>
				<label for="gambar">Gambar :</label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data</button>
			</li>
		</ul>
	</form>
</body>
</html>