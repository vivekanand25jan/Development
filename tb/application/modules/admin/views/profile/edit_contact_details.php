<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR_FRONT ?>css/uploadify.css">
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery.uploadify-3.1.js"></script>
 <script type="text/javascript" src="<?php echo WEB_DIR; ?>designAccess/engine1/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">

<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>

<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
if (restore) selObj.selectedIndex=0;
}

$(document).ready(function(){

$("input:radio[name=top_city]").click(function() {
var top_city = $(this).val();
$('#testinput').val(top_city);
});
return false;
});

</script>
<style>
.image-box{width:172px; height:128px; float:left; border:1px solid #ccc; margin:5px; position:relative;}
.checkbox-bg{ position:absolute; width:40px; height:15px; top:4px; left:4px; padding:2px; background-color:#000; }
.img-fix{float:left; margin-top:-20px; margin-left:17px;}
</style>


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
                      
                      
                      <script language="javascript1.5" type="text/javascript">
				
		function goBack()
{
	window.history.go(-1);
}
		</script>
<style>
#tabs_active { background-color:#517BA5; }
</style>
        
<div id="navjam">
<div class="tabs_width">
<?php
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
    <ul class="tabs1">
        <li><a href="javascript:void(0)" id="tabs_active">Hotel Details </a></li>
        <li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Inventory Management </a></li>
        <li><a href="<?php echo WEB_URL;?>index/booking_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Booking Details </a></li>
        <li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accounting </a></li>
       
       <li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
       
    </ul>
<?php
}
else
{
?>
	<ul class="tabs1">
    <li><a href="javascript:void(0)" id="tabs_active">Hotel Details </a></li>
    <li><a href="javascript:void(0">Inventory Management </a></li>
    <li><a href="">Booking Details </a></li>
    <li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
	</ul>
<?php
}
?>
</div>
</div>
	


<div id="navjam">
<ul class="tabs">
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active" > Contact Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Detail Location </a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
<div id="containerdount" class="admin-innerbox">
    	
    
<div class="tab_right_section">
<form name="f2" action="<?php echo WEB_URL;?>index/add_market/<?php echo $this->uri->segment(3)?>" method="post">
<table style="float:left; ">
<tr>
    <td align="left" valign="top" class="my_profile_name">General Information: </td>
  </tr>
        <tr>
            <td>Add Market</td>
        </tr>
        <tr>
            <td><input type="text" name="add_market_name" id="add_market_name" required></td>
            <td><input type="submit" name="add_new" id="add_new" value="Add"></td>
        </tr>
    </table>
    </form>
<form action="<?php echo WEB_URL; ?>index/update_contact_inform/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post" name="profile"> 
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  
  <tr>
    <td align="left" valign="top">
    <?php
               $market_list=$this->Supplier_Model->fetch_markets();
                for($i=0;$i<count($market_list);$i++)
                {
                ?>
                <input type="checkbox" name="market_name[]" id="market_name[]" value="<?php echo $market_list[$i]->market_id; ?>"  <?php if(isset($contact_inf->sup_hotel_id) &&$sup_market = $this->Supplier_Model->supplier_markets($contact_inf->sup_hotel_id, $market_list[$i]->market_id)) { echo "checked='checked'"; } ?>/>&nbsp;<label><?php echo $market_list[$i]->market_name; ?></label>&nbsp;<br>
                <?php	
                }
                ?>
       <!-- <select name="market_name[]" id="market_name[]" multiple="multiple" class="" style="width:260px;" size="5">
        <?php
		$market_list=$this->Supplier_Model->fetch_markets();
		if(isset($market_list[0]->market_id))
		{
		for($i=0;$i<count($market_list);$i++){ 
			$market_name = explode(",",$contact_inf->market_name);
			for($j=0;$j<count($market_name);$j++){
			if($market_list[$i]->market_id ==  $market_name[$j]){
		?>
		  <option value="<?php echo $market_list[$i]->market_id; ?>" selected='selected'> <?php echo $market_list[$i]->market_name; echo $market_list[$i]->market_id;?>  </option>
		<?php	
			}
			else { ?>
				<option value="<?php echo $market_list[$i]->market_id; ?>"> <?php echo $market_list[$i]->market_name; echo $market_list[$i]->market_id;?>  </option>
		<?php	}
			}
		}
		}
		?>
		</select>-->
        </td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">Hotel Name</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="pro_name" id="pro_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->hotel_name)){ echo $contact_inf->hotel_name; } ?>"/></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">City</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">
	<script type="text/javascript" src="<?php print WEB_DIR_FRONT; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR_FRONT; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
          
              <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px; z-index:99999; position:absolute;" disabled="disabled" />
              <input type="text" name="country_val"  id="testinput" class="ma_pro_txt" value="<?php if(isset($contact_inf->city)){ echo $contact_inf->city; }?>"/>
              
              <script type="text/javascript">
              
    var options = {
        script:"<?php print WEB_DIR_FRONT; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
    var as_json = new AutoSuggest('testinput', options);
    
    </script> 
  </tr>
  
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">Main Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="main_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->main_first_name)){ echo $contact_inf->main_first_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="main_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->main_last_name)){ echo $contact_inf->main_last_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email Address </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="main_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->main_email )){ echo $contact_inf->main_email ; } ?>" /></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
</table>

</div>
<div class="tab_right_section"><table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  
  <tr>
    <td align="left" valign="top" class="my_profile_name">Reservation Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_first_name )){ echo $contact_inf->res_first_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_last_name )){ echo $contact_inf->res_last_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Phone </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_phone" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_phone)){ echo $contact_inf->res_phone;} ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Fax </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_fax" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_fax)){ echo $contact_inf->res_fax ;} ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_email )){ echo $contact_inf->res_email ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Confirm Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_email_confirm" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_email )){ echo $contact_inf->res_email ; } ?>" /></td>
  </tr>
  
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name">Marketing Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_first_name )){ echo $contact_inf->mar_first_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_last_name )){ echo $contact_inf->mar_last_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Phone </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_phone" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_phone )){ echo $contact_inf->mar_phone ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Fax </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_fax" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_fax)){ echo $contact_inf->mar_fax; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_email)){ echo $contact_inf->mar_email; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Confirm Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_email_confirm" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_email)){ echo $contact_inf->mar_email; } ?>" /></td>
  </tr>
  
</table></div>
<div class="tab_right_second">
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Accounts/Finance Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_first_name)){ echo $contact_inf->acc_first_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_last_name)){ echo $contact_inf->acc_last_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Phone </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_phone" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_phone)){ echo $contact_inf->acc_phone; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Fax </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_fax" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_fax)){ echo $contact_inf->acc_fax; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_email )){ echo $contact_inf->acc_email ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Confirm Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_email_confirm" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_email)){ echo $contact_inf->acc_email; } ?>" /></td>
  </tr>
</table>

</div>
<div class="wi_for_cancel">
			<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0 0 25px 0;">
  <tr>
    <td align="left" valign="top">
    
    		<table width="350" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td style="padding:5px 0 0 0; color:#14a3e7;">&nbsp;</td>
  </tr>
  
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
  




</div>


                                      </td>
                      
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
       
        

        
 	</div>
 </div>

</body>
</html>
