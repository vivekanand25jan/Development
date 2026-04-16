<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('header'); ?>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">My Profile</a></li>
	<li><a href="javascript:void(0)">Edit MY Profile</a></li>
	<li><a href="javascript:void(0)">Change Password</a></li>
   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
 <span style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span> 
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<table width="500" border="0" cellspacing="0" cellpadding="7" align="left">
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="left"  valign="top" width="170" class="pler"><b>First Name</b></td>
<td align="right"  valign="middle" class="pler">:</td>
<td align="left"  valign="top" class="pler"><?php echo $user_info->firstname;?></td>
</tr>

<tr>
<td align="left" valign="top" class="pler"><b>Last Name</b></td>
<td align="right" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler"><?php echo $user_info->lastname;?></td></tr>

<tr><td align="left" valign="top" class="pler"><b>Email</b></td>
<td align="right" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler"><?php echo $user_info->email; ?></td></tr>
<tr><td align="left" valign="top" class="pler"><b>Contact No</b></td>
<td align="right" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler"><?php echo $user_info->contact_no; ?></td></tr>
<tr><td align="left" valign="top" class="pler"><b>Address</b></td>
<td align="right" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler"><?php echo $user_info->address; ?></td></tr>
<!-- <tr><td align="left" valign="top" class="pler"><b>Last Visit Date</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler"><?php //echo $user_info->last_visit_date; ?></td></tr> -->
</table>
    
  </div>
  
    
    
<div id="containerdount" class="admin-innerbox">
		

<form action="<?php echo WEB_URL.'index/edit_myacc_details/'.$user_info->user_id; ?>" method="post"  name="reg" >
<div style="float:left;">	
<table border="0" align="center" cellpadding="7" cellspacing="0">

<tr>
	<td colspan="3">&nbsp;</td>
</tr>

<tr><td align="left" valign="top" width="170" class="pler"><b>First Name</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="firstname"  type="text" value="<?php if( isset($user_info->firstname)) echo $user_info->firstname; ?>" >
<?php echo form_error('firstname');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Last Name</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="lastname" type="text" value="<?php if( isset($user_info->lastname)) echo $user_info->lastname; ?>" >
<?php echo form_error('lastname');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Email</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="email" type="text" value="<?php if( isset($user_info->email)) echo $user_info->email; ?>" >
<?php echo form_error('email');?>
</td></tr>


<tr><td align="left" valign="top" class="pler"><b>Contact No</b></td>
<td align="left" valign="middle" class="pler">:</td>

<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="contact_no" type="text" value="<?php if( isset($user_info->contact_no)) echo $user_info->contact_no; ?>" ></td></tr>
<tr><td colspan="2" align="left" valign="top" style='color:#FF0000;' class="pler"><?php echo form_error('contact_no');?></td></tr>


<tr><td align="left" valign="top" class="pler"><b>Address</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="address" type="text" value="<?php if( isset($user_info->address)) echo strip_tags($user_info->address); ?>" >
</td></tr>
<tr><td colspan="2" align="left" valign="top" style='color:#FF0000;' class="pler"><?php echo form_error('address');?></td></tr>

<tr>
<td align="left" valign="middle" class="pler">&nbsp;</td>
<td align="left" valign="top" class="pler"></td><td align="left" valign="top" class="pler"><input type="image" name="submit" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" width="109" height="35"  value="Submit" /></td></tr>

</table>
</div>


</form>


</div> 
  
  
<div id="containerdount"><form action="<?php echo WEB_URL.'index/edit_myacc_details_p/'.$user_info->user_id; ?>" method="post"  name="reg" >
<div style="float:left;">	
<table border="0" align="center" cellpadding="7" cellspacing="0">

<tr>
	<td colspan="3">&nbsp;</td>
</tr>

<tr><td align="left" valign="top" width="170" class="pler"><b>Currenct Password</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="firstname"  type="password" value="" >
<?php echo form_error('firstname');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>New Password</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="password" type="password" value="" >
<?php echo form_error('password');?>
</td></tr>

<tr><td align="left" valign="top" class="pler"><b>Confirm Password</b></td>
<td align="left" valign="middle" class="pler">:</td>
<td align="left" valign="top" class="pler">
<input class="ma_pro_txt" name="comform_password" type="password" value="" >
<?php echo form_error('comform_password');?>
</td></tr>

<tr>
<td align="left" valign="middle" class="pler">&nbsp;</td>
<td align="left" valign="top" class="pler"></td><td align="left" valign="top" class="pler"><input type="image" name="submit" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" width="109" height="35"  value="Submit" /></td></tr>

</table>
</div>


</form></div>
<div id="containerdount">4</div>
<div id="containerdount">5</div>
<div id="containerdount">6</div>
</div>

<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
</script>
                                      </td>
                      
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
 </div>
</body>
</html>
