<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!--<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">-->
<title>Website</title>

<link href="<?php echo base_url(); ?>assets/backend/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/backend/css/colors/default.css" id="theme"  rel="stylesheet">

</head>
<body onload="startTime()">
<section id="wrapper" class="error-page">
    <script>
function startTime() {
    var today = new Date();
    var H = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    H + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
   
  <div class="error-box">
    <div class="error-body text-center">
      <h1 class="text-warning" id="txt"></h1>
      <div  style="font-size:22px;color:#f48341"></div>
      <h3 class="text-uppercase">This site is getting a up in few minute.</h3>
      <p class="text-muted m-t-30 m-b-30">Please try after some time</p>
      <a href="<?php echo base_url(); ?>site/login" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Login Admin</a> </div>
    <footer class="footer text-center"></footer>
  </div>
</section>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/backend/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/bootstrap/dist/js/bootstrap.min.js"></script>


</body>
</html>
