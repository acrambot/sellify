<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Add a new invoice | <?php echo $web['title']; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="<?php echo $web['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Stylesheets -->
  <link href="http://static.spreadrr.com/sellify/checkout/checkout.css" media="all" rel="stylesheet" />
  <!-- End Stylesheets -->
  
  <!-- Scripts -->
  <script src="http://static.spreadrr.com/sellify/checkout/checkout.js"></script>
  <script src="http://static.spreadrr.com/sellify/checkout/countries.js"></script>
  <!-- End Scripts -->
  
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
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-32x32.png" sizes="32x32">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-TileImage" content="<?php echo $web['url']; ?>static/favicons/mstile-144x144.png">
  <!-- End Favicons -->
</head>
<body>
<div class="content" data-content="">
 <div class="wrap" style="width:40%">
  <div class="main" role="main">
   <div class="main__header">
            

    <h1 class="logo__text"><?php echo $web['title']; ?></h1><br>


            <ul class="breadcrumb ">
    <li class="breadcrumb__item breadcrumb__item--completed">
      <a class="breadcrumb__link" href="<?php echo $web['url']; ?>">Home</a>
    </li>

    <li class="breadcrumb__item breadcrumb__item--current">
      Invoice information
    </li>
    <li class="breadcrumb__item breadcrumb__item--blank">
      Result
    </li>
</ul>

            
   </div>
    <div class="main__content">
      <div class="step" data-step="contact_information">
			<?php
			if(isset($_POST['phps_upload'])) {
						$i_id = protect($_POST['i_id']);
						$i_be = protect($_POST['i_be']);
						$i_cu = protect($_POST['i_cu']);
						$i_sn = protect($_POST['i_sn']);
						$i_sl = protect($_POST['i_sl']);
						$i_se = protect($_POST['i_se']);
						$i_it = protect($_POST['i_it']);
						$i_in = protect($_POST['i_in']);
						$i_iq = protect($_POST['i_iq']);
						$i_ip = protect($_POST['i_ip']);
						$i_d = protect($_POST['i_d']);
						$i_ty = protect($_POST['i_ty']);
						$i_dte = protect($_POST['i_dte']);
						$key = md5(microtime().rand());
						
						if(empty($i_id) or empty($i_be) or empty($i_cu) or empty($i_sn) or empty($i_sl) or empty($i_se) or empty($i_it) or empty($i_in) or empty($i_iq) or empty($i_ip) or empty($i_dte)) { echo ('<div style="color: #fff;background: #e74c3c;width: 93%;padding: 20px;margin: 20px 0;border-bottom-left-radius: 3px;border-top-left-radius: 3px;border-bottom-right-radius: 3px;border-top-right-radius: 3px;text-align:left;">You must fill in <strong>all required fields</strong> before to continue.</strong></div>'); }
						else {
							$insert = mysql_query("INSERT invoicify_items (id,invoice_id,buyer_email,currency,seller_name,seller_link,seller_email,invoice_type,item_name,item_quantity,item_price,discount,thank_you,idate) VALUES ('$key','$i_id','$i_be','$i_cu','$i_sn','$i_sl','$i_se','$i_it','$i_in','$i_iq','$i_ip','$i_d','$i_ty','$i_dte')");
							$row = mysql_fetch_array(mysql_query("SELECT * FROM invoicify_items ORDER BY id DESC LIMIT 1"));
							$error = 0;
							if($error == 0) {
								$link = '<a href="'.$web[url].'invoice/'.$row[id].'">'.$row[item_name].'</a>';
								echo ('<div style="color: #fff;background: #27ae60;width: 93%;padding: 20px;margin: 20px 0;border-bottom-left-radius: 3px;border-top-left-radius: 3px;border-bottom-right-radius: 3px;border-top-right-radius: 3px;text-align:left;">Item was added successfully. <a style="border-width: 0 0 0 1px; border-left-style: solid; border-left-color: rgba(255,255,255,.25)!important; border-radius: 0; color: white; float: right;text-decoration:none;" href="'.$web[url].'invoice/'.$row[id].'" target="_blank"><strong><span style="padding-left: 20px;">Preview here</span> →</strong></a></div>');
							} else {
								echo ('<div style="color: #fff;background: #e74c3c;width: 93%;padding: 20px;margin: 20px 0;border-bottom-left-radius: 3px;border-top-left-radius: 3px;border-bottom-right-radius: 3px;border-top-right-radius: 3px;text-align:left;">Uploading error! <strong>Please try again.</strong></div>');
							}
						}
			}
			?>
  <form accept-charset="UTF-8" action="" class="edit_checkout animate-floating-labels" data-address-with-selector="true" method="post" novalidate="novalidate">

  <div class="step__sections">
    
<div class="section section--contact-information">
  <div class="section__header">
    <h2 class="section__title">Customer information</h2>
  </div>
  <div class="section__content">
    <div class="fieldset">
      <div class="field field--required">
        <div class="field__input-wrapper"><label class="field__label" for="1">Buyer Email</label>
          <input class="field__input" id="1" name="i_be" placeholder="Buyer Email" size="30" spellcheck="false" type="email" value="" required>
        </div>
	  </div>      
	</div> 
  </div> 
</div> 


