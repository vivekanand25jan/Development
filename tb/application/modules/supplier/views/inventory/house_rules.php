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
<div class="tabs_width">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Room Rates</a></li>
<li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>" id="tabs_active" style="width:138.5px;">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>" id="newtabe_size">Allotment</a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
	
  <div id="containerdount"  class="tab1" style="padding-top:30px;">
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Supplier Policy</div>
    <br />
     
    <div style="float:left; margin-left:20px;">
   <?php if(isset($result->sup_apart_houserules_id)){ ?>
    <form action="<?php echo WEB_URL; ?>index/edit_house_rules/<?php echo $this->uri->segment(3); ?>/<?php echo $result->sup_apart_houserules_id; ?>" method="post">
    <?php } else { ?>
    <form action="<?php echo WEB_URL; ?>index/set_house_rules/<?php echo $this->uri->segment(3); ?>" method="post">
    <?php } ?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr height="35">
    <td width="300">Arrival Time (from):</td>
    <td><select name="arrival_time" id="arrival_time" style="width:120px;">
            <option value="">Select time</option> 
        <?php 
            $start = strtotime('12am'); 
        for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
            <option value="<?php echo $display; ?>" <?php if(isset($result->arrivaltime_from) && $display == $result->arrivaltime_from){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
        <?php 
        } ?>
        </select><span style="color:#FF0000;"> <?php echo form_error('arrival_time');?></span></td>
    </tr>
    <tr height="35">
    <td>Departure Time (Before):</td>
    <td><select name="departure_time" id="departure_time" style="width:120px;">
            <option value="">Select time</option> 
        <?php 
            $start = strtotime('12am'); 
        for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
            <option value="<?php echo $display; ?>" <?php if(isset($result->departtime_before) && $display == $result->departtime_before){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
        <?php 
        } ?>
        </select><span style="color:#FF0000;"> <?php echo form_error('departure_time');?></span></td>
    </tr>
    <tr height="60">
    <td>Check-in with Extra cost (after):</td>
    <td>hours:
    	<select name="check_in_time_from" id="check_in_time_from" style="width:120px;">
            <option value="">Not Applicable</option> 
        <?php 
            $start = strtotime('12am'); 
        for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
            <option value="<?php echo $display; ?>" <?php if(isset($result->checkin_time1) && $display == $result->checkin_time1){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
        <?php 
        } ?>
        </select>
         cost:<input type="text" id="check_in_extra_cost_from" name="check_in_extra_cost_from" size="8" value="<?php if(isset($result->checkin_extracost1)){ echo $result->checkin_extracost1; } ?>" /><!--<br />
         hours:
         <select name="check_in_time_to" id="check_in_time_to" style="width:120px;">
            <option value="">Not Applicable</option> 
        <?php 
            $start = strtotime('12am'); 
        for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
            <option value="<?php echo $display; ?>" <?php if(isset($result->checkin_time2) && $display == $result->checkin_time2){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
        <?php 
        } ?>
        </select>
         cost:<input type="text" id="check_in_extra_cost_to" name="check_in_extra_cost_to" size="8" value="<?php if(isset($result->checkin_extracost2)){ echo $result->checkin_extracost2; }?>"/>--></td>
    </tr>
    <tr height="60">
    <td>Check-out with Extra cost (after):</td>
    <td>hours:
         <select name="check_out_time_from" id="check_out_time_from" style="width:120px;">
            <option value="">Not Applicable</option> 
        <?php 
            $start = strtotime('12am'); 
        for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
            <option value="<?php echo $display; ?>" <?php if(isset($result->checkout_time1) && $display == $result->checkout_time1){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
        <?php 
        } ?>
        </select>
         cost:<input type="text" id="check_out_extra_cost_from" name="check_out_extra_cost_from" size="8" value="<?php if(isset($result->checkout_extracost2)){ echo $result->checkout_extracost2; }?>" /><!--<br />
         hours:
         <select name="check_out_time_to" id="check_out_time_to" style="width:120px;">
            <option value="">Not Applicable</option> 
        <?php 
            $start = strtotime('12am'); 
        for ($i = 0; $i < (24 * 4); $i++) { 
            $tod = $start + ($i * 15 * 60); 
            $display = date('h:i A', $tod); 
            if (substr($display, 0, 2) == '00') { 
                $display = '12' . substr($display, 2); 
            } ?>
            <option value="<?php echo $display; ?>" <?php if(isset($result->checkout_time1) && $display == $result->checkout_time2){ echo "selected='selected'"; } ?>><?php echo $display; ?></option>
        <?php 
        } ?>
        </select>
         cost:<input type="text" id="check_out_extra_cost_to" name="check_out_extra_cost_to" size="8" value="<?php if(isset($result->checkout_extracost1)){ echo $result->checkout_extracost1; } ?>"/>--></td>
    </tr>
   <!-- <tr height="35">
    <td>Minimum Stay: </td>
    <td><input type="text" id="manimum_stay" name="manimum_stay" value="<?php if(isset($result->mini_stay)){ echo $result->mini_stay; } ?>"/></td>
    </tr>
    <tr height="35">
    <td>Maximum Stay:</td>
    <td><input type="text" id="maximum_stay" name="maximum_stay" value="<?php if(isset($result->max_stay)){ echo $result->max_stay; }?>"/></td>
    </tr>
    <tr height="35">
    <td>Payment of the rent amount:</td>
    <td><select name="rent_amt_percent" id="rent_amt_percent" style="width:120px;">
            <option value="">Not Applicable</option>
            <option value="10" <?php if(isset($result->rent_amount) && $result->rent_amount == '10'){ echo "selected='selected'"; } ?>>10</option>
            <option value="20" <?php if(isset($result->rent_amount) && $result->rent_amount == '20'){ echo "selected='selected'"; } ?>>20</option>
            <option value="25" <?php if(isset($result->rent_amount) && $result->rent_amount == '25'){ echo "selected='selected'"; } ?>>25</option>
            <option value="50" <?php if(isset($result->rent_amount) && $result->rent_amount == '50'){ echo "selected='selected'"; } ?>>50</option>
            <option value="75" <?php if(isset($result->rent_amount) && $result->rent_amount == '75'){ echo "selected='selected'"; } ?>>75</option>
        </select>%&nbsp;maximum
        <input type="text" id="rent_amt_days" name="rent_amt_days" size="5" value="<?php if(isset($result->rent_amount_days)){  echo $result->rent_amount_days; }?>"/>days after the booking date</td>
    </tr>-->
    <tr height="35">
    <td>Payment mode: </td>
    <td><select name="payment_mode" id="payment_mode" style="width:150px;">
            <option value="">Select Option</option>
            <option value="1" <?php if(isset($result->payment_mode) && $result->payment_mode == '1'){ echo "selected='selected'"; }?>>Cash</option>
            <option value="2" <?php if(isset($result->payment_mode) && $result->payment_mode == '2'){ echo "selected='selected'"; }?>>Credit Card</option>
            <option value="3" <?php if(isset($result->payment_mode) && $result->payment_mode == '3'){ echo "selected='selected'"; }?>>Credit Facility</option>
        </select></td>
    </tr>
  <!--  <tr height="35">
    <td>Cleaning:</td>
    <td><select name="cleaning" id="cleaning" style="width:120px;">
            <option value="">Select Option</option>
            <option value="1" <?php if(isset($result->cleaning) && $result->cleaning == '1'){ echo "selected='selected'"; } ?>>On Arraivel</option>
            <option value="2" <?php if(isset($result->cleaning) && $result->cleaning == '2'){ echo "selected='selected'"; } ?>>On Departure</option>
            <option value="3" <?php if(isset($result->cleaning) && $result->cleaning == '3'){ echo "selected='selected'"; } ?>>In Between</option>
        </select></td>
    </tr>
    <tr height="35">
    <td>Supplies:</td>
    <td><select name="supplies" id="supplies" style="width:120px;">
            <option value="">Select Option</option>
            <option value="1" <?php if(isset($result->supplies) && $result->supplies == '1'){ echo "selected='selected'"; } ?>>Included</option>
            <option value="2" <?php if(isset($result->supplies) && $result->supplies == '2'){ echo "selected='selected'"; } ?>>Not Included</option>
        </select></td>
    </tr>-->
    <tr height="35">
    <td valign="top">Hotel Remarks:</td>
    <td><textarea name="policy" id="policy" cols="60" rows="10"><?php if(isset($result->policy)) { echo $result->policy; }?></textarea></td>
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