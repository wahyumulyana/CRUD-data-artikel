<?php
include_once 'koneksi.php';

$sql = "SELECT * FROM artikel ORDER BY tanggal DESC";
$result = mysqli_query($conn, $sql);


include_once 'header.php';
?>
<a href="tambah.php" class="btn btn-large">Tambah Artikel</a>
<table>
	<tr>
		<th>ID</th>
		<th>Judul</th>
		<th>Tanggal</th>
		<th>Aksi</th>
	</tr>
	<?php while($tampil = mysqli_fetch_array($result)){
				$id = stripslashes ($tampil['id']);
				$title = stripslashes ($tampil['title']);
				$tanggal = stripslashes ($tampil['tanggal']);				?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $title; ?></td>
		<td><?php echo $tanggal ; ?></td>
		<td>
			<a class="btn btn-default" href="edit.php?id=<?php echo $tampil['id'];?>">Edit</a>
			<a class="btn btn-alert" onclick="return confirm('yakin akan menghapus data?')"; href="hapus.php?id=<?php echo $tampil['id'];?>">Delete</a>
		</td>
	</tr>
	<?php }?>
</table>
<?php
include_once 'footer.php'; ?>