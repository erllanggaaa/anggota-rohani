<?php
include "../includes/koneksi.php";

$nama_licom= mysqli_real_escape_string($konek, $_POST['nama_licom']);
$ketua_licom= mysqli_real_escape_string($konek, $_POST['ketua_licom']);
$alamat= mysqli_real_escape_string($konek, $_POST['alamat']);
$no_kontak= mysqli_real_escape_string($konek, $_POST['no_kontak']);

if ($add = mysqli_query($konek, "INSERT INTO tbl_licom(id_licom, nama_licom, ketua_licom, alamat, no_kontak) VALUES ('','$nama_licom','$ketua_licom','$alamat','$no_kontak')")){
		echo "<script> alert('Data Berhasil Disimpan'); location.href='Data-Licom' </script>";
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

?>