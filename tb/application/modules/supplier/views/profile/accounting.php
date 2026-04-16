<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


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
/*function valid((){
	alert("Please Fill the general & contact information first");
}*/
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
<?php
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>">Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>" id="tabs_active">Accounting </a></li>

</ul>
<?php
}
else
{
?>
	<ul class="tabs">
    <li><a href="javascript:void(0)" id="tabs_active">Hotel Details </a></li>
    <li><a href="javascript:void(0">Inventory Management </a></li>
    <li><a href="">Booking Details </a></li>
	</ul>
<?php
}
?>
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
<?php
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
	<ul class="tabs">
	<!--
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>" id="tabs_active"> Contact Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>"> Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>">Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>">Detail Location </a></li>-->
	</ul>
<?php
}
else
{
?>
	<ul class="tabs">
	
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/" id="tabs_active">Contact Information </a></li>
	<li><a href="javascript: void(0)" onclick="return valid()"> Hotel Information </a></li>
	<li><a href="javascript: void(0)" onclick="return valid()">Accommodation Facilities </a></li>
	<li><a href="javascript: void(0)" onclick="return valid()">General Settings </a></li>
	<li><a href="javascript: void(0)" onclick="return valid()"> Photo Gallery </a></li>
	<li><a href="javascript: void(0)" onclick="return valid()">Detail Location </a></li>
	</ul>
<?php
}
?>
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
	<div id="containerdount" style="padding-top:50px;">
<!--<font size="4" color="blue" align=""><a href="<?php echo WEB_URL;?>index/profile">Go To List</a></font>-->

<form action="<?php echo WEB_URL;?>index/accounting_add/<?php echo $this->uri->segment(3);?>" name='acc_form' method="post">
<table width="95%" border="0" cellspacing="1" cellpadding="5" align="center" >
  <tr>
    <td>Transfer To:</td><td><input type='text' name='transferto' value='<?php if(isset($result['0']->transfer_to)){ echo $result['0']->transfer_to; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Account Number:</td><td><input type='text' name='accnumber' value='<?php if(isset($result['0']->acc_number)){ echo $result['0']->acc_number; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr>
    <td>S.W.I.F.T</td><td><input type='text' name='swift' value='<?php if(isset($result['0']->swift)){ echo $result['0']->swift; } ?>'  class="table_body_color_filed"/></td>
  </tr>
   <tr>
    <td>Bank Name:</td><td><input type='text' name='bankname' value='<?php if(isset($result['0']->bank_name)){ echo $result['0']->bank_name; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Paymnet Currency:</td><td>

    <select name="paycurrency"  class="table_body_color_filed">
					<option value="">Select Currency </option>
				<?php
					foreach($currency as $value)
					{
					
					
				?>
					<option value="<?php echo $value->cur_id ?>" <?php if(isset($result['0']->pay_curr ) && $value->cur_id == $result['0']->pay_curr){ echo "selected='selected'"; } ?>><?php echo $value->country ?> </option>
				<?php				
					}
				?>
				</select><span style="color:#FF0000;"> <?php echo form_error('currency');?></span>
    </td>
  </tr>
  <tr>
    <td>Maximum Payment (HKD):</td><td><input type='text' name='maxpayment' value='<?php if(isset($result['0']->max_pay)){ echo $result['0']->max_pay; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  
  <tr>
    <td>Bank Address1:</td><td><input type='text' name='bankadd1' value='<?php if(isset($result['0']->bank_add1)){ echo $result['0']->bank_add1; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Bank Address2:</td><td><input type='text' name='bankadd2' value='<?php if(isset($result['0']->bank_add2)){ echo $result['0']->bank_add2; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Bank Country:</td><td><select name='country' class="table_body_color_filed">
   <option value="">Select Country </option>
   <!-- <option> <?php if (isset($result['0']->bank_country)){echo $result['0']->bank_country;}else { echo "Select Country";  } ?> </option>-->
            <?php
            $country = $this->Supplier_Model->country_list();
            
            for($iii=0;$iii<count($country);$iii++)
            {
            ?>
            <option  value="<?php  echo $country[$iii]->name;  ?>"  <?php if(isset($result[0]-> bank_country) && $country[$iii]->name == $result[0]-> bank_country){ echo "selected='selected'"; } ?>><?php  echo $country[$iii]->name;  ?></option>
            <?php	
            }
            ?>
    </select></td>
  </tr>
  <tr>
    <td>Bank State/ Province:</td><td><input type='text' name='bankstate' value='<?php if(isset($result['0']->bank_state)){ echo $result['0']->bank_state; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Bank City:</td><td><input type='text' name='bankcity' value='<?php if(isset($result['0']->bank_city)){ echo $result['0']->bank_city; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr>
    <td>Postal/ Zip code:</td><td><input type='text' name='postal' value='<?php if(isset($result['0']->postal_code)){ echo $result['0']->postal_code; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr>
    <td>Tax Id/ sse:</td><td><input type='text' name='taxidsse' value='<?php if(isset($result['0']->tax_id_sse)){ echo $result['0']->tax_id_sse; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr align="center"><td colspan='2'><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td></tr>
</table>
</form>


    
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
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>