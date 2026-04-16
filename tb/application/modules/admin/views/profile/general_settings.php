<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR_FRONT ?>css/uploadify.css">
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery.uploadify-3.1.js"></script>
 <script type="text/javascript" src="<?php echo WEB_DIR; ?>designAccess/engine1/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">

<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>gui/ajax/ajaxsbmt.js"></script>


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
<style>
.image-box{width:172px; height:128px; float:left; border:1px solid #ccc; margin:5px; position:relative;}
.checkbox-bg{ position:absolute; width:40px; height:15px; top:4px; left:4px; padding:2px; background-color:#000; }
.img-fix{float:left; margin-top:-20px; margin-left:17px;}
</style>


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
<style>
#tabs_active { background-color:#517BA5; }
</style>
        
<div id="navjam">
<div class="tabs_width">
<?php
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
    <ul class="tabs1">
        <li><a href="javascript:void(0)" id="tabs_active">Hotel Details </a></li>
        <li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Inventory Management </a></li>
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
    <li><a href="javascript:void(0)" id="tabs_active">Hotel Details </a></li>
    <li><a href="javascript:void(0">Inventory Management </a></li>
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
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" > Contact Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" > Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Detail Location </a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->

  
<!--This is the HOtel information division-->
<div id="containerdount">
<?php if(isset($result->sup_hotel_id)){ ?>
	<form name="f1" action="<?php echo WEB_URL;?>index/edit_general_set/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">
	<?php } else { ?>
	<form name="f1" action="<?php echo WEB_URL;?>index/add_general_set/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">
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
					<option value="<?php echo $display; ?>" <?php if(isset($result->checkinto) && $display == $result->checkinto){ echo "selected='selected'"; } ?>><?php echo $display; ?><span style="color:#FF0000;">  <?php echo form_error('check_in_time_to');?></option>
					<?php
					}?>
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
            
		
			<tr>
				<td colspan="5" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
			</tr>
		</table>
	</form>

</div>


</div>


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
