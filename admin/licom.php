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

    <title>ADMINISTRATOR APP - LICOM</title>

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
                    <h1 class="page-header">Data Licom</h1>
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
                                            <th>Nama Licom</th>
                                            <th>Ketua Licom</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
        $licom = mysqli_query ($konek, "SELECT * FROM tbl_licom WHERE id_licom ORDER by id_licom DESC");
            if($licom == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasil = mysqli_fetch_array ($licom)){                            
                            ?>
                                <tr>
                                    <td><?=$hasil['nama_licom'];?></td>
                                    <td><?=$hasil['ketua_licom'];?></td>
                                    <td><?=$hasil['alamat'];?></td>
                                    <td><?=$hasil['no_kontak'];?></td>
                                    <td><a href="Ubah-Licom?id_licom=<?=$hasil['id_licom'];?>" title="Ubah"><i class="fa fa-pencil" aria-hidden="true"></i></a> |
                                        <a href="Delete-Licom?id_licom=<?=$hasil['id_licom'];?>" title="Hapus" onclick="return confirm(\'Anda yakin akan menghapus <?=$hasil['nama_licom'];?>?\')"><span class="fa fa-trash" aria-hidden="true"></span></a>
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
                        <h4 class="modal-title"><i class="glyph-icon icon-plus"> <strong>Tambah Data Licom</strong></i></h4>
                    </div>
                    <div class="modal-body">
                        <form action="Tambah-Licom" name="modal_popup" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label>Nama Licom <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-group"></i>
                                        </div>
                                        <input type="text" name="nama_licom" class="form-control" placeholder="Nama Licom" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label>Ketua Licom <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input name="ketua_licom" type="text" class="form-control" placeholder="Ketua Licom" required/>
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
                                <label>No. Kontak <font color="red">*</font></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-tty"></i>
                                        </div>
                                        <input name="no_kontak" type="text" minLength="10" maxLength="15" class="form-control" placeholder="No. Kontak" onkeypress="return hanyaAngka(event)" required/>
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