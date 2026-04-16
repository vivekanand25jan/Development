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
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>" >Accounting </a></li>
<li><a href="<?php echo WEB_URL;?>index/car_rental/<?php echo $this->uri->segment(3)?>" id="tabs_active">Car Rental </a></li>
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
	<div id="containerdount" style=" margin-top:-10px;">
<!--<font size="4" color="blue" align=""><a href="<?php echo WEB_URL;?>index/profile">Go To List</a></font>-->

<table width="942" border="0" align="left" cellpadding="0" cellspacing="0"  >
  <tr>
    <td align="right" valign="top" class="" colspan="5" height="30"><a href="<?php echo site_url('index/add_car_rental_period/')?>/<?php echo $this->uri->segment(3)?>" style="color:#099; font-weight:bold;">Add Period</a></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Car Rental Period</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Car Retal</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
  </tr>
	<?php 
    if(isset($result[0]))
    {
    for($i=0;$i<count($result);$i++)
    {
    ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $i+1; ?></td>
     
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/view_car_rental_period/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_car_rental_period_id; ?>" style="text-decoration:none;color:#099; float:left;"><?php 
	$fd = $result[$i]->from_date ; $fds = explode("-",$fd); $from_date = $fds[2].'-'.$fds[1].'-'.$fds[0]; $td = $result[$i]->to_date ; $tds = explode("-",$td); $to_date = $tds[2].'-'.$tds[1].'-'.$tds[0]; 
	
	echo '<b>'.$from_date.'</b> To <b>'.$to_date.'</b>' ?></a></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/add_car_rental_details/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_car_rental_period_id; ?>" style="text-decoration:none;color:#099; float:left;">Add Car Rental</a></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php if($result[$i]->status==1) { echo 'Active'; } else { echo 'InActive'; } ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL; ?>index/update_car_rental_period/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_car_rental_period_id ; ?>/1" style="color:#000;">Active</a> / <a href="<?php echo WEB_URL; ?>index/update_car_rental_period/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_car_rental_period_id ; ?>/0" style="color:#000;">InActive</a> / <a href="<?php echo WEB_URL; ?>index/update_car_rental_period/<?php echo $this->uri->segment(3); ?>/<?php echo $result[$i]->sup_car_rental_period_id ; ?>/2" style="color:#000;">Delete</a></td>
  </tr>
  <?php
	}
}
else
{
	  ?> <td align="center" valign="top" colspan="5" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
</table>


    
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