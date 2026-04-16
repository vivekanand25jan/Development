<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>StayAway.com</title>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<!--<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>-->
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR ?>css/uploadify.css">
<script type="text/javascript" src="<?php echo WEB_DIR ?>script/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>script/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR ?>script/jquery.uploadify-3.1.js"></script>

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
<style>
.image-box{width:172px; height:128px; float:left; border:1px solid #ccc; margin:5px; position:relative;}
.checkbox-bg{ position:absolute; width:40px; height:20px; top:4px; left:4px; padding:2px; background-color:#000; }
.img-fix{float:left; margin-top:-20px; margin-left:17px;}
</style>
<script type="text/javascript">
jQuery(function() {
	$('#uploadFile').uploadify(	{
		'swf'		:	'<?php echo WEB_DIR ?>supplier/uploadify.swf',
		'uploader'	:	'<?php echo WEB_URL; ?>index/uploadify',		
		'multi'		:	true,
		'auto'		:	true,
		'progressData' : 'percentage',	
		'onUploadSuccess' : function(file, data, response) {
			//var albumId = data;
			getPhotos();
			}			
	});
	$('#uploadFile').uploadify('settings','buttonText','+ Add Photos');
});
function getPhotos(){ 
	$.post("<?php print WEB_URL ?>index/getImages", {"action":"ViewImages"},
	function(data){  
		if(data != ""){
			$("#getPhotos").html('');
		for(var i=0; i<data.acc_images.length; i++)
		{
			$("#getPhotos").prepend('<div class="image-box" id="pic1"><div><img src="<?php echo WEB_DIR ?>supplier_hotels_images/'+data.acc_images[i].image_name+'" width="165" height="120" border="0" style="margin:4px;" /><div class="checkbox-bg"><span style="float:left;"><input name="imgact[]" id="imgact[]" type="checkbox" value="'+data.acc_images[i].sup_accomodation_pictures_id+'" '+((data.acc_images[i].status =="1" )?"checked":"")+' /></span><span class="img-fix"> <img src="<?php echo WEB_DIR ?>images/b2b-booking-icon.png" width="14" height="14" border="0" style="vertical-align:top; margin-left:5px;" onclick="return delete_pic('+data.acc_images[i].sup_accomodation_pictures_id+');"/></span> </div></div></div>');
		}
		}
		else
		{
			$("#getPhotos").html('<div style="margin-left:350px; color:red;">Upload your accomodation pictures</div>');
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
			alert("Selected picture deleted successfully!");
			//window.location.reload(true);
			getPhotos();
		}
	});
	}
	else{
		return false;
	}
}
getPhotos();

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
<li><a href="javascript:void(0)" id="tabs_active">Property Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
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
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform">General & Contact Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/edit_property_info"> Property Information </a></li>
<li><a href="<?php echo WEB_URL;?>index/insert_facility">Accommodation Facilities </a></li>
<li><a href="<?php echo WEB_URL;?>index/general_settings" id="tabs_active">General Settings </a></li>
<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/"> Accommodation Pictures </a></li>
<li><a href="<?php echo WEB_URL;?>index/detail_location/">Detail Location </a></li>
</ul>
</div>
</div>

<!-- tab "panes" -->
<div class="panes">
  <div id="containerdount"  class="tab1" style="padding-top:30px; margin-top:20px;">
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Accommodation Pictures</div>
    
    <div style="text-align:right; padding-bottom:5px; font-weight:bold; border-bottom:1px #666 solid; float:right;">  
    <div class="mediaUploadBar" align="right">
     Upload a valid file with extension JPG, JPEG, PNG, GIF.&nbsp;
   	 <div class="uploadData" style="float:right;margin-top: -8px;"><input type="file" name="uploadFile" id="uploadFile" /></div>
 	</div>
    </div>
    
    <div style="float:left; margin-left:5px; margin-top:20px; clear:both;">
    <form action="<?php echo WEB_URL; ?>index/set_acco_pictures" method="post">
    <table class="tableStatic" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
    <tr>
        <td width="100%" id="getPhotos">
        </td>
    </tr>
    </tbody>
    </table>
    
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px; clear:both;">
    <tr>
    <td colspan="5" align="center" id="savebutton"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"/></td>
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
<div style="clear:both"></div>
<?php $this->load->view('footer'); ?>
</body>
</html>

 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>