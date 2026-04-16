<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<ul class="tabs">
	<li><a href="javascript:void(0)">Edit Profile</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<form action="<?php echo WEB_URL; ?>index/my_account_update_agent_subadmin/<?php echo $id; ?>" method="post" name="profile">     
<div class="tab_right_section">

		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Login Information: </td>
  </tr>
  <tr>
    <td align="left" valign="top"><input name="" value="<?php echo $profile->email; ?>" class="ma_pro_txt" readonly="readonly" type="text" /></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">Personal Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">
      First Name
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="fname" type="text" class="ma_pro_txt" value="<?php echo $profile->first_name; ?>" /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
      Last Name
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="lname" type="text" class="ma_pro_txt" value="<?php echo $profile->middle_name; ?>" /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Mobile Phone Number
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mo_no" type="text" value="<?php echo $profile->mobile; ?>" class="ma_pro_txt"  /></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
</table>

</div>
<div class="tab_right_section"><table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Contact Information: </td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
   Phone Number
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="ph_no" type="text"  value="<?php echo $profile->phone 	; ?>" class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Adddress
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="address" type="text"  value="<?php echo $profile->address; ?>" class="ma_pro_txt"  /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    City
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="city" type="text"  value="<?php echo $profile->city; ?>" class="ma_pro_txt"  /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
     Country
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="country" type="text" value="<?php echo $profile->country; ?>"  class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
   Postal Code
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="post_code" type="text"  value="<?php echo $profile->post_code; ?>" class="ma_pro_txt"  /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table></div>
<div class="tab_right_second">
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Document Information: </td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Login ID
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><?php echo $profile->login_id; ?></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Type
    </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><?php echo $profile->sub_admin_type; ?></td>
  </tr>
   
  
 
  <tr>
   <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table>

</div>
<div class="wi_for_cancel">
			<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0 0 25px 0;">
  <tr>
    <td align="left" valign="top">
    
    		<table width="350" border="0" align="left" cellpadding="0" cellspacing="0">
 
  
</table>

    </td>
    <td align="left" valign="top"><table width="250" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
    <td><a href="#"></a></td>
  </tr>
</table>
</td>
  </tr>
</table>

</div>
</form>
    
  </div>
  
    
    
 
  
  
<div id="containerdount">3</div>
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
