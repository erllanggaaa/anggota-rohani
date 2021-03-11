<?php
session_start();
include "../includes/koneksi.php";
include "include/auth_user.php";
include "include/fungsi_tgl.php";

$id_jemaat=$_SESSION["id_jemaat"];
$nama_jemaat=$_SESSION["nama_jemaat"];
$id_licom=$_SESSION["id_licom"];
$level=$_SESSION["level"];

date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMINISTRATOR APP - JEMAAT</title>

<?php include("include/css.php"); ?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="././dashboard">ADMINISTRATOR APP</a>
            </div>
            <!-- /.navbar-header -->

<?php include ("include/menu.php"); ?>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <?php include("include/sidebar.php"); ?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Jemaat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="././Data-Jemaat">
                        <button class="btn btn-info btn-md">
                        <i class="glyphicon glyphicon-backward"> Kembali</i>
                    </button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover">
                    <?php
                    $id_jemaat=$_GET['id_jemaat'];
                    $sql = mysqli_query($konek, "SELECT a.id_jemaat, a.nama_jemaat, a.tempat_lahir, a.tgl_lahir, a.jenis_kelamin, a.alamat, a.no_telp_hp, a.no_telp_rumah, a.no_telp_kantor, a.status_keluarga, a.status_pernikahan, a.tempat_menikah, a.tgl_pernikahan, a.nama_pasangan, a.anak_ke_1, a.anak_ke_2, a.anak_ke_3, a.anak_ke_4, a.ayah, a.ibu, a.tgl_baptis, a.tempat_baptis, a.pendeta, a.golongan_darah, a.pendidikan_terakhir, a.keahlian, a.pekerjaan, a.tanggal_pengisian_formulir, a.id_licom, a.level, a.foto, b.nama_licom FROM tbl_jemaat a JOIN tbl_licom b ON a.id_licom=b.id_licom where a.id_jemaat='$id_jemaat'"); // jika tidak ada filter maka tampilkan semua entri
                    $hasil_data = mysqli_fetch_assoc($sql);// fetch query yang sesuai ke dalam array
                    ?><thead>
                            <tr>
                                <th colspan="2"><center><img src="././<?php echo $hasil_data["foto"]; ?>" width="150" height="175"></center></th>
                            </tr>
                            <tr>
                                <th>Tempat & Tanggal Lahir</th>
                                <th>:&emsp;<?=$hasil_data['tempat_lahir'];?>, <?php echo tgl_indo($hasil_data['tgl_lahir']); ?></th>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <th>:&emsp;<?=$hasil_data['jenis_kelamin'];?></th>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <th>:&emsp;<?=$hasil_data['alamat'];?></th>
                            </tr>
                            <tr>
                                <th>No. Telpon HP</th>
                                <th>:&emsp;<?=$hasil_data['no_telp_hp'];?></th>
                            </tr>
                            <tr>
                                <th>No. Telepon Rumah</th>
                                <th>:&emsp;<?=$hasil_data['no_telp_rumah'];?></th>
                            </tr>
                            <tr>
                                <th>No. Telepon Kantor</th>
                                <th>:&emsp;<?=$hasil_data['no_telp_kantor'];?></th>
                            </tr>
                            <tr>
                                <th>Status Keluarga</th>
                                <th>:&emsp;<?=$hasil_data['status_keluarga'];?></th>
                            </tr>
                            <tr>
                                <th>Status Pernikahan</th>
                                <th>:&emsp;<?=$hasil_data['status_pernikahan'];?></th>
                            </tr>
                            <tr>
                                <th>Tempat Pernikahan</th>
                                <th>:&emsp;<?=$hasil_data['tempat_menikah'];?></th>
                            </tr>
                            <tr>
                                <th>Tanggal Pernikahan</th>
                                <th>:&emsp;<?php echo tgl_indo($hasil_data['tgl_pernikahan']); ?></th>
                            </tr>
                            <tr>
                                <th>Nama Pasangan</th>
                                <th>:&emsp;<?=$hasil_data['nama_pasangan'];?></th>
                            </tr>
                            <tr>
                                <th>Anak Ke 1</th>
                                <th>:&emsp;<?=$hasil_data['anak_ke_1'];?></th>
                            </tr>
                            <tr>
                                <th>Anak Ke 2</th>
                                <th>:&emsp;<?=$hasil_data['anak_ke_2'];?></th>
                            </tr>
                            <tr>
                                <th>Anak Ke 2</th>
                                <th>:&emsp;<?=$hasil_data['anak_ke_2'];?></th>
                            </tr>
                            <tr>
                                <th>Anak Ke 2</th>
                                <th>:&emsp;<?=$hasil_data['anak_ke_2'];?></th>
                            </tr>
                            <tr>
                                <th>Ayah</th>
                                <th>:&emsp;<?=$hasil_data['ayah'];?></th>
                            </tr>
                            <tr>
                                <th>Ibu</th>
                                <th>:&emsp;<?=$hasil_data['ibu'];?></th>
                            </tr>
                            <tr>
                                <th>Tanggal Baptis</th>
                                <th>:&emsp;<?php echo tgl_indo($hasil_data['tgl_baptis']); ?></th>
                            </tr>
                            <tr>
                                <th>Tempat Baptis</th>
                                <th>:&emsp;<?=$hasil_data['tempat_baptis'];?></th>
                            </tr>
                            <tr>
                                <th>Pendeta</th>
                                <th>:&emsp;<?=$hasil_data['pendeta'];?></th>
                            </tr>
                            <tr>
                                <th>Golongan Darah</th>
                                <th>:&emsp;<?=$hasil_data['golongan_darah'];?></th>
                            </tr>
                            <tr>
                                <th>Pendidikan Terakhir</th>
                                <th>:&emsp;<?=$hasil_data['pendidikan_terakhir'];?></th>
                            </tr>
                            <tr>
                                <th>Keahlian</th>
                                <th>:&emsp;<?=$hasil_data['keahlian'];?></th>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <th>:&emsp;<?=$hasil_data['pekerjaan'];?></th>
                            </tr>
                            <tr>
                                <th>Tanggal Pengisian Formulir</th>
                                <th>:&emsp;<?php echo tgl_indo($hasil_data['tanggal_pengisian_formulir']); ?></th>
                            </tr>
                            <tr>
                                <th>Nama Licom</th>
                                <th>:&emsp;<?=$hasil_data['nama_licom'];?></th>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <th>:&emsp;<?=$hasil_data['level'];?></th>
                            </tr>
                            </thead>
                                </table>
                            </div>
                            <!-- /.table-responsive -->


        
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
            <!-- /.row -->
    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("include/footer.php"); ?>