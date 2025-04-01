<?php if(!$_SESSION['ps_usern']) { $redirect = $web['url']."login"; header("Location:$redirect"); } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  <title>Dashboard | <?php echo $web['title']; ?></title>

  <!-- ========== Css Files ========== -->
  <link href="<?php echo $web['url']; ?>static/css/root.css" rel="stylesheet">

  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="<?php echo $web['url']; ?>static/img/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

  	<!-- Start App Logo -->
  	<div class="applogo">
  		<a href="<?php echo $web['url']; ?>admin/dashboard" class="logo">Dashboard</a>
  	</div>
  	<!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->

    <!-- Start Top Right -->
    <ul class="top-right">

    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle hdbutton">Create New <span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list">
          <li><a href="<?php echo $web['url']; ?>new"><i class="fa falist fa fa-plus"></i>Invoice</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN</li>
  <li><a href="<?php echo $web['url']; ?>admin/dashboard"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard<span class="label label-default">BETA</span></a></li>
  <li><a href="<?php echo $web['url']; ?>admin/invoices"><span class="icon color6"><i class="fa fa-list-ul"></i></span>Invoices</a></li>
  <li><a href="<?php echo $web['url']; ?>new"><span class="icon color6"><i class="fa fa-plus"></i></span>Add invoice</a></li>
  <br>
  <li><a href="<?php echo $web['url']; ?>admin/settings"><span class="icon color6"><i class="fa fa-cog"></i></span>Settings</a></li>
  <li><a href="<?php echo $web['url']; ?>admin/change_password"><span class="icon color6"><i class="fa fa-user"></i></span>Change password</a></li>
  <br>
  <li><a href="<?php echo $web['url']; ?>logout"><span class="icon color6"><i class="fa fa-sign-out"></i></span>Logout</a></li>
</ul>

<ul class="sidebar-panel nav">
  <li class="sidetitle">MORE</li>
  <li><a href="http://spreadrr.com/support" target="_blank"><span class="icon color10"><i class="fa fa-lightbulb-o"></i></span>Contact us</a></li>
  <li><a href="http://docs.spreadrr.com" target="_blank"><span class="icon color8"><i class="fa fa-code"></i></span>Help & Support</a></li>
  <li><a href="http://updates.spreadrr.com" target="_blank"><span class="icon color12"><i class="fa fa-file-text-o"></i></span>Changelogs</a></li>
</ul>

</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>
      <ol class="breadcrumb">
        <li class="active"><a href="<?php echo $web['url']; ?>"><?php echo $web['title']; ?></a></li>
        <li class="active">Dashboard</li>
      </ol>
  </div>
  <!-- End Page Header -->
  
  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color10-bg"><i class="fa fa-exclamation-triangle"></i></span>
      <h1>Dashboard</h1>
      <h4>This is your admin dashboard. <br>You can see all our alerts and your 5 latest invoices.</h4>
    </div>

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          5 Latest Invoices
        </div>

        <div class="panel-body table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <td>Invoice ID</td>
                <td>Item Name</td>
                <td>Currency</td>
                <td>Date</td>
                <td>Buyer Email</td>
                <td>View</td>
              </tr>
            </thead>
            <tbody>
			<?php
			$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
			$limit = 5;
			$startpoint = ($page * $limit) - $limit;
			$statement = "`invoicify_items`";
			$sql = mysql_query("SELECT * FROM {$statement} ORDER BY invoice_id DESC LIMIT {$startpoint} , {$limit}");
			if(mysql_num_rows($sql)>0) {
			while($row = mysql_fetch_array($sql)) {
			?>
              <tr>
                <td># <b><?php echo $row['invoice_id']; ?></b></td>
                <td><?php echo $row['item_name']; ?></td>
                <td><?php echo $row['currency']; ?></td>
                <td><?php echo $row['idate']; ?></td>
                <td><?php echo $row['buyer_email']; ?></td>
                <td><a target="_blank" href="<?php echo $web['url']; ?>i/<?php echo $row['id']; ?>">Online</a></td>
              </tr>
			<?php
			}
			} else {
				echo error ('<center>No added invoices. <a href="/new">Add your first invoice here</a></center>');
			}
			?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- End Panel -->







  </div>
  <!-- End Row -->






</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright © 2015 <a href="http://spreadrr.com" target="_blank">Spreadrr, Inc.</a> All rights reserved.
  </div>
  <div class="col-md-6 text-right">
    Design and Developed by <a href="http://codecanyon.net/user/Spreadrr/portfolio?ref=Spreadrr" target="_blank">Spreadrr</a>
  </div> 
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
 


<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="<?php echo $web['url']; ?>static/js/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="<?php echo $web['url']; ?>static/js/bootstrap/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="<?php echo $web['url']; ?>static/js/plugins.js"></script>


</body>
</html>