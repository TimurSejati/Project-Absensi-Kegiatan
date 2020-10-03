<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Absen Online APP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="mb-5 text-center text-uppercase">
    <h2><b>Absen Online</b></h2>
    <h3 class="text-gray">Dinas Pendidikan Dan Kebudayaan Kab Cilacap</h3>
  </div>
  <div class="login-box">
    <!-- /.login-logo -->
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg text-uppercase font-weight-bold">Silahkan Login</p>

        <form action="<?= site_url('auth/auth_login') ?>" method="post">
          <div class="input-group mb-1 ">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <small class="text-danger"><?= form_error('username') ?></small>
          <div class="input-group mt-3 mb-1 ">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <small class="text-danger"><?= form_error('username') ?></small>
          <div class="row">
            <div class="col-8">
            </div>
            <!-- /.col -->
            <div class="col-4 mt-3">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>