<?php
$usern = protect($_GET['usern']);
$sql = mysql_query("SELECT * FROM sellify_users WHERE usern='$usern' OR id='$id'");
if(mysql_num_rows($sql)==0) { $redirect = $web['url']."not_found"; header("Location: $redirect"); }
$row = mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php if($row["pname"] !== "") { ?><?php echo $row["pname"]; ?> - <?php } ?><?php echo $web['title']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php echo $web['description']; ?>">
		<meta name="author" content="Spreadrr Design">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		
		
		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/elements.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
		<link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_newprofilepage.css">
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
		<div class="right aligned column connect-panel">
			<a class="menu-link dashboard" href="<?php echo $web['url']; ?>dashboard" data-pushstate="true" title="Go to my dashboard">Dashboard</a>
		 <div class="ui top right pointing dropdown text header-dropdown-right" tabindex="0">
			<span class="header-merchant-logo header-dropdown-url" style="background-image: url('<?php if(idinfo($_SESSION['ps_usern'],'avatar') !== NULL) { ?><?php echo idinfo($_SESSION['ps_usern'],'avatar'); ?><?php } ?><?php if(idinfo($_SESSION['ps_usern'],'avatar') == NULL) { ?><?php echo $web['url']; ?>static/img/profile-placeholder.png<?php } ?>')"></span> <i class="fa fa-angle-down"></i>
			
		  <div class="menu header-notification-dropdown" tabindex="-1">
			<div class="item">
			  <a id="profile_link" href="<?php echo $web['url']; ?>user/<?php echo $_SESSION['ps_usern']; ?>" title="My profile" class="active">My profile</a>
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
      <div id="profile_page" class="">
  
  <div class="content">
    
    <div class="profile-topbar">
      <div class="profile-splash customized" style="<?php if($row['user_banner'] == "") { ?>background-color: #34495e!important;<?php } ?><?php if($row['user_banner'] !== "") { ?>background-image: url(<?php echo $row['user_banner']; ?>)<?php } ?>"></div>
      <div class="ui grid profile">
        <div class="equal height row">
          <div class="ten wide column">
            <div class="profile-meta-info">
              <h1 class="ui header profile-name">
                <a title="<?php echo $row['pname']; ?>" href="<?php echo $web['url']; ?>user/<?php echo $row['usern']; ?>" rel="contact" target="_self">
                <?php if($row['avatar'] !== "") { ?><span class="profile-image lazy-load" style="display: block; background-image: url(<?php echo $row['avatar']; ?>);"></span><?php } ?>
				<?php if($row['avatar'] == "") { ?><span class="profile-image lazy-load" style="display: block; background-image: url(<?php echo $web['url']; ?>static/img/profile-placeholder.png);"></span><?php } ?>
                <span><?php echo $row['pname']; ?></span>
                </a>
              </h1>
              <div class="social">
                
                  <?php if($row['twitter_name'] !== "") { ?>
				  <a class="tw" style="margin-right:8px" rel="me nofollow noreferrer" title="<?php echo $row['pname']; ?> on Twitter" href="https://twitter.com/<?php echo $row['twitter_name']; ?>">
                      <span class="text"><i class="fa fa-twitter"></i></span>
                  </a>
				  <?php } ?>
                
                
                  <?php if($row['facebook_url'] !== "") { ?>
				  <a class="fb" style="margin-right:5px" rel="me nofollow noreferrer" title="<?php echo $row['pname']; ?> on Facebook" href="<?php echo $row['facebook_url']; ?>">
                      <span class="text"><i class="fa fa-facebook"></i></span>
                  </a>
				  <?php } ?>
                
                
                <a class="website" href="<?php echo $row['website_url']; ?>" rel="me nofollow noreferrer" title="<?php echo $row['pname']; ?>'s website">
                    <span class="text">
                      <?php echo $row['website_url']; ?>
                    </span>
                    
                </a>
                
              </div>
            </div>
            
            <h2 class="bio">
                <?php echo $row['user_desc']; ?>
            </h2>
            
          </div>
          <?php if($_SESSION['ps_usern'] == $usern) { ?>
		  <div class="right aligned two wide column follow-button-holder">
			<div class="follow-button merchant">
              <a href="<?php echo $web['url']; ?>account/profile" class="ui button basic bold">Edit profile</a>
            </div>
          </div>
		  <?php } ?>
		<?php if($_SESSION['ps_usern']) { ?>
		  <?php if($_SESSION['ps_usern'] !== $usern) { ?>
		  <div class="right aligned two wide column follow-button-holder">
              <div class="follow-button follow">
                <a href="<?php echo $web['url']; ?>account/profile"><div id="subscribe_btn" class="ui button green profile-subscribe-btn">
                    My Account
                </div></a>
              </div>
          </div>
		  <?php } ?>
		<?php } else { ?>
		  <div class="right aligned two wide column follow-button-holder">
              <div class="follow-button follow">
                <a href="<?php echo $web['url']; ?>account/login"><div id="subscribe_btn" class="ui button green profile-subscribe-btn">
                    Login
                </div></a>
              </div>
          </div>
		<?php } ?>
        </div>
        <div class="row equal height">
          
          <div class="ui text menu profile-header-pagination">
          </div>
          
        </div>
      </div>
    </div>
    
    <div class="profile-content-wrap">
      <div class="profile-content">
        <div class="profile-items">
            

  <div class="ui items" id="product_holder" style="position: relative; width: 960px;">
			<?php
				$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
				$limit = 50000;
				$startpoint = ($page * $limit) - $limit;
				$usr = mysql_query("SELECT * FROM sellify_items WHERE author='$usern' AND membership='' OR membership='off' ORDER BY id DESC LIMIT {$startpoint} , {$limit}");
				if(mysql_num_rows($usr)>0) {
				while($usri = mysql_fetch_array($usr)) {
			?>
	
	<div class="ui segment item product-item " style="position: absolute; left: 0px; top: 0px;">
    
    <div class="ui image product-image">
		<a href="<?php echo $web['url']; ?>p/<?php echo $usri['custom_url']; ?>" title="<?php echo $usri['name']; ?>" class="product-image-hover" target="_top">
          <strong class="ui header"><?php echo $usri['name']; ?></strong>
          <div class="block-ellipsis">
            <span class="hover-description"><?php echo $usri['description']; ?></span>
          </div>
        </a>
		<a class="product-image-extension" title="<?php echo $usri['name']; ?>" target="_top" href="<?php echo $web['url']; ?>p/<?php echo $usri['custom_url']; ?>">
            <img class="preview-image lazy-load" itemprop="image" alt="<?php echo $usri['name']; ?>" style="height:167px; display: block;" src="<?php echo $web['url']; ?><?php echo $usri['preview']; ?>">
        </a>
	</div>
  <div class="row product-meta">
    <div class="ui grid">
      <div class="row product-meta-info">
        <div class="twelve wide column">
          
          <h3 class="ui header">
            <a class="truncate" title="<?php echo $usri['name']; ?>" target="_top" href="<?php echo $web['url']; ?>p/<?php echo $usri['custom_url']; ?>">
              <span itemprop="name"><?php echo $usri['name']; ?></span>
            </a>
          </h3>
          
          <h4 class="author-meta-wrap">
            <a class="author-meta" href="<?php echo $web['url']; ?>user/<?php echo $row['usern']; ?>" target="_top" title="<?php echo $row['pname']; ?>">
              <span class="author-avatar" style="background-image: url(<?php echo $row['avatar']; ?>);"></span>
              <span class="author-name"><?php echo $row['pname']; ?></span>
            </a>
          </h4>
          <div class="ui divider"></div>
        </div>
      </div>
      <div class="equal height two column row product-price-wrap">
      <div class="left aligned column">
        <a class="price" title="Buy <?php echo $usri['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $usri['custom_url']; ?>" target="_top">
            
            <span class="">
              <?php if($usri['price_extended'] == 0.00) { ?>FREE<?php } ?><?php if($usri['price_extended'] > 0.00) { ?><?php if($usri['item_currency'] == USD) { ?><?php echo decode_currency($usri['item_currency']); echo $usri['price_extended']; ?><?php } ?><?php if($usri['item_currency'] == EUR) { ?><?php echo $usri['price_extended']; echo decode_currency($usri['item_currency']); ?><?php } ?><?php if($usri['item_currency'] == GBP) { ?><?php echo decode_currency($usri['item_currency']); echo $usri['price_extended']; ?><?php } ?><?php } ?>
            </span>
          </a>
        </div>
        <div class="right aligned column">
		  <?php if($usri['price_extended'] == 0.00) { ?>
			<a class="ui tiny basic button price-button" title="Download <?php echo $usri['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $usri['custom_url']; ?>" target="_top">Download</a>
		  <?php } ?>
		  <?php if($usri['price_extended'] > 0.00) { ?>
			<a class="ui tiny basic button price-button" title="Buy <?php echo $usri['name']; ?>" href="<?php echo $web['url']; ?>p/<?php echo $usri['custom_url']; ?>" target="_top">Buy now</a>
		  <?php } ?>
		</div>
      </div>
    </div>
  </div>
  
</div>

			<?php 
			}
				} else {
					echo info('<div class="no-products-view"></div>');
				}
			?>

  </div>
  <div class="item-pagination">
    
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
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_profile_new.js"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>