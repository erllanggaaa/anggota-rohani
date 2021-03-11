<?php

include "../includes/koneksi.php";

if($delete = mysqli_query ($konek, "DELETE from tbl_licom WHERE id_licom = '".$_GET['id_licom']."'")){
    echo "<script> alert('Data Berhasil Dihapus'); location.href='Data-Licom' </script>";
    exit();
}
die ("Terdapat Kesalahan : ".mysqli_error($konek));

?>