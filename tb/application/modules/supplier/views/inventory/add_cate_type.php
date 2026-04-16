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
<script language="javascript">
fields = 0;
function addInput() {
if (fields != 10) {
document.getElementById('rows').innerHTML += '<tr height="35"><td width="300"><input type="text" id="type_name" name="type_name[]" /></td><td><input type="text" id="type_value" name="type_value[]" style="margin-left:167px;" />&nbsp; <span onclick="addErase()"></span> </td></tr><br><br>';
fields += 1;
} else {
document.getElementById('rows').innerHTML += "<br />Only 10 upload fields allowed.";
document.form.add.disabled=true;
}
}
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
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:138.5px;">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Room Rates</a></li>
<li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Allotment</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:40px;">
  
  <div style="float:right; height:25px;"><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099;">Back</a></div>
  
    <div style="margin-left:532px; margin-top:0px; ">
    <form action='<?php echo WEB_URL; ?>index/add_cate/<?php echo $this->uri->segment(3); ?>' method='post'>    
    <table>
    <tr><td>
    Add Category type
    </td>
    <td>
    <input type='text' name='cate_type' value='' />
    <input type='submit' name='submit' value='Add' />
    </td>
    </tr>
    </table> 
    </form>
    </div>
  
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Category Information</div>
    <br />
    <div style="float:left; margin-left:20px; clear:both;">
    <form action="<?php echo WEB_URL; ?>index/add_cate_type/<?php echo $this->uri->segment(3); ?>" method="post">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr height="35">
    <td width="300">Category type:</td>
    <td><!--<input type="text" id="cate_type" name="cate_type" value="<?php if( isset($cate_type)) echo $cate_type; ?>" />&nbsp;&nbsp;
    Eg: Deluxe, Superior Deluxe, Premium -->
   	 	<select name='cate_type' id='cate_type' style="width:150px;">
        <option value="">Select</option>
       <?php
        $cate = $this->Supplier_Model->get_cate_type();
        if(isset($cate[0]->cate_type_id))
		{
		for($i=0;$i<count($cate);$i++){
		?>
		  <option value="<?php echo $cate[$i]->cate_type; ?>"><?php echo $cate[$i]->cate_type ?></option>
		<?php	
		}
		}
		?>          
        </select>
        <span style="color:#FF0000;"> <?php echo form_error('cate_type');?></span></td>
    </tr>
    
  <tr height="35">
    <td width="300">Room Category:</td>
    <td><input type="text" id="room_type" name="room_type" value="<?php if( isset($room_type)) echo $room_type; ?>" />&nbsp;&nbsp;
    Eg: Single, Double, Triple</td>
    </tr>
    
    <tr height="35">
    <td width="300">Maximum Occupancy:</td>
    <td><input type="text" id="max_person" name="max_person"value="<?php if( isset($max_person)) echo $max_person; ?>" />&nbsp; 
    </td>
    </tr>
    
    <tr height="35">
    <td width="300">Adults:</td>
    <td><input type="text" id="adults" name="adults"value="<?php if( isset($adults)) echo $adults; ?>" />&nbsp; </td>
    </tr>
    
    <tr height="35">
    <td width="300">Childs:</td>
    <td><input type="text" id="childs" name="childs"value="<?php if( isset($childs)) echo $childs; ?>" />&nbsp; </td>
    </tr>
    
    <tr height="35">
    <td width="300">Infants:</td>
    <td><input type="text" id="infants" name="infants"value="<?php if( isset($infants)) echo $infants; ?>" />&nbsp; </td>
    </tr>
    
    <tr height="35">
    <td width="300">Extra Bed:</td>
    <td><input type="text" id="extra_bed" name="extra_bed"value="<?php if( isset($extra_bed)) echo $extra_bed; ?>" />&nbsp; 
    <!--<input type="button" onclick="addInput()" name="add" value="Add More" />--></td>
    </tr>
    
   <!-- <tr>
    <td colspan="2">
    <table>
    <span id="rows"></span>
    </table>
    </td></tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr style="color:#999;">
    <td>Eg:</td>
    <td>&nbsp;</td>
    </tr>
    <tr style="color:#999;">
    <td>No of Rooms</td>
    <td>5</td>
    </tr>
    
    <tr height="35">
    <td>No of Bathrooms:</td>
    <td><input type="text" id="bath_rooms" name="bath_rooms" value="<?php if( isset($bath_rooms)) echo $bath_rooms; ?>"/><span style="color:#FF0000;"> <?php echo form_error('bath_rooms');?></span></td>
    </tr>
    <tr height="35">
    <td>Room Size: </td>
    <td><input type="text" id="room_zize" name="room_zize" value="<?php if( isset($room_zize)) echo $room_zize; ?>"/> &nbsp;Sq. feet<span style="color:#FF0000;"> <?php echo form_error('room_zize');?></span></td>
    </tr>
    <tr height="35">
    <td>No of Bed Rooms:</td>
    <td><input type="text" id="bed_rooms" name="bed_rooms" value="<?php if( isset($bed_rooms)) echo $bed_rooms; ?>"/><span style="color:#FF0000;"> <?php echo form_error('bed_rooms');?></span></td>
    </tr>
    <tr height="35">
    <td>Is Building Terrace:</td>
    <td><input type="radio" id="terrace" name="terrace" value="1" /> Yes &nbsp;&nbsp;<input type="radio" id="terrace" name="terrace" value="0" checked="checked" /> No</td>
    </tr>
    <tr height="35">
    <td>No of floors: </td>
    <td><input type="text" id="floors" name="floors" value="<?php if( isset($floors)) echo $floors; ?>"/><span style="color:#FF0000;"><?php echo form_error('floors');?></span></td>
    </tr>-->
    </table>
    
<!--    <div style="font-weight:bold; float:left; margin:10px 0px 5px 0px;">Space Facilities:</div>     
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-left:20px;">
    <tr>
    <td class="border-bottom" valign="top">
    <?php
    $space_faci = $this->Supplier_Model->inventory_category_space_facilities();
    for($i=0;$i<count($space_faci);$i++)
    {
    ?>
    <input type="checkbox" name="space_faci[]" id="space_faci[]" value="<?php echo $space_faci[$i]->space_fac_id; ?>" />&nbsp;<label><?php echo $space_faci[$i]->space_fac_name; ?></label>&nbsp;<br>
    <?php	
    }
    ?>
    </td>
    </tr>
    </table>
-->    
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