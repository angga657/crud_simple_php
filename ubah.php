<?php
include "koneksi.php";
?>

<center>
<h1><b>UBAH DATA IDENTITAS</b></h1>
<hr>

<?php
// Menampilkan Data Di Bagian Ubah 
$query = mysqli_query($koneksi, "SELECT * FROM tb_identitas WHERE id='$_REQUEST[id]' ");
while ($tampilkan = mysqli_fetch_array($query)) {
// Selesai
	?>

	<form method="POST" action="">
	<table>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td>
				<input type="text" name="id" value="<?php echo $tampilkan['id']; ?>" required readonly>
			</td>
		</tr>
		<tr>
			<td>NAMA LENGKAP</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_lengkap" value="<?php echo $tampilkan['nama_lengkap']; ?>" required>
			</td>
		</tr>
		<tr>
			<td>ALAMAT</td>
			<td>:</td>
			<td>
				<input type="text" name="alamat" value="<?php echo $tampilkan['alamat']; ?>" required>
			</td>
		</tr>
		<tr>
			<td>UMUR</td>
			<td>:</td>
			<td>
				<input type="text" name="umur" value="<?php echo $tampilkan['umur']; ?>" required>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td>
				<button type="submit" name="tombol_ubah">UBAH</button>
			</td>
		</tr>
	</table>
</form>
</center>


	
	<?php 
}
?>

 <?php
 // Mengubah Data yang Tadi Ditampilkan
 if (isset($_POST['tombol_ubah'])) {
 	$query = mysqli_query($koneksi,"UPDATE tb_identitas SET  nama_lengkap='$_POST[nama_lengkap]', alamat='$_POST[alamat]', umur='$_POST[umur]' WHERE id='$_POST[id]' ");

 	if ($query) {
 		echo "Data Berhasil Diubah!";
 		header('location:index.php');
 	} else {
 		echo "Data Gagal Diubah!";
 	}
}
// selesai
?>