<?php
session_start();
include "../includes/koneksi.php";
include "include/auth_user.php";

$id_jemaat=$_SESSION["id_jemaat"];
$nama_jemaat=$_SESSION["nama_jemaat"];
$level=$_SESSION["level"];

date_default_timezone_set('Asia/Jakarta');

$querytampiljemaat = mysqli_query($konek, "SELECT * FROM tbl_jemaat WHERE id_jemaat = '".$_GET['id_jemaat']."'");
if($querytampiljemaat == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$hasiljemaat = mysqli_fetch_array($querytampiljemaat);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMINISTRATOR APP - JEMAAT [UBAH : <?php echo $hasiljemaat["nama_jemaat"]; ?>]</title>

<?php include("include/css.php"); ?>

<link rel="stylesheet" href="../aset/assets/picker.css">
<script src="../aset/assets/slim.js"></script>
<script src="../aset/assets/picker.js"></script>

<script>
        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }
    </script>

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
                    <h1 class="page-header">Ubah Data Jemaat : <?php echo $hasiljemaat["nama_jemaat"]; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="././Data-Jemaat"><font color="white">
                        <button class="btn btn-info btn-md">
                        <i class="glyphicon glyphicon-backward"> Kembali</i>
                        </font>
                        </a>
                        </button>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12"><center>
                                <img src="../admin/<?php echo $hasiljemaat["foto"]; ?>" width="150" height="175">
                            </center><br></div>
                                <div class="col-lg-6">
                                    <form action="Proses-Ubah-Jemaat" enctype="multipart/form-data" method="post">
                                    <div class="form-group">
                                <label>ID</label><br>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-circle-o"></i>
                                        </div>
                                        <input name="id_jemaat" class="form-control" size="10" value="<?php echo $hasiljemaat["id_jemaat"]; ?>" readonly />
                                    </div>
                                </div>
                                        <div class="form-group">
                                <label>Nama <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="nama_jemaat" type="text" class="form-control" placeholder="Nama" value="<?php echo $hasiljemaat["nama_jemaat"]; ?>" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $hasiljemaat["tempat_lahir"]; ?>" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir <font color="red">*</font></label>
                                    <div class="input-group">
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tgl_lahir" class="form-control date" placeholder="Tanggal Lahir" value="<?php echo $hasiljemaat["tgl_lahir"]; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-grain"></i>
                                    </div>
                                        <select name="jenis_kelamin" class="form-control" required>
                                        <?php
                                            if($hasiljemaat["jenis_kelamin"] == 'Laki-Laki'){
                                                echo "<option selected value='Laki-Laki'>Laki-Laki</option>
                                                    <option value='Perempuan'>Perempuan</option>";
                                            }else if($hasiljemaat["jenis_kelamin"] == 'Perempuan'){
                                                echo "<option selected value='Perempuan'>Perempuan</option>
                                                <option value='Laki-Laki'>Laki-Laki</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <textarea name="alamat" rows="3" class="form-control textarea-sm" placeholder="Alamat" required><?php echo $hasiljemaat["alamat"]; ?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon Handphone <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input name="no_telp_hp" minLength="8" maxLength="13" type="text" class="form-control" placeholder="No. Telepon Handphone" value="<?php echo $hasiljemaat["no_telp_hp"]; ?>" onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon Rumah</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-tty"></i>
                                        </div>
                                        <input name="no_telp_rumah" minLength="8" maxLength="15" type="text" class="form-control" placeholder="No. Telepon Rumah" value="<?php echo $hasiljemaat["no_telp_rumah"]; ?>" onkeypress="return hanyaAngka(event)"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon Kantor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone-square"></i>
                                        </div>
                                        <input name="no_telp_kantor" minLength="8" maxLength="15" type="text" class="form-control" placeholder="No. Telepon Kantor" value="<?php echo $hasiljemaat["no_telp_kantor"]; ?>" onkeypress="return hanyaAngka(event)"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Status Dalam Keluarga <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-group"></i>
                                    </div>
                                        <select name="status_keluarga" class="form-control" required>
                                        <?php
                                            if($hasiljemaat["status_keluarga"] == 'Suami'){
                                                echo "<option selected value='Suami'>Suami</option>
                                                    <option value='Istri'>Istri</option>
                                                    <option value='Anak'>Anak</option>";
                                            }else if($hasiljemaat["status_keluarga"] == 'Istri'){
                                                echo "<option selected value='Istri'>Istri</option>
                                                <option value='Anak'>Anak</option>
                                                <option value='Suami'>Suami</option>";
                                            }else if($hasiljemaat["status_keluarga"] == 'Anak'){
                                                echo "<option selected value='Anak'>Anak</option>
                                                <option value='Suami'>Suami</option>
                                                <option value='Istri'>Istri</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Status Pernikahan <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                        <select name="status_pernikahan" class="form-control" required>
                                        <?php
                                            if($hasiljemaat["status_pernikahan"] == 'Belum Menikah'){
                                                echo "<option selected value='Belum Menikah'>Belum Menikah</option>
                                                    <option value='Menikah'>Menikah</option>
                                                    <option value='Janda'>Janda</option>
                                                    <option value='Duda'>Duda</option>";
                                            }else if($hasiljemaat["status_pernikahan"] == 'Menikah'){
                                                echo "<option selected value='Menikah'>Menikah</option>
                                                <option value='Janda'>Janda</option>
                                                <option value='Duda'>Duda</option>
                                                <option value='Belum Menikah'>Belum Menikah</option>";
                                            }else if($hasiljemaat["status_pernikahan"] == 'Janda'){
                                                echo "<option selected value='Janda'>Janda</option>
                                                <option value='Duda'>Duda</option>
                                                <option value='Belum Menikah'>Belum Menikah</option>
                                                <option value='Menikah'>Menikah</option>";
                                            }else if($hasiljemaat["status_pernikahan"] == 'Duda'){
                                                echo "<option selected value='Duda'>Duda</option>
                                                <option value='Belum Menikah'>Belum Menikah</option>
                                                <option value='Menikah'>Menikah</option>
                                                <option value='Janda'>Janda</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Menikah</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-thumb-tack"></i>
                                        </div>
                                        <textarea name="tempat_menikah" rows="3" class="form-control textarea-sm" placeholder="Tempat Menikah"><?php echo $hasiljemaat["tempat_menikah"]; ?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pernikahan</label>
                                    <div class="input-group">
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tgl_pernikahan" class="form-control date" placeholder="Tanggal Pernikahan" value="<?php echo $hasiljemaat["tgl_pernikahan"]; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pasangan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="nama_pasangan" type="text" class="form-control" placeholder="Nama Pasangan" value="<?php echo $hasiljemaat["nama_pasangan"]; ?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Anak Ke 1</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_1" type="text" class="form-control" placeholder="Anak Ke 1" value="<?php echo $hasiljemaat["anak_ke_1"]; ?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Anak Ke 2</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_2" type="text" class="form-control" placeholder="Anak Ke 2" value="<?php echo $hasiljemaat["anak_ke_2"]; ?>"/>
                                    </div>
                            </div>
                        </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                <label>Anak Ke 3</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_3" type="text" class="form-control" placeholder="Anak Ke 3" value="<?php echo $hasiljemaat["anak_ke_3"]; ?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Anak Ke 4</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_4" type="text" class="form-control" placeholder="Anak Ke 4" value="<?php echo $hasiljemaat["anak_ke_4"]; ?>"/>
                                    </div>
                            </div>
                                    <div class="form-group">
                                <label>Nama Ayah <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <input name="ayah" type="text" class="form-control" placeholder="Nama Ayah" value="<?php echo $hasiljemaat["ayah"]; ?>" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Ibu <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-female"></i>
                                        </div>
                                        <input name="ibu" type="text" class="form-control" placeholder="Nama Ibu" value="<?php echo $hasiljemaat["ibu"]; ?>" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Baptis <font color="red">*</font></label>
                                    <div class="input-group">
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tgl_baptis" class="form-control date" placeholder="Tanggal Baptis" value="<?php echo $hasiljemaat["tgl_baptis"]; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Baptis <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-pushpin"></i>
                                        </div>
                                        <textarea name="tempat_baptis" rows="3" class="form-control textarea-sm" placeholder="Tempat Baptis"><?php echo $hasiljemaat["tempat_baptis"]; ?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pendeta <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </div>
                                        <input name="pendeta" type="text" class="form-control" placeholder="Nama Pendeta" value="<?php echo $hasiljemaat["pendeta"]; ?>" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-tent"></i>
                                    </div>
                                        <select name="golongan_darah" class="form-control" required>
                                        <?php
                                            if($hasiljemaat["golongan_darah"] == 'A'){
                                                echo "<option selected value='A'>A</option>
                                                    <option value='B'>B</option>
                                                    <option value='AB'>AB</option>
                                                    <option value='O'>O</option>";
                                            }else if($hasiljemaat["golongan_darah"] == 'B'){
                                                echo "<option selected value='B'>B</option>
                                                <option value='AB'>AB</option>
                                                <option value='O'>O</option>
                                                <option value='A'>A</option>";
                                            }else if($hasiljemaat["golongan_darah"] == 'AB'){
                                                echo "<option selected value='AB'>AB</option>
                                                <option value='O'>O</option>
                                                <option value='A'>A</option>
                                                <option value='B'>B</option>";
                                            }else if($hasiljemaat["golongan_darah"] == 'O'){
                                                echo "<option selected value='O'>O</option>
                                                <option value='A'>A</option>
                                                <option value='B'>B</option>
                                                <option value='AB'>AB</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-university"></i>
                                    </div>
                                        <select name="pendidikan_terakhir" class="form-control" required>
                                        <?php
                                            if($hasiljemaat["pendidikan_terakhir"] == 'S3'){
                                                echo "<option selected value='S3'>S3</option>
                                                    <option value='S2'>S2</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='SMK'>SMK</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SD'>SD</option>";
                                            }else if($hasiljemaat["pendidikan_terakhir"] == 'S2'){
                                                echo "<option selected value='S2'>S2</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='SMK'>SMK</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='S3'>S3</option>";
                                            }else if($hasiljemaat["pendidikan_terakhir"] == 'S1'){
                                                echo "<option selected value='S1'>S1</option>
                                                    <option value='SMK'>SMK</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='S3'>S3</option>
                                                    <option value='S2'>S2</option>";
                                            }else if($hasiljemaat["pendidikan_terakhir"] == 'SMK'){
                                                echo "<option selected value='SMK'>SMK</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='S3'>S3</option>
                                                    <option value='S2'>S2</option>
                                                    <option value='S1'>S1</option>";
                                            }else if($hasiljemaat["pendidikan_terakhir"] == 'SMA'){
                                                echo "<option selected value='SMA'>SMA</option>
                                                    <option value='SMP'>SMP</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='S3'>S3</option>
                                                    <option value='S2'>S2</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='SMK'>SMK</option>";
                                            }else if($hasiljemaat["pendidikan_terakhir"] == 'SMP'){
                                                echo "<option selected value='SMP'>SMP</option>
                                                    <option value='SD'>SD</option>
                                                    <option value='S3'>S3</option>
                                                    <option value='S2'>S2</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='SMK'>SMK</option>
                                                    <option value='SMA'>SMA</option>";
                                            }else if($hasiljemaat["pendidikan_terakhir"] == 'SD'){
                                                echo "<option selected value='SD'>SD</option>
                                                    <option value='S3'>S3</option>
                                                    <option value='S2'>S2</option>
                                                    <option value='S1'>S1</option>
                                                    <option value='SMK'>SMK</option>
                                                    <option value='SMA'>SMA</option>
                                                    <option value='SMP'>SMP</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Bidang Ilmu/Keahlian <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-code-fork"></i>
                                        </div>
                                        <input name="keahlian" type="text" class="form-control" placeholder="Bidang Ilmu/Keahlian" value="<?php echo $hasiljemaat["keahlian"]; ?>" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                        <select name="pekerjaan" class="form-control" required>
                                        <?php
                                            if($hasiljemaat["pekerjaan"] == 'PNS/Pegawai BUMN'){
                                                echo "<option selected value='PNS/Pegawai BUMN'>PNS/Pegawai BUMN</option>
                                                    <option value='Pekerja Swasta'>Pekerja Swasta</option>
                                                    <option value='Dokter'>Dokter</option>
                                                    <option value='Tentara/Polisi'>Tentara/Polisi</option>
                                                    <option value='Tidak Bekerja'>Tidak Bekerja</option>";
                                            }else if($hasiljemaat["pekerjaan"] == 'Pekerja Swasta'){
                                                echo "<option selected value='Pekerja Swasta'>Pekerja Swasta</option>
                                                    <option value='Dokter'>Dokter</option>
                                                    <option value='Tentara/Polisi'>Tentara/Polisi</option>
                                                    <option value='Tidak Bekerja'>Tidak Bekerja</option>
                                                    <option value='PNS/Pegawai BUMN'>PNS/Pegawai BUMN</option>";
                                            }else if($hasiljemaat["pekerjaan"] == 'Dokter'){
                                                echo "<option selected value='Dokter'>Dokter</option>
                                                    <option value='Tentara/Polisi'>Tentara/Polisi</option>
                                                    <option value='Tidak Bekerja'>Tidak Bekerja</option>
                                                    <option value='PNS/Pegawai BUMN'>PNS/Pegawai BUMN</option>
                                                    <option value='Pekerja Swasta'>Pekerja Swasta</option>";
                                            }else if($hasiljemaat["pekerjaan"] == 'Tentara/Polisi'){
                                                echo "<option selected value='Tentara/Polisi'>Tentara/Polisi</option>
                                                    <option value='Tidak Bekerja'>Tidak Bekerja</option>
                                                    <option value='PNS/Pegawai BUMN'>PNS/Pegawai BUMN</option>
                                                    <option value='Pekerja Swasta'>Pekerja Swasta</option>
                                                    <option value='Dokter'>Dokter</option>";
                                            }else if($hasiljemaat["pekerjaan"] == 'Tidak Bekerja'){
                                                echo "<option selected value='Tidak Bekerja'>Tidak Bekerja</option>
                                                    <option value='PNS/Pegawai BUMN'>PNS/Pegawai BUMN</option>
                                                    <option value='Pekerja Swasta'>Pekerja Swasta</option>
                                                    <option value='Dokter'>Dokter</option>
                                                    <option value='Tentara/Polisi'>Tentara/Polisi</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Licom <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-tags"></i>
                                        </div>
                                        <select name="id_licom" class="form-control" required>
                        <?php
$id_licom=$_SESSION["id_licom"];
$x="select * from tbl_licom where id_licom='$id_licom'";
$y=mysqli_query($konek,$x);
while($z=mysqli_fetch_array($y)){
$pilih = ($z['id_licom']==$l['id_licom'])?"selected" : "";
echo "<option value=\"$z[id_licom]\" $pilih>$z[nama_licom]</option>";
}
?>
                    </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Level <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-tasks"></i>
                                        </div>
                                        <select id="level" name="level" class="form-control" onfocus="doComboFocus(this)" required>
                                        <?php
                                            if($hasiljemaat["level"] == 'Anggota'){
                                                echo "<option selected value='Anggota'>Anggota</option>
                                                    <option value='Admin'>Admin</option>
                                                    <option value='Ketua'>Ketua</option>";
                                            }else if($hasiljemaat["level"] == 'Admin'){
                                                echo "<option selected value='Admin'>Admin</option>
                                                <option value='Ketua'>Ketua</option>
                                                <option value='Anggota'>Anggota</option>";
                                            }else if($hasiljemaat["level"] == 'Ketua'){
                                                echo "<option selected value='Ketua'>Ketua</option>
                                                <option value='Anggota'>Anggota</option>
                                                <option value='Admin'>Admin</option>";
                                            }else{
                                                echo "error";
                                            }
                                        ?>
                                        </select>
                                    </div>
                            </div>
                            <div style="display:none;" id="username" class="form-group">
                                <label>Username</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-asterisk"></i>
                                        </div>
                                        <input name="username" type="text" class="form-control" placeholder="Username" value="<?php echo $hasiljemaat["username"]; ?>"/>
                                    </div>
                            </div>
                            <div style="display:none;" id="password" class="form-group">
                                <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-asterisk"></i>
                                        </div>
                                        <input name="password" minlength="6" type="password" class="form-control" placeholder="Password" value="<?php echo $hasiljemaat["dekripsi"]; ?>"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Ubah Foto <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                            </div>
                                </div>
                                <div class="col-lg-12"><center>
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                                <button type="reset" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">
                                    Batal
                                </button>
                            </center></div>
                        </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
            <!-- /.row -->

<script language="JavaScript" type="text/JavaScript">
        $(document).ready(function(){
            $('#level').on('change', function() {
                if ( this.value == 'Anggota')
                {
                    $("#username").hide();
                    $("#password").hide();
                }
                else if ( this.value == 'Admin')
                {
                    $("#username").show();
                    $("#password").show();
                }
                else if ( this.value == 'Ketua')
                {
                    $("#username").show();
                    $("#password").show();
                }
                else
                {
                    
                }
            });
        });
    </script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>
    
    <script type="text/javascript">
     $('.date').datepicker({
            format: 'yyyy-mm-dd'
            
        });
    </script>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("include/footer.php"); ?>