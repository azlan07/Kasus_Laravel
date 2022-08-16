<?php

  // jika yang dipanggil user adalah file yang berada didalam subfolder dan memiliki variabel sub, panggil file config yang ada sesuai dengan posisi file di folder
  if (isset($sub)) {
    // memanggil data configurasi dan function dari subfolder
    require_once $sub."_config/config.php";
  }else{
    // memanggil data configurasi dan function
    require_once "_config/config.php";
  }

  // melakukan verifikasi user apakah sudah login atau belum, jika belum arahkan ke halaman login
  if (!isset($_SESSION['login'])) {
    echo "
        <script>
            alert('Silahkan Login Terlebih Dahulu');
            window.location='".base_url('login')."';
        </script>            
    ";
  }

  $id = $_SESSION['id_user'];
  $user = query("SELECT * FROM user WHERE id_user='$id'");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Sistem Informasi Kepegawaian">
  <meta name="author" content="Deddy Rahmat">

  <title>SIMPEG - <?= $nama; ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= asset('_assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= asset('_assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

  <!-- favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= asset("_assets/img/mtsn.png") ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= asset("_assets/img/mtsn.png") ?>">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
  
  <?php
  // jika variabel addstyles sudah ditentukan
  if (isset($addstyles)) {
    // jika variabel addstyles tidak sama dengan null, tampilkan style tambahan
    if ($addstyles != null) {
      echo '<link href="'. asset($addstyles) .'" rel="stylesheet">';
    }
  }
  ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard') ?>">
        <div class="sidebar-brand-text mx-3">MTsN 2 Tanah Datar</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!-- //$data['status_user'] == 'aktif' ? 'selected' :null -->
      <li class="nav-item <?= isset($dashboard) == 'dashboard' ? 'active' : null ?> ">
        <a class="nav-link" href="<?= base_url() ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Data Pegawai -->
      <li class="nav-item <?= isset($pegawai) == 'pegawai' ? 'active' : null ?>">
        <a class="nav-link" href="<?= base_url('pegawai') ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Pegawai</span></a>
      </li>

      <li class="nav-item <?= isset($bagian) == 'bagian' ? 'active' : null ?>">
        <a class="nav-link" href="<?= base_url('view_bagian') ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>Data Bagian</span></a>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('pegawai') ?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-history"></i>
          <span>Data Lainnya</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Lainnya :</h6>
            <a class="collapse-item <?= isset($pendidikan) == 'pendidikan' ? 'active' : null ?>" href="<?= base_url('view_pendidikan') ?>">Riwayat Pendidikan</a>
            <a class="collapse-item <?= isset($keluarga) == 'keluarga' ? 'active' : null ?>" href="<?= base_url('view_keluarga') ?>">Keluarga</a>
            <!-- <a class="collapse-item <?= isset($bagian) == 'bagan' ? 'active' : null ?>" href="<?= base_url('view_bagian') ?>">Bagian</a> -->
            <a class="collapse-item <?= isset($pangkat) == 'pangkat' ? 'active' : null ?>" href="<?= base_url('view_pangkat') ?>">Kenaikan Pangkat</a>
            <a class="collapse-item <?= isset($cuti) == 'cuti' ? 'active' : null ?>" href="<?= base_url('view_cuti') ?>">Permohonan Cuti</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('pegawai') ?>" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseLaporan">
          <i class="fas fa-fw fa-print"></i>
          <span>Laporan</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan :</h6>
            <a class="collapse-item" href="<?= base_url('_report/lap_pegawai') ?>"target="_blank">Laporan Pegawai</a>
            <a class="collapse-item" href="<?= base_url('_report/lap_pangkat') ?>"target="_blank">Laporan Kenaikan Pangkat</a>
            <a class="collapse-item" href="<?= base_url('_report/lap_pensiun') ?>"target="_blank">Laporan Pegawai Pensiun</a>
            <a class="collapse-item" href="<?= base_url('_report/lap_cuti') ?>"target="_blank">Laporan Pegawai Cuti</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <li class="nav-item mb-3">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-light topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user[0]['username'] ?></span>
                <img class="img-profile rounded-circle" alt="Image" src="<?= asset('_assets/img/mtsn.png') ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('edit_profil') ?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
