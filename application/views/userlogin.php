<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>All users Login Page</title>

<link href="<?php echo base_url(); ?>assets/backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/css/colors/blue.css" id="theme"  rel="stylesheet">

</head>
<body>

<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
        <form class="form-horizontal form-material"  action="<?php echo site_url('site/userlogin') ?>" method="post">
         <?php echo $this->customlib->getCSRF(); ?>
            <a href="javascript:void(0)" class="text-center db">
            <img src="<?php echo base_url(); ?>assets/backend/plugins/images/admin-logo-dark.png" alt="Home" />
            <br/>
            <img src="<?php echo base_url(); ?>assets/backend/plugins/images/admin-text-dark.png" alt="Home" /></a>  
            <span class="text-center">user_login</span>  
  <?php
                                if (isset($error_message)) {
                                    echo "<div class='alert alert-danger'>" . $error_message . "</div>";
                                }
                                ?>
                                <?php
                                if ($this->session->flashdata('message')) {
                                    echo "<div class='alert alert-success'>" . $this->session->flashdata('message') . "</div>";
                                };
                                ?>
            <div class="form-group m-t-40">
          <div class="col-xs-12">
              <input autofocus="" class="form-control" type="text" name="username" required="" placeholder="Username">
            <span class="text-danger"><?php echo form_error('username'); ?></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" type="password" name="password" required="" placeholder="Password">
            <?php echo form_error('password','<span class="help-block" color="red">','</span>'); ?>
            <span class="text-danger"><?php echo form_error('password'); ?></span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
              <button type="submit"  value="Submit"  class="btn btn-lg btn-info  btn-block text-uppercase waves-effect waves-light">LOgin</button>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <div class="social">
                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
          </div>
        </div>
        
      </form>
<!--      <form class="form-horizontal" id="recoverform" action="">
          <a href="javascript:void(-1)" class="">back</a>
        <div class="form-group ">
          <div class="col-xs-12">
            <h3>Recover Password</h3>
            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
          </div>
        </div>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control" type="text" required="" placeholder="Email">
          </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
          </div>
        </div>
      </form>-->
    </div>
  </div>
</section>

<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/waves.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/js/custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>
