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
<?php $this->load->view('header');
$myclass_type=$prop_inf->class_type_id!=''? $prop_inf->class_type_id:'';
$mycorrencty=$prop_inf->currency_id!=''? $prop_inf->currency_id:'';
$myzone=$prop_inf->timezone_id!=''? $prop_inf->timezone_id:'';

 ?>
 
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
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">

<div id="result">
<form action="<?php echo WEB_URL;?>index/update_property_inform" name="f1" method="post">
	<div style="width:770px; float:center;  padding:5px; background-color:#ededed" >
		<td style="float:left">
		 Property Information 
	</div>
	<div>
        <table width="780px" align="center" cellspacing="5px" cellpadding="5px" border="0" bordercolor="#ededed" >
		  <tr>
           <td style="padding-left:9px;width:390px;">Class Type:</td>
			<td style="padding-left:9px;" >
				<select name="pro_class_type" id="pro_class_type">
					<option value="">Select Class Type</option>
				<?php
					foreach($class_type_profile as $value)
					{
						$sel_mycls_type=$myclass_type==$value->sup_class_id? ' SELECTED' :'';
				?>
				
						<option value="<?php echo $value->sup_class_id?>"  <?php echo $sel_mycls_type?> > <?php echo $value->class_name ?> </option>
				<?php
					}?>
				</select><span style="color:#FF0000;"> <?php echo form_error('pro_class_type');?>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Group/ Brand Association:</td>
			<td style="padding-left:11px;r"><input type="text" name="group_ass" id="group_ass" size="30" value="<?php if(isset($prop_inf->group_val)){ echo $prop_inf->group_val; }?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Address:</td>
			<td style="padding-left:11px;"><textarea name="addre" id="addre" rows="4" cols="25"> <?php if(isset($prop_inf->address)){ echo $prop_inf->address; }?></textarea><tr>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Description:</td>
			<td style="padding-left:11px;"><textarea name="desc" id="desc" rows="4" cols="25"><?php if(isset($prop_inf->descrip)){ echo $prop_inf->descrip; }?></textarea><tr>
          </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Time-zones:</td>
			<td style="padding-left:9px;" >
				<select name="time_zone" id="time_zone">
					<option value="">Select Timezone </option
				><?php
					foreach($time_zone as $value)
					{
					$time_disp="(".$value->time."-".$value->value.")".$value->time_location;
					$time_disp_dyn="(".$prop_inf->time."-".$prop_inf->value.")".$prop_inf->time_location;
					$sel_zone_type=$myzone==$value->sup_apart_timezone_list_id? ' SELECTED' :'';
				?>
					
					<option value="<?php echo $value->sup_apart_timezone_list_id ?>" <?php echo $sel_zone_type?>><?php echo $time_disp ?> </option>
				<?php				
					}
				?>
				</select>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Star:</td>
			<td style="padding-left:9px;" >
				<select name="star_val" id="star_val">
					<option value="">Please Select Star</option>
					<option value="1" <?php if(isset($prop_inf->star) && $prop_inf->star == '1'){ echo "selected='selected'"; }?>>1</option>
					<option value="2" <?php if(isset($prop_inf->star) && $prop_inf->star == '2'){ echo "selected='selected'"; }?>>2</option>
					<option value="3" <?php if(isset($prop_inf->star) && $prop_inf->star == '3'){ echo "selected='selected'"; }?>>3</option>
					<option value="4" <?php if(isset($prop_inf->star) && $prop_inf->star == '4'){ echo "selected='selected'"; }?>>4</option>
					<option value="5" <?php if(isset($prop_inf->star) && $prop_inf->star == '5'){ echo "selected='selected'"; }?>>5</option>
				</select>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Currency:</td>
			<td style="padding-left:9px;" >
				<select name="currency" id="currency">
					<option value="">Select Currency </option>
				<?php
					foreach($currency as $value)
					{
					
					$sel_ctype=$mycorrencty==$value->cur_id? ' SELECTED' :'';
				?>
					<option value="<?php echo $value->cur_id ?>" <?php echo $sel_ctype?>><?php echo $value->country ?> </option>
				<?php				
					}
				?>
				</select><span style="color:#FF0000;"> <?php echo form_error('currency');?>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">website:</td>
			<td style="padding-left:11px;r"><input type="text" name="web" id="web" size="30" value="<?php if(isset($prop_inf->website)){ echo $prop_inf->website; }?>"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Bookings: Instant or On request?</td>
			<td style="padding-left:11px;r">
				<input type="radio" name="booking_type" id="booking_type" value="ins" <?php if(isset($prop_inf->book_type) && $prop_inf->book_type == 'ins'){ echo "checked='checked'"; }?>>Instant
				<input type="radio" name="booking_type" id="booking_type" value="onreq" <?php if(isset($prop_inf->book_type) && $prop_inf->book_type == 'onreq'){ echo "checked='checked'"; }?>>On request
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Booking confirmation email</td>
			<td style="padding-left:11px;r"><input type="text" name="book_email" id="book_email" size="30" value="<?php if(isset($prop_inf->email)){ echo $prop_inf->email; }?>"><span style="color:#FF0000;"> <?php echo form_error('book_email');?></span></</td>
          </tr>
		  <tr>
        <td colspan="5" align="center">
		<input type="hidden" name="property_id" value="1">
		<input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  />
        <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
        </tr>	
		  </table>
	</div>
	
	
	
	
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
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>