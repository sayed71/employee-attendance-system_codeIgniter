<!DOCTYPE html>
<html>
  <head>
    <title>Attendance Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/css/core.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/ui.thems.css">
     <!-- ------------------------------------------------------->
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/core.js"></script>
     
        

  </head>

  <body>
  <?php echo form_open_multipart('attendance/ChangePassword') ?>
    <div class="container">   
      <div class="table-responsive">          
       	<div class="panel panel-primary" style=" margin-top:15px;">
      <div class="panel-heading" style="text-align:center; font-size:20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15%">&nbsp;</td>
            <td width="75%" align="center"><span class="panel-heading" style="text-align:center; font-size:20px;">Change Password</span></td>
            <td width="10%" align="right" valign="top">            
            </td>
          </tr>
        </table>
      </div>
  <table width="65%" border="0" align="center" cellpadding="0" cellspacing="0"  class="table borderless" style="color:#428bca;">
  <tr>
    <td width="7%" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="43%" bgcolor="#FFFFFF">Old Password</td>
    <td width="40%" bgcolor="#FFFFFF"><span class="form-group">
              <input name="txt_old_pass" id="txt_old_pass" type="password" class="form-control" placeholder="Old Password" style="color:#428bca;">
            </span></td>
    <td width="10%" bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">New Password</td>
    <td bgcolor="#FFFFFF"><span class="form-group">
              <input name="txt_new_pass" id="txt_new_pass" type="password" class="form-control" placeholder="New Password" style="color:#428bca;">
            </span></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">Confirm Password</td>
    <td bgcolor="#FFFFFF"><span class="form-group">
              <input name="txt_confirm_pass" id="txt_confirm_pass" type="password" class="form-control" placeholder="Confirm Password" style="color:#428bca;">
            </span></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  	<tr>
  	  <td colspan="4" align="center" bgcolor="#FFFFFF">
      
             <div class="btn-group">
                  <button type="submit" id="btnAdd" name="btnAdd" value="Attendance" class="btn btn-primary">Change Password</button>
            </div>
      
      </td>
	  </tr>
  	<tr>
  	  <td colspan="4" align="center" bgcolor="#FFFFFF"><?php print $Pass; ?></td>
	  </tr>
      </table>

      <span style="font-style:normal; color:#428bca;"><div id="Msg"></div></span>
      </div>
 	</div>
  </div>
</div>
</form>
</body>

</html>
