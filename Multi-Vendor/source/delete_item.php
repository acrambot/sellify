<?php include("header/header-user_access.php"); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Delete item - <?php echo $web['title']; ?></title>
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
			$custom_url = protect($_GET['custom_url']);
			$quotas = idinfo($_SESSION['ps_usern'],'quotas');
			$sql = mysql_query("SELECT * FROM sellify_items WHERE custom_url='$custom_url'");
			if(mysql_num_rows($sql)==0) { $redirect = $web['url']."not_found"; header("Location:$redirect"); }
			$row = mysql_fetch_array($sql);
			?>
			<?php
			if($_GET['confirmed'] == "yes") {
				if($row['author'] !== $_SESSION['ps_usern']) {
				$sql5 = mysql_query("SELECT * FROM sellify_users WHERE usern='$row[author]'");
				$row5 = mysql_fetch_array($sql5);
				$delete_email = $row5['email'];
					$to = $delete_email;
									$headers  = "From: $web[email]\r\n"; 
									$headers .= "Content-type: text/html\r\n"; 
									$subject = "We've removed $row[name]";
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
						<h1 style=\"font-size:20px;margin:0;color:#333;\">Hey $row[author],</h1>

						<p style=\"font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;color:#333;\">Our Staff Team have removed one of your items ($row[name]) because it does not meet our requirements. You can still upload and access your products:</p>

						<p style=\"font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;color:#333;\"><a href=\"$web[url]products\" style=\"border-radius:3px;background:#3aa54c;color:#fff;display:block;font-weight:700;font-size:16px;line-height:1.25em;margin:24px auto 24px;padding:10px 18px;text-decoration:none;width:180px;text-align:center;\" target=\"_blank\">View my products</a></p>

						<p style=\"font:15px/1.25em 'Helvetica Neue', Arial, Helvetica;color:#939393;margin-bottom:0;\">If you have any question about this deletion you can contact us at $web[contact_email].</p>
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
									echo 'Email sent to the customer to inform him you have removed his product<br><br>';
				}
				@unlink("$row[preview]");
				@unlink("$row[thumbnail]");
				@unlink("$row[main_file]");
				$delete = mysql_query("DELETE FROM sellify_items WHERE custom_url='$custom_url'");
				echo '<p align="center">Product ('.($row[name]).') was deleted.</p>';
				echo '<br>';
				echo '<center><a style="text-decortion:none!important;color:#fff!important;" href="'.$web[url].'dashboard" class="ui button red">Return to dashboard</a></center>';
			} else {
				echo '<p align="center">Are you sure you want to delete this product ('.($row[name]).')?</p>';
				echo '<br>';
				echo '<center><a style="text-decortion:none!important;color:#fff!important;" class="ui tiny flat red button" href="'.$web[url].'confirm_delete/'.$row[custom_url].'">Yes</a>&nbsp;&nbsp;<a style="text-decortion:none!important;color:#fff!important;" class="ui tiny flat green button" href="'.$web[url].'dashboard">No</a></center>';
			}
			?>
		<?php if(idinfo($_SESSION['ps_usern'],"role") == 0) { ?>
			<?php if($_SESSION['ps_usern'] !== $row['author']) { $redirect = $web['url']."not_found"; header("Location:$redirect"); } ?>
		<?php } ?>
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