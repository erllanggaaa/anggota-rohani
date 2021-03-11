<?php
include "../includes/koneksi.php";

$nama_jemaat= mysqli_real_escape_string($konek, $_POST['nama_jemaat']);
$tempat_lahir= mysqli_real_escape_string($konek, $_POST['tempat_lahir']);
$tgl_lahir= mysqli_real_escape_string($konek, $_POST['tgl_lahir']);
$jenis_kelamin= mysqli_real_escape_string($konek, $_POST['jenis_kelamin']);
$alamat= mysqli_real_escape_string($konek, $_POST['alamat']);
$no_telp_hp= mysqli_real_escape_string($konek, $_POST['no_telp_hp']);
$no_telp_rumah= mysqli_real_escape_string($konek, $_POST['no_telp_rumah']);
$no_telp_kantor= mysqli_real_escape_string($konek, $_POST['no_telp_kantor']);
$status_keluarga= mysqli_real_escape_string($konek, $_POST['status_keluarga']);
$status_pernikahan= mysqli_real_escape_string($konek, $_POST['status_pernikahan']);
$tempat_menikah= mysqli_real_escape_string($konek, $_POST['tempat_menikah']);
$tgl_pernikahan= mysqli_real_escape_string($konek, $_POST['tgl_pernikahan']);
$nama_pasangan= mysqli_real_escape_string($konek, $_POST['nama_pasangan']);
$anak_ke_1= mysqli_real_escape_string($konek, $_POST['anak_ke_1']);
$anak_ke_2= mysqli_real_escape_string($konek, $_POST['anak_ke_2']);
$anak_ke_3= mysqli_real_escape_string($konek, $_POST['anak_ke_3']);
$anak_ke_4= mysqli_real_escape_string($konek, $_POST['anak_ke_4']);
$ayah= mysqli_real_escape_string($konek, $_POST['ayah']);
$ibu= mysqli_real_escape_string($konek, $_POST['ibu']);
$tgl_baptis= mysqli_real_escape_string($konek, $_POST['tgl_baptis']);
$tempat_baptis= mysqli_real_escape_string($konek, $_POST['tempat_baptis']);
$pendeta= mysqli_real_escape_string($konek, $_POST['pendeta']);
$golongan_darah= mysqli_real_escape_string($konek, $_POST['golongan_darah']);
$pendidikan_terakhir= mysqli_real_escape_string($konek, $_POST['pendidikan_terakhir']);
$keahlian= mysqli_real_escape_string($konek, $_POST['keahlian']);
$pekerjaan= mysqli_real_escape_string($konek, $_POST['pekerjaan']);
$tanggal_pengisian_formulir=date('Y-m-d');
$id_licom= mysqli_real_escape_string($konek, $_POST['id_licom']);
$username= mysqli_real_escape_string($konek, $_POST['username']);
$password= mysqli_real_escape_string($konek, md5($_POST['password']));
$dekripsi= mysqli_real_escape_string($konek, $_POST['password']);
$level= mysqli_real_escape_string($konek, $_POST['level']);
$target = 'foto/';
$foto1 = $target . basename($_FILES['foto']['name']);
$proses = move_uploaded_file($_FILES['foto']['tmp_name'],$foto1);

if($_POST['level'] == 'Anggota'){
	if ($add = mysqli_query($konek, "INSERT INTO tbl_jemaat(id_jemaat, nama_jemaat, tempat_lahir, tgl_lahir, jenis_kelamin, alamat, no_telp_hp, no_telp_rumah, no_telp_kantor, status_keluarga, status_pernikahan, tempat_menikah, tgl_pernikahan, nama_pasangan, anak_ke_1, anak_ke_2, anak_ke_3, anak_ke_4, ayah, ibu, tgl_baptis, tempat_baptis, pendeta, golongan_darah, pendidikan_terakhir, keahlian, pekerjaan, tanggal_pengisian_formulir, id_licom, level, foto) VALUES ('', '$nama_jemaat', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$no_telp_hp', '$no_telp_rumah', '$no_telp_kantor', '$status_keluarga', '$status_pernikahan', '$tempat_menikah', '$tgl_pernikahan', '$nama_pasangan', '$anak_ke_1', '$anak_ke_2', '$anak_ke_3', '$anak_ke_4', '$ayah', '$ibu', '$tgl_baptis', '$tempat_baptis', '$pendeta', '$golongan_darah', '$pendidikan_terakhir', '$keahlian', '$pekerjaan', '$tanggal_pengisian_formulir', '$id_licom', '$level', '$foto1')")){
		echo "<script> alert('Data Berhasil Disimpan'); location.href='Data-Jemaat' </script>";
		exit();
	}
die ("Terdapat kesalahan : ". mysqli_error($konek));
}else{
	if ($add = mysqli_query($konek, "INSERT INTO tbl_jemaat(id_jemaat, nama_jemaat, tempat_lahir, tgl_lahir, jenis_kelamin, alamat, no_telp_hp, no_telp_rumah, no_telp_kantor, status_keluarga, status_pernikahan, tempat_menikah, tgl_pernikahan, nama_pasangan, anak_ke_1, anak_ke_2, anak_ke_3, anak_ke_4, ayah, ibu, tgl_baptis, tempat_baptis, pendeta, golongan_darah, pendidikan_terakhir, keahlian, pekerjaan, tanggal_pengisian_formulir, id_licom, username, password, dekripsi, level, foto) VALUES ('', '$nama_jemaat', '$tempat_lahir', '$tgl_lahir', '$jenis_kelamin', '$alamat', '$no_telp_hp', '$no_telp_rumah', '$no_telp_kantor', '$status_keluarga', '$status_pernikahan', '$tempat_menikah', '$tgl_pernikahan', '$nama_pasangan', '$anak_ke_1', '$anak_ke_2', '$anak_ke_3', '$anak_ke_4', '$ayah', '$ibu', '$tgl_baptis', '$tempat_baptis', '$pendeta', '$golongan_darah', '$pendidikan_terakhir', '$keahlian', '$pekerjaan', '$tanggal_pengisian_formulir', '$id_licom', '$username', '$password', '$dekripsi','$level', '$foto1')")){
		echo "<script> alert('Data Berhasil Disimpan'); location.href='Data-Jemaat' </script>";
		exit();
	}
	die ("Terdapat kesalahan : ". mysqli_error($konek));
}


?>