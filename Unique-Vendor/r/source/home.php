<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title><?php echo $web['title']; ?></title>
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
  <div style="top: 35%;bottom: 50%;margin-left: auto;margin-right: auto;position: relative;text-align: left;" class="main" role="main">
    <div style="padding-top:50%" class="main__content">
	 <center><h1 class="logo__text" style="font-weight:100;">CREATE YOUR FREE INVOICE</h1><br>
	 
	 <a href="<?php echo $web['url']; ?>new">
	  <button class="step__footer__continue-btn btn" style="float:none;margin:auto;" type="submit">
		<span class="btn__content">Try it now for free!</span>
	  </button>
	 </a>
	 
	<?php if($_SESSION['ps_usern']) { ?>
	 <a href="<?php echo $web['url']; ?>admin/dashboard">
	  <button class="step__footer__continue-btn btn" style="background:#27ae60;float:none;margin:auto;" type="submit">
		<span class="btn__content">Admin dashboard</span>
	  </button>
	 </a>
	<?php } ?>
	 
	 </center>
	</div>
  </div>
 </div>
</div>
</body>
</html>
