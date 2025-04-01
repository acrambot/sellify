<?php 

	if(!$_SESSION['ps_usern']) {
		$redirect = $web['url']."account/login"; header("Location:$redirect");
	}
	elseif(idinfo($_SESSION['ps_usern'],"role") == 0) {
		$redirect = $web['url'].""; header("Location:$redirect");
	}

?>