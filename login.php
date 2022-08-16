<?php
require_once "_config/config.php";
// melakukan verifikasi user apakah sudah login atau belum, jika sudah arahkan ke halaman index user
if (isset($_SESSION['login'])) {
  echo "
          <script>
              alert('Anda Telah Login');
              window.location='" . base_url('index') . "';
          </script>            
      ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="SI-Pegawai">
  <meta name="author" content="Azlan">

  <!-- favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset("_assets/img/mtsn.png") ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= asset("_assets/img/mtsn.png") ?>">

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="_assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9" style="margin-top: 50px !important;">
        <div class="card o-hidden border-0" style="text-align: center;">
            <br>
            <h4>Sistem Informasi Pegawai</h4>
            <h1 class="text-gray-900 font-weight-bold">MTsN 2 Tanah Datar</h1>
            <br>
        </div>
        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 20px !important;">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="<?= asset('_assets/img/mtsn2td.jpeg') ?>" class="ml-n5" alt="login" height="100%" width="115%"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-gray-900 font-weight-bold" >Login</h1>
                    <br>
                  </div>
                  <form class="user" method="POST" action="<?= base_url('_config/proses_log') ?>?login">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" autocomplete="off" autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="_assets/vendor/jquery/jquery.min.js"></script>
  <script src="_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="_assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="_assets/js/sb-admin-2.min.js"></script>

</body>

</html>