<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>User Panel</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
         <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/bootstrap.min.css">
		 <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/styles.css">
	</head>
	<body>
<!-- Header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid"  style="background-color:#428bca; color:#000000; border:#FFFFFF; box-shadow:#CCC; ">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
       <a class="navbar-brand" href="#" style="color:#FFFFFF"><img style="width:150px; height:30px;" alt="SP Wave" src="<?php print base_url(); ?>assets/img/Logo.jpg" class="hidden-xs"/></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a  href="#"><span style="color:#FFFFFF;"><i class="glyphicon glyphicon-user"></i> <?php print $UserName; ?></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
            <li><a href="#">My Profile</a></li>
          </ul>
        </li>
        <li><a href="<?php print base_url(); ?>/index.php/attendance"><span style="color:#FFFFFF;"><i class="glyphicon glyphicon-lock"></i> Logout</span></a>    </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
<div class="row">
	<div class="col-sm-3" style="width:17%">
      <!-- Left column -->
      <span  style="color:#428bca;"><h2><i class="glyphicon glyphicon-wrench"></i> Menu</h2></span>
      
      <hr>
      
      <ul class="list-unstyled">
        <li class="nav-header"> <a href="#" data-toggle="collapse" data-target="#userMenu">
          <h5>Settings <i class="glyphicon glyphicon-chevron-down"></i></h5>
          </a>
            <ul class="list-unstyled collapse in" id="userMenu">
                <li class="active"> <a href="#"><i class="glyphicon glyphicon-home"></i> Official Information</a></li>
                <li><a href="<?php print base_url(); ?>index.php/userAdmin/PersonalInfo" target="i_user_info"><i class="glyphicon glyphicon-user"></i> Personal Information</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Contact Information</a></li>
                <li><a href="<?php print base_url(); ?>index.php/userAdmin/ChangePassword" target="i_user_info"><i class="glyphicon glyphicon-pencil"></i> Change Password</a></li>
                <li><a href="<?php print base_url(); ?>index.php/Datewise_report"  target="i_user_info"><i class="glyphicon glyphicon-user"></i> Date Wise Report</a></li>
                <li><a href="<?php print base_url(); ?>/index.php/attendance"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
            </ul>
        </li>
      </ul>
	</div>
	<!-- /col-3 -->
    <div class="col-sm-9" style="width:83%">
      	
      <!-- column 2 -->	
      <ul class="list-inline pull-right" style="color:#428bca; font-style:italic; font-size:14px;">
         <li>Login Status: <span class="badge badge-info"> <?php print $LoginStatus; ?> </span></li>
         <li>Worling Day: <span class="badge badge-info"> 266 </span></li>
         <li>Absent Day: <span class="badge badge-info"> 356 </span></li>
         <li>Late Day: <span class="badge badge-info"> 455 </span></li>
         <li>Leave Day: <span class="badge badge-info"> 566 </span></li>
      </ul>
      <span  style="color:#428bca;"><h2>User Information</h2> </span>
      
   	  <hr>
      
		<iframe name="i_user_info" id="i_user_info" height="600px;" width="100%" style="border:#CCCCCC 0px solid ; box-shadow: 1px 2px 3px 4px #CCCCCC; border-radius:2px;" src="<?php print base_url(); ?>/index.php/attendance/Welcome"></iframe><!--/row--></div><!--/col-span-9-->
</div>
</div>
<!-- /Main -->

<footer class="text-center"></footer>
<div class="modal" id="addWidgetModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dalog -->
</div><!-- /.modal -->



  
	<!-- script references -->
<!--		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->        
		<script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery.min.js"></script>
    	<script type="text/javascript" src="<?php print base_url(); ?>assets/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-1.6.4.min.js"></script>
   		<script type="text/javascript" src="<?php print base_url(); ?>assets/js/scripts.js"></script>
	</body>
</html>