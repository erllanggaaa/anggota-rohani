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
                    <h1 class="page-header">Cetak Data Jemaat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="cetak-semua.php" target="_blank"><button class="btn btn-info btn-md">
                        <i class="glyph-icon icon-plus"> Cetak Semua</i>
                        </button>
                        </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Licom</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
        $jemaat = mysqli_query ($konek, "SELECT a.id_jemaat, a.nama_jemaat, a.alamat, a.id_licom, b.nama_licom FROM tbl_jemaat a JOIN tbl_licom b ON a.id_licom=b.id_licom WHERE a.id_jemaat ORDER by a.id_jemaat DESC");
            if($jemaat == false){
                  die ("Terjadi Kesalahan : ". mysqli_error($konek));
                    }
                while ($hasil = mysqli_fetch_array ($jemaat)){                            
                            ?>
                                <tr>
                                    <td><?=$hasil['nama_jemaat'];?></td>
                                    <td><?=$hasil['alamat'];?></td>
                                    <td><?=$hasil['nama_licom'];?></td>
                                    <td><a href="cetak-by-name.php?nama_jemaat=<?=$hasil['nama_jemaat'];?>" title="Cetak"><i class="fa fa-print" aria-hidden="true"></i></a>
                    </td>
                                </tr>
                                <?php
                        }
                    ?>
                                    </tbody>
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