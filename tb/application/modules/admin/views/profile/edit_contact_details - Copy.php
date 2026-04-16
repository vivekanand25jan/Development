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
<script type="text/javascript">
jQuery(function() { 
	$('#file_upload').uploadify(	{
		
		'formData'      : {'supppp_id' : <?php echo $this->uri->segment(3); ?>, 'propppp_id' : <?php echo $this->uri->segment(4); ?>},
		'buttonImage' : '<?php echo WEB_DIR_FRONT ?>images/upload_bt.png',
		'swf'		:	'<?php echo WEB_DIR_FRONT ?>supplier/uploadify.swf',
		'uploader'	:	'<?php echo WEB_URL; ?>index/uploadify',	
		'multi'		:	true,
		'auto'		:	true,
		'progressData' : 'percentage',	
		'onUploadSuccess' : function(file, data, response) {
			alert(data);
			//getPhotos(<?php echo $this->uri->segment(3); ?>);
			}			
	});
	$('#file_upload').uploadify('settings','buttonText','Upload');
});
function getPhotos(prop_id){ 
	$.post("<?php print WEB_URL ?>index/getImages", {"prop_id":prop_id,"action":"ViewImages"},
	function(data){  
		if(data != ""){
			$("#getPhotos").html('');
		for(var i=0; i<data.acc_images.length; i++)
		{
			if(data.acc_images[i].status =="1"){
				$("#getPhotos").prepend('<div class="image-box" id="pic1"><div><img src="<?php echo WEB_DIR_FRONT ?>supplier_hotels_images/'+data.acc_images[i].image_name+'" width="165" height="120" border="0" style="margin:4px;" /><div class="checkbox-bg"><span style="float:left;"><img src="<?php echo WEB_DIR_FRONT ?>images/active.png" width="14" height="14" border="0" style="vertical-align:top;cursor:pointer;" onclick="return status_pic('+data.acc_images[i].sup_accomodation_pictures_id+',0);"></span><span class="img-fix"> <img src="<?php echo WEB_DIR_FRONT ?>images/b2b-booking-icon.png" width="14" height="14" border="0" style="margin-left:5px;margin-top:5px;cursor:pointer;" onclick="return delete_pic('+data.acc_images[i].sup_accomodation_pictures_id+');"/></span> </div></div></div>');
			}
			else {
				$("#getPhotos").prepend('<div class="image-box" id="pic1"><div><img src="<?php echo WEB_DIR_FRONT ?>supplier_hotels_images/'+data.acc_images[i].image_name+'" width="165" height="120" border="0" style="margin:4px;" /><div class="checkbox-bg"><span style="float:left;"><img src="<?php echo WEB_DIR_FRONT ?>images/inactive.png" width="14" height="14" border="0" style="vertical-align:top;cursor:pointer;" onclick="return status_pic('+data.acc_images[i].sup_accomodation_pictures_id+',1);"></span><span class="img-fix"> <img src="<?php echo WEB_DIR_FRONT ?>images/b2b-booking-icon.png" width="14" height="14" border="0" style="margin-left:5px;margin-top:5px;cursor:pointer;" onclick="return delete_pic('+data.acc_images[i].sup_accomodation_pictures_id+');"/></span> </div></div></div>');
			}
		}
		}
		else
		{
			$("#getPhotos").html('<div style="margin-left:350px; color:red;">Upload your photos</div>');
			$("#savebutton").hide();
		}
	});
	return false;
}
function delete_pic(picId)
{
	var conf=confirm("Do you really want to delete this Picture?");
	if (conf==true)
	{ 
	$.post("<?php print WEB_URL ?>index/delete_picture", {"picId":picId},
	function(data){ 
		if(data != ""){
			alert("Selected photo deleted successfully!");
			getPhotos(<?php echo $this->uri->segment(4); ?>);
		}
	});
	}
	else{
		return false;
	}
}
function status_pic(picId,status)
{
	$.post("<?php print WEB_URL ?>index/status_pic", {"picId":picId, "status":status},
	function(data){ 
		if(data != ""){
			getPhotos(<?php echo $this->uri->segment(4); ?>);
		}
	});
}
getPhotos(<?php echo $this->uri->segment(4); ?>);
</script>

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
	


