<?php
include "includes/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>APP</title>

    <!-- Bootstrap Core CSS -->
    <link href="./bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="includes/user.php" id="login-validation" class="center-margin" method="POST">

<?php 
    if(isset($_GET['action'])){
        if($_GET['action'] == "failed"){
            echo "<div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Username Atau Password Salah!
            </div>";
        }else if($_GET['action'] == "masuk-dulu"){
            echo "<div class='alert alert-info alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Anda harus masuk dahulu!
            </div>";
        }else if($_GET['action'] == "logout"){
            echo "<div class='alert alert-success alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            Anda telah berhasil logout.
            </div>";
        }
    }
    ?>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="Username" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="Password" type="password" required>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="./bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./dist/js/sb-admin-2.js"></script>


</body>
</html>
