<?php
$id = protect($_GET['id']);
$sql = mysql_query("SELECT * FROM invoicify_items WHERE id='$id'");
if(mysql_num_rows($sql) == 0) { $redirect = $web['url']."not_found"; header("Location: $redirect"); }
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
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Receipt for <?php echo $row['item_name']; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="<?php echo $web['description']; ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/semantic.min.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/packed_global.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/gen/invoice.css">
  <!-- End Stylesheets -->
  
  <!-- Scripts -->
  <script type="text/javascript" src="//use.typekit.net/dau7ios.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
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
<body style="font-weight: 300;">  
  <div class="body">
    <div class="body-content">
      <div class="ui stackable grid invoice-receipt">
    <div class="two column row invoice-header">
        <div class="column">
            <h2 class="ui header">Buyer:</h2>
            <div class="custom-details " contentEditable="False">
                <?php echo $row['buyer_email']; ?>
            </div>
            
        </div>
        <div class="right aligned column">
            <h2 class="ui header">Seller:</h2>
            <ul>
                
                    <li><?php echo $row['seller_name']; ?></li>
                
                
                    <li><?php echo $row['seller_link']; ?></li>
                
                    <li><?php echo $row['seller_email']; ?></li>
            </ul>
        </div>
    </div>
    <div class="two column row equal height invoice-sub-header">
        <div class="column">
            <h1 class="ui header thin"><?php echo $row['invoice_type']; ?></h1>
        </div>
        <div class="right aligned column">
             <ul>
                <li><strong>Order #:</strong> <?php echo $row['invoice_id']; ?></li>
                <li><strong>Date:</strong> <?php echo $row['idate']; ?></li>
                <li><strong>Paid By:</strong> <?php echo $row['buyer_email']; ?></li>
             </ul>
        </div>
    </div>
	<?php
	$quantity = $row['item_quantity']; //affectation du premier chiffre
	$price = $row['item_price']; //affectation du deuxieme chiffre
	$resultat1 = $quantity * $price; //affectation de la multiplication des deux chiffres
	$number1 = $resultat1;
	$result1 = number_format($number1, 2, '.', '');
	
	$number_price = $row['item_price'];
	$result_price = number_format($number_price, 2, '.', '');
	?>
    <div class="row invoice-products">
        <div class="six wide column">
            <h4>ITEMS:</h4>
            <?php echo $row['item_name']; ?>
        </div>
        <div class="center aligned two wide column">
            <h4>QUANTITY</h4>
            <?php echo $row['item_quantity']; ?>
        </div>
        <div class="center aligned two wide column">
            <h4>PRICE</h4>
            <?php if($row['currency'] == "USD") { ?>$<?php echo $result_price; ?><?php } ?>
			<?php if($row['currency'] == "EUR") { ?><?php echo $result_price; ?>€<?php } ?>
        </div>
        <div class="right aligned two wide column">
            <h4>TOTAL</h4>
            <?php if($row['currency'] == "USD") { ?>$<?php echo $result1; ?><?php } ?>
			<?php if($row['currency'] == "EUR") { ?><?php echo $result1; ?>€<?php } ?>
        </div>
    </div>
    
    <?php
	$total = $resultat1; //affectation du premier chiffre
	$discount = $row['discount']; //affectation du deuxieme chiffre
	$resultat2 = $total - $discount; //affectation de la multiplication des deux chiffres
	$number2 = $resultat2;
	$result2 = number_format($number2, 2, '.', '');
	
	$number_discount = $row['discount'];
	$result_discount = number_format($number_discount, 2, '.', '');
	?>
	<?php if($row['discount'] > 0) { ?>
	<div class="row">
        <div class="right aligned ten wide column">
            <strong>DISCOUNT:</strong>
        </div>
        <div class="right aligned two wide column">
            <?php if($row['currency'] == USD) { ?>-$<?php echo $result_discount; ?><?php } ?>
		<?php if($row['currency'] == EUR) { ?>-<?php echo $result_discount; ?>€<?php } ?>
        </div>
    </div>
	<?php } ?>
    
    
    <div class="row">
        <div class="right aligned ten wide column">
            <strong>TOTAL:</strong>
        </div>
        <div class="right aligned two wide column">
        <?php if($row['currency'] == USD) { ?>$<?php echo $result2; ?><?php } ?>
		<?php if($row['currency'] == EUR) { ?><?php echo $result2; ?>€<?php } ?>
        </div>
    </div>
    <div class="one column row invoice-footer">
        <div class="center aligned column">
            <h1 class="ui header thin"><?php if($row['thank_you'] !== NULL) { ?><?php echo $row['thank_you']; ?><?php } ?> <?php if($row['thank_you'] == NULL) { ?>Thank you!<?php } ?></h1>
            <div onmousedown="return false"><a href="http://spreadrr.com" target="_blank">
                Invoice generated with <img style="vertical-align: middle;display: inline-block;margin-top: -3px;" height="25" src="http://img.spreadrr.com/i/1989255718spreadrr-logo-v2.png"/>
            </a></div>
        </div>
    </div>
</div>
    </div>
  </div>
  
  <script src="<?php echo $web['url']; ?>static/gen/packed_global.js"></script>
  <script type="text/javascript" src="<?php echo $web['url']; ?>static/gen/scripts.min.js"></script>
  <script>
  $('img').bind('contextmenu', function(e) {
    return false;
  }); 
  </script>

</body>
</html>