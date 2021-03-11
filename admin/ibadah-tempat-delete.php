<?php

include "../includes/koneksi.php";

if($delete = mysqli_query ($konek, "DELETE from tbl_lokasi_ibadah WHERE id_lokasi_ibadah = '".$_GET['id_lokasi_ibadah']."'")){
    echo "<script> alert('Data Berhasil Dihapus'); location.href='Data-Ibadah' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>