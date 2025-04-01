<?php if(!$_SESSION['ps_usern']) { $redirect = $web['url']."login"; header("Location:$redirect"); } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo $web['description']; ?>">
  <meta name="keywords" content="<?php echo $web['keywords']; ?>" />
  <title>Settings | <?php echo $web['title']; ?></title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo $web['url']; ?>static/css/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>

    <div class="login-form">
      <form action="" method="POST" role="form" accept-charset="utf-8">
        <div class="top">
          <h1>Edit your settings</h1>
          <h4>You can change your settings</h4>
        </div>
        <div class="form-area">
			<?php
			if(isset($_POST['phps_save'])) {
				$title = protect($_POST['title']);
				$description = protect($_POST['description']);
				$keywords = protect($_POST['keywords']);
				$url = protect($_POST['url']);
				$email = protect($_POST['email']);
				
				if(empty($title) or empty($description) or empty($keywords) or empty($url) or empty($email)) { echo '<div class="alert color red-color"><p align="center">All fiels are required.</p></div>'; }
				elseif(!isValidURL($url)) { echo error ('Please enter valid site url.'); }
				elseif(!isValidEmail($email)) { echo error ('Please enter valid email address.'); }
				else {
					$update = mysql_query("UPDATE invoicify_settings SET title='$title',description='$description',keywords='$keywords',url='$url',email='$email'");
					$web = mysql_fetch_array(mysql_query("SELECT * FROM invoicify_settings ORDER BY id LIMIT 1"));
					echo success ('Your changes was saved.');
				}
			}
			?>
          <div class="group">
            <input type="text" name="title" class="form-control" value="<?php echo $web['title']; ?>" placeholder="">
          </div>
		  <div class="group">
            <textarea class="form-control" name="description" rows="5"><?php echo $web['description']; ?></textarea>
          </div>
		  <div class="group">
            <textarea class="form-control" name="keywords" rows="5"><?php echo $web['keywords']; ?></textarea>
          </div>
		  <div class="group">
            <input type="text" name="url" value="<?php echo $web['url']; ?>" class="form-control" placeholder="">
          </div>
          <div class="group">
            <input type="text" name="email" value="<?php echo $web['email']; ?>" class="form-control" placeholder="">
          </div>
          <button type="submit" name="phps_save" class="btn btn-default btn-block">UPDATE</button>
        </div>
      </form>
      <div class="footer-links row">
        <center><div class="col-xs-12"><a href="<?php echo $web['url']; ?>admin/dashboard"><i class="fa fa-home"></i> Return to dashboard</a></div></center>
      </div>
    </div>

</body>
</html>