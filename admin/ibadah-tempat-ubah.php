<?php
session_start();
include "../includes/koneksi.php";
include "include/auth_user.php";

$id_jemaat=$_SESSION["id_jemaat"];
$nama_jemaat=$_SESSION["nama_jemaat"];
$id_licom=$_SESSION["id_licom"];
$level=$_SESSION["level"];

date_default_timezone_set('Asia/Jakarta');

$querytampilibadah = mysqli_query($konek, "SELECT * FROM tbl_lokasi_ibadah WHERE id_lokasi_ibadah = '".$_GET['id_lokasi_ibadah']."'");
if($querytampilibadah == false){
    die ("Terjadi Kesalahan : ". mysqli_error($konek));
}
$hasilibadah = mysqli_fetch_array($querytampilibadah);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADMINISTRATOR APP - TEMPAT IBADAH</title>

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
                    <h1 class="page-header">Ubah Data Tempat Ibadah</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="././Data-Ibadah"><font color="white">
                        <button class="btn btn-info btn-md">
                        <i class="glyphicon glyphicon-backward"> Kembali</i>
                        </font>
                        </a>
                        </button>
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="Proses-Ubah-Tempat-Ibadah" enctype="multipart/form-data" method="post">
                                    <div class="form-group">
                                <label>ID</label><br>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-circle-o"></i>
                                        </div>
                                        <input name="id_lokasi_ibadah" class="form-control" size="10" value="<?php echo $hasilibadah["id_lokasi_ibadah"]; ?>" readonly />
                                    </div>
                                </div>
                                        <div class="form-group">
                                <label>Alamat <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-map-marker"></i>
                                        </div>
                                        <textarea name="alamat_lokasi" rows="3" class="form-control textarea-sm" placeholder="Alamat" required><?php echo $hasilibadah["alamat_lokasi"]; ?></textarea>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Contact Person <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-tty"></i>
                                        </div>
                                        <input name="contact_person" minLength="10" maxLength="15" type="text" class="form-control" placeholder="Contact Person" value="<?php echo $hasilibadah["contact_person"]; ?>" onkeypress="return hanyaAngka(event)" required/>
                                    </div>
                            </div>
                                <p align="right">
                                <button class="btn btn-primary" type="submit">
                                    Simpan
                                </button>
                                <button type="reset" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">
                                    Batal
                                </button>
                            </p>
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