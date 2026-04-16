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
        
<div id="navjam">
<div class="tabs_width">
<?php
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Accounting </a></li>

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
<!--<ul class="tabs">
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active"> Contact Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Detail Location </a></li>
</ul>-->

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
<div id="containerdount" >
    	
<form action="<?php echo WEB_URL;?>index/accounting_add/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>" name='acc_form' method="post">
<table width="95%" border="0" cellspacing="1" cellpadding="5" align="center" >
    <br/>
  <tr>
    <td>Transfer To:</td><td><input type='text' name='transferto' value='<?php if(isset($result['0']->transfer_to)){ echo $result['0']->transfer_to; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Account Number:</td><td><input type='text' name='accnumber' value='<?php if(isset($result['0']->acc_number)){ echo $result['0']->acc_number; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr>
    <td>S.W.I.F.T</td><td><input type='text' name='swift' value='<?php if(isset($result['0']->swift)){ echo $result['0']->swift; } ?>'  class="table_body_color_filed"/></td>
  </tr>
   <tr>
    <td>Bank Name:</td><td><input type='text' name='bankname' value='<?php if(isset($result['0']->bank_name)){ echo $result['0']->bank_name; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Paymnet Currency:</td><td>

    <select name="paycurrency"  class="table_body_color_filed">
					<option value="">Select Currency </option>
				<?php
					foreach($currency as $value)
					{
					
					
				?>
					<option value="<?php echo $value->cur_id ?>" <?php if(isset($result['0']->pay_curr ) && $value->cur_id == $result['0']->pay_curr){ echo "selected='selected'"; } ?>><?php echo $value->country ?> </option>
				<?php				
					}
				?>
				</select><span style="color:#FF0000;"> <?php echo form_error('currency');?></span>
    </td>
  </tr>
  <tr>
    <td>Maximum Payment (HKD):</td><td><input type='text' name='maxpayment' value='<?php if(isset($result['0']->max_pay)){ echo $result['0']->max_pay; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  
  <tr>
    <td>Bank Address1:</td><td><input type='text' name='bankadd1' value='<?php if(isset($result['0']->bank_add1)){ echo $result['0']->bank_add1; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Bank Address2:</td><td><input type='text' name='bankadd2' value='<?php if(isset($result['0']->bank_add2)){ echo $result['0']->bank_add2; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Bank Country:</td><td><select name='country' class="table_body_color_filed">
   <option value="">Select Country </option>
   <!-- <option> <?php if (isset($result['0']->bank_country)){echo $result['0']->bank_country;}else { echo "Select Country";  } ?> </option>-->
            <?php
            $country = $this->Supplier_Model->country_list();
            
            for($iii=0;$iii<count($country);$iii++)
            {
            ?>
            <option  value="<?php  echo $country[$iii]->name;  ?>"  <?php if(isset($result[0]-> bank_country) && $country[$iii]->name == $result[0]-> bank_country){ echo "selected='selected'"; } ?>><?php  echo $country[$iii]->name;  ?></option>
            <?php	
            }
            ?>
    </select></td>
  </tr>
  <tr>
    <td>Bank State/ Province:</td><td><input type='text' name='bankstate' value='<?php if(isset($result['0']->bank_state)){ echo $result['0']->bank_state; } ?>'  class="table_body_color_filed"/></td>
  </tr>
  <tr>
    <td>Bank City:</td><td><input type='text' name='bankcity' value='<?php if(isset($result['0']->bank_city)){ echo $result['0']->bank_city; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr>
    <td>Postal/ Zip code:</td><td><input type='text' name='postal' value='<?php if(isset($result['0']->postal_code)){ echo $result['0']->postal_code; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr>
    <td>Tax Id/ sse:</td><td><input type='text' name='taxidsse' value='<?php if(isset($result['0']->tax_id_sse)){ echo $result['0']->tax_id_sse; } ?>' class="table_body_color_filed" /></td>
  </tr>
  <tr align="center"><td colspan='2'><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png"  /></td></tr>
</table>
</form>

</div>
<!--
<div class="tab_right_section">
    <table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  
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
</form>-->
    
  </div>
  

</div>

<!--<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
</script>-->
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
