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
function state_tax_val(val)
{
	if(val == 1 || val == 2)
	{
		document.getElementById('state_tax_div').style.display='block';
	}
	else
	{
		document.getElementById('state_tax_div').style.display='none';
	}
}
function state_percentage_val_script(val)
{
	if(val == 1)
	{
		//$('#state_price').css('readonly','true');
		document.getElementById("state_persons").disabled = true;
		document.getElementById("state_price").readOnly = true;
		document.getElementById("state_percentage_val").readOnly = false;
		//$('#state_persons').css('readonly','true');
	}
	else
	{
		document.getElementById("state_persons").disabled = false;
		document.getElementById("state_price").readOnly = false;
			document.getElementById("state_percentage_val").readOnly = true;
	}
}

function city_tax_val(val)
{
	if(val == 1 || val == 2)
	{
		document.getElementById('city_tax_js').style.display='block';
	}
	else
	{
		document.getElementById('city_tax_js').style.display='none';
	}
}

function city_percentage_val_script(val)
{
	if(val == 1)
	{
		//$('#state_price').css('readonly','true');
		document.getElementById("city_persons").disabled = true;
		document.getElementById("city_price").readOnly = true;
		document.getElementById("city_percentage_val").readOnly = false;
		//$('#state_persons').css('readonly','true');
	}
	else
	{
		document.getElementById("city_persons").disabled = false;
		document.getElementById("city_price").readOnly = false;
			document.getElementById("city_percentage_val").readOnly = true;
	}
}

function room_tax_val(val)
{
	if(val == 1 || val == 2)
	{
		document.getElementById('room_tax_div').style.display='block';
	}
	else
	{
		document.getElementById('room_tax_div').style.display='none';
	}
}
function room_percentage_val_script(val)
{
	if(val == 1)
	{
		//$('#state_price').css('readonly','true');
		document.getElementById("room_persons").disabled = true;
		document.getElementById("room_price").readOnly = true;
		document.getElementById("room_percentage_val").readOnly = false;
		//$('#state_persons').css('readonly','true');
	}
	else
	{
		document.getElementById("room_persons").disabled = false;
		document.getElementById("room_price").readOnly = false;
			document.getElementById("room_percentage_val").readOnly = true;
	}
}


function vat_tax_val(val)
{
	if(val == 1 || val == 2)
	{
		document.getElementById('vat_tax_div').style.display='block';
	}
	else
	{
		document.getElementById('vat_tax_div').style.display='none';
	}
}

function vat_percentage_val_script(val)
{
	if(val == 1)
	{
		//$('#state_price').css('readonly','true');
		document.getElementById("vat_persons").disabled = true;
		document.getElementById("vat_price").readOnly = true;
		document.getElementById("vat_percentage_val").readOnly = false;
		//$('#state_persons').css('readonly','true');
	}
	else
	{
		document.getElementById("vat_persons").disabled = false;
		document.getElementById("vat_price").readOnly = false;
			document.getElementById("vat_percentage_val").readOnly = true;
	}
}

function service_tax_val(val)
{
	if(val == 1 || val == 2)
	{
		document.getElementById('service_tax_div').style.display='block';
	}
	else
	{
		document.getElementById('service_tax_div').style.display='none';
	}
}