<div class="section section--shipping-address">
  <div class="section__header">
    <h2 class="section__title">
      Additional information
    </h2>
  </div>
  <div class="section__content">
   <div class="fieldset">
	<!---->
    <div class="field--half field field--optional">
	 <div class="field__input-wrapper"><label class="field__label" for="2">Seller Email</label>
	  <input autocomplete="shipping given-name" class="field__input" id="2" name="i_se" placeholder="Seller Email" size="30" type="email" required>
	 </div>
	</div>
	<!---->
	<div class="field--half field field--required">
	  <div class="field__input-wrapper"><label class="field__label" for="3">Seller Link</label>
		<input autocomplete="shipping family-name" class="field__input" id="3" name="i_sl" placeholder="Seller Link" size="30" type="text" required>
	  </div>
	</div>
	<!---->
	<div class="field field--optional">
	  <div class="field__input-wrapper"><label class="field__label" for="4">Seller Name (Company)</label>
		<input autocomplete="shipping organization" class="field__input" id="4" name="i_sn" placeholder="Seller Name (Company)" size="30" type="text" required>
	  </div>
	</div>
	<!---->
	<div class="field--two-thirds field field--required">
	  <div class="field__input-wrapper"><label class="field__label" for="5">Item Name</label>
		<input autocomplete="shipping address-line1" class="field__input" id="5" name="i_in" placeholder="Item Name" size="30" type="text" required>
	  </div>
	</div>
	<!---->
	<div class="field--third field field--optional">
		<div class="field__input-wrapper"><label class="field__label" for="6">Item Quantity</label>
		  <input class="field__input" id="6" name="i_iq" placeholder="Item Quantity" size="30" type="text" required>
		</div>
	</div>
	<!---->
	<div class="field--half field field--optional">
	 <div class="field__input-wrapper"><label class="field__label" for="7">Item Price</label>
	  <input class="field__input" id="7" name="i_ip" placeholder="Item Price (e.g: '5' or '4.99')" size="30" type="email" required>
	 </div>
	</div>
	<!---->
	<div class="field--half field field--required">
	  <div class="field__input-wrapper"><label class="field__label" for="8">Discount (not %)</label>
		<input class="field__input" id="8" name="i_d" placeholder="Discount (not %)" size="30" type="text" required>
	  </div>
	</div>
	<!---->
	<div class="field field--required">
	  <div class="field__input-wrapper"><label class="field__label" for="9">Thank You line</label>
		<input class="field__input" id="9" name="i_ty" placeholder="Thank You line" size="30" type="text" required>
	  </div>
	</div>
	<!---->
	<div class="field field--required field--half field--show-floating-label">
	  <div class="field__input-wrapper field__input-wrapper--select">
	  <label class="field__label" for="10">Invoice Type</label>
		<select class="field__input field__input--select" id="10" name="i_it" size="1" required>
		<option disabled="disabled" selected="selected" value="---">---</option>
		<option class="ember-view" value="Invoice" <?php if($row['invoice_type'] == "Invoice") { echo 'selected'; } ?>>Invoice</option>
		<option class="ember-view" value="Receipt" <?php if($row['invoice_type'] == "Receipt") { echo 'selected'; } ?>>Receipt</option>
		</select>
	  </div>
	</div>
	<!---->
	<div class="field field--required field--half">
	  <div class="field__input-wrapper"><label class="field__label" for="11">Invoice ID</label>
		<input class="field__input" id="11" name="i_id" placeholder="Invoice ID" size="30" type="text">
	  </div>
	</div>
	<!---->
	<div class="field field--required field--show-floating-label">
	  <div class="field__input-wrapper field__input-wrapper--select">
	  <label class="field__label" for="12">Currency</label>
		<select class="field__input field__input--select" id="12" name="i_cu" size="1" required>
		<option disabled="disabled" selected="selected" value="---">---</option>
		<option value="USD" <?php if($row['currency'] == "USD") { echo 'selected'; } ?>>USD</option>
		<option value="EUR" <?php if($row['currency'] == "EUR") { echo 'selected'; } ?>>EUR</option>
		</select>
	  </div>
	</div>
	<!---->
	<div class="field field--optional">
	  <div class="field__input-wrapper"><label class="field__label" for="13">Current Date</label>
		<input autocomplete="shipping organization" class="field__input" id="13" name="i_dte" placeholder="Current Date" size="30" type="date" required>
	  </div>
	</div>
	<!---->
      </div> <!-- /.fieldset -->
    </div> <!-- /.section-content -->
  </div> <!-- /.section -->
  </div>

  

			<div class="step__footer">
			  <button class="step__footer__continue-btn btn" name="phps_upload" type="submit">
				<span class="btn__content">Generate my invoice</span>
				<i class="btn__spinner icon icon--button-spinner"></i>
			  </button>

			  <a class="step__footer__previous-link" href="<?php echo $web['url']; ?>">
				<svg class="previous-link__icon icon--chevron icon" xmlns="http://www.w3.org/2000/svg" width="6.7" height="11.3" viewBox="0 0 6.7 11.3"><path d="M6.7 1.1l-1-1.1-4.6 4.6-1.1 1.1 1.1 1 4.6 4.6 1-1-4.6-4.6z"></path></svg> Return to home
			  </a>
			</div>

  </form>
	  </div>
	</div>
	<div class="main__footer" role="contentinfo">
	  <p class="copyright-text">
		&copy; 2015 - <?php echo $web['title']; ?>. All rights reserved
	  </p>
	</div>
  </div>
 </div>
</div>
</body>
</html>
