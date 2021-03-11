<?php
session_start();
include "../includes/koneksi.php";
include "include/auth_user.php";

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
                    <h1 class="page-header">Data Jemaat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <button class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalAdd">
                        <i class="glyph-icon icon-plus"> Tambah Data</i>
                        </button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Golongan Darah</th>
                                            <th>Pendidikan Terakhir</th>
                                            <th>Alamat</th>
                                            <th>Licom</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
        $jemaat = mysqli_query ($konek, "SELECT a.id_jemaat, a.nama_jemaat, a.jenis_kelamin, a.golongan_darah, a.pendidikan_terakhir, a.alamat, a.id_licom, b.nama_licom FROM tbl_jemaat a JOIN tbl_licom b ON a.id_licom=b.id_licom WHERE a.id_jemaat ORDER by a.id_jemaat DESC");
            if($jemaat == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasil = mysqli_fetch_array ($jemaat)){                            
                            ?>
                                <tr>
                                    <td><?=$hasil['nama_jemaat'];?></td>
                                    <td><?=$hasil['jenis_kelamin'];?></td>
                                    <td><?=$hasil['golongan_darah'];?></td>
                                    <td><?=$hasil['pendidikan_terakhir'];?></td>
                                    <td><?=$hasil['alamat'];?></td>
                                    <td><?=$hasil['nama_licom'];?></td>
                                    <td><a href="Detail-Jemaat?id_jemaat=<?=$hasil['id_jemaat'];?>" title="Detail"><i class="fa fa-eye" aria-hidden="true"></i></a> |
                                        <a href="Ubah-Jemaat?id_jemaat=<?=$hasil['id_jemaat'];?>" title="Ubah"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                        <a href="Delete-Jemaat?id_jemaat=<?=$hasil['id_jemaat'];?>" title="Hapus" onclick="return confirm(\'Anda yakin akan menghapus <?=$hasil['nama_jemaat'];?>?\')"><span class="fa fa-trash" aria-hidden="true"></span></a>
                    </td>
                                </tr>
                                <?php
                        }
                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->


        <!-- Modal Popup Tambah Jemaat -->
        <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="glyph-icon icon-plus"> <strong>Tambah Data Jemaat</strong></i></h4>
                    </div>
                    <div class="modal-body">
                        <form action="Tambah-Jemaat" name="modal_popup" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Nama <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="nama_jemaat" type="text" class="form-control" placeholder="Nama" required 
                                            oninvalid="this.setCustomValidity('Harus diisi !')"
                                            oninput="setCustomValidity('')"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir <font color="red">*</font></label>
                                    <div class="input-group">
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tgl_lahir" class="form-control date" placeholder="Tanggal Lahir" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-grain"></i>
                                    </div>
                                        <select name="jenis_kelamin" class="form-control" onfocus="doComboFocus(this)" required>
                                            <option selected disabled="disabled" value="">--</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <textarea name="alamat" rows="3" class="form-control textarea-sm" placeholder="Alamat" required></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon Handphone <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input name="no_telp_hp" minLength="8" maxLength="13" type="text" class="form-control" placeholder="No. Telepon Handphone" onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon Rumah</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-tty"></i>
                                        </div>
                                        <input name="no_telp_rumah" minLength="8" maxLength="15" type="text" class="form-control" placeholder="No. Telepon Rumah" onkeypress="return hanyaAngka(event)"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>No. Telepon Kantor</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone-square"></i>
                                        </div>
                                        <input name="no_telp_kantor" minLength="8" maxLength="15" type="text" class="form-control" placeholder="No. Telepon Kantor" onkeypress="return hanyaAngka(event)"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Status Dalam Keluarga <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-group"></i>
                                    </div>
                                        <select name="status_keluarga" class="form-control" onfocus="doComboFocus(this)" required>
                                            <option selected disabled="disabled" value="">--</option>
                                            <option value="Suami">Suami</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Status Pernikahan <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-filter"></i>
                                    </div>
                                        <select name="status_pernikahan" class="form-control" onfocus="doComboFocus(this)" required>
                                            <option selected disabled="disabled" value="">--</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Janda">Janda</option>
                                            <option value="Duda">Duda</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Menikah</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-thumb-tack"></i>
                                        </div>
                                        <textarea name="tempat_menikah" rows="3" class="form-control textarea-sm" placeholder="Tempat Menikah"></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pernikahan</label>
                                    <div class="input-group">
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tgl_pernikahan" class="form-control date" placeholder="Tanggal Pernikahan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pasangan</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="nama_pasangan" type="text" class="form-control" placeholder="Nama Pasangan"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Anak Ke 1</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_1" type="text" class="form-control" placeholder="Anak Ke 1"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Anak Ke 2</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_2" type="text" class="form-control" placeholder="Anak Ke 2"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Anak Ke 3</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_3" type="text" class="form-control" placeholder="Anak Ke 3"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Anak Ke 4</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-child"></i>
                                        </div>
                                        <input name="anak_ke_4" type="text" class="form-control" placeholder="Anak Ke 4"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Ayah <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <input name="ayah" type="text" class="form-control" placeholder="Nama Ayah" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Ibu <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-female"></i>
                                        </div>
                                        <input name="ibu" type="text" class="form-control" placeholder="Nama Ibu" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Baptis <font color="red">*</font></label>
                                    <div class="input-group">
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tgl_baptis" class="form-control date" placeholder="Tanggal Baptis" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Baptis <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-pushpin"></i>
                                        </div>
                                        <textarea name="tempat_baptis" rows="3" class="form-control textarea-sm" placeholder="Tempat Baptis"></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Pendeta <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </div>
                                        <input name="pendeta" type="text" class="form-control" placeholder="Nama Pendeta" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Golongan Darah <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-tent"></i>
                                    </div>
                                        <select name="golongan_darah" class="form-control" onfocus="doComboFocus(this)" required>
                                            <option selected disabled="disabled" value="">--</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Pendidikan Terakhir <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-university"></i>
                                    </div>
                                        <select name="pendidikan_terakhir" class="form-control" onfocus="doComboFocus(this)" required>
                                            <option selected disabled="disabled" value="">--</option>
                                            <option value="S3">S3</option>
                                            <option value="S2">S2</option>
                                            <option value="S1">S1</option>
                                            <option value="SMK">SMK</option>
                                            <option value="SMA">SMA</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SD">SD</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Bidang Ilmu/Keahlian</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-code-fork"></i>
                                        </div>
                                        <input name="keahlian" type="text" class="form-control" placeholder="Bidang Ilmu/Keahlian"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan <font color="red">*</font></label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-briefcase"></i>
                                    </div>
                                        <select name="pekerjaan" class="form-control" onfocus="doComboFocus(this)" required>
                                            <option selected disabled="disabled" value="">--</option>
                                            <option value="PNS/Pegawai BUMN">PNS/Pegawai BUMN</option>
                                            <option value="Pekerja Swasta">Pekerja Swasta</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Tentara/Polisi">Tentara/Polisi</option>
                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
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
$x="select * from tbl_licom where id_licom";
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
                                        <select id="level" name="level" class="form-control" onfocus="doComboFocus(this)" required="">
                                            <option selected disabled="disabled" value="">Pilih Level</option>
                                            <option value="Anggota">Anggota</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Ketua">Ketua</option>
                                        </select>
                                    </div>
                            </div>
                            <div style="display:none;" id="username" class="form-group">
                                <label>Username</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-asterisk"></i>
                                        </div>
                                        <input name="username" type="text" class="form-control" placeholder="Username"/>
                                    </div>
                            </div>
                            <div style="display:none;" id="password" class="form-group">
                                <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="glyphicon glyphicon-asterisk"></i>
                                        </div>
                                        <input name="password" minlength="6" type="password" class="form-control" placeholder="Password"/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Upload Foto <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-image"></i>
                                        </div>
                                        <input type="file" class="form-control" name="foto" required>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                                <button type="reset" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
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