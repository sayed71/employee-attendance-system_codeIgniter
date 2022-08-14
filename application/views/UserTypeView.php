<!DOCTYPE html>
<html>
  <head>
    <title>Attendance Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/css/core.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/ui.thems.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/css/bootstrap-datetimepicker.min.css">
     <!-- ------------------------------------------------------->
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/core.js"></script>

  </head>

  <body>
  <?php echo form_open_multipart('userInfo/ButtonWork_UT') ?>
    <div class="container">   
      <div class="table-responsive">          
       	<div class="panel panel-primary" style=" margin-top:15px;">
      <div class="panel-heading" style="text-align:center; font-size:20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15%">&nbsp;</td>
            <td width="70%" align="center"><span class="panel-heading" style="text-align:center; font-size:20px;">Policy Information</span></td>
            <td width="15%" align="right" valign="top">
            </td>
          </tr>
        </table>
      </div>

   <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
          <tr>
            <td width="8%">&nbsp;</td>
            <td width="33%"><span style="color:#428bca;">Policy Type</span></td>
            <td width="40%"><span class="form-group">
              <input name="txtUserType" id="txtUserType" type="text" class="form-control" placeholder="User Type" style="color:#428bca;" value="<?php print @$Msg['UserTypeName']; ?>">              
              <input name="hdnUserID" type="hidden" id="hdnUserID" value="<?php print @$Msg['UserTypeID']; ?>" >
            </span>
              <input type="hidden" name="hdnRecPos" id="hdnRecPos" value="<?php print @$Msg['RecPos']; ?>" ></td>
            <td width="6%">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Start Time</span></td>
            <td>
            
              <div class="control-group">
                <div class="controls input-append date form_date" data-date="" data-date-format="HH:ii p" data-link-field="dtp_input2" data-link-format="HH:ii p">
                    <!--<input type="text"  value="" size="16" >-->
                    <span class="form-group">
                  <input name="txtStartDate" id="txtStartDate" type="text" class="form-control" placeholder="Start Time" value="<?php print @$Msg['StartTime']; ?>" style="color:#428bca;">
                </span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" />
            </div>
            
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left" valign="top"><span style="color:#428bca;">End Time</span></td>
            <td valign="top">
            
              <div class="control-group">
                <div class="controls input-append date form_date" data-date="" data-date-format="HH:ii p" data-link-field="dtp_input2" data-link-format="HH:ii p">
                    <!-- <input type="text"  value="" size="16" > -->
                    <span class="form-group">
                  <input name="txtEndDate" id="txtEndDate" type="text" class="form-control" placeholder="End Time" value="<?php print @$Msg['EndTime']; ?>" style="color:#428bca;">
                </span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" />
            </div>
            
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="4" align="center">
              
       		  <button type="Submit" name="btnAdd" id="btnAdd" class="btn btn-primary btn-small " value="Add">
                      <span class="glyphicon glyphicon-plus"></span> Add
                    </button>
              <button type="Submit" name="btnEdit" id="btnEdit" class="btn btn-primary btn-small " value="Edit">
                      <span class="glyphicon glyphicon-pencil"></span> Edit
              </button>
              <button type="Submit" name="btnDelete" id="btnDelete" class="btn btn-primary btn-small " value="Delete">
                      <span class="glyphicon glyphicon-trash"></span> Delete
              </button>
              <button type="Submit" name="btnFirst" id="btnFirst" class="btn btn-primary btn-small "  value="First">
                      <span class="glyphicon glyphicon-step-backward"></span> First
              </button>
              <button type="Submit" name="btnPrevious" id="btnPrevious" class="btn btn-primary btn-small "  value="Previous">
                      <span class="glyphicon glyphicon-fast-backward"></span> Previous
              </button>
              <button type="Submit" name="btnNext" id="btnNext" class="btn btn-primary btn-small "  value="Next">
                      <span class="glyphicon glyphicon-fast-forward"></span> Next
              </button>
              <button type="Submit" name="btnLast" id="btnLast" class="btn btn-primary btn-small "  value="Last">
                      <span class="glyphicon glyphicon-step-forward"></span> Last
              </button>
              <button type="Submit" name="btnShow" id="btnShow" class="btn btn-primary btn-small "  value="Show">
                      <span class="glyphicon glyphicon-list"></span> Show
                </button></td>
          </tr>
          <tr>
            <td colspan="4" align="center"><span class="panel-heading" style="text-align:center; font-size:20px;"><span style="color:#428bca;">
			<?php  print @$Msg['Msg'];  ?>
            </span></span></td>
          </tr>
          <tr>
            <td colspan="4" align="center">
           
              	<?php 
				if(isset($Msg['res']))
				{
					
				?>
                 <table width="58%" border="0" cellspacing="0" cellpadding="0"  class="table table-bordered">
              <tr style="background:#428bca; color:#FFF;">
              	<td>S.L.</td>
                <td align="center"> ID</td>
                <td align="center">USER TYPE </td>
                <td align="center">START TIME</td>
                <td align="center">END TIME</td>
              </tr>
                <?php
				@$SL=0;
				foreach ($Msg['res']  as $row)
				{
					@$SL++;
				?>
              <tr style="color:#428bca;">
              	<td><?php echo @$SL; ?></td>
                <td align="center"><?php echo @$row['UserTypeID']; ?></td>
                <td align="center"><?php echo @$row['UserTypeName']; ?></td>
                <td align="center"><?php echo @$row['StartTime']; ?></td>
                <td align="center"><?php echo @$row['EndTime']; ?></td>
              </tr>
              <?php 
			  	}
				}
			  ?> 
            </table></td>
          </tr>
        </table> 
        <span style="font-style:normal; color:#428bca;"><div id="Msg"></div></span>
        <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-1.8.3.min.js"></script>
    	<script type="text/javascript" src="<?php print base_url(); ?>assets/js/bootstrap-datetimepicker.min.js"></script>
    	<script type="text/javascript" src="<?php print base_url(); ?>assets/js/bootstrap-datetimepicker.fr.js"></script>
        <script type="text/javascript">

		/*$('.form_date').datetimepicker({
			language:  'en',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});*/
		/////////////////////////////////////////
		 $('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		forceParse: 0,
        showMeridian: 1
   		});

	</script>
      </div>
 	</div>
  </div>
</div>
</form>
</body>

</html>
