<?php
ob_start();
session_start();
include("includes/functions.php");

$step = protect($_GET['step']);

if($step == 1) {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Step 1 — Install Sellify Unique-Vendor</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="static/gen/elements.css">
		<link rel="stylesheet" href="static/gen/semantic.min.css">
		<link rel="stylesheet" href="static/gen/packed_global.css">
		<!-- End Stylesheets -->
	    
		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="static/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="static/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="static/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="static/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="static/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="static/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="static/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="static/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="static/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="static/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="static/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="static/favicons/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="static/favicons/mstile-144x144.png">
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
		    width:40%!important;
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
		  <a class="logo" href=""><img src="static/logo/dark-logo.png" alt="logo" style="height:46px;"  /></a>
		</div>
		<div class="right aligned column connect-panel">
		  <a class="menu-link no-mobile login-link-button" target="_blank" href="mailto:support@spreadrr.com">Contact Us</a>
          <a class="ui button tiny green" href="https://docs.spreadrr.com/conversations/sellify" target="_blank" title="Help &amp; Support">Help &amp; Support</a>
		</div>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
	<div id="login" style="padding-top: 6%;" class="content auth">
    <div class="ui header">Install Sellify Unique-Vendor</div>
	<div class="login-container">
	<?php
		if(isset($_POST['do_install'])) {
		$mysql_host = protect($_POST['mysql_host']);
		$mysql_user = protect($_POST['mysql_user']);
		$mysql_pass = protect($_POST['mysql_pass']);
		$mysql_db = protect($_POST['mysql_db']);
		$title = protect($_POST['title']);
		$description = protect($_POST['description']);
		$keywords = protect($_POST['keywords']);
		$url = protect($_POST['url']);
		$usern = protect($_POST['usern']);
		$passwd = protect($_POST['passwd']);
		$email = protect($_POST['email']);
		$contact_email = protect($_POST['contact_email']);
		$sitename = protect($_POST['sitename']);
		$currency = protect($_POST['currency']);
		$paypal_email = protect($_POST['paypal_email']);
		$main_folder_name = protect($_POST['main_folder_name']);
		$home_title = protect($_POST['home_title']);
		$home_desc = protect($_POST['home_desc']);
		$footer_text = protect($_POST['footer_text']);
		
			if(empty($mysql_host) or empty($mysql_user) or empty($mysql_pass) or empty($mysql_db) or empty($title) or empty($description) or empty($keywords) or empty($main_folder_name) or empty($home_title) or empty($home_desc) or empty($footer_text) or empty($sitename) or empty($url) or empty($usern) or empty($passwd) or empty($email) or empty($contact_email)) { echo error("Error! All fields are required."); }
			elseif(!isValidUsername($usern)) { echo error("Error! Please enter valid username."); }
			elseif(!isValidURL($url)) { echo error("Error! Please enter valid website address."); }
			elseif(!isValidEmail($email)) { echo error("Error! Please enter valid e-mail address."); }
			else {
				$db = mysql_connect($mysql_host,$mysql_user,$mysql_pass);

				if($db) {
				$select_db = mysql_select_db($mysql_db,$db);
					if($select_db) {
						mysql_query("SET NAMES 'utf8'");

						$sql_filename = 'sql.sql';
						$sql_contents = file_get_contents($sql_filename);
						$sql_contents = explode(";", $sql_contents);

						foreach($sql_contents as $k=>$v) {
							mysql_query($v);
						}
						
						$insert = mysql_query("INSERT sellify_settings (title,description,keywords,sitename,email,contact_email,url,main_folder_name,earnings,home_title,home_desc,footer_text,reg_quota,mem_quota) VALUES ('$title','$description','$keywords','$sitename','$email','$contact_email','$url','$main_folder_name','0','$home_title','$home_desc','$footer_text','10','10')");
						$passwd = md5($passwd);
						$insert = mysql_query("INSERT sellify_users (usern,passwd,email,role,status,quotas) VALUES ('$usern','$passwd','$email','1','0','100000')");
						mkdir($main_folder_name);
						
						$current .= '<?php
						';
						$current .= '$sql["host"] = "'.$mysql_host.'";
						';
						$current .= '$sql["user"] = "'.$mysql_user.'";
						';
						$current .= '$sql["pass"] = "'.$mysql_pass.'";
						';
						$current .= '$sql["base"] = "'.$mysql_db.'";
						';
						$current .= '$connection = mysql_connect($sql["host"],$sql["user"],$sql["pass"]);
						';
						$current .= '$select_database = mysql_select_db($sql["base"], $connection);
						';
						$current .= 'mysql_query("SET NAMES utf8");
						';
						$current .= '?>
						';
						
						file_put_contents("includes/config.php", $current);
						
						$_SESSION['install_url'] = $url;
						$_SESSION['install_usern'] = $usern;
						$_SESSION['install_passwd'] = protect($_POST['passwd']);
						
						header("Location: ./install?step=2");

					} else {
						echo error("Error! MySQL database not exists.");
					}

				} else {
					echo error("Error! Failed to connect to MySQL server.");
				}
			}
		}
		?>
	</div>
    <form action="" method="post" accept-charset="utf-8" class="ui form login-container">
        <div class="field">
          <input name="mysql_host" type="text" placeholder="MySQL hostname (e.g: localhost)" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="mysql_user" type="text" placeholder="MySQL username (e.g: root)" autocomplete="off">
        </div>
		
        <div class="field">
          <input name="mysql_pass" type="text" placeholder="MySQL password (e.g: rootpasswd)" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="mysql_db" type="text" placeholder="MySQL database (e.g: sellify_database)" autocomplete="off">
        </div>
		
		<div class="ui horizontal divider">AND</div>
		
		<div class="field">
          <input name="title" type="text" placeholder="Enter website title.." autocomplete="off">
        </div>
		
		<div class="field">
          <textarea name="description" placeholder="Enter website description.." autocomplete="off"></textarea>
        </div>
		
		<div class="field">
          <textarea name="keywords" placeholder="Enter website keywords.." autocomplete="off"></textarea>
        </div>
		
        <div class="field">
          <input name="contact_email" type="email" placeholder="Contact e-mail address.." autocomplete="off">
        </div>
		
		<div class="field">
          <input name="sitename" type="text" placeholder="Enter company name (e.g: Spreadrr, Inc.)" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="url" type="text" placeholder="Enter website url (e.g: http://example.com/ with ending '/')" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="main_folder_name" type="text" placeholder="Secured folder (e.g: v15u2vh512uvh215)" autocomplete="off">
        </div>
		
		<div class="ui horizontal divider">AND</div>
		
		<div class="field">
          <input name="home_title" type="text" placeholder="Homepage title (e.g: Spreadrr)" autocomplete="off">
        </div>
		
		<div class="field">
          <textarea name="home_desc" placeholder="Homepage description (e.g: Over 1 billion digital products created by a global community of designers, developers, photographers, illustrators & producers around the world.)" autocomplete="off"></textarea>
        </div>
		
		<div class="field">
          <input name="footer_text" type="text" placeholder="Copyright text (e.g: Thank you for visiting our website and we wish you much happiness with our products.)" autocomplete="off">
        </div>
		
		<div class="ui horizontal divider">AND</div>
		
		<div class="field">
          <input name="email" type="email" placeholder="Notification Email Address" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="usern" type="text" placeholder="Username" autocomplete="off">
        </div>
		
		<div class="field">
          <input name="passwd" type="password" placeholder="Password" autocomplete="off">
        </div>

        <div class="field center aligned">
          <button type="submit" name="do_install" class="ui green button fluid submit">Install Sellify</button>
        </div>
		
		<br><br><br><br>
        
    </form>
	</div>
	</div>
	</div>
	<!-- BODY END -->
	<!-- FOOTER CODE -->
	<script type="text/javascript" src="static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="static/gen/packed_global.js?51b2b110"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>

<?php
} elseif($step == 2) {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Step 2 — Install Sellify Unique-Vendor</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="static/gen/elements.css">
		<link rel="stylesheet" href="static/gen/semantic.min.css">
		<link rel="stylesheet" href="static/gen/packed_global.css">
		<link rel="stylesheet" href="static/gen/packed_user.css">
		<!-- End Stylesheets -->
	    
		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="static/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="static/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="static/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="static/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="static/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="static/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="static/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="static/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="static/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="static/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="static/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="static/favicons/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="static/favicons/mstile-144x144.png">
		<!-- End Favicons -->
		
</head>
<body>
	<!-- HEADER START -->
	<div class="sellfy-header-wrap">
	  <div class="ui one column grid full-width sellfy-header">
	   <div class="row">
		<div class="center aligned column">
		  <img src="static/logo/dark-logo.png" alt="logo" style="height:46px;"  />
		</div>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
      <div id="container" class="main-content-wrap">
		<div class="user-area-wrap wide">
		  <div class="ui stackable grid">
			<div class="column left-navigation" id="container_for_navigation"></div>
			<div class="column main-content" id="content_container">
			<div id="content">
				<br><br><br><br><br><br><div class="ui grid purchase-list">
					<div class="row purchases-default" style="display: none;">
						<div class="center aligned column">
							<div class="ui segment">
								<div class="ui active inline loader" style="display: none;"></div>
								<div class="no-purchases">
									Install Sellify Unique-Vendor
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="column">
							<div id="purchases_list">					
								<div class="ui segment download-page-content">
								  <div class="ui middle aligned grid download-product-block">
									<div class="row">
									  <div class="column">
										<div class="ui list product-meta">
										  <div class="item">
											<center><div class="content">
											  <div class="header">
												<span style="font-size:30px;text-decoration:none!important;color:#333!important;">Sellify Installation Processed</span>
											  </div><br>
											  <span style="text-align:left!important;font-size:16px;">
											  <strong>Store URL:</strong> <a href="<?php echo $_SESSION['install_url']; ?>" target="_blank"><?php echo $_SESSION['install_url']; ?></a><br>
											  <br>
											  <strong>Admin username:</strong> <?php echo $_SESSION['install_usern']; ?><br>
											  <strong>Admin password:</strong> <?php echo $_SESSION['install_passwd']; ?><br>
											  </span>
											  <br><br><br>
											  <a style="color:#fff!important;" class="ui button normal twitter" href="<?php echo $_SESSION['install_url']; ?>account/login">Visit admin panel <i class="fa fa-arrow-right"></i></a>
											</div></center>
										  </div>
										</div>
									  </div>
									</div>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
		</div>
    </div>
	</div>
	<!-- BODY END -->
	<!-- FOOTER CODE -->
	<script type="text/javascript" src="static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="static/gen/packed_user.js"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>

<?php
@unlink("install.php");
@unlink("sql.sql");
unset($_SESSION['install_url']);
unset($_SESSION['install_usern']);
unset($_SESSION['install_passwd']);
session_unset();
session_destroy();
} else {
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Install Sellify Unique-Vendor</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="static/gen/elements.css">
		<link rel="stylesheet" href="static/gen/semantic.min.css">
		<link rel="stylesheet" href="static/gen/packed_global.css">
		<link rel="stylesheet" href="static/gen/packed_user.css">
		<!-- End Stylesheets -->
	    
		<!-- Favicons -->
		<link rel="apple-touch-icon" sizes="57x57" href="static/favicons/apple-touch-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="static/favicons/apple-touch-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="static/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="static/favicons/apple-touch-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="static/favicons/apple-touch-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="static/favicons/apple-touch-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="static/favicons/apple-touch-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="static/favicons/apple-touch-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="static/favicons/apple-touch-icon-180x180.png">
		<link rel="icon" type="image/png" href="static/favicons/favicon-96x96.png" sizes="96x96">
		<link rel="icon" type="image/png" href="static/favicons/favicon-16x16.png" sizes="16x16">
		<link rel="icon" type="image/png" href="static/favicons/favicon-32x32.png" sizes="32x32">
		<meta name="msapplication-TileColor" content="#2b5797">
		<meta name="msapplication-TileImage" content="static/favicons/mstile-144x144.png">
		<!-- End Favicons -->
		
</head>
<body>
	<!-- HEADER START -->
	<div class="sellfy-header-wrap">
	  <div class="ui one column grid full-width sellfy-header">
	   <div class="row">
		<div class="center aligned column">
		  <img src="static/logo/dark-logo.png" alt="logo" style="height:46px;"  />
		</div>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
      <div id="container" class="main-content-wrap">
		<div class="user-area-wrap wide">
		  <div class="ui stackable grid">
			<div class="column left-navigation" id="container_for_navigation"></div>
			<div class="column main-content" id="content_container">
			<div id="content">
				<br><br><br><br><br><br><div class="ui grid purchase-list">
					<div class="row purchases-default" style="display: none;">
						<div class="center aligned column">
							<div class="ui segment">
								<div class="ui active inline loader" style="display: none;"></div>
								<div class="no-purchases">
									Install Sellify Unique-Vendor
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="column">
							<div id="purchases_list">					
								<div class="ui segment download-page-content">
								  <div class="ui middle aligned grid download-product-block">
									<div class="row">
									  <div class="column">
										<div class="ui list product-meta">
										  <div class="item">
											<center><div class="content">
											  <div class="header">
												<span style="font-size:30px;text-decoration:none!important;color:#333!important;">Sellify needs installation!</span>
											  </div><br>
											  <span style="font-size:16px;">With this script you can sell your products without resellers commission takes half the cost of your product. All profits just for you just need to install the script and add your products.</span>
											  <br><br><br>
											  <a style="color:#fff!important;" class="ui button normal twitter" href="./install?step=1">Start installation</a>
											</div></center>
										  </div>
										</div>
									  </div>
									</div>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
		</div>
    </div>
	</div>
	<!-- BODY END -->
	<!-- FOOTER CODE -->
	<script type="text/javascript" src="static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="static/gen/packed_user.js"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>

<?php } ?>