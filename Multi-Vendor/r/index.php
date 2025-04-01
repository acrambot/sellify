<?php
ob_start();
session_start(); 
if(file_exists("./install.php")) {
	header("Location: ./install");
} 
include("includes/config.php");
// get web settings 
$web = mysql_fetch_array(mysql_query("SELECT * FROM invoicify_settings ORDER BY id DESC LIMIT 1"));
$url = $web['url'];
include("includes/functions.php");
$source_dir = 'source/';

$m = protect($_GET['m']);
switch($m) {
	case "home": include($source_dir."home.php"); break;
	case "add": include($source_dir."add.php"); break;
	case "dashboard": include($source_dir."dashboard.php"); break;
	case "invoices": include($source_dir."invoices.php"); break;
	case "invoice": include($source_dir."invoice.php"); break;
	case "login": include($source_dir."login.php"); break;
	case "settings": include($source_dir."settings.php"); break;
	case "change_password": include($source_dir."password.php"); break;
	case "not_found": include($source_dir."not_found.php"); break;
	case "logout": 
		unset($_SESSION['ps_usern']);
		session_unset();
		session_destroy();
		header("Location: ./");
		break;
}
?>