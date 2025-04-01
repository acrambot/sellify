<?php include("header/header-user_access.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>My Products - <?php echo $web['title']; ?></title>
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
			  <a href="<?php echo $web['url']; ?>products" data-pushstate="true" title="View my products" class="active">Products</a>
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
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
	<div id="container" class="main-content-wrap">
	<div class="user-area-wrap">
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
			  
				<a class="green item active" href="<?php echo $web['url']; ?>products" data-pushstate="true">
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
				<a class="green item " href="<?php echo $web['url']; ?>admin/settings" data-pushstate="true">System</a>
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
		  <div id="container_for_title">
			<div class="head-description">
			  <div class="ui grid">
				<div class="equal height two column row">
				  <div class="column">
					<h2 class="ui header">
					  My products
					</h2>
				  </div>
				  <div class="right aligned column">
					<div class="ui small green button header-button">
					  <a style="color:#fff;text-decoration:none!important;" href="<?php echo $web['url']; ?>upload">
						<i class="fa fa-plus"></i>
						Add new product
					  </a>
					</div>
				  </div>
				</div>
				<div class="equal height one column row">
				  <div class="column">
					
					<p></p>
					<span class="icon  without-description"></span>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		<div id="container_for_page_body">
		  <div class="my-products-thead">
			<div class="ui grid">
			  <div class="six wide column">
				Product details
			  </div>
			  <div class="four wide column">
				Sales &amp; Download
			  </div>
			  <div class="two wide column">
				Price
			  </div>
			</div>
		  </div>
		<div class="ui middle aligned close grid userpage-content" id="listing">
		
		<?php
			$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
			$limit = 50000;
			$startpoint = ($page * $limit) - $limit;
			$statement = "`sellify_items`";
			$sql = mysql_query("SELECT * FROM {$statement} WHERE author='$_SESSION[ps_usern]' ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
			if(mysql_num_rows($sql)>0) {
			while($row = mysql_fetch_array($sql)) {
		?>
		
		<!-- PRODUCT START -->
		<div class="equal height row product-table-row">
		  <div class="six wide column">
			<div class="ui list">
			  <div class="item">
				<img class="ui middle aligned rounded cover image" style="background-image: url(<?php echo $web['url']; echo $row['thumbnail']; ?>);">
				<div class="content">
				  <div class="header"><?php echo $row['name']; ?></div>
				  — 
				<?php if($row['membership'] == on) { ?>
				  <span style="color:#2980b9;">MEMBERSHIP</span>
				<?php } else { ?>
				  <?php if($row['featured'] !== on) { ?>
				  <span style="color:#e74c3c;">NOT FEATURED</span>
				  <?php } ?>
				  <?php if($row['featured'] == on) { ?>
				  <span style="color:#27ae60;">FEATURED</span>
				  <?php } ?>
				<?php } ?>
				</div>
			  </div>
			</div>
			<a class="ui basic button product-edit-old" title="Edit this product" href="<?php echo $web['url']; ?>edit/<?php echo $row['custom_url']; ?>" data-pushstate="true">
			  Edit
			</a>
		  </div>
		  <div class="four wide column">
			  <center>
				<?php if($row['price_extended'] == 0.00) { ?>
				  <?php if($row['downloads'] == 0) { echo '0 downloads'; } else { echo $row['downloads']." downloads"; } ?>
				<?php } ?>
				
				<?php if($row['price_extended'] > 0.00) { ?>
				  <?php if($row['sales'] == 1) { echo '1 sale'; } else { echo ($row['sales'] / 2)." sales"; } ?>
				<?php } ?>
			  </center>
		  </div>
		  <div class="two wide center aligned column">
			<?php if($row['price_extended'] == 0.00) { ?>
			  FREE
			<?php } ?>
			
			<?php if($row['price_extended'] > 0.00) { ?>
			  <?php if($row['item_currency'] == USD) { ?><?php echo decode_currency($row['item_currency']); echo $row['price_extended']; ?><?php } ?>
			  <?php if($row['item_currency'] == EUR) { ?><?php echo $row['price_extended']; echo decode_currency($row['item_currency']); ?><?php } ?>
			  <?php if($row['item_currency'] == GBP) { ?><?php echo decode_currency($row['item_currency']); echo $row['price_extended']; ?><?php } ?>
			<?php } ?>
		  </div>
		</div>
		<!-- PRODUCT END -->
		<?php } } ?>
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