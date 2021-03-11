<?php 
// mengaktifkan session pada php
session_start();
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$Username = $_POST["Username"];
$Password = $_POST["Password"];


		$username = stripslashes($Username);
		$password = stripslashes($Password);
		$username = mysqli_real_escape_string($konek, $username);
		$password = mysqli_real_escape_string($konek, $password);
		$password1 = md5($password);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($konek,"select * from tbl_jemaat where USERNAME='$username' and PASSWORD='$password1'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$queryuser = mysqli_query ($konek, "SELECT * FROM tbl_jemaat WHERE USERNAME='$username'");
	$data = mysqli_fetch_array ($queryuser);

	if($data["level"] == 'Admin'){

		$_SESSION["id_jemaat"]		= $data["id_jemaat"];
		$_SESSION["nama_jemaat"] 	= $data["nama_jemaat"];
		$_SESSION["id_licom"] 		= $data["id_licom"];
		$_SESSION["level"] 			= $data["level"];
		$_SESSION["Login"] 			= true;
		
		header("location: ../admin/dashboard");
		exit();

	}else if($data["level"] == 'Ketua'){

		$_SESSION["id_jemaat"]		= $data["id_jemaat"];
		$_SESSION["nama_jemaat"] 	= $data["nama_jemaat"];
		$_SESSION["id_licom"] 		= $data["id_licom"];
		$_SESSION["level"] 			= $data["level"];
		$_SESSION["Login"] 			= true;
		
		header("location: ../ketua/dashboard");
		exit();


}else{

		header("location: ../login?action=failed");
	}

}else{
	header("location: ../login?action=failed");
}
?>