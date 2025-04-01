	<div id="modal" style="display:none;">
			<?php 
			if(isset($_POST['phps_login'])) {
				$phps_usern = protect($_POST['phps_usern']);
				$phps_passwd = protect($_POST['phps_passwd']);
				$phps_passwd = md5($phps_passwd);
				$query = mysql_query("SELECT * FROM sellify_users WHERE usern='$phps_usern' and passwd='$phps_passwd'");
				if(mysql_num_rows($query)) {
					$_SESSION['ps_usern'] = $phps_usern;
					header("Location: $web[url]dashboard");
				} else {
					echo error('<p align="center">Oops! You have entered wrong username or password</p>');
				}
			}
			?>
	<div id="form_modal_Y7LY" class="ui modal transition visible active" style="margin-top: -12%;">
		<i class="modal_close icon close"><i class="fa fa-times"></i></i>

		
		<div id="login" class="user_login content auth" style="display: block;">
			<div class="ui header">Log in to <?php echo $web['title']; ?></div>
			<form action="" method="post" accept-charset="utf-8" class="ui form">
				<div class="field">
					<input type="text" value="" placeholder="Username" name="phps_usern" autofocus="">
				</div>
				<div class="field">
					<input name="phps_passwd" type="password" value="" placeholder="Password" autocomplete="off">
				</div>
				<div class="field center aligned">
					<button type="submit" name="phps_login" class="ui green button fluid submit">Log in</button>
				</div>
				<div class="field switch">
				  Don't have an account yet?
				   <a href="<?php echo $web['url']; ?>account/register" id="register_form" class="auth-switch" data-location="signup">
					 Sign up <i class="fa fa-arrow-right"></i>
				   </a>
				  
				</div>
			</form>
		</div>
	</div>
	</div>