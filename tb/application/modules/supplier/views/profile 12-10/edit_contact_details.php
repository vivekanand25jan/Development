<?php
	//print_r($contact_inf);
	//exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StayAway.com</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">

<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>

<script type="text/javascript">

function valid(()
	{
		if(document.f1.country_val.value=="")
		{
			alert("Please select the country");
			document.f1.country_val.focus();
			return false;
		}
		if(document.f1.city.value=="")
		{
			alert("Please enter the cityu name");
			document.f1.city.focus();
			return false;
		}
		if(document.f1.pro_name.value=="")
		{
			alert("Please enter the property name");
			document.f1.pro_name.focus();
			return false;
		}
		if(document.f1.lan_val.value=="")
		{
			alert("Please select the language");
			document.f1.lan_val.focus();
			return false;
		}
		if(document.f1.res_email.value!= document.f1.res_email_confirm.value)
		{
			alert("Please enter the correct email");
			document.f1.res_email_confirm.focus();
			return false;
		}
		if(document.f1.mark_email.value!= document.f1.mark_email_confirm.value)
		{
			alert("Please enter the correct email");
			document.f1.mark_email.focus();
			return false;
		}
		if(document.f1.acc_email.value!= document.f1.acc_email_confirm.value)
		{
			alert("Please enter the correct email");
			document.f1.acc_email.focus();
			return false;
		}
		
	}
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
</head>
<body>
<?php $this->load->view('header'); ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="javascript:void(0)" id="tabs_active">Property Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
</ul>
</div>
</div>
<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">General & Contact Information</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<!--<div id="navjam">
<?php $this->load->view('profile/left_inner_menu')?>
</div>-->
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform">General & Contact Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/edit_property_info"> Property Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/insert_facility">Accommodation Facilities </a></li>
<li><a href="<?php echo WEB_URL;?>index/general_settings" id="tabs_active">General Settings </a></li>
<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/"> Accommodation Pictures </a></li>
<li><a href="<?php echo WEB_URL;?>index/detail_location/">Detail Location </a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->

<?php

$contact_id=isset($contact_inf-> sup_contact_inform_id) ? $contact_inf-> sup_contact_inform_id:'';
$supplier_id=isset($contact_inf-> sup_id) ? $contact_inf-> sup_id:''; 
$property_id=isset($contact_inf-> sup_property_id) ? $contact_inf-> sup_property_id:'1'; 
$my_country_id=isset($contact_inf-> country_id) ? $contact_inf-> country_id:'';
$my_language_id=isset($contact_inf-> language_id) ? $contact_inf-> language_id:''; 


?>
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">
<!--<font size="4" color="blue" align=""><a href="<?php echo WEB_URL;?>index/profile">Go To List</a></font>-->
<div id="result">
<?php

?>
<?php
	if($contact_id)
	{
?>
		<form action="<?php echo WEB_URL;?>index/update_contact_inform" name="f1" method="post">
   <?php
   }
	else
	{   
   ?>
		<form action="<?php echo WEB_URL;?>index/add_data" name="f1" method="post">
   <?php
   }
   ?>
<table width="780px" align="center" cellspacing="5px" cellpadding="5px" border="0" bordercolor="#ededed" >
		 <tr>
			<td style="color:orange" colspan="2">General Information </td>
		 </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Country:</td>
			<td style="padding-left:9px;" >
		<select name="country_val" id="country_val">
				<?php
				$con_val=array();
				foreach($country_list as $con_val)
				{
					$selected_cntry=$my_country_id==$con_val->country_id ? ' selected':'';
				?>
					<option value=<?php echo $con_val->country_id ?> <?php echo $selected_cntry?> ><?php echo $con_val->name ?> </option>
				<?php	
				}
				?>
				</select>
			</td>
			<td>
				<input type="hidden" name="sup_id" id="sup_id" value="<?php echo $supplier_id?>">
			</td>
			<td>
				<input type="hidden" name="sup_cont_id" id="sup_cont_id" value="<?php echo $contact_id?>">
			</td>
			<td>
				<input type="hidden" name="sup_prop_id" id="sup_prop_id" value="<?php echo $property_id ?>">
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">City:</td>
			<td style="padding-left:11px;r"><input type="text" name="city" id="city" size="30" value="<?php if(isset($contact_inf->city_name)){ echo $contact_inf->city_name; }?>"  ><?php echo form_error('city');?></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Property Name:</td>
			<td style="padding-left:11px;"><input type="text" name="pro_name" id="pro_name" size="30" value="<?php if(isset($contact_inf->property_name)){ echo $contact_inf->property_name; } ?>"><?php echo form_error('pro_name');?></td>
          </tr>
		   <tr>
           <td style="padding-left:11px;">Language Preference:</td>
			<td style="padding-left:9px;" >
				<select name="lan_val" id="lan_val" >
				<?php
				$con_val=array();
				foreach($language_list as $lan_val)
				{
					$selected_lang=$my_language_id==$lan_val->language_id ? ' selected':'';
				?>
					<option value=<?php echo $lan_val->language_id ?>  <?php echo $selected_lang?>><?php echo $lan_val->language ?> </option>
				<?php	
				}
				?>
				</select>
			</td>
          </tr>
		  <tr>
			<td style="color:orange" colspan="2">Main Contact Information  </td>
		 </tr>
		 <tr>
           <td style="padding-left:11px;">First Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="main_first_name" id="first_name" size="30" value="<?php if(isset($contact_inf->main_first_name)){ echo $contact_inf->main_first_name; } ?>" ><?php echo form_error('main_first_name');?></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Last Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="main_last_name" id="last_name" size="30" value="<?php if(isset($contact_inf->main_last_name)){ echo $contact_inf->main_last_name; } ?>" ></select></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Email Address:</td>
			<td style="padding-left:11px;r"><input type="text" name="main_email" id="main_email" size="30" value="<?php if(isset($contact_inf->main_email )){ echo $contact_inf->main_email ; } ?>" ><?php echo form_error('main_email');?></td>
          </tr>
		  <tr>
			<td style="color:orange" colspan="2">Reservation Contact Information  </td>
		 </tr>
		 <tr>
           <td style="padding-left:11px;">First Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="res_first_name" id="res_first_name" size="30" value="<?php if(isset($contact_inf->res_first_name )){ echo $contact_inf->res_first_name ; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Last Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="res_last_name" id="res_last_name" size="30" value="<?php if(isset($contact_inf->res_last_name )){ echo $contact_inf->res_last_name ; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Phone:</td>
			<td style="padding-left:11px;r"><input type="text" name="res_phone" id="res_phone" size="30" value="<?php if(isset($contact_inf->res_phone)){ echo $contact_inf->res_phone;} ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Fax:</td>
			<td style="padding-left:11px;r"><input type="text" name="res_fax" id="res_fax" size="30" value="<?php if(isset($contact_inf->res_fax)){ echo $contact_inf->res_fax ;} ?>"></select></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Email:</td>
			<td style="padding-left:11px;r"><input type="text" name="res_email" id="res_email" size="30" value="<?php if(isset($contact_inf->res_email )){ echo $contact_inf->res_email ; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Confirm Email:</td>
			<td style="padding-left:11px;r"><input type="text" name="res_email_confirm" id="res_email_confirm" size="30" value="<?php if(isset($contact_inf->res_email )){ echo $contact_inf->res_email ; } ?>"></td>
          </tr>
		  <tr>
			<td style="color:orange" colspan="2">Marketing Contact Information </td>
		 </tr>
		 <tr>
           <td style="padding-left:11px;">First Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="mark_first_name" id="mark_first_name" size="30" value="<?php if(isset($contact_inf->mar_first_name )){ echo $contact_inf->mar_first_name ; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Last Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="mark_last_name" id="mark_last_name" size="30" value="<?php if(isset($contact_inf->mar_last_name )){ echo $contact_inf->mar_last_name ; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Phone:</td>
			<td style="padding-left:11px;r"><input type="text" name="mark_phone" id="mark_phone" size="30" value="<?php if(isset($contact_inf->mar_phone )){ echo $contact_inf->mar_phone ; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Fax:</td>
			<td style="padding-left:11px;r"><input type="text" name="mark_fax" id="mark_fax" size="30" value="<?php if(isset($contact_inf->mar_fax)){ echo $contact_inf->mar_fax; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Email:</td>
			<td style="padding-left:11px;r"><input type="text" name="mark_email" id="mark_email" size="30" value="<?php if(isset($contact_inf->mar_email)){ echo $contact_inf->mar_email; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Confirm Email:</td>
			<td style="padding-left:11px;r"><input type="text" name="mark_email_confirm" id="mark_email_confirm" size="30" value="<?php if(isset($contact_inf->mar_email)){ echo $contact_inf->mar_email; } ?>"></td>
          </tr>
		  <tr>
			<td style="color:orange" colspan="2">Accounts/Finance Contact Information  </td>
		 </tr>
		 <tr>
           <td style="padding-left:11px;">First Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="acc_first_name" id="acc_first_name" size="30" value="<?php if(isset($contact_inf->acc_first_name)){ echo $contact_inf->acc_first_name; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Last Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="acc_last_name" id="acc_last_name" size="30" value="<?php if(isset($contact_inf->acc_last_name)){ echo $contact_inf->acc_last_name; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Phone:</td>
			<td style="padding-left:11px;r"><input type="text" name="acc_phone" id="acc_phone" size="30" value="<?php if(isset($contact_inf->acc_phone)){ echo $contact_inf->acc_phone; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Fax:</td>
			<td style="padding-left:11px;r"><input type="text" name="acc_fax" id="acc_fax" size="30" value="<?php if(isset($contact_inf->acc_fax)){ echo $contact_inf->acc_fax; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Email:</td>
			<td style="padding-left:11px;r"><input type="text" name="acc_email" id="acc_email" size="30" value="<?php if(isset($contact_inf->acc_email )){ echo $contact_inf->acc_email ; } ?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Confirm Email:</td>
			<td style="padding-left:11px;r"><input type="text" name="acc_email_confirm" id="acc_email_confirm" size="30" value="<?php if(isset($contact_inf->main_first_name)){ echo $contact_inf->main_first_name; } ?>"></td>
          </tr>
		  <tr>
        <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  />
        <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
        </tr>
        </table>
	</form>
</div>

    
  </div>
  
</div>


<!-- This JavaScript snippet activates those tabs -->
<!--<script>
$(function() {
$("ul.tabs").tabs("div.panes > div");
});
</script>-->
</div>
    
</div>
</div>
</div>
</div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>