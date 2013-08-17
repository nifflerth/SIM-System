<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->   <html lang="en"> <!--<![endif]-->
<head>

  <!-- General Metas -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  <!-- Force Latest IE rendering engine -->
  <title>Student Information Management Systems</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?=site_url("/css/bootstrap.css") ?>">
  <link rel="stylesheet" href="<?=site_url("/css/jquery.fancybox.css") ?>">
  <link rel="stylesheet" href="<?=site_url("/css/style.css") ?>">
</head>
<body class='login_body' method="post">
  <div class="wrap">
    <h2>SIM Systems</h2>
    <h4>Welcome to the login page</h4>
    <?php echo '<div class="alert_fp">'.validation_errors().'</div>';?>
    <?php echo form_open('/index.php/verifylogin'); ?>
    <div class="login">
      <div class="email">
        <label for="user">Username</label><div class="pw-input"><div class="input-prepend">
        <span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" name="username"></div></div>
      </div>
      <div class="pw">
        <label for="pw">Password</label><div class="pw-input"><div class="input-prepend">
        <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password"></div></div>
      </div>
      <div class="remember">
        <label class="checkbox">
          <input type="checkbox" value="1" name="remember"> Remember me on this computer
        </label>
      </div>
    </div>
    <div class="submit">
      <button type"submit" class="btn btn-green3" value="Login">Login</button>
    </div>
    </form>
  </div>
<script src="js/jquery.js"></script>
</body>
</html>
