<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$tanggal = $_POST['tanggal'];	
	$sql = "INSERT INTO artikel (title, content, tanggal)
			VALUES ('$title', '$content', '$tanggal')";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		die(mysqli_error($conn));
	}
	header('location: index.php');
}
include_once 'header.php';
  
?>

<form method="post" action="" enctype="multipart/form-data">
<h2>Tambah Artikel</h2>
	<div class="input">
		<input type="text" name="title" placeholder="Judul Artikel" />
	</div>
	<div class="input">
		<textarea name="content" cols="50" rows="10" placeholder="Isi Artikel" ></textarea>
	</div>
	<div class="input">
		<input type="date" name="tanggal"/>
	</div>
	<div class="submit">
		<input type="submit" class="btn btn-large" name="submit" value="simpan" />
	</div>
</form>
<?php 
include_once 'footer.php'; ?> 