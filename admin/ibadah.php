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

    <title>ADMINISTRATOR APP - IBADAH</title>

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
                    <h1 class="page-header">Data Ibadah</h1>
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
                                            <th>Tanggal</th>
                                            <th>Jenis Ibadah</th>
                                            <th>Tempat Ibadah</th>
                                            <th>Pengkotbah</th>
                                            <th>Judul Kotbah</th>
                                            <th>Jumlah Jemaat</th>
                                            <th>Jumlah Persembahan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
        $ibadah = mysqli_query ($konek, "SELECT * FROM tbl_ibadah WHERE id_ibadah ORDER by id_ibadah DESC");
            if($ibadah == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasil = mysqli_fetch_array ($ibadah)){                            
                            ?>
                                <tr>
                                    <td><?php echo tgl_indo($hasil['tanggal']); ?></td>
                                    <td><?=$hasil['jenis_ibadah'];?></td>
                                    <td><?=$hasil['tempat_ibadah'];?></td>
                                    <td><?=$hasil['pengkotbah'];?></td>
                                    <td><?=$hasil['judul_kotbah'];?></td>
                                    <td><?=$hasil['jumlah_jemaat'];?></td>
                                    <td><?=$hasil['jumlah_persembahan'];?></td>
                                    <td><a href="Ubah-Ibadah?id_ibadah=<?=$hasil['id_ibadah'];?>" title="Ubah"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                        <a href="Delete-Ibadah?id_ibadah=<?=$hasil['id_ibadah'];?>" title="Hapus" onclick="return confirm(\'Anda yakin akan menghapus <?=$hasil['id_ibadah'];?>?\')"><span class="fa fa-trash" aria-hidden="true"></span></a>
                    </td>
                                </tr>
                                <?php
                        }
                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
</div>
</div>


                            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Data Tempat Ibadah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <button class="btn btn-info btn-md" data-toggle="modal" data-target="#ModalAdd2">
                        <i class="glyph-icon icon-plus"> Tambah Data</i>
                        </button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                    <thead>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>Kontak Person</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
        $lokasi_ibadah = mysqli_query ($konek, "SELECT * FROM tbl_lokasi_ibadah WHERE id_lokasi_ibadah ORDER by id_lokasi_ibadah DESC");
            if($lokasi_ibadah == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasilibadah = mysqli_fetch_array ($lokasi_ibadah)){                            
                            ?>
                                <tr>
                                    <td><?=$hasilibadah['alamat_lokasi'];?></td>
                                    <td><?=$hasilibadah['contact_person'];?></td>
                                    <td><a href="Ubah-Tempat-Ibadah?id_lokasi_ibadah=<?=$hasilibadah['id_lokasi_ibadah'];?>" title="Ubah"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                        <a href="Delete-Tempat-Ibadah?id_lokasi_ibadah=<?=$hasilibadah['id_lokasi_ibadah'];?>" title="Hapus" onclick="return confirm(\'Anda yakin akan menghapus <?=$hasilibadah['alamat_lokasi'];?>?\')"><span class="fa fa-trash" aria-hidden="true"></span></a>
                    </td>
                                </tr>
                                <?php
                        }
                    ?>
                                    </tbody>
                                </table>
                            </div>
</div>
</div>

        <!-- Modal Popup Tambah Ibadah -->
        <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="glyph-icon icon-plus"> <strong>Tambah Data Ibadah</strong></i></h4>
                    </div>
                    <div class="modal-body">
                        <form action="Tambah-Ibadah" name="modal_popup" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Tanggal <font color="red">*</font></label>
                                    <div class="input-group">
                                      <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="tanggal" class="form-control date" placeholder="Tanggal" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Ibadah <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-building-o"></i>
                                        </div>
                                        <select name="jenis_ibadah" class="form-control" onfocus="doComboFocus(this)" required>
                                            <option selected disabled="disabled" value="">--</option>
                                            <option value="Ibadah Minggu">Ibadah Minggu</option>
                                            <option value="Ulang Tahun">Ulang Tahun</option>
                                            <option value="Natal">Natal</option>
                                            <option value="Tutup Tahun">Tutup Tahun</option>
                                        </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Ibadah <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <select name="tempat_ibadah" class="form-control" required>
                        <?php
$x="select * from tbl_lokasi_ibadah where id_lokasi_ibadah";
$y=mysqli_query($konek,$x);
while($z=mysqli_fetch_array($y)){
$pilih = ($z['alamat_lokasi']==$l['alamat_lokasi'])?"selected" : "";
echo "<option value=\"$z[alamat_lokasi]\" $pilih>$z[alamat_lokasi]</option>";
}
?>
                    </select>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Pengkotbah <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-male"></i>
                                        </div>
                                        <input name="pengkotbah" type="text" class="form-control" placeholder="Pengkotbah" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Judul Kotbah <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <input name="judul_kotbah" type="text" class="form-control" placeholder="Judul Kotbah" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Jemaat <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-group"></i>
                                        </div>
                                        <input name="jumlah_jemaat" type="text" class="form-control" placeholder="Jumlah Jemaat" onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Persembahan <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-group"></i>
                                        </div>
                                        <input name="jumlah_persembahan" type="text" class="form-control" placeholder="Jumlah Persembahan" onkeypress="return hanyaAngka(event)" required/>
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





        <!-- Modal Popup Tambah Tempat Ibadah -->
        <div id="ModalAdd2" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="glyph-icon icon-plus"> <strong>Tambah Data Tempat Ibadah</strong></i></h4>
                    </div>
                    <div class="modal-body">
                        <form action="Tambah-Tempat-Ibadah" name="modal_popup" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Alamat <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <textarea name="alamat_lokasi" rows="3" class="form-control textarea-sm" placeholder="Alamat" required></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Contact Person <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-tty"></i>
                                        </div>
                                        <input name="contact_person" minLength="10" maxLength="15" type="text" class="form-control" placeholder="Contact Person" onkeypress="return hanyaAngka(event)" required/>
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