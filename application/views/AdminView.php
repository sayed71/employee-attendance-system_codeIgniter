<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <link id="bs-css" href="<?php print base_url(); ?>assets/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="<?php print base_url(); ?>assets/css/charisma-app.css" rel="stylesheet">
    <script src="<?php print base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php print base_url(); ?>assets/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
 <?php echo form_open('') ?>
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" > <img alt="Charisma Logo" src="<?php print base_url(); ?>assets/img/Logo.jpg" class="hidden-xs"/>SP Wave</a>


            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php print base_url(); ?>/index.php/login/CheckAdmin">Logout</a></li>
                </ul>
            </div>

            <div class="btn-group pull-right theme-container animated tada">
                <button style="display:none" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>


            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="<?php //print base_url(); ?>/index.php/Attendance/create"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                  </ul>
              </li>
                <li>
                  <span class="navbar-search pull-left">
                  <input placeholder="Search" class="search-query form-control col-md-10" name="query" type="text">
                  </span>
              </li>
            </ul>

        </div>
    </div>

<div class="ch-container">
    <div class="row">
        
        <div class="col-sm-2 col-lg-2" style="height:800px;">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main Menu</li>
                        <li><a class="ajax-link" href="<?php print base_url(); ?>/index.php/userInfo" target="SubView"><i class="glyphicon glyphicon-home"></i> Employee Info.</a></li>
                        <li><a class="ajax-link" href="<?php print base_url(); ?>/index.php/adminInfo"  target="SubView"><i class="glyphicon glyphicon-eye-open"></i> Create Admin</a> </li>
                        <li><a class="ajax-link" href="<?php print base_url(); ?>/index.php/userInfo/UserType" target="SubView"><i  class="glyphicon glyphicon-star"></i><span> Policy Information</span></a></li>
                        <li><a class="ajax-link" href="<?php print base_url(); ?>/index.php/deptInfo"  target="SubView"><i class="glyphicon glyphicon-list-alt"></i><span> Dept. Information</span></a></li>
                        <li><a class="ajax-link"  href="<?php print base_url(); ?>/index.php/yearPlanner" target="SubView"><i class="glyphicon glyphicon-globe"></i><span> Year Planner</span></a></li>
                        <li><a class="ajax-link" href="<?php print base_url(); ?>/index.php/holiday"  target="SubView" ><i class="glyphicon glyphicon-picture"></i><span> Holiday information</span></a></li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-align-justify"></i><span> Report</span></a></li>
                        <!--
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a></li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-th"></i><span> Grid</span></a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Tools</a></li>
                        <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-star"></i> Other</a></li>
                        -->
                        
                        <li><a href="#"><i class="glyphicon glyphicon-th"></i> Other</a></li>
                        <li><a href="<?php print base_url(); ?>/index.php/login/do_logout"><i class="glyphicon glyphicon-lock"></i><span> Logout</span></a>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </div>

        
        <div class="col-md-9" style="width:83%; height:600px;">
            <iframe name="SubView" id="SubView" height="100%" width="100%" style="border:#CCCCCC 0px solid ; box-shadow: 1px 2px 3px 4px #CCCCCC; border-radius:2px;" src="<?php print base_url(); ?>/index.php/attendance/Welcome"></iframe>
        </div>

        <noscript>
        </noscript>
</div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row"></footer>

</div>
</body>
</form>
</html>
