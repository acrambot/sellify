<?php
ob_start();
session_start();
include("includes/functions.php");

$step = protect($_GET['step']);

if($step == 1) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Installation - Step 1</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/application.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/vendor.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/embercom.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/elements.css">
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
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-32x32.png" sizes="32x32">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-TileImage" content="<?php echo $web['url']; ?>static/favicons/mstile-144x144.png">
  <!-- End Favicons -->
</head>

<body class="ember-application ember-ready">
<div id="ember741" class="ember-view">
<div class="new_pattern_area" style="overflow: auto">
  <div class="m__changes__wrapper">

    <h1 class="t__h1">Installation - Step 1</h1>

    <div class="sp__2"></div>

    <div class="card">
      <div class="card__inner">
		<form accept-charset="UTF-8" action="" class="edit_admin" enctype="multipart/form-data" method="post">
		<?php
		if(isset($_POST['do_install'])) {
		$mysql_host = protect($_POST['mysql_host']);
		$mysql_user = protect($_POST['mysql_user']);
		$mysql_pass = protect($_POST['mysql_pass']);
		$mysql_db = protect($_POST['mysql_db']);
		$title = protect($_POST['title']);
		$description = protect($_POST['description']);
		$keywords = protect($_POST['keywords']);
		$url = protect($_POST['url']);
		$usern = protect($_POST['usern']);
		$passwd = protect($_POST['passwd']);
		$email = protect($_POST['email']);
		
			if(empty($mysql_host) or empty($mysql_user) or empty($mysql_pass) or empty($mysql_db) or empty($title) or empty($description) or empty($keywords) or empty($url) or empty($usern) or empty($passwd) or empty($email)) { echo error("Error! All fields are required."); }
			elseif(!isValidUsername($usern)) { echo error("Error! Please enter valid username."); }
			elseif(!isValidURL($url)) { echo error("Error! Please enter valid website address."); }
			elseif(!isValidEmail($email)) { echo error("Error! Please enter valid e-mail address."); }
			else {
				$db = mysql_connect($mysql_host,$mysql_user,$mysql_pass);

				if($db) {
				$select_db = mysql_select_db($mysql_db,$db);
					if($select_db) {
						mysql_query("SET NAMES 'utf8'");

						$sql_filename = 'sql.sql';
						$sql_contents = file_get_contents($sql_filename);
						$sql_contents = explode(";", $sql_contents);

						foreach($sql_contents as $k=>$v) {
							mysql_query($v);
						}
						
						$insert = mysql_query("INSERT invoicify_settings (title,description,keywords,email,url) VALUES ('$title','$description','$keywords','$email','$url')");
						$passwd = md5($passwd);
						$insert = mysql_query("INSERT invoicify_users (usern,passwd,email) VALUES ('$usern','$passwd','$email')");
						mkdir($main_folder_name);
						
						$current .= '<?php
						';
						$current .= '$sql["host"] = "'.$mysql_host.'";
						';
						$current .= '$sql["user"] = "'.$mysql_user.'";
						';
						$current .= '$sql["pass"] = "'.$mysql_pass.'";
						';
						$current .= '$sql["base"] = "'.$mysql_db.'";
						';
						$current .= '$connection = mysql_connect($sql["host"],$sql["user"],$sql["pass"]);
						';
						$current .= '$select_database = mysql_select_db($sql["base"], $connection);
						';
						$current .= 'mysql_query("SET NAMES utf8");
						';
						$current .= '?>
						';
						
						file_put_contents("includes/config.php", $current);
						
						$_SESSION['install_url'] = $url;
						$_SESSION['install_usern'] = $usern;
						$_SESSION['install_passwd'] = protect($_POST['passwd']);
						
						header("Location: ./install?step=2");

					} else {
						echo error("Error! MySQL database not exists.");
					}

				} else {
					echo error("Error! Failed to connect to MySQL server.");
				}
			}
		}
		?>
		
		  <!-- GROUP 1 (START) --><h1 style="border: 2px solid #2980b9;color: #2980b9;width: 25%;padding: 5px;text-align: center;margin: auto;">MySQL Settings</h1>
		  
		  <div class="sp__2"></div>
		  
		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="1">MySQL hostname</label>
			<input class="f__text" id="1" name="mysql_host" type="text" placeholder="localhost">
		  </div>

		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="2">MySQL username</label>
			<input class="f__text" id="2" name="mysql_user" type="text" placeholder="spreadrr_user">
		  </div>

		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="3">MySQL password</label>
			<input class="f__text" id="3" name="mysql_pass" placeholder="hfzfh374o" type="password">
		  </div>
		  
		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="4">MySQL database</label>
			<input class="f__text" id="4" name="mysql_db" placeholder="spreadrr_changelog">
		  </div>
		  
		  <hr class="sp__hr"><!-- GROUP 1 (END) -->
		  
		  
		  <!-- GROUP 2 (START) --><h1 style="border: 2px solid #2980b9;color: #2980b9;width: 25%;padding: 5px;text-align: center;margin: auto;">Web Settings</h1>
		  
		  <div class="sp__2"></div>
		  
		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="5">Website title</label>
			<input class="f__text" id="5" name="title" type="text" placeholder="The Spreadrr Showcase">
		  </div>
		  
		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="6">Website description</label>
			<textarea class="f__text" id="6" name="description" rows="2" placeholder=""></textarea>
		  </div>
		  
		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="7">Website keywords</label>
			<textarea class="f__text" id="7" name="keywords" rows="2" placeholder=""></textarea>
		  </div>
		  
		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="8">Website address (with ending '/')</label>
			<input class="f__text" id="8" name="url" type="text" placeholder="http://example.com/">
		  </div>
		  
		  <hr class="sp__hr"><!-- GROUP 2 (END) -->
		  
		  
		  <!-- GROUP 3 (START) --><h1 style="border: 2px solid #2980b9;color: #2980b9;width: 35%;padding: 5px;text-align: center;margin: auto;">Create admin account</h1>
		  
		  <div class="sp__2"></div>
		  
		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="10">Admin username</label>
			<input class="f__text" id="10" name="usern" type="text" placeholder="">
		  </div>

		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="11">Admin e-mail address</label>
			<input class="f__text" id="11" name="email" type="email" placeholder="">
		  </div>

		  <div class="f__group">
			<label class="t__small-caps f__group-label" for="12">Admin password</label>
			<input class="f__text" id="12" name="passwd" placeholder="" type="password">
		  </div>
		  
		  <div class="sp__2"></div><!-- GROUP 3 (END) -->

		  <div class="f__group">
			<button class="btn o__primary" name="do_install" type="submit">Install</button>
		  </div>
		  
		</form>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>

