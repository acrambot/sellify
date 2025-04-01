<?php if($_SESSION['ps_usern']) { $redirect = $web['url'].""; header("Location:$redirect"); } ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Sign up - <?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<!-- End Stylesheets -->
	    
		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $web['url']; ?>static/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="<?php echo $web['url']; ?>static/favicons/mstile-144x144.png">
		<!-- End Favicons -->
		
		<style>
		@media only screen and (max-width: 760px){
		  .login-container {
		    width:80%!important;
			margin:auto!important;
		  }
		}
		
		@media only screen and (min-width: 800px){
		  .login-container {
		    width:25%!important;
			margin:auto!important;
		  }
		}
		</style>
		
</head>
<body>
	<!-- HEADER START -->
	<div class="sellfy-header-wrap">
	  <div class="ui two column grid full-width sellfy-header">
	   <div class="row">
		<div class="left aligned column">
		  <a style="color:#333!important;font-family:'Montserrat', sans-serif;font-weight:bold;font-size: 1.556em;" href="<?php echo $web['url']; ?>"><?php echo $web['home_title']; ?></a>
		</div>
		<div class="right aligned column connect-panel">
		  <a class="ui button no-mobile tiny green" href="<?php echo $web['url']; ?>account/login" title="Log in">Log in</a>
          <a class="ui button tiny green" href="<?php echo $web['url']; ?>account/register" title="Create an account">Create an account</a>
		</div>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
	<div id="login" style="padding-top: 6%;" class="content auth">
    <div class="ui header">Sign up to <?php echo $web['title']; ?></div>
	<div class="login-container">
	<?php
	if(isset($_POST['phps_register'])) {
	  $usern = protect($_POST['usern']);
	  $passwd = protect($_POST['passwd']);
	  $cpasswd = protect($_POST['cpasswd']);
	  $email = protect($_POST['email']);
	  $email_exists = mysql_query("SELECT * FROM sellify_users WHERE email = '$_POST[email]'");
	  $emailchecker = mysql_fetch_array($email_exists);
	  $usern_exists = mysql_query("SELECT * FROM sellify_users WHERE usern = '$_POST[usern]'");
	  $usernchecker = mysql_fetch_array($usern_exists);
	  
	  if(empty($usern) or empty($passwd) or empty($cpasswd) or empty($email)) { echo error("Error! All fields are required."); }
	  elseif(!isValidUsername($usern)) { echo error("Error! Please enter valid username."); }
	  elseif(!isValidEmail($email)) { echo error("Error! Please enter valid e-mail address."); }
	  elseif($usernchecker > 1) { echo error("Error! Username already taken."); }
	  elseif($emailchecker > 1) { echo error("Error! Email already exists."); }
	  elseif($passwd !== $cpasswd) { echo error('<p align="center">Your passwords does not match.</p>'); }
	  
	  else {						
		$passwd = md5($passwd);
		$insert = mysql_query("INSERT sellify_users (usern,passwd,email,quotas) VALUES ('$usern','$passwd','$email','$web[reg_quota]')");
						
		$_SESSION['install_usern'] = $usern;
		$_SESSION['install_passwd'] = protect($_POST['passwd']);
						
		header("Location: $web[url]account/login");
	  }
	  
	}
	?>
	</div>
    <form action="" method="post" accept-charset="utf-8" class="ui form login-container">
        <div class="field">
          <input name="usern" type="text" placeholder="Username" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="email" type="email" placeholder="Email address" autocomplete="off">
        </div>
		
        <div class="field">
          <input name="passwd" id="password" type="password" placeholder="Password" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="cpasswd" type="password" placeholder="Confirm your password" autocomplete="off">
        </div>
        
        <div style="display:none!important;" class="reset field">
          <a href="#" class="reset" target="_self">Forgot password?</a>
        </div>

        <div class="field center aligned">
          <button type="submit" name="phps_register" class="ui green button fluid submit">Sign up</button>
        </div>
		
		<div class="ui horizontal divider">OR</div>
		
		<div class="field">
          <a class="ui fluid twitter button" rel="nofollow" href="<?php echo $web['url']; ?>account/login">
			You have already an account? Log in <i class="fa fa-arrow-right"></i>
		  </a>
        </div>
        
    </form>
	</div>
	</div>
	</div>
	<!-- BODY END -->
	<!-- FOOTER CODE -->
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js?51b2b110"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>