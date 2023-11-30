<?php
include "koneksi.php";
?>
<center>
<h1><b>INPUT DATA IDENTITAS</b></h1>
<br>

<form method="POST" action="">
	<table>

		<tr>
			<td>ID</td>
			<td>:</td>
			<td>
				<input type="text" name="id">
			</td>
		</tr>

		<tr>
			<td>NAMA LENGKAP</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_lengkap">
			</td>
		</tr>

		<tr>
			<td>ALAMAT</td>
			<td>:</td>
			<td>
				<input type="text" name="alamat">
			</td>
		</tr>
		<tr>
			<td>UMUR</td>
			<td>:</td>
			<td>
				<input type="text" name="umur">
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
			<td>
				<button type="submit" name="tombol_simpan">SIMPAN</button>
			</td>
		</tr>
	</table>
</form>

<br>
<hr>
<h1><b>HASIL DATA YANG DIINPUT</b></h1>
<form method="POST" action="">
	<input type="text" name="cari">
	<button type="submit" name="tombol_cari">CARI</button>
</form>

<table border="1">
	<tr>
		<th>ID</th>
		<th>NAMA LENGKAP</th>
		<th>ALAMAT</th>
		<th>UMUR</th>
		<th>HAPUS</th>
		<th>UBAH</th>
	</tr>

<?php
// Tombol Simpan Untuk Membuat Data
if (isset($_POST["tombol_simpan"])) {

	 $query = mysqli_query($koneksi,"INSERT INTO tb_identitas (id, nama_lengkap, alamat, umur) VALUES ('$_POST[id]', '$_POST[nama_lengkap]', '$_POST[alamat]', '$_POST[umur]') ");
	 }
	// Selesai  
    ?>

    
<?php
// Membuat Data Suapaya Bisa Ditampilkan dan Bisa Di Search 
	if (isset($_POST['tombol_cari'])) {
		$query = mysqli_query($koneksi, "SELECT * FROM tb_identitas WHERE nama_lengkap LIKE '%$_POST[cari]%' OR id LIKE '%$_POST[cari]%' OR alamat LIKE '%$_POST[cari]%' OR umur LIKE '%$_POST[cari]%'");
	} else {
		$query = mysqli_query($koneksi, "SELECT * FROM tb_identitas");
	}
	while ($tampilkan = mysqli_fetch_array($query)) {
		?>
		<tr>
			<td><?php echo $tampilkan['id']; ?></td>
			<td><?php echo $tampilkan['nama_lengkap']; ?></td>
			<td><?php echo $tampilkan['alamat']; ?></td>
			<td><?php echo $tampilkan['umur']; ?></td>
			<td><a href="hapus.php?id=<?php echo $tampilkan['id']; ?>">HAPUS</a></td>
			<td><a href="ubah.php?id=<?php echo $tampilkan['id']; ?>">UBAH</a></td>
		</tr>
		<?php
	}
// Selesai
?>
	
</table>
</center>