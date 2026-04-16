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
	<li><a href="javascript:void(0)">View Profile</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style=" float: right;    font-size: 14px;    margin-top: -36px;    padding: 3px;">
    <a style="
background-color:#EDEFED;
color:#06C;
    font-size: 14px;
    font-weight: bold;
    height: 30px;
    line-height: 30px;
    margin: 0;
    padding: 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    top: 1px;
    width: 52px;" href="<?php echo WEB_URL; ?>index/b2c_reports">Back</a></span>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<form action="<?php echo WEB_URL; ?>index/my_account_update/<?php echo $id; ?>" method="post" name="profile">     
<div class="tab_right_section">

		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td  colspan="2" align="left" valign="top" class="my_profile_name">Login Information: <br />  <?php echo $profile->email; ?></td>
  </tr>

  <tr>
    <td width="116" align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top"  colspan="2"class="my_profile_name">Personal Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">
      First Name
    </td>
	 <td width="184" align="left" valign="top" class="account_font_pos_r"> : <?php echo $profile->first_name; ?></td>
  </tr>
  <tr> <td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
      Last Name
    </td>
	<td align="left" valign="top" class="account_font_pos_r"> : <?php echo $profile->middle_name; ?></td>
  </tr>
   <tr> <td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Mobile Number
    </td>
	<td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->mobile_no; ?></td>
  </tr>

  
  <tr>
    <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
</table>

</div>
<div class="tab_right_section"><table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" colspan="2" class="my_profile_name">Contact Information: </td>
  </tr>
   <tr>
    <td width="114" align="left" valign="top" class="account_font_pos_r">
   Phone Number
    </td>
	  <td width="186" align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->alternative_no 	; ?></td>
  </tr>
  <tr> <td colspan="2">&nbsp;</td></tr>
 
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Adddress
    </td>
	<td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->address; ?></td>
  </tr>  <tr> <td colspan="2">&nbsp;</td></tr>

   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    City
    </td>
	<td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->city; ?></td>
  </tr>
   <tr> <td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
     Country
    </td>
	 <td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->country; ?></td>
  </tr>
  <tr> <td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
   Postal Code
    </td>
	<td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->postal_code; ?></td>
  </tr>
 
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table></div>
<div class="tab_right_second">
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td width="160" align="left" valign="top" class="my_profile_name">Document Information: </td>
  </tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Document Type
    </td>
	 <td width="140" align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->doc_type; ?></td>
  </tr>
  <tr> <td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Nationalty Phone Number
    </td>
	<td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->nationality; ?></td>
  </tr>
  <tr> <td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Passport Number
    </td>
	   <td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->passport; ?></td>
  </tr>
  <tr> <td colspan="2">&nbsp;</td></tr>
   <tr>
    <td align="left" valign="top" class="account_font_pos_r">
    Issuing Country
    </td>
	   <td align="left" valign="top" class="account_font_pos_r"> : <?php echo $p_info->issuing_con; ?></td>
  </tr>

 
  <tr>
   <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
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
