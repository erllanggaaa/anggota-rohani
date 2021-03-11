<?php
include "../includes/koneksi.php";

if ($edit = mysqli_query($konek, "UPDATE tbl_ibadah SET tanggal='".$_POST['tanggal']."', jenis_ibadah='".$_POST['jenis_ibadah']."', tempat_ibadah='".$_POST['tempat_ibadah']."', pengkotbah='".$_POST['pengkotbah']."', judul_kotbah='".$_POST['judul_kotbah']."', jumlah_jemaat='".$_POST['jumlah_jemaat']."', jumlah_persembahan='".$_POST['jumlah_persembahan']."' WHERE id_ibadah = '".$_POST['id_ibadah']."'")){
		echo "<script> alert('Data Berhasil Diubah'); location.href='Data-Ibadah' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));

?>