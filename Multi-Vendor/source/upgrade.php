<?php
$result_users = mysql_query("SELECT count(1) FROM sellify_users");
$row_users = mysql_fetch_array($result_users);
$total_users = $row_users[0];

$result_items = mysql_query("SELECT count(1) FROM sellify_items");
$row_items = mysql_fetch_array($result_items);
$total_items = $row_items[0];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Upgrade plan - <?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/modal/css/style.css" />
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_marketplace.css">
		<!-- End Stylesheets -->
		
		<?php include("$web[url]static/gen/modal/header-modal.php"); ?>
	    
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
<body class="landing-page">  
  <div class="body">
    <div class="body-content">
      <div class="marketplace-content">
    <div class="header-hero-wrap">
  <div class="sellfy-landing-header">
    <div class="ui grid global-wrap">
      <div class="six wide column left middle aligned">
        <a style="color:#fff!important;font-family:'Montserrat', sans-serif;font-weight:bold;font-size: 1.556em;" href="<?php echo $web['url']; ?>"><?php echo $web['home_title']; ?></a>
      </div>
      <div class="six wide column right middle aligned">
	  <?php if(!$_SESSION['ps_usern']) { ?>
          <a class="ui tiny flat green button hide-mobile" id="modal_trigger" href="#modal">Log in</a>
		  <a class="ui tiny flat green button hide-desktop" href="<?php echo $web['url']; ?>account/login">Log in</a>
		  <a class="ui tiny flat green button hide-mobile" href="<?php echo $web['url']; ?>account/register">Become a seller</a>
	  <?php } ?>
	  <?php if(idinfo($_SESSION['ps_usern'],"role") == 1) { ?>
	    <?php if($_SESSION['ps_usern']) { ?>
          <a class="ui tiny flat green button" href="<?php echo $web['url']; ?>upgrade/redeem">Redeem code</a>
	    <?php } ?>
	  <?php } ?>
	  <?php if(idinfo($_SESSION['ps_usern'],"role") == 0) { ?>
	    <?php if($_SESSION['ps_usern']) { ?>
          <a class="ui tiny flat green button" href="<?php echo $web['url']; ?>upgrade/redeem">Redeem code</a>
	    <?php } ?>
	  <?php } ?>
      </div>
  </div>
  </div>
  <div class="landing-header">
    <div class="ui global-wrap">
	  <h1 class="ui huge normal header inverted" style="text-transform:uppercase;font-weight:bold;margin-bottom:60px;margin-top:60px;">      <?php echo $web['home_title']; ?> <span style="color:#3498db;">MEMBERSHIP</span><br>
	  <span class="ui huge normal header inverted" style="font-weight: 300;font-size: 20px;">
			Buy &amp; receive +<?php echo $web['mem_quota']; ?> in your upload quota
	  </span>
	  </h1>
    </div>
  </div>
  <div class="background-overlay"></div>
