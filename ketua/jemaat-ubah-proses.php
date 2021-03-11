<?php
include "../includes/koneksi.php";

$target = 'foto/';
$foto1 = $target . basename($_FILES['foto']['name']);
$proses = move_uploaded_file($_FILES['foto']['tmp_name'],$foto1);

if($foto1 == 'foto/'){
	if ($edit = mysqli_query($konek, "UPDATE tbl_jemaat SET nama_jemaat='".$_POST['nama_jemaat']."', tempat_lahir='".$_POST['tempat_lahir']."', tgl_lahir='".$_POST['tgl_lahir']."', jenis_kelamin='".$_POST['jenis_kelamin']."', alamat='".$_POST['alamat']."', no_telp_hp='".$_POST['no_telp_hp']."', no_telp_rumah='".$_POST['no_telp_rumah']."', no_telp_kantor='".$_POST['no_telp_kantor']."', status_keluarga='".$_POST['status_keluarga']."', status_pernikahan='".$_POST['status_pernikahan']."', tempat_menikah='".$_POST['tempat_menikah']."', tgl_pernikahan='".$_POST['tgl_pernikahan']."', nama_pasangan='".$_POST['nama_pasangan']."', anak_ke_1='".$_POST['anak_ke_1']."', anak_ke_2='".$_POST['anak_ke_2']."', anak_ke_3='".$_POST['anak_ke_3']."', anak_ke_4='".$_POST['anak_ke_4']."', ayah='".$_POST['ayah']."', ibu='".$_POST['ibu']."', tgl_baptis='".$_POST['tgl_baptis']."', tempat_baptis='".$_POST['tempat_baptis']."', pendeta='".$_POST['pendeta']."', golongan_darah='".$_POST['golongan_darah']."', pendidikan_terakhir='".$_POST['pendidikan_terakhir']."', keahlian='".$_POST['keahlian']."', pekerjaan='".$_POST['pekerjaan']."', id_licom='".$_POST['id_licom']."', username='".$_POST['username']."', password='".md5($_POST["password"])."', dekripsi='".$_POST['password']."', level='".$_POST['level']."' WHERE id_jemaat = '".$_POST['id_jemaat']."'")){
		echo "<script> alert('Data Berhasil Diubah'); location.href='Data-Jemaat' </script>";
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}else{
	if ($edit = mysqli_query($konek, "UPDATE tbl_jemaat SET nama_jemaat='".$_POST['nama_jemaat']."', tempat_lahir='".$_POST['tempat_lahir']."', tgl_lahir='".$_POST['tgl_lahir']."', jenis_kelamin='".$_POST['jenis_kelamin']."', alamat='".$_POST['alamat']."', no_telp_hp='".$_POST['no_telp_hp']."', no_telp_rumah='".$_POST['no_telp_rumah']."', no_telp_kantor='".$_POST['no_telp_kantor']."', status_keluarga='".$_POST['status_keluarga']."', status_pernikahan='".$_POST['status_pernikahan']."', tempat_menikah='".$_POST['tempat_menikah']."', tgl_pernikahan='".$_POST['tgl_pernikahan']."', nama_pasangan='".$_POST['nama_pasangan']."', anak_ke_1='".$_POST['anak_ke_1']."', anak_ke_2='".$_POST['anak_ke_2']."', anak_ke_3='".$_POST['anak_ke_3']."', anak_ke_4='".$_POST['anak_ke_4']."', ayah='".$_POST['ayah']."', ibu='".$_POST['ibu']."', tgl_baptis='".$_POST['tgl_baptis']."', tempat_baptis='".$_POST['tempat_baptis']."', pendeta='".$_POST['pendeta']."', golongan_darah='".$_POST['golongan_darah']."', pendidikan_terakhir='".$_POST['pendidikan_terakhir']."', keahlian='".$_POST['keahlian']."', pekerjaan='".$_POST['pekerjaan']."', id_licom='".$_POST['id_licom']."', username='".$_POST['username']."', password='".md5($_POST["password"])."', dekripsi='".$_POST['password']."', level='".$_POST['level']."', foto='$foto1' WHERE id_jemaat = '".$_POST['id_jemaat']."'")){
		echo "<script> alert('Data Berhasil Diubah'); location.href='Data-Jemaat' </script>";
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}

?>