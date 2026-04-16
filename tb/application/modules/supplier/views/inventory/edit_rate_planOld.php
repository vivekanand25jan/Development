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
<script src="<?php echo WEB_DIR; ?>datepickernew/jquery-1.7.2.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>

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
</head>
<body>
<?php $this->load->view('header'); ?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>">Hotel Details </a></li>
<li><a href="" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="">Accounting </a></li>
</ul>
</div>
</div>
<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">Inventory Management</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>">Early Bird Promotion</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:30px;">
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Rate Plan Details</div>
    <br />
     <div style="float:right; height:25px;"><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099;">Back</a></div>
    <div style="float:left; margin-left:20px;">
    
    <form action="<?php echo WEB_URL; ?>index/edit_rate_plan/<?php echo $prop_id; ?>/<?php echo $id; ?>" method="post">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr height="35">
                <td width="300">Rate Plan Name:</td>
                <td><input type="text" id="rate_plan_name" name="rate_plan_name" value="<?php echo $rat_tac_details->rate_plan_name; ?>" /><span style="color:#FF0000;"> <?php echo form_error('rate_plan_name');?></span></td>
            </tr>
            <tr height="35">
                <td>Default Availability:</td>
                <td><input type="text" id="default_avail" name="default_avail" value="<?php echo $rat_tac_details->default_avail; ?>" /><span style="color:#FF0000;"> <?php echo form_error('default_avail');?></span></td>
            </tr>
            <tr height="35">
                <td>Rate for Room Plan:</td>
                <td><select name="room_plan" id="room_plan" style="width:150px;">
                      <option value="">Select rate plan</option>
					<?php
                    $cate = $this->Supplier_Model->inventory_cate_type($this->uri->segment(3));
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <option value="<?php echo $cate[$i]->sup_inv_cate_type_id; ?>" <?php if($cate[$i]->sup_inv_cate_type_id == $rat_tac_details->rate_of_room_plan){ echo "selected='selected'"; } ?> ><?php echo $cate[$i]->room_type; ?></option>
					<?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('room_plan');?></span></td>
            </tr>
            <tr height="35">
                <td>Capacity:</td>
                <td><select name="capacity" id="capacity" style="width:150px;">
                      <option value="">Select capacity</option>
                    <?php
                    for($j=1;$j<=20;$j++){
                    ?>
                      <option value="<?php echo $j; ?>" <?php if($j == $rat_tac_details->capacity){ echo "selected='selected'"; } ?>><?php echo $j; ?></option>
					<?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('capacity');?></span></td>
            </tr>
            <tr height="35">
                <td>Adult: </td>
                <td><select name="adult" id="adult" style="width:150px;">
                      <option value="">Select Adults</option>
                      <option value="1" <?php if($rat_tac_details->adult == '1'){ echo "selected='selected'"; } ?>>1</option>
                      <option value="2" <?php if($rat_tac_details->adult == '2'){ echo "selected='selected'"; } ?>>2</option>
                      <option value="3" <?php if($rat_tac_details->adult == '3'){ echo "selected='selected'"; } ?>>3</option>
                      <option value="4" <?php if($rat_tac_details->adult == '4'){ echo "selected='selected'"; } ?>>4</option>
                      <option value="5" <?php if($rat_tac_details->adult == '5'){ echo "selected='selected'"; } ?>>5</option>
                      <option value="6" <?php if($rat_tac_details->adult == '6'){ echo "selected='selected'"; } ?>>6</option>
                    </select><span style="color:#FF0000;"> <?php echo form_error('adult');?></span></td>
            </tr>
            <tr height="35">
                <td>Child: </td>
                <td><select name="child" id="child" style="width:150px;">
                      <option value="">Select Childs</option>
                      <option value="0" <?php if($rat_tac_details->child == '0'){ echo "selected='selected'"; } ?>>0</option>
                      <option value="1" <?php if($rat_tac_details->child == '1'){ echo "selected='selected'"; } ?>>1</option>
                      <option value="2" <?php if($rat_tac_details->child == '2'){ echo "selected='selected'"; } ?>>2</option>
                    </select><span style="color:#FF0000;"> <?php echo form_error('child');?></span></td>
            </tr>
           <!-- <tr height="35">
                <td>Default Maximum Length of Stay: </td>
                <td><input type="text" id="max_length_stay" name="max_length_stay" value="<?php echo $rat_tac_details->max_length_stay; ?>"/> <span style="color:#FF0000;"> <?php echo form_error('max_length_stay');?></span></td>
            </tr>
            <tr height="35">
                <td>Default Minimum Length of Stay:</td>
                <td><input type="text" id="min_lenght_stay" name="min_lenght_stay" value="<?php echo $rat_tac_details->min_lenght_stay; ?>"/><span style="color:#FF0000;"> <?php echo form_error('min_lenght_stay');?></span></td>
            </tr>-->
            <tr height="35">
                <td>Per Night Cost:</td>
                <td><input type="text" id="plan_rate" name="plan_rate" value="<?php echo $rat_tac_details->per_night_cost; ?>"/><span style="color:#FF0000;"> <?php echo form_error('plan_rate');?></span></td>
            </tr>
            <tr height="35">
                <td>Type of Booking: </td>
                <td><select name="type_of_booking" id="type_of_booking" style="width:150px;">
                      <option value="">Select booking type</option>
                      <option value="1" <?php if($rat_tac_details->type_of_booking == '1'){ echo "selected='selected'"; } ?>>Early Booking</option>
                      <option value="2" <?php if($rat_tac_details->type_of_booking == '2'){ echo "selected='selected'"; } ?>>Last-minute</option>
                      <option value="3" <?php if($rat_tac_details->type_of_booking == '3'){ echo "selected='selected'"; } ?>>Standard</option>
                    </select><span style="color:#FF0000;"> <?php echo form_error('type_of_booking');?></span></td>
            </tr>
            <tr height="35">
                <td>Breakfast:</td>
                <td><input type="radio" id="breakfast" name="breakfast" value="1" <?php if($rat_tac_details->breakfast == '1') { echo "checked='checked' "; } ?>/>Excluded
                <input type="radio" id="breakfast" name="breakfast" value="2" <?php if($rat_tac_details->breakfast == '2') { echo "checked='checked' "; } ?>/>Included
                <input type="radio" id="breakfast" name="breakfast" value="3" <?php if($rat_tac_details->breakfast == '3') { echo "checked='checked' "; } ?>/>Not offered</td>
            </tr>
            <tr height="35">
                <td>Breakfast Type:</td>
                <td><select name="breakfast_type" id="breakfast_type" style="width:160px;">
                      <option value="">Select breakfast type</option>
                      <option value="1" <?php if($rat_tac_details->breakfast_type == '1'){ echo "selected='selected'"; } ?>>Continental</option>
                      <option value="2" <?php if($rat_tac_details->breakfast_type == '2'){ echo "selected='selected'"; } ?>>Full English</option>
                    </select><span style="color:#FF0000;"> <?php echo form_error('breakfast_type');?></span></td>
            </tr>
           <!-- <tr height="35">
                <td>Breakfast Hours from:</td>
                <td><select name="breakfast_hrs_from" id="breakfast_hrs_from" style="width:160px;">
							<option value="">Select breakfast from</option> 
					<?php 
					  	$start = strtotime('12am'); 
					for ($i = 0; $i < (24 * 4); $i++) { 
						$tod = $start + ($i * 15 * 60); 
						$display = date('h:i A', $tod); 
						if (substr($display, 0, 2) == '00') { 
							$display = '12' . substr($display, 2); 
						} ?>
						<option value="<?php echo $display; ?>" <?php if($display == $rat_tac_details->breakfast_hrs_from){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
                    <?php 
					} ?>
					</select>
                  &nbsp;&nbsp;to 
                    <select name="breakfast_hrs_to" id="breakfast_hrs_to" style="width:160px;">
							<option value="">Select breakfast to</option> 
					<?php 
					  	$start = strtotime('12am'); 
					for ($i = 0; $i < (24 * 4); $i++) { 
						$tod = $start + ($i * 15 * 60); 
						$display = date('h:i A', $tod); 
						if (substr($display, 0, 2) == '00') { 
							$display = '12' . substr($display, 2); 
						} ?>
						<option value="<?php echo $display; ?>" <?php if($display == $rat_tac_details->breakfast_hrs_to){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
                    <?php 
					} ?>
					</select>
                    <span style="color:#FF0000;"> <?php echo form_error('breakfast_hrs_from');?>
					<?php echo form_error('breakfast_hrs_to');?></span></td>
            </tr>
            <tr height="35">
                <td>Cancellation Policy: </td>
                <td><input type="radio" id="cancel_policy" name="cancel_policy" value="1" <?php if($rat_tac_details->cancelpolicy == '1') { echo "checked='checked' "; } ?>/>			 					
                	<select name="cancel_policy_hrs" id="cancel_policy_hrs" style="width:120px;">
                      <option value="">Select hours</option>
                      <option  value="24:00" <?php if($rat_tac_details->cancelpolicy_hrs == '24:00'){ echo "selected='selected'"; } ?>>24 Hours</option>
                        <option value="48:00" <?php if($rat_tac_details->cancelpolicy_hrs == '48:00'){ echo "selected='selected'"; } ?>>48 Hours</option>
                        <option value="72:00" <?php if($rat_tac_details->cancelpolicy_hrs == '72:00'){ echo "selected='selected'"; } ?>>72 Hours</option>
                        <option value="96:00" <?php if($rat_tac_details->cancelpolicy_hrs == '96:00'){ echo "selected='selected'"; } ?>>96 Hours</option>
                        <option value="120:00" <?php if($rat_tac_details->cancelpolicy_hrs == '120:00'){ echo "selected='selected'"; } ?>>5 Days</option>
                        <option value="144:00" <?php if($rat_tac_details->cancelpolicy_hrs == '144:00'){ echo "selected='selected'"; } ?> >6 Days</option>
                        <option value="168:00" <?php if($rat_tac_details->cancelpolicy_hrs == '168:00'){ echo "selected='selected'"; } ?>>7 Days</option>
                        <option value="192:00" <?php if($rat_tac_details->cancelpolicy_hrs == '192:00'){ echo "selected='selected'"; } ?> >8 Days</option>
                        <option value="216:00" <?php if($rat_tac_details->cancelpolicy_hrs == '216:00'){ echo "selected='selected'"; } ?>>9 Days</option>
                        <option value="240:00" <?php if($rat_tac_details->cancelpolicy_hrs == '240:00'){ echo "selected='selected'"; } ?> >10 Days</option>
                        <option value="264:00" <?php if($rat_tac_details->cancelpolicy_hrs == '264:00'){ echo "selected='selected'"; } ?>>11 Days</option>
                        <option value="288:00" <?php if($rat_tac_details->cancelpolicy_hrs == '288:00'){ echo "selected='selected'"; } ?>>12 Days</option>
                        <option value="288:00" <?php if($rat_tac_details->cancelpolicy_hrs == '288:00'){ echo "selected='selected'"; } ?>>13 Days</option>
                        <option value="336:00" <?php if($rat_tac_details->cancelpolicy_hrs == '336:00'){ echo "selected='selected'"; } ?> >14 Days</option>
                        <option value="360:00" <?php if($rat_tac_details->cancelpolicy_hrs == '360:00'){ echo "selected='selected'"; } ?>>15 Days</option>
                    </select>&nbsp;&nbsp;
                	<input type="radio" id="cancel_policy" name="cancel_policy" value="2" 
					<?php if($rat_tac_details->cancelpolicy == '2') { echo "checked='checked' "; } ?>/>on Arrival Date before 
                    <select name="cancel_policy_time" id="cancel_policy_time" style="width:100px;">
							<option value="">Select time</option> 
					<?php 
					  	$start = strtotime('12am'); 
					for ($i = 0; $i < (24 * 4); $i++) { 
						$tod = $start + ($i * 15 * 60); 
						$display = date('h:i A', $tod); 
						if (substr($display, 0, 2) == '00') { 
							$display = '12' . substr($display, 2); 
						} ?>
						<option value="<?php echo $display; ?>" <?php if($display == $rat_tac_details->cancelpolicy_arr_date_before){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
                    <?php 
					} ?>
					</select>			
                    &nbsp;&nbsp;
                <input type="radio" id="cancel_policy" name="cancel_policy" value="3" <?php if($rat_tac_details->cancelpolicy == '3') { echo "checked='checked' "; } ?>/>Not Non-refundable</td>
            </tr>
            <tr height="35">
                <td>&nbsp; </td>
                <td>Charges
                	<input type="radio" id="cancel_charge" name="cancel_charge" value="1" <?php if($rat_tac_details->cancelpolicy_charge == '1') { echo "checked='checked' "; } ?>/>		
                    <input type="text" id="cancel_charge_percent" name="cancel_charge_percent" size="8" value="<?php echo $rat_tac_details->cancelpolicy_charge_percent; ?>"/> % &nbsp;&nbsp;
                	<input type="radio" id="cancel_charge" name="cancel_charge" value="2" <?php if($rat_tac_details->cancelpolicy_charge == '2') { echo "checked='checked' "; } ?>/>			
                    <input type="text" id="cancel_charge_amount" name="cancel_charge_amount" size="8" value="<?php echo $rat_tac_details->cancelpolicy_charge_value; ?>"/>&nbsp;&nbsp;
                	<select name="cancel_nights" id="cancel_nights" style="width:110px;">
                      <option value="">Select nights</option>
                      <option value="1 night" <?php if($rat_tac_details->cancelpolicy_charge_nights == '1 night'){ echo "selected='selected'"; } ?>>1 Night</option>
                        <option value="2 nights" <?php if($rat_tac_details->cancelpolicy_charge_nights == '2 nights'){ echo "selected='selected'"; } ?>>Upto 2 Nights</option>
                        <option value="3 nights" <?php if($rat_tac_details->cancelpolicy_charge_nights == '3 nights'){ echo "selected='selected'"; } ?>>Upto 3 Nights</option>
                        <option value="4 nights" <?php if($rat_tac_details->cancelpolicy_charge_nights == '4 nights'){ echo "selected='selected'"; } ?>>Upto 4 Nights</option>
                        <option value="5 nights" <?php if($rat_tac_details->cancelpolicy_charge_nights == '5 nights'){ echo "selected='selected'"; } ?>>Upto 5 Nights</option>
                        <option value="6 nights" <?php if($rat_tac_details->cancelpolicy_charge_nights == '6 nights'){ echo "selected='selected'"; } ?>>Upto 6 Nights</option>
                        <option value="7 nights" <?php if($rat_tac_details->cancelpolicy_charge_nights == '7 nights'){ echo "selected='selected'"; } ?>>Upto 7 Nights</option>
                    </select></td>
            </tr>-->
            <tr height="35">
                <td valign="top">Booking Policy:</td>
                <td><textarea name="booking_policy" id="booking_policy" cols="50" rows="4"><?php echo $rat_tac_details->booking_policy; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('booking_policy');?></span></td>
            </tr>
            <tr height="35">
                <td valign="top">Cancellation Policy:</td>
                <td><textarea name="cancel_policy" id="cancel_policy" cols="50" rows="4"><?php echo $rat_tac_details->cancel_policy; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('cancel_policy');?></span></td>
            </tr>
            <tr height="35">
                <td>Additional Cancellation Comment:</td>
                <td><textarea name="cancel_comment" id="cancel_comment" cols="30" rows="3"><?php echo $rat_tac_details->cancel_comment; ?></textarea></td>
            </tr>
           <!-- <tr height="35">
                <td>Date Range: </td>
                <td>From 
                
                <script>
	 function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
 function dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
}
 function dateADD1(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()-(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
}

	$(function() {
		$( "#datepicker" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 0
		});
		$( "#datepicker1" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 1
		});
		
		 $('#datepicker').change(function(){
		   //$t=$(this).val();
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker1" ).val();
		
    var predayDate  = dateADD(selectedDate);
	var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());
	
	var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 < date1)
    {
		 
	}
	else
	{
		  var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker1" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 1
					});
		   $( "#datepicker1" ).val($t);
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}
		  });
		  
		  $('#datepicker1').change(function(){
		   //$t=$(this).val();
		 
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker" ).val();
		
    var predayDate  = dateADD1(selectedDate);
	var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());

	
	var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 < date1)
    {
		  var nextdayDate  = dateADD1(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 0
					});
		   $( "#datepicker" ).val($t);
	}
	else
	{
		 
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}
		

		  });
	
		$( "#datepicker2" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 0
		  
		});
		$( "#datepicker3" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'dd-mm-yy',
			
			minDate: 1
		  
		});
		
		
		
		 $('#datepicker2').change(function(){
		   //$t=$(this).val();
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker3" ).val();
		
    var predayDate  = dateADD(selectedDate);
	var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());

	
	var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 < date1)
    {
		 
	}
	else
	{
		  var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker3" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 1
					});
		   $( "#datepicker3" ).val($t);
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}

		  });
		  
		  $('#datepicker3').change(function(){
		   //$t=$(this).val();
		 
		   var selectedDate = $(this).datepicker('getDate');
		   var str1 = $( "#datepicker2" ).val();
		
    var predayDate  = dateADD1(selectedDate);
	var str2 = zeroPad(predayDate.getDate(),2)+"-"+zeroPad((predayDate.getMonth()+1),2)+"-"+(predayDate.getFullYear());

	
	var dt1  = parseInt(str1.substring(0,2),10);
    var mon1 = parseInt(str1.substring(3,5),10);
    var yr1  = parseInt(str1.substring(6,10),10);
    var dt2  = parseInt(str2.substring(0,2),10);
    var mon2 = parseInt(str2.substring(3,5),10);
    var yr2  = parseInt(str2.substring(6,10),10);
    var date1 = new Date(yr1, mon1, dt1);
    var date2 = new Date(yr2, mon2, dt2);
    if(date2 < date1)
    {
		  var nextdayDate  = dateADD1(selectedDate);
		   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+(nextdayDate.getFullYear());

		   $t = nextDateStr;
					$( "#datepicker2" ).datepicker({
	             		numberOfMonths: 3,
						dateFormat : 'dd-mm-yy',
						minDate: 0
					});
		   $( "#datepicker2" ).val($t);
	}
	else
	{
		 
		  // $('#datepicker1').datepicker('option', 'minDate', $t);s
	}
		

		  });
	});
	</script>
    			<?php
					$current_dte = date("d-m-Y",strtotime("+7 days"));
					$next_dte = date("d-m-Y",strtotime("+8 days"));
					$sd = $rat_tac_details->date_range_from;
					$sds = explode("-",$sd);
					$strd = $sds[2].'-'.$sds[1].'-'.$sds[0];
					$ed = $rat_tac_details->date_range_to;
					$eds = explode("-",$ed);
					$endd = $eds[2].'-'.$eds[1].'-'.$eds[0];
				?>
               <input value="<?php echo $strd; ?>" name="sd" id="datepicker"  onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox"  style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png'); background-repeat: no-repeat;  background-position: right center;" /> 					
                	To <input value="<?php echo $endd; ?>" name="ed" id="datepicker1" onchange="javascript:return check_night_valued(this.value)" type="text" class="b2b-txtbox" style=" background-image: url('<?php echo WEB_DIR; ?>images/b2b-calicon.png');   background-repeat: no-repeat;  background-position: right center;" /></td>
            </tr>
            <tr height="35">
                <td>Remarks(Optinal):</td>
                <td><textarea name="remarks" id="remarks" cols="30" rows="3"><?php echo $rat_tac_details->remarks; ?></textarea></td>
            </tr>-->
        </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">
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
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>