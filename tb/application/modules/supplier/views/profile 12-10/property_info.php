<?php
//print_r($time_zone);
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
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform">General & Contact Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/edit_property_info"> Property Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/insert_facility">Accommodation Facilities </a></li>
<li><a href="<?php echo WEB_URL;?>index/general_settings" id="tabs_active">General Settings </a></li>
<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/"> Accommodation Pictures </a></li>
<li><a href="<?php echo WEB_URL;?>index/detail_location/">Detail Location </a></li></ul>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">

<div id="result">
<form action="<?php echo WEB_URL;?>index/add_property_inform" name="" method="post">
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
				?>
				
						<option value="<?php echo $value->sup_class_id?>"> <?php echo $value->class_name ?> </option>
				<?php
					}
				?>
				</select><span style="color:#FF0000;"> <?php echo form_error('pro_class_type');?>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Group/ Brand Association:</td>
			<td style="padding-left:11px;r"><input type="text" name="group_ass" id="group_ass" size="30"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Address:</td>
			<td style="padding-left:11px;"><textarea name="addre" id="addre" rows="4" cols="25"> </textarea><tr>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Description:</td>
			<td style="padding-left:11px;"><textarea name="desc" id="desc" rows="4" cols="25"></textarea><tr>
          </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Time-zones:</td>
			<td style="padding-left:9px;" >
				<select name="time_zone" id="time_zone">
					<option value="">Select Timezone </option
				><?php
					foreach($time_zone as $value)
					{
				?>
					<option value="<?php echo $value->sup_apart_timezone_list_id ?>"><?php echo "(".$value->time."-".$value->value.")".$value->time_location ?> </option>
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
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
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
				?>
					<option value="<?php echo $value->cur_id ?>"><?php echo $value->country ?> </option>
				<?php				
					}
				?>
				</select><span style="color:#FF0000;"> <?php echo form_error('currency');?>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">website:</td>
			<td style="padding-left:11px;r"><input type="text" name="web" id="web" size="30"></td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Bookings: Instant or On request?</td>
			<td style="padding-left:11px;r">
				<input type="radio" name="booking_type" id="booking_type" value="ins">Instant
				<input type="radio" name="booking_type" id="booking_type" value="onreq">On request
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Booking confirmation email</td>
			<td style="padding-left:11px;r"><input type="text" name="book_email" id="book_email" size="30" value="<?php if( isset($book_email)) echo $book_email; ?>"><span style="color:#FF0000;"> <?php echo form_error('book_email');?></span></</td>
          </tr>
		  <tr>
		  
		        <td colspan="5" align="center"> <input type="hidden" name="hide_contact_id" value="<?php echo $this->uri->segment(3)?>">
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