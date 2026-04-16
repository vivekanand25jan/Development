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
$list_selected_item=$selected_facility;
?>
 
<div class="midlebody">
<div class="mainbody_signin">
<div>
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="javascript:void(0)" id="tabs_active">Property Details </a></li>
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
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>">General & Contact Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>"> Property Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>">Accommodation Facilities </a></li>
<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>" id="tabs_active">General Settings </a></li>
<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>"> Accommodation Pictures </a></li>
<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>">Detail Location </a></li></ul>
</ul>
</div>
</div>
<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">
<div id="result">
			<BR>
			<BR>
		<table>
		<tr><td>
		<form name="f2" action="<?php echo WEB_URL;?>index/acc_facility/<?php echo $this->uri->segment(3)?>" method="post">
		<table>
			<tr>
				<td>Hotel Facilities</td>
			</tr>
			<tr>
				<td><input type="text" name="add_facility" id="add_facility"></td>
				<td><input type="submit" name="add_new" id="add_new" value="Add"></td>
			</tr>
		</table>
	</form>
	</td>
	<td>
	<form name="f2" action="<?php echo WEB_URL;?>index/acc_facility/<?php echo $this->uri->segment(3)?>" method="post">
		<table>
			<tr>
				<td>Room Facilities</td>
			</tr>
			<tr>
				<td><input type="text" name="add_room_facility" id="add_room_facility"></td>
				<td><input type="submit" name="add_new" id="add_new" value="Add"></td>
			</tr>
		</table>
	</form>
	</td></tr>
	<tr><td>
<form name="f3" action="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>" method="post">		
	
				<table>
				<?php
				if(is_array($facility_iist))
				{
				foreach($facility_iist as $value)
				{
					$chk=in_array($value->facility,$list_selected_item);
					if($chk)
					{
						$mychk="Checked";
					}
					else
					{
						$mychk="";
					}
				?>
				<tr>
				<td>
					<input type="checkbox" name="hotel_facility[]" id="<?php echo $value->sup_acc_fac_id ?>" value="<?php echo $value->facility?>"  <?php echo $mychk?>/><?php echo $value->facility ?>
				</td>
				</tr>	
				<?php
				}
				}
				?>
				</table>
		</td>
		<td>
	
				<table>
				<?php
				if(is_array($room_fac_list))
				{
				foreach($room_fac_list as $value)
				{
					$chk_room=in_array($value->facility,$list_selected_item);
					if($chk_room)
					{
						$mychk_hotel="Checked";
					}
					else
					{
						$mychk_hotel="";
					}
				?>
				<tr>
				<td>
					<input type="checkbox" name="room_facility[]" id="<?php echo $value->sup_acc_fac_id ?>" value="<?php echo $value->facility ?>" <?php echo $mychk_hotel?> /><?php echo $value->facility ?>
				</td>
				</tr>	
				<?php
				}
				}
				?>
				</table>
		</td>	 	
			<tr>
				<td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  />
			</tr>
		
	</form>
	</table>
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