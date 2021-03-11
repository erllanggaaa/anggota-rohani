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

    <title>ADMINISTRATOR APP</title>

<?php include("include/css.php"); ?>

<script src="../admin/js/Chart.js"></script>
<style type="text/css">
            .container {
                width: 30%;
                margin: 20px auto;
            }

    </style>

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
                    <h1 class="page-header">Dashboard </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
    <?php
        $query = mysqli_query($konek,"SELECT * FROM tbl_jemaat");
        $count = mysqli_num_rows($query);
        echo $count;
        ?>
                                    </div>
                                    <div>
                                        Total Jemaat</div>
                                </div>
                            </div>
                        </div>
                        <a href="././Data-Jemaat">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Jumlah Jemaat Berdasarkan Licom
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body container">
                            <canvas id="barchart" width="100" height="100"></canvas>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

<?php
    $jemaat  = mysqli_query($konek, "SELECT a.id_jemaat, a.id_licom, b.nama_licom FROM tbl_jemaat a JOIN tbl_licom b ON a.id_licom=b.id_licom GROUP BY b.id_licom asc");
    $jemaat2  = mysqli_query($konek, "SELECT count(id_jemaat) as jumlah FROM tbl_jemaat GROUP BY id_licom");
?>
<script  type="text/javascript">
  var ctx = document.getElementById("barchart").getContext("2d");
  var data = {
            labels: [<?php while ($x = mysqli_fetch_array($jemaat)) { echo '"' . $x['nama_licom'] . '",';}?>],
            datasets: [
            {
              label: "Jumlah Jemaat",
              data: [<?php while ($p = mysqli_fetch_array($jemaat2)) { echo '"' . $p['jumlah'] . '",';}?>],
              backgroundColor: [
                '#29B0D0',
                '#2A516E',
                '#F07124',
                '#CBE0E3',
                '#979193'
              ]
            }
            ]
            };

  var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
            legend: {
              display: false
            },
            barValueSpacing: 20,
            scales: {
              yAxes: [{
                  ticks: {
                      min: 0,
                  }
              }],
              xAxes: [{
                          gridLines: {
                              color: "rgba(0, 0, 0, 0)",
                          }
                      }]
              }
          }
        });
</script>


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