<?php

include "../includes/koneksi.php";

if($delete = mysqli_query ($konek, "DELETE from tbl_ibadah WHERE id_ibadah = '".$_GET['id_ibadah']."'")){
    echo "<script> alert('Data Berhasil Dihapus'); location.href='Data-Ibadah' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>