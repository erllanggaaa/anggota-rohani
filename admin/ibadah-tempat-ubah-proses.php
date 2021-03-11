<?php
include "../includes/koneksi.php";

if ($edit = mysqli_query($konek, "UPDATE tbl_lokasi_ibadah SET alamat_lokasi='".$_POST['alamat_lokasi']."', contact_person='".$_POST['contact_person']."' WHERE id_lokasi_ibadah = '".$_POST['id_lokasi_ibadah']."'")){
		echo "<script> alert('Data Berhasil Diubah'); location.href='Data-Ibadah' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>