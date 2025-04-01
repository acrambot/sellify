<?php 

	if(!$_SESSION['ps_usern']) {
		$redirect = $web['url']."account/login"; header("Location:$redirect");
	}

?>