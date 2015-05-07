<html>
<head>
    <title>CA (Certificate Authority)!</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/icon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">
</head>
<body>
<div id="login-page">
    <div class="container">
      <form class="form-login" action="<?php echo base_url(); ?>home/login_proses" method="POST">
        <h2 class="form-login-heading">Sign in now</h2>
        <div class="login-wrap">
            <input name="username" type="text" class="form-control" placeholder="User Name" autofocus required>
            <br>
            <input name="password" type="password" class="form-control" placeholder="Password" required>
            <br>
            <input class="btn btn-theme btn-block" href="index.html" type="submit" value="LOGIN"><i class="fa fa-lock">
            </form>
            <div class="registration">
            <br>Don't have an account yet?<br/>
            <a class="" href="<?php echo base_url(); ?>home/register">
                Create an account
            </a>
        </div>
        </div>
    </div>
</div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>

</body>
</html>