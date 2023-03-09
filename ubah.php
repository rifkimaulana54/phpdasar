<?php
session_start();
	if(!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	include 'functions.php';

	//ambil data dari url
	$id = $_GET["id"];

	//query data mahasiswa berdasarkan id
	$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

	if( isset($_POST["submit"]) ) {
		//cek apakah data berhasil diubah atau tidak 
		if( ubah($_POST) > 0 ) {
			echo "
			<script>
				alert('data berhasil diedit');
				document.location.href = 'index.php'
			</script>
			";
		} else {
			echo "
			<script>
				alert('data gagal ditambahkan diedit');
				document.location.href = 'index.php'
			</script>
			";
		}
	}
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit data mahasiswa</title>
</head>
<body>
	<h1>Edit Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>" autocomplete="off">
			</li>
			<li>
				<label for="nim">Nim :</label>
				<input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>" autocomplete="off">
			</li>
			<li>
				<label for="email">Email :</label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>" autocomplete="off">
			</li>
			<li>
				<label for="jurusan">Jurusan  :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>" autocomplete="off">
			</li>
			<li>
				<label for="gambar">Gambar :</label><br>
				<img src="img/<?= $mhs['gambar']; ?>" width="50"><br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<li>
				<button type="submit" name="submit">Edit Data</button>
			</li>
		</ul>
	</form>
</body>
</html>