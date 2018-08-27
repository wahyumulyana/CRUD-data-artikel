<?php
error_reporting(E_ALL);
include_once 'koneksi.php';
if (isset($_POST['submit'])) 
{
	$id = $_POST['id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
	$tanggal = $_POST['tanggal'];
	
$sql = "UPDATE artikel SET title = '{$title}', content = '{$content}',tanggal = '{$tanggal}' WHERE id = '{$id}'";
	$result = mysqli_query($conn, $sql);
	if (!$result) {
		die(mysqli_error($conn));
	}
	header('location: index.php');
}
$id = $_GET['id'];
$sql = "SELECT * FROM artikel WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);
include_once 'header.php';
?>
<h2>Ubah Artikel</h2>
<form method="post" action="" enctype="multipart/form-data">
	<div class="input">
		<input type="text" name="title" value="<?php echo $data['title'];?>" />
	</div>
	<div class="input">
		<textarea name="content" cols="50" rows="10" value="<?php echo $data['content'];?> "></textarea>
	</div>
	<div class="input">
		<label>Tanggal</label>
		<input type="date" name="tanggal" value="<?php echo date("Y-m-d", strtotime($data['tanggal']));?>"/>
	</div>
	<div class="submit">
		<input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
		<input type="submit" class="btn btn-large" name="submit" value="simpan" />
	</div>
</form>	
<?php
include_once 'footer.php'; ?>