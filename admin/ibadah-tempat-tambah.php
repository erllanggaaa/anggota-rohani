<?php
include "../includes/koneksi.php";

$alamat_lokasi= mysqli_real_escape_string($konek, $_POST['alamat_lokasi']);
$contact_person= mysqli_real_escape_string($konek, $_POST['contact_person']);

if ($add = mysqli_query($konek, "INSERT INTO tbl_lokasi_ibadah(id_lokasi_ibadah, alamat_lokasi, contact_person) VALUES ('','$alamat_lokasi','$contact_person')")){
		echo "<script> alert('Data Berhasil Disimpan'); location.href='Data-Ibadah' </script>";
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));

?>