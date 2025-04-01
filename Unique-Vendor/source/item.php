<?php
$id = protect($_GET['id']);
$licanse = protect($_GET['licanse']);
$method = protect($_GET['method']);
$custom_url = protect($_GET['custom_url']);
$sql = mysql_query("SELECT * FROM sellify_items WHERE custom_url='$custom_url' OR id='$id'");
if(mysql_num_rows($sql)==0) { $redirect = $web['url']."not_found"; header("Location: $redirect"); }
$row = mysql_fetch_array($sql);

function formatBytes($bytes, $precision = 2) { 
    if ($bytes > pow(1024,3)) return round($bytes / pow(1024,3), $precision)." GB";
    else if ($bytes > pow(1024,2)) return round($bytes / pow(1024,2), $precision)." MB";
    else if ($bytes > 1024) return round($bytes / 1024, $precision)." KB";
    else return ($bytes)." B";
} 

$extnafaila = end(explode('.',$row['main_file'])); 

$extnafaila = strtoupper($extnafaila); 

$filesize = formatBytes(filesize($row['main_file']));
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $row['name']; ?> - <?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_productpage.css?a9b53688">
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
		
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-17843759-11', 'auto');
		  ga('require', 'linkid');
		  ga('set', 'dimension4', window.location.pathname);
		  ga('require', 'displayfeatures');
		</script>
	</head>
