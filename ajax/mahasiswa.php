<?php
sleep(1);
require '../functions.php';

$keyword = $_GET['keyword'];
$query = "SELECT * FROM mahasiswa
					WHERE
					nama LIKE '%$keyword%' OR
					nim LIKE '%$keyword%' OR
					nama LIKE '%$keyword%' OR
					email LIKE '%$keyword%' OR
					jurusan LIKE '%$keyword%'
				";
$mahasiswa = query($query);
?>

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