<?php include("header/header-user_access.php"); ?>
<?php
$custom_url = protect($_GET['custom_url']);
$licanse = protect($_GET['licanse']);
$method = protect($_GET['method']);
$sql = mysql_query("SELECT * FROM sellify_items WHERE custom_url='$custom_url'");
if(mysql_num_rows($sql)==0) { $redirect = $web['url']."not_found"; header("Location: $redirect"); }
$row = mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Download <?php echo $row['name']; ?> - <?php echo $web['title']; ?></title>
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
		<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
		<div class="right aligned column connect-panel">
			<a class="ui tiny flat green button" href="<?php echo $web['url']; ?>dashboard">Dashboard</a>
		</div>
		<?php } else { ?>
		<div class="right aligned column connect-panel">
			<a class="ui tiny flat green button" href="<?php echo $web['url']; ?>account/profile">My Account</a>
		</div>
		<?php } ?>
	   </div>
	  </div>
	</div>
	<!-- HEADER END -->
	
	<?php if($row['price_extended'] > 0.00) { ?>
	<!-- BODY PAID START -->
	<div class="body">
	<div class="body-content">
	<div id="login" style="padding-top: 8%;" class="content auth">
    <div class="ui header">Thank you for your purchase!</div>
	<div class="login-container"><?php
					if(isset($_POST['do_download'])) {
						$email = protect($_POST['email']);
						$code = protect($_POST['code']);
						$sql = mysql_query("SELECT * FROM sellify_purchases WHERE item_id='$custom_url' and code='$code' and usern='$_SESSION[ps_usern]'");
						if(mysql_num_rows($sql)>0) {
							$file = "./".$row['main_file'];
							if(file_exists($file)) {
								echo '<div class="alert color blue">';
								echo '<p align="center">Downloading a $row[name] is successfully.</p>';
								echo '</div>';
								header('Content-Description: File Transfer');
								header('Content-Type: application/octet-stream');
								header('Content-Disposition: attachment; filename='.basename($file));
								header('Content-Transfer-Encoding: binary');
								header('Expires: 0');
								header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
								header('Pragma: public');
								header('Content-Length: ' . filesize($file));
								ob_clean();
								flush();
								readfile($file);
								exit;
							} else {
								echo '<div class="alert color red-color">';
								echo '<p align="center">File does not exists. Please contact our support.</p>';
								echo '</div>';
							}
						} else {
							echo '<div class="alert color red-color">';
							echo '<p align="center">Download fail! Wrong code.</p>';
							echo '</div>';
						}
					}
					?></div>
    <form action="" method="post" accept-charset="utf-8" class="ui form login-container">
        <div class="field">
          <input type="text" value="<?php echo $row['name']; ?>" placeholder="<?php echo $row['name']; ?>" autocomplete="off" disabled>
        </div>
		
        <div class="field">
          <input name="code" type="text" value="" placeholder="Download code (e.g: b8adb1139288)" autocomplete="off">
        </div>

        <div class="field center aligned">
          <button type="submit" name="do_download" class="ui green button fluid submit">Download</button>
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
	<?php } ?>
	
	<?php if($row['price_extended'] == 0.00) { ?>
	<!-- BODY FREE START -->
	<div class="body">
	<div class="body-content">
	<div id="login" style="padding-top: 10%;" class="content auth">
    <div class="ui header">Thank you for your interest!</div>
	<div style="width:25%;margin:auto;"><?php
			if(isset($_POST['do_download'])) {						
				$file = "./".$row['main_file'];
				$downloads = $row['downloads'];
				$item_number = $row['id'];
				$sql = mysql_query("SELECT * FROM sellify_items WHERE id='$item_number'");
				$file = "./".$row['main_file'];
				if(file_exists($file)) {
					$update = mysql_query("UPDATE sellify_items SET downloads=$downloads+1 WHERE id='$item_number'");
					echo '<div class="alert color blue">';
					echo '<p align="center">Downloading a $row[name] is successfully.</p>';
					echo '</div>';
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename='.basename($file));
					header('Content-Transfer-Encoding: binary');
					header('Expires: 0');
					header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
					header('Pragma: public');
					header('Content-Length: ' . filesize($file));
					ob_clean();
					flush();
					readfile($file);
					exit;
				} else {
					echo '<div class="alert color red-color">';
					echo '<p align="center">File does not exists. Please contact our support.</p>';
					echo '</div>';
				}
			}
			?></div>
    <form action="" method="post" accept-charset="utf-8" style="width: 25%;margin: auto;" class="ui form">
        <div class="field">
          <input type="text" value="<?php echo $row['name']; ?>" placeholder="<?php echo $row['name']; ?>" autocomplete="off" disabled>
        </div>

        <div class="field center aligned">
          <button type="submit" name="do_download" class="ui green button fluid submit">Instant Download</button>
        </div>
		
		<div class="ui horizontal divider">OR</div>
		
		<div class="field">
          <a class="ui fluid twitter button" rel="nofollow" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>">
			Back to the product page <i class="fa fa-arrow-right"></i>
		  </a>
        </div>
        
    </form>
	</div>
	</div>
	</div>
	<!-- BODY FREE END -->
	<?php } ?>
	
	<!-- FOOTER CODE -->
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_user.js"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>