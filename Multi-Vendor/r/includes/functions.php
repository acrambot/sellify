<?php
function protect($string) {
	$protection = htmlspecialchars(trim($string), ENT_QUOTES);
	return $protection;
}

function success($text) {
	return '<div class="kode-alert alert3">'.$text.'</div>';
}

function info($text) {
	return '<div class="kode-alert alert5">'.$text.'</div>';
}

function error($text) {
	return '<div class="kode-alert alert6">'.$text.'</div>';
}

function isValidURL($url) {
	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}

function isValidUsername($str) {
    return preg_match('/^[a-zA-Z0-9-_]+$/',$str);
}

function isValidEmail($str) {
	return filter_var($str, FILTER_VALIDATE_EMAIL);
}

function genSKey($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function decode_currency($currency) {
	if($currency == "USD") {
		return '$';
	}
	if($currency == "EUR") {
		return '&euro;';
	}
}
?>