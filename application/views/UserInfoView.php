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
     
           <style>
            /* Autocomplete
            ----------------------------------*/
            .ui-autocomplete { position: absolute; cursor: default; }   
<!--            .ui-autocomplete-loading { background: white url('<?php// print base_url(); ?>assets/img/logo/ui-anim_basic_16x16.gif') right center no-repeat; }*/
--> 
            /* workarounds */
            * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
 
            /* Menu
            ----------------------------------*/
            .ui-menu {
                list-style:none;
                padding: 2px;
                margin: 0;
                display:block;
				width:100px;
				/*background-color:#428bca;*/
            }
            .ui-menu .ui-menu {
                margin-top: -3px;
				/*background-color:#428bca;*/
            }
            .ui-menu .ui-menu-item {
                margin:0;
                padding: 0;
                zoom: 1;
                float: left;
                clear: left;
                width: 100%;
                font-size:80%;
				/*color:#428bca;*/
            }
            .ui-menu .ui-menu-item a {
                text-decoration:none;
                display:block;
                padding:.2em .4em;
                line-height:1.5;
                zoom:1;
				/*color:#428bca;*/
				
            }
            .ui-menu .ui-menu-item a.ui-state-hover,
            .ui-menu .ui-menu-item a.ui-state-active {
                font-weight: normal;
                margin: -1px;
				color:#428bca;
		
            }
			
			/*----------------------------------------*/
			.fileUpload {
				position: relative;
				overflow: hidden;
				margin: 10px;
			}
			.fileUpload input.upload {
				position: absolute;
				top: 0;
				right: 0;
				margin: 0;
				padding: 0;
				font-size: 20px;
				cursor: pointer;
				opacity: 0;
				filter: alpha(opacity=0);
			}
			/*----------------------------------------*/
        </style>
        
       <script type="text/javascript">
        $(this).ready( function() {
            $("#txtUserName").autocomplete({
                minLength: 1,
                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo base_url(); ?>index.php/autocomplete/lookup",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
								//alert(data.message);
                            }
                        },
                    });
                },
            select: 
                function(event, ui) {
					var iid=ui.item.id;

                },      
            });
		});
		////////////////Selectpicker//////////////////////
		$(function(){
				 $('.selectpicker').selectpicker();
			});
		////////////////////////////////////////////////////
		$(function(){
			$('input[type=text]').dblclick(function() {
				$(this).val('');
			});
		});
		////////////////////////////////////////////////////
		function fn_male()
		{
			//alert("Male");#428bca;	
			
		}
		////////////////////////////////////////////////////
		function fn_female()
		{
			//alert("Female");	
			
		}
		///////////////////////////////////////////////////
        </script>
        

  </head>

  <body>
  <?php echo form_open_multipart('userInfo/ButtonWork') ?>
    <div class="container">   
      <div class="table-responsive">          
       	<div class="panel panel-primary" style=" margin-top:15px;">
      <div class="panel-heading" style="text-align:center; font-size:20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15%">&nbsp;</td>
            <td width="70%" align="center"><span class="panel-heading" style="text-align:center; font-size:20px;">Employee Information</span></td>
            <td width="15%" align="right" valign="top">
            </td>
          </tr>
        </table>
      </div>

   <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
          <tr>
            <td width="8%">&nbsp;</td>
            <td width="33%"><span style="color:#428bca;">Employee Name</span></td>
            <td width="40%"><span class="form-group">
              <input name="txtUserName" id="txtUserName" type="text" class="form-control" placeholder="User Name" style="color:#428bca;" value="<?php print @$Msg['UserName']; ?>">              
              <input name="hdnUserID" type="hidden" id="hdnUserID" value="<?php print @$Msg['UserID']; ?>">
            </span>
              <input type="hidden" name="hdnRecPos" id="hdnRecPos" value="<?php print @$Msg['RecPos']; ?>"></td>
            <td width="6%">&nbsp;</td>
            <td width="13%" rowspan="8" align="right" valign="top">
            <img id="Uimg" src="<?php print base_url(); ?>assets/img/NoImage.jpg" class="img-responsive img-rounded" alt="No-Image" width="110" height="112" style=" border:#428bca 3px solid; size:12px;" >    
            <div class="fileUpload btn btn-primary">
                  <span>Upload</span>
                  <input type="file" class="upload" name="FileUserImg" />
            </div>          
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Contact Number</span></td>
            <td><span class="form-group">
              <input name="txtContactNumber" id="txtContactNumber" type="text" class="form-control" placeholder="Contact Number" value="<?php print @$Msg['ContactNumber']; ?>" style="color:#428bca;">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Designation Type</span></td>
            <td><span class="form-group">
              <input name="txtDesignation" id="txtDesignation" type="text" class="form-control" placeholder="Designation Type" value="<?php print @$Msg['DesignationType']; ?>" style="color:#428bca;">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Salary</span></td>
            <td><span class="form-group">
              <input name="txtSalary" id="txtSalary" type="text" class="form-control" placeholder="Salary" value="<?php print @$Msg['SalaryAmount']; ?>" style="color:#428bca;">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Email Address</span></td>
            <td><span class="form-group">
              <input name="txtEmail" id="txtEmail" type="text" class="form-control" placeholder="Email Address" value="<?php print @$Msg['EmailAddress']; ?>" style="color:#428bca;">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Address</span></td>
            <td><span class="form-group">
              <input name="txtAddress" type="text" class="form-control" id="txtAddress" placeholder="Address" style="color:#428bca;" value="<?php print @$Msg['Address']; ?>">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Date</span></td>
            <td>
            
			<!--<span class="form-group">
              <input name="txtDate" id="txtDate" type="text" class="form-control" placeholder="Date" value="<?php //print @$Msg['JoinDate']; ?>" style="color:#428bca;">
            </span>-->
            
            <!-- ------------------------------------->
          <div class="control-group">
                <div class="controls input-append date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <!--<input type="text"  value="" size="16" >-->
                    <span class="form-group">
                  <input name="txtDate" id="txtDate" type="text" class="form-control" placeholder="Date" value="<?php print @$Msg['JoinDate']; ?>" style="color:#428bca;">
                </span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" />
            </div>
            
            <!-- -------------------------------------->
            
            </td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Gender</span></td>
            <td>
            
                <!--<input name="RadioGroup1" type="radio" id="RadioGroup1_0" value="radio" checked>
                <span style="color:#428bca;">Male</span>&nbsp;
                <input type="radio" name="RadioGroup1" value="radio" id="RadioGroup1_1">
                <span style="color:#428bca;">Female</span>-->
                
                <div class="btn-group" data-toggle="buttons">
                <?php 
					if(isset($Msg['Gender']))
					{
					if(@$Msg['Gender']=="male")
					{
						$Male="checked";
						$Female="";
						$style='style="background:#CCC;"';
						$style1="";
					}
					else if(@$Msg['Gender']=="female")
					{
						$Female="checked";	
						$Male="";
						$style1='style="background:#CCC;"';
						$style="";
					}
					}
					else
					{
						$Female="";	
						$Male="";
						$style1='';
						$style="";	
					}
				 ?>
                <label class="btn btn-default" <?php print $style; ?>   onClick="fn_male();">
                   <input name="RadioGender" type="radio" id="RadioMale" autocomplete="off" checked value="male" <?php print $Male; ?> > <span style="color:#428bca;">Male</span>
                  </label>
               <label class="btn btn-default"  <?php print $style1; ?>   onClick="fn_female();">  
                    <input type="radio" name="RadioGender" id="RadioFemale" autocomplete="off" value="female" <?php print $Female; ?> > <span style="color:#428bca;">Female</span>
                  </label>
                </div>
                
			</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color: #428bca">Department</span></td>
            <td><div style="width:200px;">
              <select id="SelectUserType2" name="SelectUserType2" class="form-control" title="Select Department" style=" color:#428bca;">
                <option value="select-one">Select Department</option>
                <?php
				
							foreach ($SD['SelectD']  as $SelectD)
							{
								if($Msg['DepartmentType']==$SelectD['UserID'])
								{
									$aaaa="selected";	
								}
								else
								{
										$aaaa="";
								}
						?>
                <option value="<?php  echo @$SelectD['UserID']; ?>" <?php print $aaaa; ?>><?php echo @$SelectD['UserName']; ?></option>
                <?php
						 } 
				?>
              </select>
            </div></td>
            <td>&nbsp;</td>
            <td align="right" valign="top"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Policy Type</span></td>
            <td>
            
            	<div style="width:200px;">
                  <select id="SelectUserType" name="SelectUserType" class="form-control" title="Select user type" style=" color:#428bca;">
                  
                  	<option value="select-one">Select Policy Type</option>
                    	<?php
							foreach ($STU['SelectUT']  as $SelectUT)
							{
								if($Msg['SelectUserType']==$SelectUT['UserTypeID'])
								{
									$aaa="selected";	
								}
								else
								{
										$aaa="";
								}
						?>
                    	<option value="<?php  echo @$SelectUT['UserTypeID']; ?>" <?php print $aaa; ?>><?php echo @$SelectUT['UserTypeName']; ?></option>
                    	<?php
						 } 
						 ?>
                  </select>
              </div>
              
            </td>
            <td>&nbsp;</td>
            <td align="right" valign="top"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">MAC Address</span></td>
            <td><span class="form-group">
              <input name="txtMAC_Address" id="txtMAC_Address" type="text" class="form-control" placeholder="MAC Address" value="<?php print @$Msg['MAC_Address']; ?>" style="color:#428bca;">
            </span></td>
            <td>&nbsp;</td>
            <td align="right" valign="top"></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Password</span></td>
            <td><span class="form-group">
              <input name="txtPassword" id="txtPassword" type="password" class="form-control" placeholder="Password" value="<?php print @$Msg['UserPassword']; ?>"  style="color:#428bca;" onKeyUp="fnPassword(this.value)">
            </span></td>
            <td>&nbsp;</td>
            <td width="13%" align="right" valign="top">
            	
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left" valign="top"><span style="color:#428bca;">Confirm Password</span></td>
            <td valign="top"><span class="form-group">
              <input name="txtConfirmPassword" id="txtConfirmPassword" type="password" class="form-control" placeholder="Confirm Password" value="<?php print @$Msg['UserPassword']; ?>" style="color:#428bca;">
            </span></td>
            <td>&nbsp;</td>
            <td width="13%" align="right" valign="top">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" align="center">
              
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
            <td colspan="5" align="center"><span class="panel-heading" style="text-align:center; font-size:20px;"><span style="color:#428bca;">
			<?php  print @$Msg['Msg'];  ?>
            </span></span></td>
          </tr>
          <tr>
            <td colspan="5" align="center">
                <?php
				if(isset($Msg['res']))
				{
				@$SL=0;
				?>
                 <table width="84%" border="0" cellspacing="0" cellpadding="0"  class="table table-bordered">
              <tr style="background:#428bca; color:#FFF;">
              	<td>S.L.</td>
                <td align="center">USER ID</td>
                <td align="center">USER NAME</td>
                <td align="center">CONTACT NUMBER</td>
                <td align="center">EMAIL ADDRESS</td>
                <td align="center">ADDRESS</td>
              </tr>
              <?php
				foreach ($Msg['res']  as $row)
				{
					@$SL++;
				?>
              <tr style="color:#428bca;">
              	<td><?php echo @$SL; ?></td>
                <td align="center"><?php echo @$row['UserID']; ?></td>
                <td align="center"><?php echo @$row['UserName']; ?></td>
                <td align="center"><?php echo @$row['ContactNumber']; ?></td>
                <td align="center"><?php echo @$row['EmailAddress']; ?></td>
                <td align="center"><?php echo @$row['Address']; ?></td>
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

		$('.form_date').datetimepicker({
			language:  'en',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
		/////////////////////////////////////////
		/* $('.form_date').datetimepicker({
        language:  'en',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		forceParse: 0,
        showMeridian: 1
   		});*/

	</script>
      </div>
 	</div>
  </div>
</div>
</form>
</body>

</html>
