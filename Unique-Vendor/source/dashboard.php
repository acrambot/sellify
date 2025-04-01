<?php include("header/header-admin_access.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dashboard - <?php echo $web['title']; ?></title>
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
	<!-- BODY START -->
	<div class="body">
	<div class="body-content">
	<div id="container" class="main-content-wrap">
	<div class="user-area-wrap">
	  <div class="ui stackable grid">
	   <?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
	   <div class="column left-navigation" id="container_for_navigation">
		<div class="ui fluid vertical menu">
		  <a class="green item active" href="<?php echo $web['url']; ?>dashboard" data-pushstate="true">Dashboard</a>

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

		  <a class="green item " href="<?php echo $web['url']; ?>logout" data-pushstate="true">Log out</a>
		</div>
	   </div>
	  <?php } else { ?>
	   <div class="column left-navigation" id="container_for_navigation">
		<div class="ui fluid vertical menu">
		  <a class="green item" href="<?php echo $web['url']; ?>" data-pushstate="true">Browse items</a>

		  <div class="header item">
			My Account
		  </div>

		  <div class="item submenu-wrap">
			<div class="menu submenu">
			  
				<a class="green item " href="<?php echo $web['url']; ?>account/profile" data-pushstate="true">
				  Edit Profile
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

		  <a class="green item " href="<?php echo $web['url']; ?>logout" data-pushstate="true">Log out</a>
		</div>
	   </div>
	  <?php } ?>
	   <div class="column main-content" id="content_container">
		<div id="content">
		  <div id="container_for_title"></div>
		  <div id="container_for_page_body">
			<div id="dashboard_header" class="graph_dashboard">
				<div class="graph_data">
				<?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
					<div class="ui three column stackable grid">
						<div class="row">
							<div class="center aligned column dashboard-product-info-box">
								<div class="ui statistic">
									<div class="value dashboard-product-info-value" id="dashboard_product_views_value"><?php $downloads = 0; $sql = mysql_query("SELECT * FROM sellify_items ORDER BY id"); if(mysql_num_rows($sql)>0) { while($row = mysql_fetch_array($sql)) { $downloads = $downloads+$row['downloads']; } } echo number_format($downloads); ?></div>
									<div class="label dashboard-product-info-title"> Downloads </div>
								</div>
							</div>
							<div class="center aligned column dashboard-product-info-box">
								<div class="ui statistic">
									<div class="value dashboard-product-info-value" id="dashboard_product_sales_value">
									<?php $sales = 0; $sql = mysql_query("SELECT * FROM sellify_items ORDER BY id"); if(mysql_num_rows($sql)>0) { while($row = mysql_fetch_array($sql)) { $sales = $sales+$row['sales']; } } echo (number_format($sales) / 2); ?></div>
									<div class="label dashboard-product-info-title">Sales</div>
								</div>
							</div>
							<div class="center aligned column dashboard-product-info-box">
								<div class="ui statistic">
									<div class="value dashboard-product-info-value" id="dashboard_product_revenue_value">
									<?php if($web['currency'] == USD) { ?>
									  <?php echo decode_currency($web['currency']); echo $web['earnings']; ?>
									<?php } ?>
									
									<?php if($web['currency'] == EUR) { ?>
									  <?php echo $web['earnings']; echo decode_currency($web['currency']); ?>
									<?php } ?>
									
									<?php if($web['currency'] == GBP) { ?>
									  <?php echo decode_currency($web['currency']); echo $web['earnings']; ?>
									<?php } ?></div>
									<div class="label dashboard-product-info-title">Earnings</div>
								</div>
							</div>
						</div>
					</div>
					
					<br><div class="ui divider"></div><br>
				<?php } else { ?>
					<div class="ui two column stackable grid">
						<div class="row">
							<div class="center aligned column dashboard-product-info-box">
								<div class="ui statistic">
									<div class="value dashboard-product-info-value" id="dashboard_product_views_value">
									  <?php if((idinfo($_SESSION['ps_usern'],"user_currency")) == "USD") { echo 'USD'; } ?>
									  <?php if((idinfo($_SESSION['ps_usern'],"user_currency")) == "EUR") { echo 'EUR'; } ?>
									  <?php if((idinfo($_SESSION['ps_usern'],"user_currency")) == "GBP") { echo 'GBP'; } ?>
									</div>
									<div class="label dashboard-product-info-title"> Currency </div>
								</div>
							</div>
							<div class="center aligned column dashboard-product-info-box">
								<div class="ui statistic">
									<div class="value dashboard-product-info-value" id="dashboard_product_sales_value">
									<?php echo idinfo($_SESSION['ps_usern'],"quotas") ?></div>
									<div class="label dashboard-product-info-title"> Quotas </div>
								</div>
							</div>
						</div>
					</div>
					
					<br><div class="ui divider"></div><br>
				<?php } ?>
					
					<div class="ui three column stackable grid">
						<div class="row">
						  <iframe width="100%" height="" src="https://static.spreadrr.com/sellify/news" name="preview-frame" frameborder="0" noresize="noresize"></iframe>
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