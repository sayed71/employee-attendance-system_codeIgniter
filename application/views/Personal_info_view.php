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
  <?php echo form_open_multipart('attendance/PersonalInfo') ?>
    <div class="container">   
      <div class="table-responsive">          
       	<div class="panel panel-primary" style=" margin-top:15px;">
      <div class="panel-heading" style="text-align:center; font-size:20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15%">&nbsp;</td>
            <td width="70%" align="center"><span class="panel-heading" style="text-align:center; font-size:20px;">Personal  Information</span></td>
            <td width="15%" align="right" valign="top">            
            </td>
          </tr>
        </table>
      </div>
  <table width="81%" border="0" align="center" cellpadding="0" cellspacing="0"  class="table borderless" style="color:#428bca;">
  <tr>
    <td width="10%" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="36%" bgcolor="#FFFFFF">User Name</td>
    <td width="40%" bgcolor="#FFFFFF">&nbsp;<?php print $PerData['UserName']; ?></td>
    <td width="14%" rowspan="5" align="right" valign="top" bgcolor="#FFFFFF"><img src="<?php print base_url(); ?>assets/img/UserImage/<?php print $PerData['ImageName']; ?>.jpg" width="139" height="94" alt="No-Image"  class="img-thumbnail" style="border:1px #428bca solid;"></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">Address</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php print $PerData['Address']; ?></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">Email Address</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php print $PerData['EmailAddress']; ?></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">Contact Number</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php print $PerData['ContactNumber']; ?></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">Joining Date</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php print $PerData['JoinDate']; ?></td>
    </tr>
  <tr>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">Gender</td>
    <td bgcolor="#FFFFFF">&nbsp;<?php print $PerData['Gender']; ?></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    </tr>
  	<tr>
    <td colspan="4" align="center" bgcolor="#FFFFFF"><span style="font-style:normal; color:#428bca;">Welcome Personal Information</span></td>
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