<?php
} elseif($step == 2) {
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Installation - Step 2</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/application.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/vendor.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/embercom.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/elements.css">
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
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-32x32.png" sizes="32x32">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-TileImage" content="<?php echo $web['url']; ?>static/favicons/mstile-144x144.png">
  <!-- End Favicons -->
</head>

<body class="ember-application ember-ready">
<div id="ember741" class="ember-view">
<div class="new_pattern_area" style="overflow: auto">
  <div class="m__changes__wrapper">

    <h1 class="t__h1">Installation - Step 2</h1>

    <div class="sp__2"></div>

    <div class="card">
      <div class="card__inner">
		<h1 style="border: 2px solid #2980b9;color: #2980b9;width: 35%;padding: 5px;text-align: center;margin: auto;">Successful Installation</h1>
		
		<div class="sp__2"></div>
		
		<div class="f__group t__light-text">
		  Installation of Invoicify v1.0 is successfull.
		  Now you can manage your invoices.
		  <div class="sp__2"></div>
		  <strong>Admin username:</strong> <?php echo $_SESSION['install_usern']; ?><br/>
		  <strong>Admin password:</strong> <?php echo $_SESSION['install_passwd']; ?>
		  <div class="sp__2"></div>
		  <a href="<?php echo $_SESSION['install_url']; ?>login" class="btn btn-primary btn-lg">Login to admin panel</a>
		</div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>

<?php
@unlink("install.php");
@unlink("static/install/");
@unlink("sql.sql");
unset($_SESSION['install_url']);
unset($_SESSION['install_usern']);
unset($_SESSION['install_passwd']);
session_unset();
session_destroy();
} else {
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>Installation Wizard</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex, nofollow">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/application.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/vendor.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/embercom.css">
  <link rel="stylesheet" href="<?php echo $web['url']; ?>static/install/elements.css">
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
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-192x192.png" sizes="192x192">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-160x160.png" sizes="160x160">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-16x16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="<?php echo $web['url']; ?>static/favicons/favicon-32x32.png" sizes="32x32">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-TileImage" content="<?php echo $web['url']; ?>static/favicons/mstile-144x144.png">
  <!-- End Favicons -->
</head>

<body class="ember-application ember-ready">
<div id="ember741" class="ember-view">
<div class="new_pattern_area" style="overflow: auto">
  <div class="m__changes__wrapper">

    <h1 class="t__h1">Installation Wizard</h1>

    <div class="sp__2"></div>

    <div class="card">
      <div class="card__inner">
		<h1 style="border: 2px solid #2980b9;color: #2980b9;width: 35%;padding: 5px;text-align: center;margin: auto;">Invoicify's Installation</h1>
		
		<div class="sp__2"></div>
		
		<div class="f__group t__light-text">
		  With this script you can manage easily your invoices.
		  <div class="sp__2"></div>
		  <a href="./install?step=1" class="btn btn-primary btn-lg">Start installation</a>
		</div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>

<?php
}
?>