<div id="navjam">
<ul class="tabs">
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" > Contact Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Detail Location </a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
<div id="containerdount" class="admin-innerbox">
    	
    
<div class="tab_right_section">
<!--<form name="f2" action="<?php echo WEB_URL;?>index/add_market/<?php echo $this->uri->segment(3)?>" method="post">
<table style="float:left; ">
<tr>
    <td align="left" valign="top" class="my_profile_name">General Information: </td>
  </tr>
        <tr>
            <td>Add Market</td>
        </tr>
        <tr>
            <td><input type="text" name="add_market_name" id="add_market_name" required></td>
            <td><input type="submit" name="add_new" id="add_new" value="Add"></td>
        </tr>
    </table>
    </form>-->
<form action="<?php echo WEB_URL; ?>index/update_contact_inform/<?php if(isset( $contact_inf->sup_hotel_id)) echo $contact_inf->sup_id.'/'.$contact_inf->sup_hotel_id;?>" method="post" name="profile"> 
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  
  <tr>
    <td align="left" valign="top">
    <?php
               $market_list=$this->Supplier_Model->fetch_markets();
                for($i=0;$i<count($market_list);$i++)
                {
                ?>
                <input type="checkbox" name="market_name[]" id="market_name[]" value="<?php echo $market_list[$i]->market_id; ?>"  <?php if(isset($contact_inf->sup_hotel_id) &&$sup_market = $this->Supplier_Model->supplier_markets($contact_inf->sup_hotel_id, $market_list[$i]->market_id)) { echo "checked='checked'"; } ?>/>&nbsp;<label><?php echo $market_list[$i]->market_name; ?></label>&nbsp;<br>
                <?php	
                }
                ?>
       <!-- <select name="market_name[]" id="market_name[]" multiple="multiple" class="" style="width:260px;" size="5">
        <?php
		$market_list=$this->Supplier_Model->fetch_markets();
		if(isset($market_list[0]->market_id))
		{
		for($i=0;$i<count($market_list);$i++){ 
			$market_name = explode(",",$contact_inf->market_name);
			for($j=0;$j<count($market_name);$j++){
			if($market_list[$i]->market_id ==  $market_name[$j]){
		?>
		  <option value="<?php echo $market_list[$i]->market_id; ?>" selected='selected'> <?php echo $market_list[$i]->market_name; echo $market_list[$i]->market_id;?>  </option>
		<?php	
			}
			else { ?>
				<option value="<?php echo $market_list[$i]->market_id; ?>"> <?php echo $market_list[$i]->market_name; echo $market_list[$i]->market_id;?>  </option>
		<?php	}
			}
		}
		}
		?>
		</select>-->
        </td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">Hotel Name</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="pro_name" id="pro_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->hotel_name)){ echo $contact_inf->hotel_name; } ?>"/></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="account_font_pos_r">City</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">
	<script type="text/javascript" src="<?php print WEB_DIR_FRONT; ?>autofill/js/bsn.AutoSuggest_c_2.0.js"></script>
          <link rel="stylesheet" href="<?php print WEB_DIR_FRONT; ?>autofill/css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
          
              <input type="hidden" id="testid" value="" style="font-size: 10px; width: 20px; z-index:99999; position:absolute;" disabled="disabled" />
              <input type="text" name="country_val"  id="testinput" class="ma_pro_txt" value="<?php if(isset($contact_inf->city)){ echo $contact_inf->city; }?>"/>
              
              <script type="text/javascript">
              
    var options = {
        script:"<?php print WEB_DIR_FRONT; ?>test_hotel.php?json=true&",varname:"input",json:true,callback: function (obj) { document.getElementById('testid').value = obj.id; } };
    var as_json = new AutoSuggest('testinput', options);
    
    </script> 
  </tr>
  
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">Main Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="main_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->main_first_name)){ echo $contact_inf->main_first_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="main_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->main_last_name)){ echo $contact_inf->main_last_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email Address </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="main_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->main_email )){ echo $contact_inf->main_email ; } ?>" /></td>
  </tr>
  
  <tr>
    <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
</table>

