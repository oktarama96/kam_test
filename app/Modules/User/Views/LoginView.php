<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/adminlte/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php if (session()->has('message')) : ?>
      <div class="alert alert-success">
        <?= session('message') ?>
      </div>
    <?php endif ?>

    <?php if (session()->has('error')) : ?>
      <div class="alert alert-danger">
        <?= session('error') ?>
      </div>
    <?php endif ?>

    <form action="<?= route_to('login') ?>" method="post">
      <?= csrf_field() ?>

      <div class="form-group <?php if(session('errors.login')) : ?>has-error <?php else : ?>has-feedback <?php endif ?> ">
        <?php if(session('errors.login')) : ?><label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?= session('errors.login') ?></label><?php endif ?>

        <input type="email" class="form-control" name="login" placeholder="<?=lang('Auth.email')?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      
        <?php if(session('errors.login')) : ?><span class="help-block"> <?= session('errors.login') ?></span><?php endif ?> 
      </div>

      <div class="form-group <?php if(session('errors.password')) : ?>has-error <?php else : ?>has-feedback <?php endif ?> ">
        <?php if(session('errors.password')) : ?><label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?= session('errors.password') ?></label><?php endif ?>

        <input type="password" name="password" class="form-control" placeholder="<?=lang('Auth.password')?>">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php if(session('errors.password')) : ?><span class="help-block"> <?= session('errors.password') ?></span><?php endif ?> 
      </div>

      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?=lang('Auth.loginAction')?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links">
    </div>
    <!-- /.social-auth-links -->

    <a href="/register" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url(); ?>/assets/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
