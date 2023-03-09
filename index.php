<?php
session_start();
	if(!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	include 'functions.php';
	
	$mahasiswa = query("SELECT * FROM mahasiswa"); //ORDER BY id DESC menampilkan yg baru paling atas

	//ketika tombol pencarian ditekan
	if(isset($_POST["cari"])) {
		$mahasiswa = cari($_POST["keyword"]);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style>
		.loader {
			width: 100px;
			position: absolute;
			top: 118px;
			left: 295px;
			z-index: -1;
			display: none;
		}
	</style>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>Daftar Mahasiswa</h1>

	<a href="tambah.php">Tambah Data Mahasiswa</a><br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword Pencarian.." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari</button>
		<img src="img/loader.gif" class="loader">
	</form><br>
	<div id="container">
		<table border="1" cellpadding="3" cellspacing="0">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Gambar</th>
				<th>Nim</th>
				<th>Email</th>
				<th>Jurusan</th>
				<th>Aksi</th>
			</tr>
			<?php $i = 1; ?>
			<?php foreach($mahasiswa as $row) : ?>
				<tr>
					<td><?= $i; ?></td>
					<td><?= $row["nama"]; ?></td>
					<td><img src="img/<?php echo $row["gambar"]; ?>" width="50" height="50"></td>
					<td><?= $row["nim"]; ?></td>
					<td><?= $row["email"]; ?></td>
					<td><?= $row["jurusan"]; ?></td>
					<td>
						<a href="ubah.php?id=<?= $row["id"]; ?>">Edit</a> |
						<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin dihapus?');">Hapus</a>
					</td>
				</tr>
				<?php $i++ ?>
			<?php endforeach; ?>
		</table>
	</div>
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>