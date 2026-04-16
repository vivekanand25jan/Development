<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />



</head>

<body>
 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:1px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('header'); ?>
          <tr>
          	<td>
            	<table width="966" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:10px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                      <script src="<?php echo WEB_DIR ?>jquery.js"></script>
                      
                      <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
			var status =document.search.status.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		function goBack()
{
	window.history.go(-1);
}
		</script>
        
<div id="navjam">
<div class="tabs_width">
<?php
$suplier_id= $this->uri->segment(3);
$prop_id = $this->uri->segment(4);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accounting </a></li>

<li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
</ul>
<?php
}
else
{
?>
	<ul class="tabs1">
    <li><a href="javascript:void(0)" >Hotel Details </a></li>
    <li><a href="javascript:void(0" id="tabs_active">Inventory Management </a></li>
    <li><a href="">Booking Details </a></li>
    <li style="float:right; cursor:pointer; font-size:12px; padding:5px;color:#069;"><span onclick="goBack()">Back</span></li>
	</ul>
<?php
}
?>
</div>
</div>

<div id="navjam">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" >Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Allotment</a></li>

</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">

   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Supplier Policy</div>
    <br />
     
    <div style="float:left; margin-left:20px;">
   <?php if(isset($result->sup_apart_houserules_id)){ ?>
    <form action="<?php echo WEB_URL; ?>index/edit_house_rules/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $result->sup_apart_houserules_id; ?>" method="post">
    <?php } else { ?>
    <form action="<?php echo WEB_URL; ?>index/set_house_rules/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post">
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
    <td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  />
    <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
    </tr>
    </table>
    </form>
    
    
    </div>



</div>     
    
  
</div>

<script>
/*This is to perform the tabs changing function*/
// perform JavaScript after the document is scriptable.
/*$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});*/
</script>
                                      </td>
                      
                    </tr>
                  </table>

            </td>
          </tr>
          <tr>
          	<td>&nbsp;</td>
          </tr>
        </table>
        
       
        

        
 	</div>
 </div>
</body>
</html>
