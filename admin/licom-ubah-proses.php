<?php
include "../includes/koneksi.php";

if ($edit = mysqli_query($konek, "UPDATE tbl_licom SET nama_licom='".$_POST['nama_licom']."', ketua_licom='".$_POST['ketua_licom']."', alamat='".$_POST['alamat']."', no_kontak='".$_POST['no_kontak']."' WHERE id_licom = '".$_POST['id_licom']."'")){
		echo "<script> alert('Data Berhasil Diubah'); location.href='Data-Licom' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>