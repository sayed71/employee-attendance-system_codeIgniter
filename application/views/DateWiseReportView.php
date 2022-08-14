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
  <?php echo form_open_multipart('datewise_report/ButtonWork') ?>
    <div class="container">   
      <div class="table-responsive">          
       	<div class="panel panel-primary" style=" margin-top:15px;">
      <div class="panel-heading" style="text-align:center; font-size:20px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">&nbsp;<span class="panel-heading" style="text-align:center; font-size:20px;">Date Wise Report<span class="form-group">
              <input name="hdnUserID" type="hidden" id="hdnUserID" value="<?php print @$Msg['UserID']; ?>">
              <input type="hidden" name="hdnRecPos" id="hdnRecPos" value="<?php print @$Msg['RecPos']; ?>">
            </span></span></td>
          </tr>
        </table>
      </div>

   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="table">
          <tr>
            <td width="8%">&nbsp;</td>
            <td width="33%">
            
                 <div class="control-group">
                    <div class="controls input-append date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <!--<input type="text"  value="" size="16" >-->
                        <span class="form-group">
                      <input name="txtStartDate" id="txtStartDate" type="text" class="form-control" placeholder="Start Date" style="color:#428bca;">
                    </span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" id="dtp_input2" value="" />
                </div>
            
            </td>
            <td width="40%">
            
            
            <!-- ------------------------------------->
          <div class="control-group">
                <div class="controls input-append date form_date" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                    <!--<input type="text"  value="" size="16" >-->
                    <span class="form-group">
                  <input name="txtEndDate" id="txtEndDate" type="text" class="form-control" placeholder="End Date" style="color:#428bca;">
                </span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input2" value="" />
            </div>
            
            <!-- -------------------------------------->
            
            </td>
            <td width="6%">
              <button type="Submit" name="btnShow" id="btnShow" class="btn btn-primary btn-small "  value="Show">
                   Go</button>
            </td>
            <td width="6%">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" align="center">
              
              </td>
          </tr>
          <tr>
            <td colspan="5" align="center" valign="top">
                <?php
				if(isset($Msg))
				{
				@$SL=0;
				?>
                 <table width="100%" border="0" cellspacing="0" cellpadding="0"  class="table table-bordered">
              <tr style="background:#428bca; color:#FFF;">
              	<td width="3%">S.L.</td>
                 <td width="12%" align="center"> DATE </td>
                <td width="16%" align="center">HOLIDAY TYPE</td>
                <td width="13%" align="center">IN-TIME</td>
           
                <td width="14%" align="center">OUT-TIME</td>
                <td width="15%" align="center">WORKING TIME</td>
                <td width="13%" align="center">LOG COUNT</td>
                <td width="14%" align="center">ATTEN. STATUS</td>
              </tr>
              <?php
			  	print (@$Msg);
			  ////////////////////////////////////////////////
				//foreach ($Msg['res']  as $row)
				//{
					//@$SL++;
				?>
             <!-- <tr style="color:#428bca;">
              	<td><?php //echo @$SL; ?></td>
                   <td align="center"><?php //echo @$row['UserID']; ?></td>
                <td align="center"><?php //echo @$row['JoinDate']; ?></td>
                <td align="center"><?php //echo @$row['Address']; ?></td>
               
                <td align="center"><?php //echo @$row['EmailAddress']; ?></td>
                <td align="center"></td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
              </tr>-->
              <?php 
			  	//}
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
