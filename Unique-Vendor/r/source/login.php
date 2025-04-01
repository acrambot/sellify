<?php if($_SESSION['ps_usern']) {
	header("Location: ./admin/dashboard");
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Sign in | <?php echo $web['title']; ?></title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo $web['url']; ?>static/css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>

    <div class="login-form">
      <form action="" method="POST" role="form" accept-charset="utf-8">
        <div class="top">
          <h1>My Account</h1>
          <h4>Sign in to access to your dashboard</h4>
        </div>
        <div class="form-area">
			<?php 
			if(isset($_POST['phps_login'])) {
				$phps_usern = protect($_POST['phps_usern']);
				$phps_passwd = protect($_POST['phps_passwd']);
				$phps_passwd = md5($phps_passwd);
				$query = mysql_query("SELECT * FROM invoicify_users WHERE usern='$phps_usern' and passwd='$phps_passwd'");
				if(mysql_num_rows($query)) {
					$_SESSION['ps_usern'] = $phps_usern;
					header("Location: $web[url]admin/dashboard");
				} else {
					echo error("Oops! You have entered wrong username or password");
				}
			}
			?>
          <div class="group">
            <input type="text" name="phps_usern" class="form-control" placeholder="Username">
            <i class="fa fa-unlock-alt"></i>
          </div>
		  <div class="group">
            <input type="password" name="phps_passwd" class="form-control" placeholder="Password">
            <i class="fa fa-lock"></i>
          </div>
          <button type="submit" name="phps_login" class="btn btn-default btn-block">LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
        <center><div class="col-xs-12"><a href="<?php echo $web['url']; ?>"><i class="fa fa-home"></i> Return to home</a></div></center>
      </div>
    </div>

</body>
</html>