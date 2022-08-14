<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <link id="bs-css" href="<?php print base_url(); ?>assets/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="<?php print base_url(); ?>assets/css/charisma-app.css" rel="stylesheet">
    <script src="<?php print base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php print base_url(); ?>assets/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico">
    <style type="text/css">
		body{
				 background-image:url(<?php print base_url(); ?>assets/img/pattern201.png);
				 background-repeat:repeat;
			}
	</style>
</head>

<body>
<!--login modal-->
<?php echo form_open('login/CheckAdmin') ?>
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input name="txtUser" type="text" class="form-control input-lg" id="txtUser" placeholder="Admin Name">
            </div>
            <div class="form-group">
              <input name="txtPassword" type="password" class="form-control input-lg" id="txtPassword" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>
</form>
</body>
</html>