</div>
<div class="tab_right_section"><table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  
  <tr>
    <td align="left" valign="top" class="my_profile_name">Reservation Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_first_name )){ echo $contact_inf->res_first_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_last_name )){ echo $contact_inf->res_last_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Phone </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_phone" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_phone)){ echo $contact_inf->res_phone;} ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Fax </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_fax" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_fax)){ echo $contact_inf->res_fax ;} ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_email )){ echo $contact_inf->res_email ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Confirm Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="res_email_confirm" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->res_email )){ echo $contact_inf->res_email ; } ?>" /></td>
  </tr>
  
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"></td>
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name">Marketing Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_first_name )){ echo $contact_inf->mar_first_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_last_name )){ echo $contact_inf->mar_last_name ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Phone </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_phone" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_phone )){ echo $contact_inf->mar_phone ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Fax </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_fax" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_fax)){ echo $contact_inf->mar_fax; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_email)){ echo $contact_inf->mar_email; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Confirm Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="mark_email_confirm" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->mar_email)){ echo $contact_inf->mar_email; } ?>" /></td>
  </tr>
  
</table></div>
<div class="tab_right_second">
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Accounts/Finance Contact Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> First Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_first_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_first_name)){ echo $contact_inf->acc_first_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Last Name </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_last_name" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_last_name)){ echo $contact_inf->acc_last_name; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Phone </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_phone" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_phone)){ echo $contact_inf->acc_phone; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Fax </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_fax" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_fax)){ echo $contact_inf->acc_fax; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_email" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_email )){ echo $contact_inf->acc_email ; } ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="account_font_pos_r"> Confirm Email </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="acc_email_confirm" type="text" class="ma_pro_txt" value="<?php if(isset($contact_inf->acc_email)){ echo $contact_inf->acc_email; } ?>" /></td>
  </tr>
</table>

</div>
<div class="wi_for_cancel">
			<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0 0 25px 0;">
  <tr>
    <td align="left" valign="top">
    
    		<table width="350" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td style="padding:5px 0 0 0; color:#14a3e7;">&nbsp;</td>
  </tr>
  
</table>

    </td>
    <td align="left" valign="top"><table width="250" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td>
    <td><a href="#"></a></td>
  </tr>
</table>
</td>
  </tr>
</table>

</div>
</form>
    
  </div>
  
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
           <td style="padding-left:11px;">Latitude:  <a href="http://itouchmap.com/latlong.html" target="_blank" style="color:#099;">http://itouchmap.com/latlong.html</a></td>
			<td style="padding-left:11px;r"><input type="text" name="latitude" id="latitude" size="30" value="<?php if(isset($prop_inf->latitude)){ echo $prop_inf->latitude; }?>"></td>
          </tr>
          <tr>
           <td style="padding-left:11px;">Longitude:  <a href="http://itouchmap.com/latlong.html" target="_blank" style="color:#099;">http://itouchmap.com/latlong.html</a></td>
			<td style="padding-left:11px;r"><input type="text" name="longitude" id="longitude" size="30" value="<?php if(isset($prop_inf->longitude)){ echo $prop_inf->longitude; }?>"></td>
          </tr>
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

<!--This is the accodomation division--> 
<div id="containerdount">
		<table>
		<tr><td>
		<form name="f2" action="<?php echo WEB_URL;?>index/add_hotel_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">
		<table>
			<tr>
				<td>Hotel Facilities</td>
                <td></td>
			</tr>
			<tr>
				<td><input type="text" name="add_facility" id="add_facility"></td>
				<td><input type="submit" name="add_new" id="add_new" value="Add"></td>
			</tr>
		</table>
	</form>
	</td>
	<td>
	<form name="f2" action="<?php echo WEB_URL;?>index/acc_room_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">
		<table>
			<tr>
				<td>Room Facilities</td>
                <td></td>
			</tr>
			<tr>
				<td><input type="text" name="add_room_facility" id="add_room_facility"></td>
				<td><input type="submit" name="add_new" id="add_new" value="Add"></td>
			</tr>
		</table>
	</form>
	</td></tr>
	<tr>
    <td>
    <form name="f3" action="<?php echo WEB_URL;?>index/set_acco_fecilities/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">		
   		<table>
    <?php
    if(isset($facility_iist[0]->sup_fac_id)){
    for($i=0; $i<count($facility_iist); $i++)
    { 
        ?><tr>
    <td>
        <!--<input type="checkbox" name="hotel_facility[]" id="<?php echo $facility_iist[$i]->sup_fac_id ?>" value="<?php echo $facility_iist[$i]->sup_fac_id ?>" <?php if($facility_iist[$i]->status == 1) { echo "checked='checked'" ; } ?> />-->
        <input type="checkbox" name="hotel_facility[]" id="<?php echo $facility_iist[$i]->sup_fac_id ?>" value="<?php echo $facility_iist[$i]->sup_fac_id ?>" 
        <?php if($sup_hotel_faci = $this->Supplier_Model->supplier_hotel_facilities($this->uri->segment(4), $facility_iist[$i]->sup_fac_id)) { echo "checked='checked'"; } ?> />			<?php echo $facility_iist[$i]->facility_name ?>
    </td>
    </tr>	
    <?php
    }
    }
    ?>
    </table>
    </td>
    <td valign="top">
    	<table>
    <?php
    if(isset($room_fac_list) && $room_fac_list!='')
    {
        if(isset($room_fac_list[0]->sup_fac_id))
        {
            for($i=0; $i<count($room_fac_list); $i++)
            {
            ?>
            <tr>
            <td>
                <input type="checkbox" name="room_facility[]" id="<?php echo $room_fac_list[$i]->sup_fac_id ?>" value="<?php echo $room_fac_list[$i]->sup_fac_id ?>" 
                <?php if($sup_room_faci = $this->Supplier_Model->supplier_room_facilities($this->uri->segment(4), $room_fac_list[$i]->sup_fac_id)) { echo "checked='checked'" ; } ?>/><?php echo $room_fac_list[$i]->facility_name ?>
            </td>
            </tr>	
            <?php
            }
        }
    }
    ?>
    </table>
    </td>	</tr> 	
    <tr><td colspan="2" align="center"><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"/></td></tr>
    </form>
	</table>


