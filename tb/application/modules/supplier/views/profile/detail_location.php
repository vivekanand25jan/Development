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
<!--<div id="mybook-tit">Inventory Management</div>-->

<div class="" style="margin-top:20px;">            		
<!-- the tabs -->
<div id="navjam">
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3); ?>">Contact Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3); ?>"> Hotel Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3); ?>">Accommodation Facilities </a></li>
<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3); ?>">General Settings </a></li>
<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3); ?>"> Photo Gallery </a></li>
<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>" id="tabs_active">Detail Location </a></li></ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:30px; margin-top:20px;">
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Detail Location</div>
    <div style="float:left; margin-left:5px; margin-top:20px; clear:both;">
   <?php if(isset($result[0]->sup_detailedlocation_id)){ ?>
    <form action="<?php echo WEB_URL; ?>index/edit_detail_location/<?php echo $this->uri->segment(3); ?>/<?php echo $result[0]->sup_detailedlocation_id; ?>" method="post">
    <?php } else { ?>
    <form action="<?php echo WEB_URL; ?>index/set_detail_location/<?php echo $this->uri->segment(3); ?>" method="post">
    <?php } ?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
    <td>Location (detailed location)<br /><textarea name="detail_location" cols="50" rows="5"><?php if(isset($result[0]->detail_location )) echo $result[0]->detail_location ; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('detail_location');?></span></td>
    <td>&nbsp;</td>
    <td>Nearest Airport<br /><textarea name="nearby_airport" cols="50" rows="5"><?php if(isset($result[0]->nearby_airport)) echo $result[0]->nearby_airport; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('nearby_airport');?></span></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
    <td>Nearest Public Transport<br /><textarea name="nearby_transport" cols="50" rows="5"><?php if(isset($result[0]->nearby_transport)) echo $result[0]->nearby_transport; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('nearby_transport');?></span></td>
    <td>&nbsp;</td>
    <td>Places of Interest Nearby<br /><textarea name="nearby_placeinterest" cols="50" rows="5"><?php if(isset($result[0]->nearby_placeinterest)) echo $result[0]->nearby_placeinterest; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('nearby_placeinterest');?></span></td>
    </tr>
    </table>
    <?php //echo $result[0]->sup_list_id; ?>
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