<body>
	<!-- HEADER START -->
	<?php if($_SESSION['ps_usern']) { ?>
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
	<?php } ?>
	<?php if(!$_SESSION['ps_usern']) { ?>
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
	<?php } ?>
	<!-- HEADER END -->
	<!-- BODY START -->
	<div class="body">
    <div class="body-content">
        <div class="content product-page-content">
		<div class="feed-wrap-outter">
		  <div class="ui grid feed-wrap" itemscope="" itemtype="http://schema.org/Product">
			<div class="one column row">
			  <div class="center aligned column">
				<h1 class="ui normal header product-top-header" itemprop="name" style="font-weight:900;display: block;">
				  <?php echo $row['name']; ?>
				</h1>
			  </div>
			</div>
			<div class="row product-wrap" style="display: block;">
			  <div class="eight wide column left-content">
				<div class="ui grid feed-content">
				  <div class="row feed-item">
					<div class="column product-info">
					  
					  <div class="ui segment item product-item feed-view productpage-view">
			
			<div class="ui image product-image">

				<?php if($row['featured'] == on) { ?>	
					<div class="sash--horizontal -position-left -color-blue -triangle-right -has-pointer-events">
					  <div>
						<i class="glyph--star"></i>
						<span>Featured</span>
					  </div>
					</div>
				<?php } ?>
			  
			  <?php if($row['video_url'] == !NULL) { ?>
				<div class="preview-image active media-preview" data-thumb="0">
				  <div class="noembed-embed ">
				   <div class="noembed-wrapper">
					<div class="noembed-embed-inner noembed-youtube">
					  <iframe src="https://www.youtube.com/embed/<?php echo $row['video_url']; ?>?feature=oembed" frameborder="0" allowfullscreen=""></iframe>
					</div>
				   </div>
				  </div>
				</div>
			  <?php } ?>
			  <?php if($row['video_url'] == NULL) { ?>
				  <img width="<?php echo $web['item_dimensions']; ?>" class="preview-image active" src="<?php echo $web['url']; ?><?php echo $row['preview']; ?>" alt="<?php echo $row['name']; ?>"/>
			  <?php } ?>
			  <div class="product-thumbnails centered">
				<?php if($row['demo_url'] == !NULL) { ?><a class="ui red button" target="_blank" href="<?php echo $row['demo_url']; ?>">Live preview</a> <?php } ?>
				<?php if($row['screenshots_url'] == !NULL) { ?><a class="ui red button" target="_blank" href="<?php echo $row['screenshots_url']; ?>">Screenshots preview</a> <?php } ?>
				<a style="margin-left: 5px;" class="ui blue button share product-share-button no-mobile" href="#embed">Share &amp; Embed</a>
			  </div>
			</div>
		  <div class="row product-meta">
			<div class="ui grid">
			  <div class="row product-meta-info">
				<div style="color:#333!important;line-height: 29px!important;" class="twelve wide column">
				  
				  <h1 class="ui header iframe-header" itemprop="name"><?php echo $row['name']; ?></h1>
			   
				  <div class="ui divider"></div>
				  <p class="product-description" itemprop="description"><?php echo $row['description']; ?></p>
				</div>
			  </div>
			</div>
		  </div>
		  
		</div>
					  <div class="ui bottom attached centered segment about-author-view">
						<?php if($row['price_extended'] == 0.00) { ?><a class="ui green button" href="<?php echo $web['url']; ?>download/<?php echo $row['custom_url']; ?>">Download</a><?php } ?>
						<?php if($row['price_extended'] > 0.00) { ?><a class="ui green button open_payments">Buy now</a><?php } ?>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			  <div class="four wide column right-sidebar">
				

		<div class="ui top attached segment sidebar-price-wrap" itemscope="" itemtype="http://schema.org/Offer">
		  
		  <p class="current-price">
			<?php if($row['price_extended'] > 0.00) { ?>
				<?php if($web['currency'] == USD) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?>
				<?php if($web['currency'] == EUR) { ?><?php echo $row['price_extended']; echo decode_currency($web['currency']); ?><?php } ?>
				<?php if($web['currency'] == GBP) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?>
			<?php } ?>
			<?php if($row['price_extended'] == 0.00) { ?>
				FREE
			<?php } ?>
		  </p>
		  <input type="hidden" id="ga_ec_step1_type" value="Buy">
			<?php if($row['price_extended'] > 0.00) { ?>
			<a class="ui button green fluid big buy-now-button open_payments" rel="nofollow">
				Buy Now
			</a>
			<?php } ?>
			<?php if($row['price_extended'] == 0.00) { ?>
			<a class="ui button green fluid big buy-now-button" href="<?php echo $web['url']; ?>download/<?php echo $row['custom_url']; ?>" rel="nofollow">
				Download Now
			</a>
			<?php } ?>
			<br><div style="border-top: 1px dashed #EBEEF2;" class="ui divider"></div><br>
			<a class="ui button blue fluid small buy-now-button open_discounts" rel="nofollow">
				Share
			</a>
			<div class="product-social-share-buttons">
			  <p>
				Share this product:
			  </p>
			  <p>
				<a class="ui button icon tiny flat twitter share-button-dialog" href="https://twitter.com/intent/tweet?text=<?php echo $row['name']; ?><?php if($web['twitter_name'] == !NULL) { ?>%20via%20@<?php echo $web['twitter_name']; ?><?php } ?>%20-&url=<?php echo $web['url']."p/".$row['custom_url']; ?>">
				  <i class="fa fa-twitter"></i> Tweet
				</a>
				
				<a class="ui button icon tiny flat facebook share-button-dialog" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web['url']."p/".$row['custom_url']; ?>">
				  <i class="fa fa-facebook"></i> Share
				</a>
			  </p>
			  <form id="product_discount_form">
				<input name="_csrf_token" type="hidden" value="gVGiERlI">
			  </form>
			</div>
			
		</div>
		<div class="ui bottom attached segment sidebar-product-meta">
		  <div class="ui grid">
			<?php if($row['price_extended'] > 0.00) { ?>
			<div class="two column row">
			  <div class="column">Filesize:</div>
			  <div class="right aligned column">
				<?php echo $filesize; ?>
			  </div>
			</div>
			<?php } ?>
			<div class="row">
			  <div class="four wide column">Filetype:</div>
			  <div class="eight wide right aligned column">
				.<?php echo $extnafaila; ?> file
			  </div>
			</div>
			<?php if($row['price_extended'] > 0.00) { ?>
			<div class="row">
			  <div class="four wide column">Sales:</div>
			  <div class="eight wide right aligned column">
				<?php echo ($row['sales'] / 2); ?>
			  </div>
			</div>
			<?php } ?>
			<?php if($row['price_extended'] == 0.00) { ?>
			<div class="row">
			  <div class="four wide column">Downloads:</div>
			  <div class="eight wide right aligned column">
				<?php if($row['downloads'] == 0) { echo '0'; } else { echo $row['downloads']; } ?>
			  </div>
			</div>
			<?php } ?>
		  </div>
		</div>


			<?php if($row['price_extended'] > 0.00) { ?>
			<div class="ui segment">
				<h1 style="text-align:center;font-size:25px;color:#333;">Secured transactions:</h1>
				
				<br><div style="border-top: 1px dashed #EBEEF2;" class="ui divider"></div><br>
				
				<p>PayPal is one of the largest global e-commerce allowing payments and money transfers to be made through the Internet. The company services a large amount of online stores and serves as a secure payment platform with credit cards or money transfers.</p>
			</div>
			<?php } ?>
			<?php if($row['price_extended'] == 0.00) { ?>
			<div class="ui segment">
				<h1 style="text-align:center;font-size:25px;color:#333;">Free file:</h1>
				
				<br><div style="border-top: 1px dashed #EBEEF2;" class="ui divider"></div><br>
				
				<p>A product that is free of charge means it can be downloaded by anyone easily. However this does not mean you can do whatever you want, you must comply with the terms of the license.</p>
			</div>
			<?php } ?>

			  </div>
			  <i class="fa fa-times"></i>
			</div>
			
			<div class="row slide slide-wrap" style="display: none;">
			  <div class="column full-width">
				
			<?php if($_SESSION['ps_usern']) { ?>
			<ul class="ui step-progress">
			  <li class="step hide-billing-slide" style="width: 30.333%;">Choose product</li>
			  <li class="step completed" style="width: 30.333%;">Place order</li>
			  <li class="step " style="width: 30.333%;">Download product</li>
			</ul>
			<?php } ?>
			
			<?php if(!$_SESSION['ps_usern']) { ?>
			<ul class="ui step-progress">
			  <li class="step hide-billing-slide" style="width: 30.333%;">Choose product</li>
			  <li class="step completed" style="width: 30.333%;">Log in</li>
			  <li class="step " style="width: 30.333%;">Place order</li>
			</ul>
			<?php } ?>

				<div class="ui segment">
				  <form method="post" id="billing_information" class="ui form">
		<?php if(!$_SESSION['ps_usern']) { ?>
		  <div class="billing-form">
		  <div class="ui ignored warning message visible">
			You need to be logged in if you want to purchase this product.
		  </div>   
		  </div>
		<?php } else { ?>
		  <?php if($_SESSION['ps_usern'] == $row["author"]) { ?>
		  <div class="billing-form">
		  <div class="ui ignored info message visible">
			Sorry but currently you can't purchase your own product.
		  </div>   
		  </div><?php } else { ?>
		  <div class="billing-form">
		<?php
		$sql4 = mysql_query("SELECT * FROM sellify_purchases WHERE item_id='$custom_url' AND usern='$_SESSION[ps_usern]'");
		if(mysql_num_rows($sql4)==1) { ?><div class='ui ignored info message visible'>Be careful! You've already purchased this product. <a style="text-decoration:underline!important;color:#333!important;font-weight:bold;" href="<?php echo $web['url']; ?>account/purchases">View purchases</a></div><?php } ?>
		  <div class="ui ignored warning message visible">
			Payment instruction: you need to click on "Return to" in order to validate your payment.
		  </div>
		  <br>
			<div class="ui grid billing-info-table">
			  <div class="row">
				<div class="ten wide column truncate">
					<?php echo $row['name']; ?>
				</div>
				<div class="two wide aligned right column">
				  <span id="product_subtotal"><?php if($web['currency'] == USD) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?><?php if($web['currency'] == EUR) { ?><?php echo $row['price_extended']; echo decode_currency($web['currency']); ?><?php } ?><?php if($web['currency'] == GBP) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?></span>
				</div>
			  </div>
			  
			  
			  
			  <div class="ui divider"></div>
			  <div class="row">
				<div class="ten wide aligned right column total-payment">
				  <strong>
					Total payment:
				  </strong>
				</div>
				<div class="two wide aligned right column">
				  <strong>
					<span id="product_total"><?php if($web['currency'] == USD) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?><?php if($web['currency'] == EUR) { ?><?php echo $row['price_extended']; echo decode_currency($web['currency']); ?><?php } ?><?php if($web['currency'] == GBP) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?></span>
				  </strong>
				</div>
			  </div>
			</div>
			<div class="billing-user-info">
			  <div class="centered billing-buttons">
						<?php				
					if($custom_url == !NULL) {
							define('EMAIL_ADD', $web['contact_email']); // For system notification.
							define('PAYPAL_EMAIL_ADD', $web['paypal_email']);

							// Setup class
							$p = new paypal_class( );					// initiate an instance of the class.
							$email = $_REQUEST['email'];
							$p -> admin_mail = EMAIL_ADD; 
								$this_script = $web['url']."";
								  $item_name = $row['name']."";
								  $user_email = idinfo($_SESSION['ps_usern'],"email");
								  $usern = $_SESSION['ps_usern'];
								$p->add_field('business', PAYPAL_EMAIL_ADD); //don't need add this item. if your set the $p -> paypal_mail.
								$p->add_field('return', $this_script.'payment/&action=success');
								$p->add_field('cancel_return', $this_script.'cancelled');
								$p->add_field('notify_url', $this_script.'payment/&action=ipn');
								$p->add_field('item_name', $item_name);
								$p->add_field('item_number', $custom_url);
								$p->add_field('amount', $row['price_extended']);
								$p->add_field('currency_code', $web['currency']);
								$p->add_field('usern', $usern);
								$p->add_field('user_email', $user_email);
								$p->add_field('cmd', '_xclick');
								$p->add_field('rm', '2');	// Return method = POST
								
								// 0 – all shopping cart payments use the GET method
								// 1 – the buyer's browser is redirected to the return URL by using the GET method, but no payment variables are included
								// 2 – the buyer's browser is redirected to the return URL by using the POST method, and all payment variables are included The default is 0.
							 
								 $p->submit_formnull_post(); // submit the fields to paypal
							
							define('EMAIL_ADD', $web['contact_email']); // For system notification.
							define('PAYPAL_EMAIL_ADD', $web['paypal_email']);

							// Setup class
							$p = new paypal_class( );					// initiate an instance of the class.
							$email = $_REQUEST['email'];
							$p -> admin_mail = EMAIL_ADD; 
								$this_script = $web['url']."";
								  $item_name = $row['name']."";
								  $user_email = idinfo($_SESSION['ps_usern'],"email");
								  $usern = $_SESSION['ps_usern'];
								$p->add_field('business', PAYPAL_EMAIL_ADD); //don't need add this item. if your set the $p -> paypal_mail.
								$p->add_field('return', $this_script.'payment/&action=success');
								$p->add_field('cancel_return', $this_script.'cancelled');
								$p->add_field('notify_url', $this_script.'payment/&action=ipn');
								$p->add_field('item_name', $item_name);
								$p->add_field('item_number', $custom_url);
								$p->add_field('amount', $row['price_extended']);
								$p->add_field('currency_code', $web['currency']);
								$p->add_field('usern', $usern);
								$p->add_field('user_email', $user_email);
								$p->add_field('cmd', '_xclick');
								$p->add_field('rm', '2');	// Return method = POST
								
								// 0 – all shopping cart payments use the GET method
								// 1 – the buyer's browser is redirected to the return URL by using the GET method, but no payment variables are included
								// 2 – the buyer's browser is redirected to the return URL by using the POST method, and all payment variables are included The default is 0.
							 
								 $p->submit_paypal_post(); // submit the fields to paypal

					} else {
						echo error("Unknown product id.");
					}
					?>
			  </div>
			</div>
			<div class="centered supported-cc">
			  <i class="fa fa-credit-card fa-lg"></i>
			  <i class="fa fa-cc-paypal fa-lg"></i>
			  <i class="fa fa-cc-visa fa-lg"></i>
			  <i class="fa fa-cc-mastercard fa-lg"></i>
			</div>
			
		  </div><?php } ?>
		<?php } ?>
		  <!-- Data inputs -->
		  <input type="hidden" name="product" value="051S">
		  <input type="hidden" name="deal" id="deal" value="">
		  <input type="hidden" name="discount_code" id="discount_code" value="">
		  <input type="hidden" name="save" id="save" value="">
		</form>
		<form class="paypal-mobile-wrap" action="" target="PPDGFrame" id="paypal_mobile_form">
		  <input type="hidden" name="expType" value="light">
		  <input type="hidden" name="payKey" id="payKey" value="">
		</form>
		<div id="slide_billing_hide" class="slide_hide hide-billing-slide">
		<i class="icon close"><i class="fa fa-times"></i></i>
		</div>
		<?php if($_SESSION['ps_usern']) { ?><div class="billing-footer no-mobile" style="color:#2980b9!important;">
		<i class="fa fa-info-circle"></i> You will be able to download your product in your account purchases after payment done
		</div><?php } ?>
				</div>
			  </div>
			</div>
		
		<div class="one column row related-product-wrap">
          <div class="column">
            <div>
            <h3 class="ui header related-product-header">Related products</h3>
			<?php
				$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
				$limit = 3;
				$startpoint = ($page * $limit) - $limit;
				$statement = "`sellify_items`";
				$sql = mysql_query("SELECT * FROM {$statement} WHERE author='$row[author]' ORDER BY RAND() LIMIT {$startpoint} , {$limit}");
				if(mysql_num_rows($sql)>0) {
				while($row = mysql_fetch_array($sql)) {
			?>
				<div class="ui segment item product-item sidebar-view" style="width: 294px!important;" itemscope="" itemtype="http://schema.org/Product">
    
			<div class="ui image product-image">
			<a href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" title="<?php echo $row['name']; ?>" class="product-image-hover" target="_top">
				  <strong class="ui header"><?php echo $row['name']; ?></strong>
				  <div class="block-ellipsis">
					<span class="hover-description"><?php echo $row['description']; ?></span>
				  </div>
				</a><a class="product-image-static lazy-load" title="<?php echo $row['name']; ?>" target="_top" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" style="display: block;height:<?php echo $web['home_dimensions']; ?>px; background-image: url(<?php echo $web['url']; echo $row['preview']; ?>);"></a></div>
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
					<span class="discount-price">
						<?php if($row['price_extended'] == 0.00) { ?>FREE<?php } ?><?php if($row['price_extended'] > 0.00) { ?><?php if($web['currency'] == USD) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?><?php if($web['currency'] == EUR) { ?><?php echo $row['price_extended']; echo decode_currency($web['currency']); ?><?php } ?><?php if($web['currency'] == GBP) { ?><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?><?php } ?><?php } ?>
					  </span>
				  </a>
				</div>
				<div class="right aligned column">
		  <?php if($row['price_extended'] == 0.00) { ?>
			<a class="ui tiny basic button price-button" title="Download <?php echo $row['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" target="_top">Download</a>
		  <?php } ?>
		  <?php if($row['price_extended'] > 0.00) { ?>
			<a class="ui tiny basic button price-button" title="Buy <?php echo $row['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" target="_top">Buy now</a>
		  <?php } ?>
		  </div>
			  </div>
			</div>
		  </div>
		  
			<?php if($row['featured'] == on) { ?>
		<div class="ui label clip blue">FEATURED</div>
	  <?php } ?>
	  
	  <?php if($row['featured'] !== on) { ?>
		  <?php if($row['price_extended'] == 0.00) { ?>
			<div class="ui label clip orange">FREE</div>
		  <?php } ?>
		  <?php if($row['price_extended'] > 0.00) { ?>
			<?php if($web['currency'] == USD) { ?><div class="ui label clip green"><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?></div><?php } ?>
			<?php if($web['currency'] == EUR) { ?><div class="ui label clip red"><?php echo $row['price_extended']; echo decode_currency($web['currency']); ?></div><?php } ?>
			<?php if($web['currency'] == GBP) { ?><div class="ui label clip purple"><?php echo decode_currency($web['currency']); echo $row['price_extended']; ?></div><?php } ?>
		  <?php } ?>
	  <?php } ?>
		  
				</div>
				
			<?php 
			}
				} else {
					echo info('Currently there are no related products.');
				}
			?>
			</div>
          </div>
        </div>
		  </div>
		</div>
		
		<?php
		$id = protect($_GET['id']);
		$custom_url = protect($_GET['custom_url']);
		$sql = mysql_query("SELECT * FROM sellify_items WHERE custom_url='$custom_url' OR id='$id'");
		$row = mysql_fetch_array($sql);
		?>

		<div class="ui product-share-modal modal">
			<i class="close icon"><i class="fa fa-times"></i></i>
			<div class="header">
				Spread the word!
			</div>
			<div class="content">
				<div class="ui grid form">
					<div class="row">
						<div class="column field">
							<h4 class="ui header normal left aligned">
								1. Share this product
							</h4>
						</div>
					</div>
					<div class="row">
						<div class="column field center aligned">
							<input class="product-share-url" type="text" value="<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>" readonly="">
						</div>
					</div>
					<div class="three column tight row product-share-social">
						<div class="column">
							<a class="ui button icon fluid small flat twitter share-button-dialog" href="https://twitter.com/intent/tweet?text=<?php echo $row['name']; ?><?php if($web['twitter_name'] == !NULL) { ?>%20via%20@<?php echo $web['twitter_name']; ?><?php } ?>%20-&url=<?php echo $web['url']."p/".$row['custom_url']; ?>" data-height="500" data-width="495">
								<i class="fa fa-twitter"></i>
								Tweet
							</a>
						</div>
						<div class="column">
							<a class="ui button icon fluid small flat facebook share-button-dialog" data-height="380" data-width="495" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $web['url']."p/".$row['custom_url']; ?>">
								<i class="fa fa-facebook"></i>
								Share
							</a>
						</div>
						<div class="column">
							<a class="ui button icon fluid small flat google plus share-button-dialog" data-height="400" data-width="500" href="https://plus.google.com/share?url=<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>">
								<i class="fa fa-google-plus"></i>
								Share
							</a>
						</div>
					</div>
					<div class="ui divider"></div>
					<div class="row">
						<div class="column field">
							<h4 class="ui header normal left aligned">
								2. Embed buy now button on your website
							</h4>
						</div>
					</div>
					<div class="row">
						<div class="column">
							<div class="field">
								<div class="ui input embed-code-holder">
									<input class="default-embed" type="text" value="&lt;a href=&#34;<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>&#34; id=&#34;<?php echo $row['custom_url']; ?>&#34;&gt;&lt;img class=&#34;aligncenter&#34; src=&#34;<?php echo $web['url']; ?>static/img/download-button.png&#34; width=&#34;298&#34; height=&#34;64&#34;&gt;&lt;a&gt;">

									<input class="new-window-embed" type="text" value="&lt;a target=&#34;_blank&#34; href=&#34;<?php echo $web['url']; ?>p/<?php echo $row['custom_url']; ?>&#34; id=&#34;<?php echo $row['custom_url']; ?>&#34;&gt;&lt;img class=&#34;aligncenter&#34; src=&#34;<?php echo $web['url']; ?>static/img/download-button.png&#34; width=&#34;298&#34; height=&#34;64&#34;&gt;&lt;a&gt;">
								</div>
							</div>
							<div class="field">
								<input type="checkbox" id="change_embed_code" name="change_embed_code">
								<label for="change_embed_code">Open link in new tab instead of same window</label>
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
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_productpage.js?75ede2fe"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>