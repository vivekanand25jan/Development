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
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php  $lat='';
		$lon='';
if(isset($prop_inf->latitude) && $prop_inf->latitude!='' ) {
	$lat=$prop_inf->latitude;
}
else {
	 $lat=25.271138;
}
if(isset($prop_inf->longitude) && $prop_inf->longitude!='' ) {
	$lon=$prop_inf->longitude;
}
else {
	$lon=55.305425;
}

?>
<script type="text/javascript">
  var map;
  jQuery(document).ready(function() {
	  
  var myLatlng = new google.maps.LatLng(<?php echo $lat;  ?>,<?php echo $lon; ?>);

  var myOptions = {
     zoom: 6,
     center: myLatlng,
     mapTypeId: google.maps.MapTypeId.ROADMAP
     }
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 

  var marker = new google.maps.Marker({
  draggable: true,
  position: myLatlng, 
  map: map,
  title: "Your location"
  });

google.maps.event.addListener(marker, 'dragend', function (event) {

 document.getElementById("lat").value = this.getPosition().lat();
    document.getElementById("lng").value = this.getPosition().lng();

 });

});
</script>

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
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active"> Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Detail Location </a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->

  
<!--This is the HOtel information division-->
<div id="containerdount">

<div style="width:770px; float:center;padding:5px;  margin-top:20px;" >
		
		 Hotel Information 
	</div>
    <div style="clear:both">
    <?php
	if(isset($prop_inf->sup_hotel_id))
	{
?>
		<form action="<?php echo WEB_URL;?>index/update_property_inform/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" name="f1" method="post">
   <?php
   }
	else
	{ 
   ?>
		<form action="<?php echo WEB_URL;?>index/add_property_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4); ?>" name="f1" method="post">
  <?php
	}
