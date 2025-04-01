<?php if(!$_SESSION['ps_usern']) { $redirect = $web['url']."login"; header("Location:$redirect"); } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Change my password | <?php echo $web['title']; ?></title>

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
          <h1>Change Password</h1>
          <h4>You can change your password</h4>
        </div>
        <div class="form-area">
			<?php
			if(isset($_POST['phps_save'])) {
				$cur_passwd = protect($_POST['cur_passwd']);
				$cur_passwd = md5($cur_passwd);
				$new_passwd = protect($_POST['new_passwd']);
				$cnew_passwd = protect($_POST['cnew_passwd']);
				$passwd = md5($new_passwd);
				
				if(empty($cur_passwd) or empty($new_passwd) or empty($cnew_passwd)) { echo error ('All fields are required.'); }
				elseif(idinfo($_SESSION['ps_usern'],"passwd") !== $cur_passwd) { echo error ('Current password does not match.'); }
				elseif($new_passwd !== $cnew_passwd) { echo error ('The new password does not match the password for confirmation.'); }
				else {
					$update = mysql_query("UPDATE invoicify_users SET passwd='$passwd' WHERE usern='$_SESSION[ps_usern]'");
					echo success ('Your password was changed.');
				}
			}
			?>
          <div class="group">
            <input type="password" name="cur_passwd" class="form-control" placeholder="Current password">
            <i class="fa fa-unlock-alt"></i>
          </div>
		  <div class="group">
            <input type="password" name="new_passwd" class="form-control" placeholder="New password">
            <i class="fa fa-lock"></i>
          </div>
          <div class="group">
            <input type="password" name="cnew_passwd" class="form-control" placeholder="Confirm new password">
            <i class="fa fa-lock"></i>
          </div>
          <button type="submit" name="phps_save" class="btn btn-default btn-block">RESET PASSWORD</button>
        </div>
      </form>
      <div class="footer-links row">
        <center><div class="col-xs-12"><a href="<?php echo $web['url']; ?>admin/dashboard"><i class="fa fa-home"></i> Return to dashboard</a></div></center>
      </div>
    </div>

</body>
</html>