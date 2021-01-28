<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Register Page</title>
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

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

    <form action="<?= route_to('register') ?>" method="post">
      <?= csrf_field() ?>
      
      <div class="form-group <?php if(session('errors.email')) : ?>has-error <?php else : ?>has-feedback <?php endif ?> ">
        <?php if(session('errors.email')) : ?><label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?= session('errors.email') ?></label><?php endif ?>

        <input type="email" name="email" class="form-control" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      
        <?php if(session('errors.email')) : ?><span class="help-block"> <?= session('errors.email') ?></span><?php endif ?> 
      </div>

      <div class="form-group <?php if(session('errors.username')) : ?>has-error <?php else : ?>has-feedback <?php endif ?> ">
        <?php if(session('errors.username')) : ?><label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?= session('errors.username') ?></label><?php endif ?>

        <input type="text" name="username" class="form-control" placeholder="Username" value="<?= old('username') ?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php if(session('errors.username')) : ?><span class="help-block"> <?= session('errors.username') ?></span><?php endif ?>
      </div>

      <div class="form-group <?php if(session('errors.password')) : ?>has-error <?php else : ?>has-feedback <?php endif ?> ">
        <?php if(session('errors.password')) : ?><label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?= session('errors.password') ?></label><?php endif ?>

        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        <?php if(session('errors.password')) : ?><span class="help-block"> <?= session('errors.password') ?></span><?php endif ?>
      </div>
      <div class="form-group <?php if(session('errors.pass_confirm')) : ?>has-error <?php else : ?>has-feedback <?php endif ?> ">
        <?php if(session('errors.pass_confirm')) : ?><label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> <?= session('errors.pass_confirm') ?></label><?php endif ?>

        <input type="password" name="pass_confirm" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

        <?php if(session('errors.pass_confirm')) : ?><span class="help-block"> <?= session('errors.pass_confirm') ?></span><?php endif ?>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"><?=lang('Auth.register')?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
    </div>

    <a href="/login" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

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