?>

    
<table width="780px" align="center" cellspacing="5px" cellpadding="5px" border="0" bordercolor="#ededed" >
		  <tr>
           <td style="padding-left:9px;width:390px;">Supplier Type:</td>
			<td style="padding-left:9px;" >
				<!--<select name="pro_class_type" id="pro_class_type" style="width:210px;">
					<option value="">Select Supplier Type</option>
				<?php
					foreach($class_type_profile as $value)
					{
				?>
					<option value="<?php echo $value->sup_class_id?>"  <?php if(isset($prop_inf->class_type_id) && $value->sup_class_id == $prop_inf->class_type_id){ echo "selected='selected'"; } ?> > <?php echo $value->class_name ?> </option>
				<?php
					}?>

				</select><span style="color:#FF0000;"> <?php echo form_error('pro_class_type');?></span>-->
                <input type="checkbox" name="sup_type_apart" id="sup_type_apart" value="1" <?php if(isset($prop_inf->sup_type_apart) && $prop_inf->sup_type_apart == '1'){ echo "checked='checked'"; }?>>Apartment
				<input type="checkbox" name="sup_type_hotel" id="sup_type_hotel" value="1" <?php if(isset($prop_inf->sup_type_hotel) && $prop_inf->sup_type_hotel == '1'){ echo "checked='checked'"; }?>>Hotel 
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Company / Group / Brand Name:</td>
			<td style="padding-left:11px;r"><input type="text" name="group_ass" id="group_ass" size="30" value="<?php if(isset($prop_inf->group_val)){ echo $prop_inf->group_val; }?>"></td>
          </tr>
          <tr>
           <td style="padding-left:11px;">Latitude:  </td>
			<td style="padding-left:11px;r"><input type="text" name="latitude" id="lat" size="30" value="<?php
			 if(isset($prop_inf->latitude) && $prop_inf->latitude!='' ) {
				echo $prop_inf->latitude;
				} else { echo '25.370446412749263';} ?>"></td>
          </tr>
          <tr>
           <td style="padding-left:11px;">Longitude:  </td>
			<td style="padding-left:11px;r"><input type="text" name="longitude" id="lng" size="30" value="<?php
			 if(isset($prop_inf->longitude) && $prop_inf->longitude!='' ) {
				echo $prop_inf->longitude;
				} else { echo '55.393315625000014';} ?>"></td>
          </tr>
          </table>
          <div style="width:650px; height:400px; margin-left:200px; margin-bottom:20px;" id="map_canvas">
          </div>
          <table  width="780px" align="center" cellspacing="5px" cellpadding="5px" border="0" bordercolor="#ededed">
		  <tr>
           <td style="padding-left:11px;">Address:</td>
			<td style="padding-left:11px;"><textarea name="addre" id="addre" rows="4" cols="35"> <?php if(isset($prop_inf->address)){ echo $prop_inf->address; }?></textarea><tr>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Description:</td>
			<td style="padding-left:11px;"><textarea name="desc" id="desc" rows="4" cols="35"><?php if(isset($prop_inf->descrip)){ echo $prop_inf->descrip; }?></textarea><tr>
          </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Time-zones:</td>
			<td style="padding-left:9px;" >
          
				<select name="time_zone" id="time_zone" style="width:310px;">
					<option value="">Select Timezone </option
				><?php
					foreach($time_zone as $value)
					{
					$time_disp="(".$value->time."-".$value->value.")".$value->time_location;
					$time_disp_dyn="(".$prop_inf->time."-".$prop_inf->value.")".$prop_inf->time_location;
				?>
					
					<option value="<?php echo $value->sup_apart_timezone_list_id ?>" <?php if(isset($prop_inf->timezone_id) && $value->sup_apart_timezone_list_id == $prop_inf->timezone_id){ echo "selected='selected'"; } ?>><?php echo $time_disp; ?> </option>
				<?php				
					}
				?>
				</select>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Star:</td>
			<td style="padding-left:9px;" >
				<select name="star_val" id="star_val" style="width:100px;">
					<option value="">Select Star</option>
					<option value="1" <?php if(isset($prop_inf->star) && $prop_inf->star == '1'){ echo "selected='selected'"; }?>>1</option>
					<option value="2" <?php if(isset($prop_inf->star) && $prop_inf->star == '2'){ echo "selected='selected'"; }?>>2</option>
					<option value="3" <?php if(isset($prop_inf->star) && $prop_inf->star == '3'){ echo "selected='selected'"; }?>>3</option>
					<option value="4" <?php if(isset($prop_inf->star) && $prop_inf->star == '4'){ echo "selected='selected'"; }?>>4</option>
					<option value="5" <?php if(isset($prop_inf->star) && $prop_inf->star == '5'){ echo "selected='selected'"; }?>>5</option>
                    <option value="Standard" <?php if(isset($prop_inf->star) && $prop_inf->star == 'Standard'){ echo "selected='selected'"; }?>>Standard</option>
                    <option value="Deluxe" <?php if(isset($prop_inf->star) && $prop_inf->star == 'Deluxe'){ echo "selected='selected'"; }?>>Deluxe</option>
				</select>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:9px;width:390px;">Currency:</td>
			<td style="padding-left:9px;" >
				<select name="currency" id="currency" style="width:100px;">
					<option value="">Select Currency </option>
				<?php
					foreach($currency as $value)
					{
					
					
				?>
					<option value="<?php echo $value->cur_id ?>" <?php if(isset($prop_inf->currency_id ) && $value->cur_id == $prop_inf->currency_id){ echo "selected='selected'"; } ?>><?php echo $value->country ?> </option>
				<?php				
					}
				?>
				</select><span style="color:#FF0000;"> <?php echo form_error('currency');?></span>
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">website:</td>
			<td style="padding-left:11px;r"><input type="text" name="web" id="web" size="30" value="<?php if(isset($prop_inf->website)){ echo $prop_inf->website; }?>"></td>
          </tr>
		  <!--<tr>
           <td style="padding-left:11px;">Bookings: Instant or On request?</td>
			<td style="padding-left:11px;r">
				<input type="radio" name="booking_type" id="booking_type" value="1" <?php if(isset($prop_inf->book_type) && $prop_inf->book_type == '1'){ echo "checked='checked'"; }?>>Instant
				<input type="radio" name="booking_type" id="booking_type" value="0" <?php if(isset($prop_inf->book_type) && $prop_inf->book_type == '0'){ echo "checked='checked'"; }?>>On request
			</td>
          </tr>-->
          <tr>
           <td style="padding-left:11px;">Receive confirmation via?</td>
			<td style="padding-left:11px;r">
				<input type="checkbox" name="fax_confirm" id="fax_confirm" value="1" <?php if(isset($prop_inf->fax_confirm) && $prop_inf->fax_confirm == '1'){ echo "checked='checked'"; }?>>Fax
				<input type="checkbox" name="email_confirm" id="email_confirm" value="1" <?php if(isset($prop_inf->email_confirm) && $prop_inf->email_confirm == '1'){ echo "checked='checked'"; }?>>Email  
			</td>
          </tr>
		  <tr>
           <td style="padding-left:11px;">Booking confirmation fax</td>
			<td style="padding-left:11px;r"><input type="text" name="book_fax" id="book_fax" size="30" value="<?php if(isset($prop_inf->confirm_faxno)){ echo $prop_inf-> confirm_faxno; }?>"><span style="color:#FF0000;"> <?php echo form_error('book_fax');?></span></</td>
          </tr>
           <tr>
           <td style="padding-left:11px;">Booking confirmation email</td>
			<td style="padding-left:11px;r"><input type="text" name="book_email" id="book_email" size="30" value="<?php if(isset($prop_inf->confirm_email)){ echo $prop_inf-> confirm_email; }?>"><span style="color:#FF0000;"> <?php echo form_error('book_email');?></span></</td>
          </tr>
		  <tr>
        <td colspan="5" align="center">
		<input type="hidden" name="property_id" value="1">
		<input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  />
        <!--<input type="submit" id="submit" name="submit" value="Save and Continue" />--></td>
        </tr>	
		  </table>
</form>
</div>

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
