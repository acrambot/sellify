<?php
ob_start();
session_start(); 
if(file_exists("./install.php")) {
	header("Location: ./install");
} 
include("includes/config.php");
// get web settings 
$web = mysql_fetch_array(mysql_query("SELECT * FROM sellify_settings ORDER BY id DESC LIMIT 1"));
$url = $web['url'];
include("includes/functions.php");
include("includes/paypal_class.php");
$source_dir = 'source/';
$resource_dir = 'resource/';

$m = protect($_GET['m']);
switch($m) {
	case "options": include($source_dir."additionnal_settings.php"); break;
	case "cancel": include($source_dir."cancel_payment.php"); break;
	case "change_password": include($source_dir."change_password.php"); break;
	case "check_payment": include($source_dir."check_payment.php"); break;
	case "dashboard": include($source_dir."dashboard.php"); break;
	case "delete": include($source_dir."delete_item.php"); break;
	case "download": include($source_dir."download_product.php"); break;
	case "edit": include($source_dir."edit_item.php"); break;
	case "profile": include($source_dir."edit_profile.php"); break;
	case "settings": include($source_dir."general_settings.php"); break;
	case "home": include($source_dir."home.php"); break;
	case "item": include($source_dir."item.php"); break;
	case "login": include($source_dir."login.php"); break;
	case "not_found": include($source_dir."not_found.html"); break;
	case "offers": include($source_dir."offers.php"); break;
	case "payments": include($source_dir."payment_settings.php"); break;
	case "my_products": include($source_dir."products_list.php"); break;
	case "purchases": include($source_dir."purchases.php"); break;
	case "register": include($source_dir."register.php"); break;
	case "search": include($source_dir."search.php"); break;
	case "add_new": include($source_dir."upload.php"); break;
	case "logout": 
		unset($_SESSION['ps_usern']);
		session_unset();
		session_destroy();
		header("Location: ./");
		break;
}
?>