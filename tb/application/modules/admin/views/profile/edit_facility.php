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
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Accommodation Facilities </a></li>
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
