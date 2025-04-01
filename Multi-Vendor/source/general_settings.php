<?php include("header/header-admin_access.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>General Settings - <?php echo $web['title']; ?></title>
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
			  <a href="<?php echo $web['url']; ?>admin/settings" data-pushstate="true" title="Edit my settings" class="active">Settings</a>
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
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
	<div id="container" class="main-content-wrap">
	<div class="user-area-wrap">
	<?php
			if(isset($_POST['phps_save'])) {
				$title = protect($_POST['title']);
				$description = protect($_POST['description']);
				$mem_quota = protect($_POST['mem_quota']);
				$reg_quota = protect($_POST['reg_quota']);
				$keywords = protect($_POST['keywords']);
				$sitename = protect($_POST['sitename']);
				$url = protect($_POST['url']);
				$email = protect($_POST['email']);
				$contact_email = protect($_POST['contact_email']);
				
				if(empty($title) or empty($description) or empty($keywords) or empty($mem_quota) or empty($reg_quota) or empty($sitename) or empty($url) or empty($email) or empty($contact_email)) { echo '<div class="alert color red-color"><p align="center">All fiels with * are required.</p></div>'; }
				elseif(!isValidURL($url)) { echo '<div class="alert color red-color"><p align="center">Please enter valid site url.</p></div>'; }
				elseif(!isValidEmail($email)) { echo '<div class="alert color red-color"><p align="center">Please enter valid site email address.</p></div>'; }
				else {
					$update = mysql_query("UPDATE sellify_settings SET title='$title',description='$description',keywords='$keywords',sitename='$sitename',url='$url',email='$email',contact_email='$contact_email',reg_quota='$reg_quota',mem_quota='$mem_quota'");
					$web = mysql_fetch_array(mysql_query("SELECT * FROM sellify_settings ORDER BY id LIMIT 1"));
					echo '<div class="alert color blue">';
					echo '<p align="center">Your changes was saved.</p>';
					echo '</div>';
				}
			}
			?>
	  <div class="ui stackable grid">
	   <div class="column left-navigation" id="container_for_navigation">
		<div class="ui fluid vertical menu">
		  <a class="green item" href="<?php echo $web['url']; ?>dashboard" data-pushstate="true">Dashboard</a>

		  <div class="header item">
			Products
		  </div>

		  <div class="item submenu-wrap">
			<div class="menu submenu">
			  
				<a class="green item " href="<?php echo $web['url']; ?>upload" data-pushstate="true">
				  Add new product
				</a>
			  
				<a class="green item " href="<?php echo $web['url']; ?>products" data-pushstate="true">
				  My products
				</a>
				
				<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
				<a class="green item " href="<?php echo $web['url']; ?>products/all" data-pushstate="true">
				  All products
				</a>
				<?php } ?>
			  
			</div>
		  </div>
		  
		  <div class="header item">
			My Account
		  </div>

		  <div class="item submenu-wrap">
			<div class="menu submenu">
			  
				<a class="green item " href="<?php echo $web['url']; ?>account/profile" data-pushstate="true">
				  Edit Profile
				</a>
				
				<a class="green item " href="<?php echo $web['url']; ?>account/payment" data-pushstate="true">
				  Payment Options
				</a>
			  
				<a class="green item " href="<?php echo $web['url']; ?>account/password" data-pushstate="true">
				  Change password
				</a>
				
				<a class="green item " href="<?php echo $web['url']; ?>account/purchases" data-pushstate="true">
				  Purchases
				</a>
				
				<a class="green item " href="<?php echo $web['url']; ?>account/offers" data-pushstate="true">
				  Offers
				</a>
			  
			</div>
		  </div>

		  <?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
		  <div class="header item">
			Settings
		  </div>

		  <div class="item submenu-wrap">
			<div class="menu submenu">
				<a class="green item active" href="<?php echo $web['url']; ?>admin/settings" data-pushstate="true">System</a>
				<a class="green item " href="<?php echo $web['url']; ?>admin/options" data-pushstate="true">Additional</a>
				<a class="green item " href="<?php echo $web['url']; ?>admin/payments" data-pushstate="true">Payment</a>
			</div>
		  </div>
		  <?php } ?>

		  <a class="green item " href="<?php echo $web['url']; ?>logout" data-pushstate="true">Log out</a>
		</div>
	   </div>
	   <div class="column main-content" id="content_container">
		<div id="content">
		  <div id="container_for_title"></div>
		  <div id="container_for_page_body">
		<div id="container_for_title">
		  <div class="head-description">
			<div class="ui grid full-width">
			  <div class="equal height two column row">
				<div class="column">
				  <h2 class="ui header">
					System Settings
				  </h2>
				</div>
				
			  </div>
			  
			  <div class="row">
				<div class="column">
				  Your system information and store settings.
				</div>
			  </div>
			  
			</div>
		  </div>
		</div>

		<div id="container_for_page_body">
			<form action="" class="product-edit-form" accept-charset="utf-8" method="POST" enctype="multipart/form-data">
				<div id="new_product_container" class="boxtop new-product-container">
					<div id="product-basic" class="product-tab">
						
						<div class="product-drag-drop" id="droptext" style="display: none;">
							<a class="ui button green product-upload-file">
								Select product file
							</a>
						</div>
						
						<div class="ui grid form full-width product-upload-form-wrap  editing">							
							<!-- INFORMATION -->
							<div class="row">
								<div class="column">

									<div class="field">
										<label for="1">* Store email</label>
										<input type="email" value="<?php echo $web['email']; ?>" name="email" id="1">
									</div>
									
									<div class="field">
										<label for="2">* Contact email</label>
										<input type="email" value="<?php echo $web['contact_email']; ?>" name="contact_email" id="2">
									</div>
									
									<div class="ui grid">
									  <div class="two column row fields">
										<div class="equal height two column row fields product-upload-price-field">
											<label for="reg_quota">* Register quota (default 10)</label>
											<input type="text" placeholder="10" value="<?php echo $web['reg_quota']; ?>" name="reg_quota" id="reg_quota">
										</div>
										<div class="equal height two column row fields product-upload-price-field">
											<label for="mem_quota">* Membership quota (default 10)</label>
											<input type="text" placeholder="10" value="<?php echo $web['mem_quota']; ?>" name="mem_quota" id="mem_quota">
										</div>
									  </div>
									</div>
									
									<div class="field">
										<label for="4">* Title</label>
										<input type="text" value="<?php echo $web['title']; ?>" name="title" id="4">
									</div>
									
									<div class="field">
										<label for="4">* Description (Maximum 160 characters)</label>
										<textarea name="description" id="4"><?php echo $web['description']; ?></textarea>
									</div>
									
									<div class="field">
										<label for="5">* Keywords (separated by comma)</label>
										<textarea name="keywords" id="5"><?php echo $web['keywords']; ?></textarea>
									</div>
									
									<div class="field">
										<label for="6">* Site name</label>
										<input type="text" value="<?php echo $web['sitename']; ?>" name="sitename" id="6">
									</div>
									
									<div class="field">
										<label for="7">* Site url (with ending slash)</label>
										<input type="text" value="<?php echo $web['url']; ?>" name="url" id="7">
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
				</div>
				<div class="setting-button-holder  editing">
					<div class="ui three column grid">
						<div class="row equal height">
							
							<div class="centered center aligned two wide column">
								<input type="submit" name="phps_save" value="Update settings" class="ui button green submit_product">
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div id="product_share_modal_holder"></div>
		</div>
		  <div id="container_for_pagintion"></div>
		</div>
	   </div>
	  </div>
	</div>
	</div>
	</div>
	</div>
	<!-- BODY END -->
	<!-- FOOTER START -->
	<div class="centered footer">
	  <a class="icon-sellfy-logo" href="<?php echo $web['url']; ?>"></a>
	  <p>
		<span class="item">
		  <?php echo $web['footer_text']; ?>
		</span>
	  </p>
	  <p class="footer-copyright">
		<span class="item">
		  &copy; <?php echo date("Y"); ?> <?php echo $web['sitename']; ?>, All rights reserved | Made with <i style="color:#ea6052;" class="fa fa-heart"></i> by <strong>The Spreadrr Team</strong>
		</span>
	  </p>
	</div>
	<!-- FOOTER END -->

	<!-- FOOTER CODE -->
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_user.js?0a5e83c1"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>