</div>
<div class="centered marketplace-items single">
<?php if($web['currency'] == NULL && $web['paypal_email'] == NULL) { ?><div role="alert" class="alert color orange-color">You must edit your payment settings in order to use your store.</div><?php } else { ?>
  <h2 class="ui header normal">Upgrade your uploading quota</h2>
  <!-- UPGRADE ITEMS START -->
  <div class="ui items">
	<?php
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
		$limit = 3;
		$startpoint = ($page * $limit) - $limit;
		$statement = "`sellify_items`";
		$sql = mysql_query("SELECT * FROM {$statement} WHERE membership='on' ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
		if(mysql_num_rows($sql)>0) {
		while($row = mysql_fetch_array($sql)) {
	?>
  <!-- PRODUCT START -->
  <div class="ui segment item product-item -view " style="margin: 8px!important;" itemscope itemtype="http://schema.org/Product">
      <div class="ui image product-image">
        <a href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" title="<?php echo $row['name']; ?>" class="product-image-hover" target="_top">
          <strong class="ui header"><?php echo $row['name']; ?></strong>
          <div class="block-ellipsis">
            <span class="hover-description"><?php echo $row['description']; ?></span>
          </div>
        </a>
		<a class="product-image-static lazy-load" title="<?php echo $row['name']; ?>" target="_top" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" style="display: block;height:<?php echo $web['home_dimensions']; ?>px; background-image: url(<?php echo $web['url']; echo $row['preview']; ?>);"></a>
	  </div>
	  <div class="row product-meta">
		<div class="ui grid">
		  <div class="row product-meta-info">
			<div class="twelve wide column">
			  <h3 class="ui header">
				<a class="truncate" title="<?php echo $row['name']; ?>" target="_top" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>">
				  <span itemprop="name"><?php echo $row['name']; ?></span>
				</a>
			  </h3>
			  <div class="ui divider"></div>
			</div>
		  </div>
		  <div class="equal height two column row product-price-wrap">
		  <div class="left aligned column">
			<a class="price" title="Buy <?php echo $row['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" target="_top">
				<span class="">
				<?php if($row['price_extended'] == 0.00) { ?>FREE<?php } ?><?php if($row['price_extended'] > 0.00) { ?><?php if($row['item_currency'] == USD) { ?><?php echo decode_currency($row['item_currency']); echo $row['price_extended']; ?><?php } ?><?php if($row['item_currency'] == EUR) { ?><?php echo $row['price_extended']; echo decode_currency($row['item_currency']); ?><?php } ?><?php if($row['item_currency'] == GBP) { ?><?php echo decode_currency($row['item_currency']); echo $row['price_extended']; ?><?php } ?><?php } ?>
				</span>
			</a>
		  </div>
		  <div class="right aligned column">
		  <?php if($row['price_extended'] == 0.00) { ?>
			<a class="ui tiny basic button price-button" title="Download <?php echo $row['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" target="_top">Download</a>
		  <?php } ?>
		  <?php if($row['price_extended'] > 0.00) { ?>
			<a class="ui tiny basic button price-button" title="Buy <?php echo $row['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" target="_top">Upgrade</a>
		  <?php } ?>
		  </div>
		  </div>
		</div>
	  </div>
	  <?php if($row['membership'] == on) { ?>
		<div class="ui label clip green">MEMBERSHIP PLAN</div>
	  <?php } ?>
  </div>
  <!-- PRODUCT END -->

	<?php 
	}
		} else {
			echo info('Currently there are no membership plan.');
		}
	?>

  </div>
  <!-- UPGRADE ITEMS END -->
  <?php } ?>
</div>
  </div>
    </div>
  </div>
	<!-- FOOTER START -->
	<div id="modal" style="display:none;">
	<div id="form_modal_Y7LY" class="ui modal transition visible active" style="margin-top: -12%;">
		<i class="modal_close icon close"><i class="fa fa-times"></i></i>

		
		<div id="login" class="user_login content auth" style="display: block;">
			<div class="ui header">Log in to <?php echo $web['title']; ?></div>
			<?php 
			if(isset($_POST['phps_login'])) {
				$phps_usern = protect($_POST['phps_usern']);
				$phps_passwd = protect($_POST['phps_passwd']);
				$phps_passwd = md5($phps_passwd);
				$query = mysql_query("SELECT * FROM sellify_users WHERE usern='$phps_usern' and passwd='$phps_passwd'");
				if(mysql_num_rows($query)) {
					$_SESSION['ps_usern'] = $phps_usern;
					header("Location: $web[url]dashboard");
				} else {
					echo error('<p align="center">Oops! You have entered wrong username or password</p>');
				}
			}
			?>
			<form action="" method="post" accept-charset="utf-8" class="ui form">
				<div class="field">
					<input type="text" value="" placeholder="Username" name="phps_usern" autofocus="">
				</div>
				<div class="field">
					<input name="phps_passwd" type="password" value="" placeholder="Password" autocomplete="off">
				</div>
				<div class="field center aligned">
					<button type="submit" name="phps_login" class="ui green button fluid submit">Log in</button>
				</div>
				<div class="field switch">
				  Don't have an account yet?
				   <a href="<?php echo $web['url']; ?>account/register" id="register_form" class="auth-switch" data-location="signup">
					 Sign up <i class="fa fa-arrow-right"></i>
				   </a>
				  
				</div>
			</form>
		</div>
	</div>
	</div>
	
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
	<?php include("$web[url]static/gen/modal/footer-modal.php"); ?>
	
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_marketplace.js"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>