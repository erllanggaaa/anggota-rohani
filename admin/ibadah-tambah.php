<?php
include "../includes/koneksi.php";

$tanggal= mysqli_real_escape_string($konek, $_POST['tanggal']);
$jenis_ibadah= mysqli_real_escape_string($konek, $_POST['jenis_ibadah']);
$tempat_ibadah= mysqli_real_escape_string($konek, $_POST['tempat_ibadah']);
$pengkotbah= mysqli_real_escape_string($konek, $_POST['pengkotbah']);
$judul_kotbah= mysqli_real_escape_string($konek, $_POST['judul_kotbah']);
$jumlah_jemaat= mysqli_real_escape_string($konek, $_POST['jumlah_jemaat']);
$jumlah_persembahan= mysqli_real_escape_string($konek, $_POST['jumlah_persembahan']);

if ($add = mysqli_query($konek, "INSERT INTO tbl_ibadah(id_ibadah, tanggal, jenis_ibadah, tempat_ibadah, pengkotbah, judul_kotbah, jumlah_jemaat, jumlah_persembahan) VALUES ('','$tanggal','$jenis_ibadah','$tempat_ibadah', '$pengkotbah', '$judul_kotbah', '$jumlah_jemaat', '$jumlah_persembahan')")){
		echo "<script> alert('Data Berhasil Disimpan'); location.href='Data-Ibadah' </script>";
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

?>