<?php
include('login.php'); // Memasuk-kan skrip Login 

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-PBM</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="assets/angular/img/favicon.png">
    <link rel="stylesheet" href="assets/angular/bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="assets/angular/css/style.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/angular/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/angular/dist/css/skins/_all-skins.min.css">
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="index.php" class="navbar-brand"><img src="assets/pure/image/LogoEpbm.png" alt="" width="80%"></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php"><h5>Home </h5></a></li>
                <!--<li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">PBM <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Semester 1</a></li>
                    <li><a href="#">Semester 2</a></li>
                    <li><a href="#">Semester 3</a></li>
                    <li><a href="#">Semester 4</a></li>
                    <li><a href="#">Semester 5</a></li>
                    <li><a href="#">Semester 6</a></li>
                    <li><a href="#">Semester 7</a></li>
                    <li><a href="#">Semester 8</a></li>
                  </ul>
                </li>-->
                <li><a href="about.php"><h5>About </h5></a></li>
              </ul>
              <!--<form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                </div>
              </form>-->
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><h5>Login <span class="caret"></span></h5></a>
                    <ul class="dropdown-menu">
                      <!--<li class="user-header">
                        <img src="assets/angular/dist/img/Photo Nov 01, 6 56 17 PM.jpg" class="img-circle" alt="User Image">
                        <p>
                          Fran Bow - Web Developer
                          <small></small>
                        </p>
                      </li>
                      <li class="user-footer">
                        <div class="pull-left">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                        </div>
                        <div class="pull-right">
                          <a href="#" class="btn btn-default btn-flat">Sign out</a>
                        </div>
                      </li>-->
                      <form action="" method="post" class="form-signin user-footer">						
          						<label>NIP :</label>
          						<input name="nip" placeholder="NIP" type="text" class="form-control">
          						<label style="padding-top: 5px;">Password :</label>
          						<input name="password" placeholder="**********" type="password" class="form-control">
          						<label style="padding-top: 5px;"></label>
          						<input type="submit" name="submit" id="submit" value="Sign in" class="btn btn-lg btn-primary btn-block">
          					  </form>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              <center>
                <font color="white"><h2>Universitas Airlangga</h2></font><br>
                <img src="assets/angular/img/logo-unair.png" alt="" height="15%" width="15%"><center><br>
              <font color="white"><h2>Sistem Informasi Proses Belajar Mengajar</h2></font>
              <small></small>
            </h1><br>

            <div class="register-box">
              <div class="register-box-body">
                <p class="login-box-msg">Have you already registered? If not, please fill out the form below.</p>
                      <?php
                         if(isset($_POST['simpan'])) {
                            $dbhost = 'localhost';
                            $dbuser = 'root';
                            $dbpass = '';
                            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                            
                            if(! $conn ) {
                               die('Could not connect: ' . mysql_error());
                            }
                            
                            
                            $name = $_POST['name'];
                            $nip = $_POST['nip'];
                            $pass = $_POST['pass'];

                            $message = "Entered data successfully";
                            
                            $sql = "INSERT INTO dosen ". "(NIP,NAMA,PASSWORD) ". "VALUES('$nip','$name','$pass')";
                               
                            mysql_select_db('pbm');
                            $retval = mysql_query( $sql, $conn );
                            
                            if(! $retval ) {
                               die('Could not enter data: ' . mysql_error());
                            }
                            
                            echo "<script type='text/javascript'>alert('$message');window.location = 'http://localhost:8081/pbm2/dosen/vformbacaan.php';</script>";
                            
                            mysql_close($conn);
                         }else {
                      ?>
                <form action="<?php $_PHP_SELF ?>" method="post">
                  <div class="form-group has-feedback">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Full name">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="text" id="nip" name="nip" class="form-control" placeholder="NIP">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  </div>
                  <div class="form-group has-feedback">
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  </div>
                  <!-- <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Retype password">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                  </div> -->
                  <div class="row">
                    <div class="col-xs-4">
                      <button type="submit" id="simpan" name="simpan" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div><!-- /.col -->
                    <div class="col-xs-8">
                      <a href="signin.php" class="text-center">I already have a membership</a>
                    </div><!-- /.col -->
                  </div>
                </form>
                      <?php
                         }
                      ?>
              </div><!-- /.form-box -->
            </div><!-- /.register-box -->
          </section>
        </div><!-- /.container -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="container">
          <div class="pull-right hidden-xs">
            <b>MZRP.105</b>
          </div>
          <strong>Copyright &copy; 2016.</strong> All rights reserved.
        </div><!-- /.container -->
      </footer>
    </div><!-- ./wrapper -->

    <script src="assets/angular/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="assets/angular/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/angular/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="assets/angular/plugins/fastclick/fastclick.min.js"></script>
    <script src="assets/angular/dist/js/app.min.js"></script>
    <script src="assets/angular/dist/js/demo.js"></script>
  </body>
</html>
