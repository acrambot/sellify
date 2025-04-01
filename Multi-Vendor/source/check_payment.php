<?php include("header/header-user_access.php"); ?>
<?php
  $membership = protect($_GET['membership']);
  $sql = mysql_query("SELECT * FROM sellify_items WHERE custom_url='$_POST[item_number]'");
  $row = mysql_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Payment Status - <?php echo $web['title']; ?></title>
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
<div class="user-area-wrap wide">
  <div class="notification-container" id="container_for_notification">
    <div id="notification_box" class="ui message message-notification">
        <i id="not_icon" class="warning icon"></i>
        <div id="not_message"></div>
        <div class="message-notification-icons">
            <i id="not_confirm" class="checkmark icon" title="Confirm"></i>
            <i id="not_close" class="close icon" title="Close"></i>
        </div>
    </div>
</div>
  <div class="ui stackable grid">
    <div class="column left-navigation" id="container_for_navigation"></div>
    <div class="column main-content" id="content_container">
<div id="content">
    <br><br><br><br><br><br><br><br><br><br><div class="ui grid purchase-list">
        <div class="row purchases-default" style="display: none;">
            <div class="center aligned column">
                <div class="ui segment">
                    <div class="ui active inline loader" style="display: none;"></div>
                    <div class="no-purchases">
                        You don't have any purchases yet
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
									<?php
			$method = protect($_GET['method']);
			if($method == $method) {
				// read the post from PayPal system and add 'cmd'
				$req = 'cmd=_notify-validate';

				foreach ($_POST as $key => $value) {
				$value = urlencode(stripslashes($value));
				$req .= "&$key=$value";
				}

				// post back to PayPal system to validate
				$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
				$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
				$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
				$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);

				// assign posted variables to local variables
				$item_name = $_POST['item_name'];
				$earnings = $web['earnings'];
				$sales = $row['sales'];
				$custom_url = $item_number;
				$preview_image = $row['preview'];
				$membership = $row['membership'];
				$item_number = $_POST['item_number'];
				$payment_status = $_POST['payment_status'];
				$payment_amount = $_POST['mc_gross'];
				$payment_currency = $_POST['mc_currency'];
				$txn_id = $_POST['txn_id'];
				$receiver_email = $_POST['receiver_email'];
				$payer_email = $_POST['payer_email'];
				$user_email = idinfo($_SESSION['ps_usern'],"email");
				$get = mysql_fetch_array(mysql_query("SELECT * FROM sellify_users ORDER BY id LIMIT 1"));
				$admin_email = $get['email'];
				$expl = explode(", license: ",$item_name);
				$licanse_type = $expl[1];
				$pricee = $row["price_extended"];
				if (!$fp) {
				// HTTP ERROR
				} else {
				fputs ($fp, $header . $req);
				while (!feof($fp)) {
				$res = fgets ($fp, 1024);
				if (strcmp ($res, "VERIFIED") == 0) {

					if ($payment_status == 'Completed') {


							if ($row['paypal_address'] == $row['paypal_address']) {

								if ($payment_amount == $pricee && $row["item_currency"] == $row["item_currency"]) {
									echo '<center><span style="font-size:30px;text-decoration:none!important;color:#333!important;">Payment is successfull.</span><br><br><span style="font-size:16px;">You will receive an automated message from the system. <a style="color:#333!important;text-decoration:underline!important;" href="'.$web["url"].'account/purchases">View my purchases →</a></span></center>';
									$update = mysql_query("UPDATE sellify_items SET sales = sales + 1 WHERE custom_url = '$item_number'");
									$random_password=md5(uniqid(rand()));
									$email_code=substr($random_password, 0, 12);
									$time = time();
									$insert = mysql_query("INSERT sellify_purchases (item_id,usern,buyer_email,time,code,name,price,membership) VALUES ('$item_number','$_SESSION[ps_usern]','$user_email','$time','$email_code','$item_name','$payment_amount','$row[membership]')");
									$to = $user_email;
									$headers  = "From: $web[email]\r\n"; 
									$headers .= "Content-type: text/html\r\n"; 
									$subject = "Thanks for purchasing $item_name";
									$message = "<!DOCTYPE html>
<html hola_ext_inject=\"disabled\">
<head>
	<title></title>
	<meta name=\"charset\" content=\"utf-8\">
</head>
<body>
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"color:#333;background:#fff;padding:0;margin:0;width:100%;font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;\">
	<tbody>
		<tr width=\"100%\">
			<td align=\"left\" style=\"background:#f0f0f0;font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;\" valign=\"top\">
			<table style=\"border:none;padding:0 18px;margin:50px auto;width:500px;\">
				<tbody>
					<tr height=\"57\" width=\"100%\">
						<td align=\"left\" style=\"border-top-left-radius:4px;border-top-right-radius:4px;background:#0079bf;padding:12px 18px;text-align:center;\" valign=\"top\">
						<div style=\"border-collapse:collapse;color:#ffffff;font-family:Montserrat, sans-serif;font-size:30px;font-weight:bold;line-height:100%;padding-top:10px;padding-right:0;padding-bottom:10px;padding-left:0;text-align:center;vertical-align:middle;\"><span style=\"color:#fff!important;\">$web[title]</span></div>
						</td>
					</tr>
					<tr width=\"100%\">
						<td align=\"left\" style=\"border-bottom-left-radius:4px;border-bottom-right-radius:4px;background:#fff;padding:18px;\" valign=\"top\">
						<h1 style=\"font-size:20px;margin:0;color:#333;\">Hey $_SESSION[ps_usern],</h1>

						<p style=\"font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;color:#333;\">Thank your for purchasing one of our product. Now you can download your file by clicking here:</p>

						<p style=\"font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;color:#333;\"><a href=\"$web[url]account/purchases\" style=\"border-radius:3px;background:#3aa54c;color:#fff;display:block;font-weight:700;font-size:16px;line-height:1.25em;margin:24px auto 24px;padding:10px 18px;text-decoration:none;width:180px;text-align:center;\" target=\"_blank\">View purchases</a></p>

						<p style=\"font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;color:#939393;margin-bottom:0;\">If you didn't purchase a $web[title] product, just delete this email and everything will go back to the way it was.</p>
						</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
	</tbody>
</table>
</body>
</html>
";
									mail($to, $subject, $message, $headers);
									header('Refresh: 1;url='.$web["url"].'payment/&action=success');
								} else {
									echo '<center><span style="font-size:30px;text-decoration:none!important;color:#333!important;">Payment is denied.</span><br><br><span style="font-size:16px;">There is a problem with your payment, please contact our team quickly.</span></center>';
								}

							} else {
								echo '<center><span style="font-size:30px;text-decoration:none!important;color:#333!important;">Payment is denied.</span><br><br><span style="font-size:16px;">Error with payment receiver.</span></center>';
							}

					}

				}

				else if (strcmp ($res, "INVALID") == 0) {
					echo '<center><span style="font-size:30px;text-decoration:none!important;color:#333!important;">Payment is successfull.</span><br><br><span style="font-size:16px;">You will receive an automated message from the system. <a style="color:#333!important;text-decoration:underline!important;" href="'.$web["url"].'account/purchases">View my purchases →</a></span></center>';
					header('Refresh: 3;url='.$web["url"].'account/purchases');
				}
				}
				fclose ($fp);
				}  
			} else {
				echo '<center><span style="font-size:30px;text-decoration:none!important;color:#333!important;">Payment is rejected.</span><br><br><span style="font-size:16px;">There was an error with your payment. Please try again later.</span></center>';
			}
			?>
								  </div>
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
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_global.js?51b2b110"></script>
	<script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/packed_user.js"></script>
	<!-- FOOTER CODE -->
  
</body>
</html>