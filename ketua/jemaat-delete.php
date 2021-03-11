<?php

include "../includes/koneksi.php";

if($delete = mysqli_query ($konek, "DELETE from tbl_jemaat WHERE id_jemaat = '".$_GET['id_jemaat']."'")){
    echo "<script> alert('Data Berhasil Dihapus'); location.href='Data-Jemaat' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>