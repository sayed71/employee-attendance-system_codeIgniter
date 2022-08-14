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
</head>

<body>
<div class="ch-container">
    <div class="row">   
    <div class="row">
        <div class="col-md-12 center login-header">
            
        </div>
    </div>
    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info" style="background-color:#CCCCCC; color:#000;">
                <h2 style="color:#000;">Login</h2>
            </div>
            <?php echo form_open('login/CheckAdmin') ?>
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name="txtUser" type="text" class="form-control" id="txtUser" placeholder="Username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name="txtPassword" type="password" class="form-control" id="txtPassword" placeholder="Password">
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </p>
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>

</body>
</html>
