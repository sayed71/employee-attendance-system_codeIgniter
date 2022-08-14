<!DOCTYPE html>
<html>
  <head>
    <title>Attendance Information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print base_url(); ?>assets/css/core.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php print base_url(); ?>assets/css/ui.thems.css">
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php print base_url(); ?>assets/js/core.js"></script>
   
<!--    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
    <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>-->
     
     
      <style type="text/css">
		body{
				 background-image:url(<?php print base_url(); ?>assets/img/white_tiles.png);
				 background-repeat:repeat;
			}
	 </style>
    
    
           <style>
            /* Autocomplete
            ----------------------------------*/
            .ui-autocomplete { position: absolute; cursor: default; }   
            .ui-autocomplete-loading { background: white url('<?php print base_url(); ?>assets/img/logo/ui-anim_basic_16x16.gif') right center no-repeat; }*/
 
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
			
        </style>
        
       <script type="text/javascript">
	   $(function(){
		   		//$('#Msg').text('Welcome to attendance informatiom ');
		   		$('#txtUserName').focus();
		   		$("#txtPassword,#txtRemarks,#btnAdd,#btnReport").attr("disabled", true);
				$("#txtUserName").keypress(function(){
						var aa=$("#txtUserName").val();
						if(aa=="")
						{
							$("#txtPassword,#txtRemarks,#btnAdd,#btnReport").attr("disabled", true);
							$("#txtPassword,#txtRemarks").val('');
						}
						else
						{
							$("#txtPassword,#txtRemarks,#btnAdd,#btnReport").attr("disabled", false);	
						}
					});
		   });
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
					var ImageName=ui.item.ImageName;
					//alert(ImageName);
					document.getElementById('hdnImageName').value = ImageName;
					document.getElementById('hdnUserID').value = iid;
					//var uID=document.getElementById('hdnUserID').value;
					if(iid!="")
					{
						document.getElementById('hdnUserID').value = iid;
						//$("#txtPassword,#txtRemarks,#btnAdd").attr("disabled", false);
						$("#txtPassword").attr("disabled", false);
						$('#txtPassword').focus();
						/*$("#result").append(
							"<li>"+ ui.item.value + "</li>"
						); */ 
					}

                },      
            });
		});
		//////////////////////////////////////////
		function fnPassword(pass)
		{
			var Uid=document.getElementById('hdnUserID').value;
			var Uname=document.getElementById('txtUserName').value;
			var ImgName=document.getElementById('hdnImageName').value;
			//alert(pass+"/"+Uid+"/"+Uname);
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/autocomplete/CheckPass",
				data: {Uid:Uid,Uname:Uname,pass:pass},
				cache: false,
				async: false, 
				success: function(data)
				{
					//alert(data);
					if(data==1)
					{
						//alert(Uid);
						document.forms[0].Uimg.src='<?php print base_url(); ?>assets/img/UserImage/'+ImgName+'.jpg';
						$("#txtRemarks,#btnAdd,#btnReport").attr("disabled", false);
						$('#txtRemarks').focus();
						$('#Msg').text('password is correct !');
					}
					else
					{
						//alert("No");	
						$("#txtRemarks,#btnAdd,#btnReport").attr("disabled", true);
						$('#Msg').text('password is wrong !');
					}
				},
				error: function()
				{
					$('#Msg').text('password is wrong !');
					$("#txtUserName,#txtPassword,#txtRemarks").val('');
					$('#txtUserName').focus();
		   			$("#txtPassword,#txtRemarks,#btnAdd,#btnReport").attr("disabled", true);
				}
				});
		}
		////////////////////////////////////////////////
		/*$(function(){
				$('body').click(function() { 
					//$('#txtUserName').focus();
				 });
			});*/
		/////////////////////////////////////////////////

        </script>
  </head>

  <body>
  <?php echo form_open('attendance/create') ?>
    <div class="container">   
      <div class="table-responsive">          
       	<div class="panel panel-primary" style=" margin-top:15px;">
      <div class="panel-heading" style="text-align:center; font-size:36px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="18%"><img src="<?php print base_url(); ?>assets/img/Logo.jpg" width="229" height="87"></td>
            <td width="60%" align="center"><span class="panel-heading" style="text-align:center; font-size:36px;">Attendance Information</span></td>
            <td width="22%" align="right" valign="top">
            <a href="<?php print base_url(); ?>/index.php/login/CheckAdmin"><i style="color:#000000" class="glyphicon glyphicon-user"></i><span ></span></a>
            </td>
          </tr>
        </table>
      </div>
      <div class="panel-body" align="center">
   <div style="margin:0 auto;">     
     <div class="clock">
		<div id="Date"></div>
		<div style=" margin:0 auto;">
        <ul style=" font-size:10px;">
			<li id="hours"> </li>
    		<li id="point">:</li>
    		<li id="min"> </li>
   			<li id="point">:</li>
    		<li id="sec"> </li>&nbsp;&nbsp;
    		<li id="sec1"> </li> 
		</ul>
        </div>
	</div>
   </div>
   <table width="70%" border="0" cellspacing="0" cellpadding="0" class="table">
          <tr>
            <td width="6%">&nbsp;</td>
            <td width="27%"><span style="color:#428bca;">User Name</span></td>
            <td width="41%"><span class="form-group">
              <input name="txtUserName" id="txtUserName" type="text" class="form-control" placeholder="Type User Name..." value="" style="color:#428bca;" onMouseOver="select();">
              <input type="hidden" name="hdnUserID" id="hdnUserID">
            </span></td>
            <td width="6%">&nbsp;</td>
            <td width="20%" rowspan="3" align="center">
            <img id="Uimg" src="<?php print base_url(); ?>assets/img/NoImage.jpg" class="img-responsive img-circle" alt="No-Image" width="100" height="100" style=" border:#428bca 3px solid;" >
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><span style="color:#428bca;">Password</span></td>
            <td><span class="form-group">
              <input name="txtPassword" id="txtPassword" type="password" class="form-control" placeholder="Type Password..." value=""  style="color:#428bca;" onKeyUp="fnPassword(this.value)" >
              <input type="hidden" name="hdnImageName" id="hdnImageName">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td align="left" valign="top"><span style="color:#428bca;">Remarks</span></td>
            <td valign="top"><span class="form-group">
              <textarea name="txtRemarks" id="txtRemarks" class="form-control" placeholder="Type Remarks..."  style="color:#428bca;" onBlur="$('#btnAdd').focus();"  onMouseOver="select();"></textarea>
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5">
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <button type="submit" id="btnAdd" name="btnAdd" value="Attendance" class="btn btn-primary">Attendance</button>
                </div>
                <div class="btn-group">
                  <button type="submit" id="btnReport" name="btnReport" class="btn btn-primary" value="Report">Report</button>
                </div>
                </div>            
                </td>
          </tr>
        </table> 
        <span style="font-style:normal; color:#428bca;"><div id="Msg"><?php print $Msg; ?></div></span>
      </div>
 	</div>
  </div>
</div>
</form>
</body>

</html>
