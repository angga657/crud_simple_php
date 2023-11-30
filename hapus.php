<?php
include "koneksi.php";
?>

<Center>
<form method="POST" action="">
    <h1>
	<b>AH YANG BENER MAU DIHAPUS DATANYA?"</b>
	<br>
	<button type="submit" name="tombol_tidak">KAGAK LAH</button>
	<button type="submit" name="tombol_hapus">YOI!</button>
    </h1>
</form>
</Center>

<?php 
// Membuat Data Supaya Bisa Dihapus
if (isset($_POST["tombol_tidak"])) {
	header('location:index.php');
}
if (isset($_POST["tombol_hapus"])) {
    $query = mysqli_query($koneksi,"DELETE FROM tb_identitas WHERE id='$_REQUEST[id]' ");
	header('location:index.php');

}
// Selesai
 ?>