</div>

<!--This is General Settings division-->
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

<!--This is Photo Gallery division-->
<div id="containerdount">

    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Photo Gallery</div>
    
    <div style="text-align:right; padding-bottom:5px; font-weight:bold; border-bottom:1px #666 solid; float:right;">  
    <div class="mediaUploadBar" align="right">
     Upload a valid file with extension JPG, JPEG, PNG, GIF.&nbsp;
   	 <div class="uploadData" style="float:right; margin-top:-4px;"><input type="file" name="file_upload" id="file_upload" /> </div>
 	</div>
    </div>
    
    <div style="float:left; margin-left:5px; margin-top:20px; clear:both;">
    <form action="<?php echo WEB_URL; ?>index/set_acco_pictures/<?php echo $this->uri->segment(3)?>" method="post">
    <table class="tableStatic" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <td width="100%" id="getPhotos">
        </td>
    </tr>
    </tbody>
    </table>
    
    <!--<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px; clear:both;">
    <tr>
    <td colspan="5" align="center" id="savebutton"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"/></td>
    </tr>
    </table>-->
    </form>
    
    </div>




</div>

<!--This is Detail Location division-->
<div id="containerdount">

<div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Detail Location</div>
    <div style="float:left; margin-left:5px; margin-top:20px; clear:both;">
   <?php if(isset($result1[0]->sup_detailedlocation_id)){ ?>
    <form action="<?php echo WEB_URL; ?>index/edit_detail_location/<?php echo $this->uri->segment(3); ?>/<?php echo $result1[0]->sup_detailedlocation_id; ?>" method="post">
    <?php } else { ?>
    <form action="<?php echo WEB_URL; ?>index/set_detail_location/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post">
    <?php } ?>
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    <tr>
    <td>Location (detailed location)<br /><textarea name="detail_location" cols="50" rows="5"><?php if(isset($result1[0]->detail_location )) echo $result1[0]->detail_location ; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('detail_location');?></span></td>
    <td>&nbsp;</td>
    <td>Nearest Airport<br /><textarea name="nearby_airport" cols="50" rows="5"><?php if(isset($result1[0]->nearby_airport)) echo $result1[0]->nearby_airport; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('nearby_airport');?></span></td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
    <td>Nearest Public Transport<br /><textarea name="nearby_transport" cols="50" rows="5"><?php if(isset($result1[0]->nearby_transport)) echo $result1[0]->nearby_transport; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('nearby_transport');?></span></td>
    <td>&nbsp;</td>
    <td>Places of Interest Nearby<br /><textarea name="nearby_placeinterest" cols="50" rows="5"><?php if(isset($result1[0]->nearby_placeinterest)) echo $result1[0]->nearby_placeinterest; ?></textarea><span style="color:#FF0000;"> <?php echo form_error('nearby_placeinterest');?></span></td>
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

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
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