function service_percentage_val_script(val)
{
	if(val == 1)
	{
		//$('#state_price').css('readonly','true');
		document.getElementById("service_persons").disabled = true;
		document.getElementById("service_price").readOnly = true;
		document.getElementById("service_percentage_val").readOnly = false;
		//$('#state_persons').css('readonly','true');
	}
	else
	{
		document.getElementById("service_persons").disabled = false;
		document.getElementById("service_price").readOnly = false;
			document.getElementById("service_percentage_val").readOnly = true;
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
<li><a href="javascript:void(0)" id="tabs_active">Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>">Accounting </a></li>
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
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>">Contact Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>"> Hotel Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>">Accommodation Facilities </a></li>
<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>" id="tabs_active">General Settings </a></li>
<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>">Photo Gallery</a></li>
<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>">Detail Location </a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->

<?php
/*
$contact_id=isset($contact_inf-> sup_contact_inform_id) ? $contact_inf-> sup_contact_inform_id:'';
$supplier_id=isset($contact_inf-> sup_id) ? $contact_inf-> sup_id:''; 
$property_id=isset($contact_inf-> sup_property_id) ? $contact_inf-> sup_property_id:'1'; 
$my_country_id=isset($contact_inf-> country_id) ? $contact_inf-> country_id:'';
$my_language_id=isset($contact_inf-> language_id) ? $contact_inf-> language_id:''; 
*/

?>
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">
<!--<font size="4" color="blue" align=""><a href="<?php echo WEB_URL;?>index/profile">Go To List</a></font>-->
<div id="result">
	<?php
		/*foreach($result as $val)
		{
			$settings_id=array();
			$settings_id=$result-> sup_apart_generalsettings_id;
			$count=sizeof($settings_id);
			
		}*/
	?>
	<?php if(isset($result->sup_hotel_id)){ ?>
	<form name="f1" action="<?php echo WEB_URL;?>index/edit_general_set/<?php echo $this->uri->segment(3)?>" method="post">
	<?php } else { ?>
	<form name="f1" action="<?php echo WEB_URL;?>index/add_general_set/<?php echo $this->uri->segment(3)?>" method="post">
	<?php }?>
		<BR>
		<BR>
		<table>
			<tr>
				<!--<td><input type="hidden" name="hide_sup_id" id="hide_sup_id" value="<?php echo $id ?>"></td>-->
			</tr>
			<tr>
				<td>Check-in is possible :</td>
				<td>From<select name="check_in_time_from" id="check_in_time_from" style="width:120px;">
            <option value="">Not Applicable</option> 
        <?php  echo $result->checkin_guest_after;
            $start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
				<option value="<?php echo $display; ?>" <?php if(isset($result->checkinfrom ) && $display == $result->checkinfrom ){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
				<?php
				}?>
                
                </select><span style="color:#FF0000;"> <?php echo form_error('check_in_time_from');?></span>
				</td>
				<td>To</td>
				<td><select name="check_in_time_to" id="check_in_time_to" style="width:120px;">
				<option value="">Not Applicable</option> 
			<?php 
				$start = strtotime('12am'); 
				for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} ?>
					<option value="<?php echo $display; ?>" <?php if(isset($result->checkinto) && $display == $result->checkinto){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
					<?php
					}?>
                    </select><span style="color:#FF0000;">  <?php echo form_error('check_in_time_to');?></span>
					</td>
			</tr>
			<tr>
				<td>Check-out is possible :</td>
				<td>From<select name="check_out_time_from" id="check_out_time_from" style="width:120px;">
            <option value="">Not Applicable</option> 
        <?php 
            $start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
				<option value="<?php echo $display; ?>" <?php if(isset($result->checkoutfrom) && $display == $result->checkoutfrom){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
				<?php
				}?>
                </select>
				</td>
				<td>To</td>
				<td><select name="check_out_time_to" id="check_out_time_to" style="width:120px;">
				<option value="">Not Applicable</option> 
			<?php 
				$start = strtotime('12am'); 
				for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} ?>
					<option value="<?php echo $display; ?>" <?php if(isset($result->checkoutto) && $display == $result->checkoutto){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
					<?php
					}?>
                    </select>
					</td>
			</tr>
			<tr>
				<td><font style="color:#243419; font-weight:bold;">Check-in/Check-Out Automation: </font></td>
			</tr>
			<tr>
				<td>Automatically check-in guest after</td>
				<td><input type="text" name="guest_in_time" id="guestin__time" value="<?php if(isset($result->checkin_guest_after)){ echo $result-> 	checkin_guest_after;}?>"> hours </td>
			</tr>
			<tr>
				<td>Automatically check-out guest after</td>
				<td><input type="text" name="guest_out_time" id="guest_out_time" value="<?php if(isset($result->checkout_guest_after)){ echo $result->checkout_guest_after;}?>"> hours </td>
			</tr>
			<tr>
				<td>Key Collection:</td>
				<td>
					<input type="radio" name="key_col" id="key_col" value="1" <?php if(isset($result->key_collection) && $result->key_collection == '1'){ echo "checked='checked'"; }?>>On-Site 
					<input type="radio" name="key_col" id="key_col" value="2" <?php if(isset($result->key_collection) && $result->key_collection == '2'){ echo "checked='checked'"; }?>>Off-Site 
					<input type="text" name="key_descrip" id="key_descrip" value="<?php if(isset($result->key_collection_desc)){ echo $result->key_collection_desc;}?>">
				</td>
			</tr>
			<!--<tr><td><font style="color:#243419; font-weight:bold;">Taxes: </font></td></tr>-->
            
            <tr>
				<td>Tax:</td>
				<td><input type="type" name="tax" id="tax" value="<?php if(isset($result->tax)){ echo $result->tax;}?>" />  </td>
			</tr>
            
            <tr>
				<td>Service Charge:</td>
				<td><input type="type" name="service_charge" id="service_charge" value="<?php if(isset($result->service_charge)){ echo $result->service_charge;}?>" />  </td>
			</tr>
            
			<!--<tr>
				<td>State:</td>
				<td>
					<input name="state_tax" type="radio" id="state_tax" value="1" onclick="return state_tax_val(this.value);" <?php if(isset($result->state_tax) && $result->state_tax == '1'){ echo "checked='checked'"; }?>/>  Included    
					<input name="state_tax" type="radio" id="state_tax" title="6236" value="2"   onclick="return state_tax_val(this.value);"/ <?php if(isset($result->state_tax) && $result->state_tax == '2'){ echo "checked='checked'"; }?>> Excluded      
					<input name="state_tax" id="state_tax" type="radio" value="3"  onclick="return state_tax_val(this.value);"  <?php if(isset($result->state_tax) && $result->state_tax == '3'){ echo "checked='checked'"; }?> /> Not Applicable
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div id="state_tax_div" align="right" style="display:none">
							<input type="radio" name="state_percentage" id="state_percentage" value="1"  onclick="return state_percentage_val_script(this.value);" <?php if(isset($result->state_totalstay_flag) && $result->state_totalstay_flag == '1'){ echo "checked='checked'"; }?> /> Percentage of Total Stay<span style="color:#FF0000;">  <?php echo form_error('state_percentage');?></span>
							<input name="state_percentage_val" id="state_percentage_val" class="getfields" type="text" value="<?php if(isset($result->state_totalstay_percent)){ echo $result->state_totalstay_percent;}?>"> %
							<BR>
							<input type="radio" name="state_percentage" id="state_percentage" value="2"  onclick="return state_percentage_val_script(this.value);" <?php if(isset($result->state_fixedprice_flag) && $result->state_fixedprice_flag == '1'){ echo "checked='checked'"; } ?>/>Fixed Price <span style="color:#FF0000;"> <?php echo form_error('state_percentage');?></span>
							<select name="state_persons" id="state_persons">
								<option value="">select</option>
								<option value="PPPN" <?php if(isset($result->state_per_person) && $result->state_per_person == "PPPN" ){ echo "selected='selected'"; } ?> >Per Person Per Night</option>
								<option value="PPPS"  <?php if(isset($result->state_per_person) && $result->state_per_person == "PPPS" ){ echo "selected='selected'"; } ?>>Per Person Per Stay</option>
								<option value="PRPN" <?php if(isset($result->state_per_person) && $result->state_per_person == "PRPN"){ echo "selected='selected'"; } ?> >Per Room Per Night</option>
								<option value="PRPS" <?php if(isset($result->state_per_person) && $result->state_per_person == "PRPS"){ echo "selected='selected'"; } ?> >Per Room Per Stay</option>
							</select> Price  
							<input name="state_price" id="state_price" type="text" value="<?php if(isset($result->state_fixedprice)){ echo $result->state_fixedprice;}?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>City:</td>
				<td>
					<input name="city_tax" type="radio" id="city_tax" value="1" onclick="return city_tax_val(this.value);" <?php if(isset($result->city_tax) && $result->city_tax == '1'){ echo "checked='checked'"; }?>/>  Included    
					<input name="city_tax" type="radio" id="city_tax" title="6236" value="2"   onclick="return city_tax_val(this.value);" <?php if(isset($result->city_tax) && $result->city_tax == '2'){ echo "checked='checked'"; }?>/> Excluded      
					<input name="city_tax" id="city_tax" type="radio" value="3"  onclick="return city_tax_val(this.value);"  <?php if(isset($result->city_tax) && $result->city_tax == '3'){ echo "checked='checked'"; }?>/> Not Applicable
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div id="city_tax_js" align="right" style="display:none">
							<input type="radio" name="city_percentage" id="city_percentage" value="1" onclick="return city_percentage_val_script(this.value);" <?php if(isset($result->city_totalstay_flag) && $result->city_totalstay_flag == '1'){ echo "checked='checked'"; }?>/> Percentage of Total Stay <span style="color:#FF0000;">  <?php echo form_error('city_percentage');?> </span>
							<input name="city_percentage_val" id="city_percentage_val" class="getfields" type="text" value="<?php if(isset($result->city_totalstay_percent)){ echo $result->city_totalstay_percent;}?>"> %
							<BR>
							<input type="radio" name="city_percentage" id="city_percentage" value="2" onclick="return city_percentage_val_script(this.value);" <?php if(isset($result->city_fixedprice_flag) && $result->city_fixedprice_flag == '1'){ echo "checked='checked'"; }?>/> Fixed Price <span style="color:#FF0000;"> <?php echo form_error('city_percentage');?></span>
							<select name="city_persons" id="city_persons">
								<option value="">select</option>
								<option value="PPPN" <?php if(isset($result->city_per_person) && $result->city_per_person == "PPPN"){ echo "selected='selected'"; } ?>>Per Person Per Night</option>
								<option value="PPPS" <?php if(isset($result->city_per_person) && $result->city_per_person == "PPPS"){ echo "selected='selected'"; } ?>>Per Person Per Stay</option>
								<option value="PRPN" <?php if(isset($result->city_per_person) && $result->city_per_person == "PRPN"){ echo "selected='selected'"; } ?> >Per Room Per Night</option>
								<option value="PRPS" <?php if(isset($result->city_per_person) && $result->city_per_person == "PRPS"){ echo "selected='selected'"; } ?> >Per Room Per Stay</option>
							</select> Price  
							<input name="city_price" id="city_price" type="text" value="<?php if(isset($result->city_fixedprice)){ echo $result->city_fixedprice;}?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>Room:</td>
				<td>
					<input name="room_tax" type="radio" id="room_tax" value="1" onclick="return room_tax_val(this.value);" <?php if(isset($result->room_tax) && $result->room_tax == '1'){ echo "checked='checked'"; }?>/>  Included    
					<input name="room_tax" type="radio" id="room_tax" title="6236" value="2"   onclick="return room_tax_val(this.value);" <?php if(isset($result->room_tax) && $result->room_tax == '2'){ echo "checked='checked'"; }?>/> Excluded      
					<input name="room_tax" id="room_tax" type="radio" value="3"  onclick="return room_tax_val(this.value);" <?php if(isset($result->room_tax) && $result->room_tax == '3'){ echo "checked='checked'"; }?>/> Not Applicable
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div id="room_tax_div" align="right" style="display:none">
							<input type="radio" name="room_percentage" id="room_percentage" value="1" onclick="return room_percentage_val_script(this.value);" <?php if(isset($result->room_totalstay_flag) && $result->room_totalstay_flag == '1'){ echo "checked='checked'"; }?>/>Percentage of Total Stay<span style="color:#FF0000;">  <?php echo form_error('room_percentage');?> </span>
							<input name="room_percentage_val" id="room_percentage_val" class="getfields" type="text" value="<?php if(isset($result->room_totalstay_percent)){ echo $result->room_totalstay_percent;}?>"> %
							<BR>
							<input type="radio" name="room_percentage" id="room_percentage" value="2" onclick="return room_percentage_val_script(this.value);" <?php if(isset($result->room_fixedprice_flag) && $result->room_fixedprice_flag == '1'){ echo "checked='checked'"; }?>/>Fixed Price<span style="color:#FF0000;">  <?php echo form_error('room_percentage');?></span>
							<select name="room_persons" id="room_persons">
								<option value="">select</option>
								<option value="PPPN" <?php if(isset($result->room_per_person) && $result->room_per_person == "PPPN"){ echo "selected='selected'"; } ?>>Per Person Per Night</option>
								<option value="PPPS" <?php if(isset($result->room_per_person) && $result->room_per_person == "PPPS"){ echo "selected='selected'"; } ?>>Per Person Per Stay</option>
								<option value="PRPN" <?php if(isset($result->room_per_person) && $result->room_per_person == "PRPN"){ echo "selected='selected'"; } ?>>Per Room Per Night</option>
								<option value="PRPS" <?php if(isset($result->room_per_person) && $result->room_per_person == "PRPS"){ echo "selected='selected'"; } ?>>Per Room Per Stay</option>
							</select> Price  
							<input name="room_price" id="room_price" type="text" value="<?php if(isset($result->room_fixedprice)){ echo $result->room_fixedprice;}?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>Vat:</td>
				<td>
					<input name="vat_tax" type="radio" id="vat_tax" value="1" onclick="return vat_tax_val(this.value);" <?php if(isset($result->vat_tax) && $result->vat_tax == '1'){ echo "checked='checked'"; }?>/>  Included   
					<input name="vat_tax" type="radio" id="vat_tax" title="6236" value="2" onclick="return vat_tax_val(this.value);" <?php if(isset($result->vat_tax) && $result->vat_tax == '2'){ echo "checked='checked'"; }?>/> Excluded     
					<input name="vat_tax" id="vat_tax" type="radio" value="3"  onclick="return vat_tax_val(this.value);" <?php if(isset($result->vat_tax) && $result->vat_tax == '3'){ echo "checked='checked'"; }?>/> Not Applicable
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div id="vat_tax_div" align="right" style="display:none">
							<input type="radio" name="vat_percentage" id="vat_percentage" value="1"  onclick="return vat_percentage_val_script(this.value);" <?php if(isset($result->vat_totalstay_flag) && $result->vat_totalstay_flag == '1'){ echo "checked='checked'"; }?>/>Percentage of Total Stay  <span style="color:#FF0000;"> <?php echo form_error('vat_percentage');?></span>
							<input name="vat_percentage_val" id="vat_percentage_val" class="getfields" type="text" value="<?php if(isset($result->vat_totalstay_percent)){ echo $result->vat_totalstay_percent;}?>"> %
							<BR>
							<input type="radio" name="vat_percentage" id="vat_percentage" value="2"  onclick="return vat_percentage_val_script(this.value);" <?php if(isset($result->vat_fixedprice_flag) && $result->vat_fixedprice_flag == '1'){ echo "checked='checked'"; }?>/>Fixed Price<span style="color:#FF0000;">  <?php echo form_error('vat_percentage');?></span>
							<select name="vat_persons" id="vat_persons">
								<option value="">select</option>
								<option value="PPPN" <?php if(isset($result->vat_per_person) && $result->vat_per_person == "PPPN" ){ echo "selected='selected'"; } ?> >Per Person Per Night</option>
								<option value="PPPS" <?php if(isset($result->vat_per_person) && $result->vat_per_person == "PPPS"){ echo "selected='selected'"; } ?> >Per Person Per Stay</option>
								<option value="PRPN" <?php if(isset($result->vat_per_person) && $result->vat_per_person == "PRPN"){ echo "selected='selected'"; } ?> >Per Room Per Night</option>
								<option value="PRPS" <?php if(isset($result->vat_per_person) && $result->vat_per_person == "PRPS"){ echo "selected='selected'"; } ?> >Per Room Per Stay</option>
							</select> Price  
							<input name="vat_price" id="vat_price" type="text" value="<?php if(isset($result->vat_fixedprice)){ echo $result->vat_fixedprice;}?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>Service:</td>
				<td>
					<input name="service_tax" type="radio" id="service_tax" value="1" onclick="return service_tax_val(this.value);" <?php if(isset($result->service_tax) && $result->service_tax == '1'){ echo "checked='checked'"; }?>/>  Included    
					<input name="service_tax" type="radio" id="service_tax" value="2" onclick="return service_tax_val(this.value);" <?php if(isset($result->service_tax) && $result->service_tax == '2'){ echo "checked='checked'"; }?>/> Excluded    
					<input name="service_tax" id="service_tax" type="radio" value="3"  onclick="return service_tax_val(this.value);" <?php if(isset($result->service_tax) && $result->service_tax == '3'){ echo "checked='checked'"; }?>/> Not Applicable
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div id="service_tax_div" align="right" style="display:none">
							<input type="radio" name="service_percentage" id="service_percentage" value="1"  onclick="return service_percentage_val_script(this.value);"<?php if(isset($result->service_totalstay_flag) && $result->service_totalstay_flag == '1'){ echo "checked='checked'"; }?> />Percentage of Total Stay<span style="color:#FF0000;">  <?php echo form_error('service_percentage');?> </span>
							<input name="service_percentage_val" id="service_percentage_val" class="getfields" type="text" value="<?php if(isset($result->service_totalstay_percent)){ echo $result->service_totalstay_percent;}?>"> %
							<BR>
							<input type="radio" name="service_percentage" id="service_percentage" value="2"  onclick="return service_percentage_val_script(this.value);" <?php if(isset($result->service_fixedprice_flag) && $result->service_fixedprice_flag == '1'){ echo "checked='checked'"; }?> />Fixed Price<span style="color:#FF0000;">  <?php echo form_error('service_percentage');?></span>
							<select name="service_persons" id="service_persons">
								<option value="">select</option>
								<option value="PPPN" <?php if(isset($result->service_per_person) && $result->service_per_person == "PPPN"){ echo "selected='selected'"; } ?> >Per Person Per Night</option>
								<option value="PPPS" <?php if(isset($result->service_per_person) && $result->service_per_person == "PPPN"){ echo "selected='selected'"; } ?> >Per Person Per Stay</option>
								<option value="PRPN" <?php if(isset($result->service_per_person) && $result->service_per_person == "PPPN"){ echo "selected='selected'"; } ?> >Per Room Per Night</option>
								<option value="PRPS" <?php if(isset($result->service_per_person) && $result->service_per_person == "PPPN"){ echo "selected='selected'"; } ?> >Per Room Per Stay</option>
							</select> Price  
							<input name="service_price" id="service_price" type="text" value="<?php if(isset($result->service_fixedprice)){ echo $result->service_fixedprice;}?>">
					</div>
				</td>
			</tr>
			<tr>
				<td>Group Reservation:</td>
					<td>
						<input type="radio" name="group" id="group" value="1" <?php if(isset($result->grp_reservation) && $result->grp_reservation == '1'){ echo "checked='checked'"; }?>>Yes
						<input type="radio" name="group" id="group" value="2" <?php if(isset($result->grp_reservation) && $result->grp_reservation == '2'){ echo "checked='checked'"; }?>>No
					</td>
			</tr>-->
			<tr>
				<td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
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