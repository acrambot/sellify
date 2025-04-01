<?php include("header/header-user_access.php"); ?>
<?php
$custom_url = protect($_GET['custom_url']);
$licanse = protect($_GET['licanse']);
$method = protect($_GET['method']);
$sql = mysql_query("SELECT * FROM sellify_items WHERE custom_url='$custom_url'");
$row = mysql_fetch_array($sql);
?><?php include("header/header-user_access.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Redeem an upgrade code! - <?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_user.css">
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
			<a class="menu-link dashboard" href="<?php echo $web['url']; ?>dashboard" data-pushstate="true" title="Go to my dashboard">Dashboard</a>
		 <div class="ui top right pointing dropdown text header-dropdown-right" tabindex="0">
			<span class="header-merchant-logo header-dropdown-url" style="background-image: url('<?php if(idinfo($_SESSION['ps_usern'],'avatar') !== NULL) { ?><?php echo idinfo($_SESSION['ps_usern'],'avatar'); ?><?php } ?><?php if(idinfo($_SESSION['ps_usern'],'avatar') == NULL) { ?><?php echo $web['url']; ?>static/img/profile-placeholder.png<?php } ?>')"></span> <i class="fa fa-angle-down"></i>
			
		  <div class="menu header-notification-dropdown" tabindex="-1">
			<div class="item">
			  <a id="profile_link" href="<?php echo $web['url']; ?>user/<?php echo $_SESSION['ps_usern']; ?>" title="My profile">My profile</a>
			</div>

			<div class="ui divider"></div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>upload" data-pushstate="true" title="Upload a product">Upload</a>
			</div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>products" data-pushstate="true" title="View my products">Products</a>
			</div>

			<div class="item">
			  <a href="<?php echo $web['url']; ?>account/purchases" data-pushstate="true" title="View my purchases">Purchases</a>
			</div>
			
			<div class="item">
			  <a href="<?php echo $web['url']; ?>account/offers" data-pushstate="true" title="View offers">Offers</a>
			</div>
			
			<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
			<div class="ui divider"></div>
			
			<div class="item">
			  <a href="<?php echo $web['url']; ?>admin/settings" data-pushstate="true" title="Edit my settings">Settings</a>
			</div>
			
			<div class="item">
			  <a href="https://docs.spreadrr.com/" target="_blank" title="Contact Spreadrr">Help &amp; Support</a>
			</div>
			<?php } ?>
			
			<div class="ui divider"></div>
			
			<div class="item">
			  <a href="<?php echo $web['url']; ?>logout" title="Log out">Log out</a>
			</div>
		  </div>
		 </div>
		</div>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	
	<!-- BODY PAID START -->
	<div class="body">
	<div class="body-content">
	<div id="login" style="padding-top: 8%;" class="content auth">
    <div class="ui header">Redeem an upgrade code!</div>
	<div class="login-container"><?php
					if(isset($_POST['do_valid'])) {
						$code = protect($_POST['code']);
						$quotas = (idinfo($_SESSION['ps_usern'],'quotas') + $web['mem_quota']);
						$sql2 = mysql_query("SELECT * FROM sellify_purchases WHERE membership='on' and code='$code' and usern='$_SESSION[ps_usern]'");
						$row2 = mysql_fetch_array($sql2);
						$priceee = protect($row2['price']);
						$earnings = protect($web['earnings']);
						if(mysql_num_rows($sql2)>0) {
							$update = mysql_query("UPDATE sellify_settings SET earnings=$earnings+$priceee");
							$delete = mysql_query("DELETE FROM sellify_purchases WHERE code='$code'");
							$update = mysql_query("UPDATE sellify_users SET quotas='$quotas' WHERE usern='$_SESSION[ps_usern]'");
							echo '<div class="alert color blue">';
							echo '<p align="center">Code redeemed.</p>';
							echo '</div>';
						} else {
							echo '<div class="alert color red-color">';
							echo '<p align="center">Wrong code or already used.</p>';
							echo '</div>';
						}
					}
					?></div>
    <form action="" method="post" accept-charset="utf-8" class="ui form login-container">
        <div class="field">
          <input name="code" type="text" value="" placeholder="Purchase code (e.g: b8adb1139288)" autocomplete="off" required>
        </div>

        <div class="field center aligned">
          <button type="submit" name="do_valid" class="ui green button fluid submit">Validate</button>
        </div>
		
		<div class="ui horizontal divider">OR</div>
		
		<div class="field">
          <a class="ui fluid twitter button" rel="nofollow" href="<?php echo $web['url']; ?>account/purchases">
			Back to my purchases <i class="fa fa-arrow-right"></i>
		  </a>
        </div>
        
    </form>
	</div>
	</div>
	</div>
	<!-- BODY PAID END -->
	
	<!-- FOOTER CODE -->
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_user.js"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>