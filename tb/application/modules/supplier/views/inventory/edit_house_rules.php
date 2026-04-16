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
<ul class="tabs">
<li><a href="">Category Type</a></li>
<li><a href="javascript:void(0)">Rate Tactics</a></li>
<li><a href="">Maintain by Month</a></li>
<li><a href="javascript:void(0)">Open/Close Dates</a></li>
<li><a href="">Supplier Policy</a></li>
<li><a href="javascript:void(0)">Extra Services</a></li>
</ul>
</div>

<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:30px;">
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Edit Supplier Policy</div>
    <br />
     <div style="float:right; height:25px;"><a href="<?php echo site_url('index/inventory_category_list/')?>" style="color:#099;">Back</a></div>
    <div style="float:left; margin-left:20px;">
   
    <form action="<?php echo WEB_URL; ?>index/set_house_rules" method="post">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr height="35">
    <td width="300">Arrival Time (from):</td>
    <td><?php 
			echo '<select name="arrival_time" id="arrival_time" style="width:120px;">
					<option value="">Select time</option>'; 
			$start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} 
				$tag = '<option value="' . $display . '">' . $display . '</option>'; 
				echo $tag; 
			} 
			echo '</select>';				
		 ?><span style="color:#FF0000;"> <?php echo form_error('arrival_time');?></span></td>
    </tr>
    <tr height="35">
    <td>Departure Time (Before):</td>
    <td><?php 
			echo '<select name="departure_time" id="departure_time" style="width:120px;">
					<option value="">Select time</option>'; 
			$start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} 
				$tag = '<option value="' . $display . '">' . $display . '</option>'; 
				echo $tag; 
			} 
			echo '</select>';				
		 ?><span style="color:#FF0000;"> <?php echo form_error('departure_time');?></span></td>
    </tr>
    <tr height="60">
    <td>Check-in with Extra cost (after):</td>
    <td>hours:<?php 
			echo '<select name="check_in_time_from" id="check_in_time_from" style="width:120px;">
					<option value="">Not Applicable</option>'; 
			$start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} 
				$tag = '<option value="' . $display . '">' . $display . '</option>'; 
				echo $tag; 
			} 
			echo '</select>';				
		 ?>
         cost:<input type="text" id="check_in_extra_cost_from" name="check_in_extra_cost_from" size="8" /><br />
         hours:<?php 
			echo '<select name="check_in_time_to" id="check_in_time_to" style="width:120px;">
					<option value="">Not Applicable</option>'; 
			$start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} 
				$tag = '<option value="' . $display . '">' . $display . '</option>'; 
				echo $tag; 
			} 
			echo '</select>';				
		 ?>
         cost:<input type="text" id="check_in_extra_cost_to" name="check_in_extra_cost_to" size="8"/></td>
    </tr>
    <tr height="60">
    <td>Check-out with Extra cost (after):</td>
    <td>hours:<?php 
			echo '<select name="check_out_time_from" id="check_out_time_from" style="width:120px;">
					<option value="">Not Applicable</option>'; 
			$start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} 
				$tag = '<option value="' . $display . '">' . $display . '</option>'; 
				echo $tag; 
			} 
			echo '</select>';				
		 ?>
         cost:<input type="text" id="check_out_extra_cost_from" name="check_out_extra_cost_from" size="8" /><br />
         hours:<?php 
			echo '<select name="check_out_time_to" id="check_out_time_to" style="width:120px;">
					<option value="">Not Applicable</option>'; 
			$start = strtotime('12am'); 
			for ($i = 0; $i < (24 * 4); $i++) { 
				$tod = $start + ($i * 15 * 60); 
				$display = date('h:i A', $tod); 
				if (substr($display, 0, 2) == '00') { 
					$display = '12' . substr($display, 2); 
				} 
				$tag = '<option value="' . $display . '">' . $display . '</option>'; 
				echo $tag; 
			} 
			echo '</select>';				
		 ?>
         cost:<input type="text" id="check_out_extra_cost_to" name="check_out_extra_cost_to" size="8"/></td>
    </tr>
    <tr height="35">
    <td>Minimum Stay: </td>
    <td><input type="text" id="manimum_stay" name="manimum_stay" value=""/></td>
    </tr>
    <tr height="35">
    <td>Maximum Stay:</td>
    <td><input type="text" id="maximum_stay" name="maximum_stay" value=""/></td>
    </tr>
    <tr height="35">
    <td>Payment of the rent amount:</td>
    <td><select name="rent_amt_percent" id="rent_amt_percent" style="width:120px;">
            <option value="">Not Applicable</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="75">75</option>
        </select>%&nbsp;maximum
        <input type="text" id="rent_amt_days" name="rent_amt_days" size="5"/>days after the booking date</td>
    </tr>
    <tr height="35">
    <td>Payment mode: </td>
    <td><select name="payment_mode" id="payment_mode" style="width:120px;">
            <option value="">Select Option</option>
            <option value="1">Cash</option>
            <option value="2">Credit Card</option>
        </select></td>
    </tr>
    <tr height="35">
    <td>Cleaning:</td>
    <td><select name="cleaning" id="cleaning" style="width:120px;">
            <option value="">Select Option</option>
            <option value="1">On Arraivel</option>
            <option value="2">On Departure</option>
            <option value="3">In Between</option>
        </select></td>
    </tr>
    <tr height="35">
    <td>Supplies:</td>
    <td><select name="supplies" id="supplies" style="width:120px;">
            <option value="">Select Option</option>
            <option value="1">Included</option>
            <option value="2">Not Included</option>
        </select></td>
    </tr>
    <tr height="35">
    <td>Policy:</td>
    <td><textarea name="policy" id="policy" cols="30" rows="3"></textarea></td>
    </tr>
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