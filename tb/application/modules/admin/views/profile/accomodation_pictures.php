<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR_FRONT ?>css/uploadify.css">
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery.uploadify-3.1.min.js"></script>
<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery.uploadify-3.1.js"></script>
<!--<script type="text/javascript" src="<?php echo WEB_DIR; ?>designAccess/engine1/jquery.js"></script>-->

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
/*jQuery(function() {
	//alert('zdjvndkj'); 
	$('#uploadFile').uploadify(	{
		
		'formData'      : {'supppp_id' : <?php echo $this->uri->segment(3); ?>, 'propppp_id' : <?php echo $this->uri->segment(4); ?>},
		'buttonImage' : '<?php echo WEB_DIR_FRONT ?>images/upload_bt.png',
		'swf'		:	'<?php echo WEB_DIR_FRONT ?>admin/uploadify.swf',
		'uploader'	:	'<?php echo WEB_URL; ?>index/uploadify',	
		'multi'		:	true,
		'auto'		:	true,
		'progressData' : 'percentage',	
		'onUploadSuccess' : function(file, data, response) {
			//alert(data);
			getPhotos(<?php echo $this->uri->segment(4); ?>);
			}			
	});
	$('#uploadFile').uploadify('settings','buttonText','Upload');
});*/
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
                     <!-- <script src="<?php echo WEB_DIR ?>jquery.js"></script>-->
                      
                      <script language="javascript1.5" type="text/javascript">
				
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
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"  > Contact Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Detail Location </a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">

<div id="containerdount">

    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Photo Gallery</div>
    
    <!--<div style="text-align:right; padding-bottom:5px; font-weight:bold; border-bottom:1px #666 solid; float:right;">  
    <!--<div class="mediaUploadBar" align="right">
     Upload a valid file with extension JPG, JPEG, PNG, GIF.&nbsp;
   	 <div class="uploadData" style="float:right; margin-top:-4px;">--><br/><br/><br/>
<form action="<?php echo WEB_URL; ?>index/uploadify/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4);?>" enctype="multipart/form-data" method="post">
   	 	<input type="file" name="Filedata" id="uploadFile" /> <input type="submit" value="submit" name="submit"/>
   	 </form></div>
 	<!--</div>
    </div>-->
    
    <div style="float:left; margin-left:5px; margin-top:20px; clear:both;">
    <form action="<?php echo WEB_URL; ?>index/set_acco_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" method="post">
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
