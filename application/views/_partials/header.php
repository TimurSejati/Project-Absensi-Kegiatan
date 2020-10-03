<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php if ($this->uri->segment(1) == 'admin') { ?>
    <title>Dashboard</title>
  <?php } else if ($this->uri->segment(1) == 'kegiatan') { ?>
    <title>Kegiatan</title>
  <?php } else { ?>
    <title>Daftar Hadir </title>
  <?php } ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

  <link href="<?php echo base_url() ?>assets/css/signature/jquery.signaturepad.css" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="text-center">
          <!-- <h3 class="text-uppercase">Selamat Datang Di Aplikasi Absensi Dinas P Dan K</h3> -->
        </li>
      </ul>
      <?php $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array(); ?>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url('assets/images/profile/' . $data['admin']['avatar']) ?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline"><?= $data['admin']['nama'] ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="<?php echo base_url('assets/images/profile/' . $data['admin']['avatar']) ?>" class="img-circle elevation-2" alt="User Image">
              <p>
                <?= $data['admin']['nama'] ?>
                <small>Member since Nov. 2012</small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="<?= site_url('admin/edit') ?>" class="btn btn-default btn-flat float-left">Profile</a>
              <form action="<?= base_url('auth/logout') ?>" method="post">
                <button type="submit" name="logout" class="btn btn-default btn-flat float-right">Sign out</button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->