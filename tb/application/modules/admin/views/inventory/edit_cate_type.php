<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
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
$sup_id = $this->uri->segment(3);
$prop_id = $this->uri->segment(4);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accounting </a></li>


</ul>
<?php
}
else
{
?>
	<ul class="tabs1">
    <li><a href="javascript:void(0)" >Hotel Details </a></li>
    <li><a href="javascript:void(0"id="tabs_active">Inventory Management </a></li>
    <li><a href="">Booking Details </a></li>

	</ul>
<?php
}
?>
</div>
</div>

<div id="navjam">
<ul class="tabs">
<li><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Category Type</a></li>
<li><a href="<?php echo site_url('index/rate_tactics_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Room Rates</a></li>
<!--<li><a href="<?php echo site_url('index/maintain_month_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Maintain by Month</a></li>
--><li><a href="<?php echo site_url('index/open_close_dates/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Open/Close Dates</a></li>
<li><a href="<?php echo site_url('index/house_rules/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Supplier Policy</a></li>
<li><a href="<?php echo site_url('index/extra_service/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Extra Services</a></li>
<li><a href="<?php echo site_url('index/early_bird/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Early Bird Promotion</a></li>
<li><a href="<?php echo site_url('index/view_allotment_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4)?>">Allotment</a></li>
</ul>

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">

<div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Category Information</div>
    <br />
     <div style="float:right; height:25px; clear:both"><a href="<?php echo site_url('index/inventory_category_list/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $prop_id; ?>" style="color:#099;">Back</a></div>
    <div style="float:left; margin-left:20px;">
    
   <form action="<?php echo WEB_URL; ?>index/edit_cate_type/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>/<?php echo $this->uri->segment(5); ?> " method="post">
    <table width="100%" border="0" cellspacing="1" cellpadding="0">
    
    <tr height="35">
    <td width="300">Category type:</td>
    <td><select name='cate_type' id='cate_type' style="width:150px;">
        <option value="">Select</option>
        <?php
        $cate = $this->Supplier_Model->get_cate_type();
        if(isset($cate[0]->cate_type_id))
            {
            for($i=0;$i<count($cate);$i++){
            ?>
              <option value="<?php echo $cate[$i]->cate_type; ?>"<?php if($cate[$i]->cate_type == $cat_details->cate_type){ echo "selected='selected'"; } ?>><?php echo $cate[$i]->cate_type ?></option>
            <?php	
            }
            }
            ?>          
        </select><span style="color:#FF0000;"> <?php echo form_error('cate_type');?></span></td>
    </tr>
    
    <tr height="35">
    <td width="300">Category Name:</td>
    <td><input type="text" id="room_type" name="room_type" value="<?php if( isset($cat_details->room_type)) echo $cat_details->room_type; ?>" />&nbsp;&nbsp;
    Eg: Single, Double, Triple </td>
    </tr>
    
    <tr height="35">
    <td width="300">Maximum Occupancy:</td>
    <td><input type="text" id="max_person" name="max_person" value="<?php if( isset($cat_details->max_person)) echo $cat_details->max_person; ?>" /></td>
    </tr>
    
    <tr height="35">
    <td width="300">Adults:</td>
    <td><input type="text" id="adults" name="adults"value="<?php if( isset($cat_details->adults)) echo $cat_details->adults; ?>" />&nbsp; </td>
    </tr>
    
    <tr height="35">
    <td width="300">Childs:</td>
    <td><input type="text" id="childs" name="childs"value="<?php if( isset($cat_details->childs)) echo $cat_details->childs; ?>" />&nbsp; </td>
    </tr>
    
    <tr height="35">
    <td width="300">Infants:</td>
    <td><input type="text" id="infants" name="infants"value="<?php if( isset($cat_details->infants)) echo $cat_details->infants; ?>" />&nbsp; </td>
    </tr>
    
    <tr height="35">
    <td width="300">Extra Bed:</td>
    <td><input type="text" id="extra_bed" name="extra_bed" value="<?php if( isset($cat_details->extra_bed)) echo $cat_details->extra_bed; ?>" />&nbsp; 
    <!--<input type="button" onclick="addInput()" name="add" value="Add More" />--></td>
    </tr>
    
    <!--<?php 
		if( isset($cat_details->sup_inv_cate_type_id)){
			$sup_inv_cate_list=$this->Supplier_Model->sup_inv_cate_list($cat_details->sup_inv_cate_type_id); 
			if(isset($sup_inv_cate_list[0]->type_name))
			{
				for($i=0;$i<count($sup_inv_cate_list);$i++)
				{
					 ?>
					<tr height="35">
                        <td width="300"> <input type="text" id="type_name" name="type_name[]"value="<?php echo $sup_inv_cate_list[$i]->type_name; ?>" />:</td>
                        <td><input type="text" id="type_value" name="type_value[]"value="<?php echo $sup_inv_cate_list[$i]->type_value; ?>" /></td>
                    </tr>
                    <?php
				}
			}
		}
	?>
    
    <tr>
    <td colspan="2">
    <table>
    <span id="rows"></span>
    </table>
    </td></tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr style="color:#999;">
    <td>Eg:</td>
    <td>&nbsp;</td>
    </tr>
    <tr style="color:#999;">
    <td>No of Rooms</td>
    <td>5</td>
    </tr>
    
            <tr height="35">
                <td width="300">Name of room type:</td>
                <td><input type="text" id="room_type" name="room_type" value="<?php echo $cat_details->room_type; ?>" /><span style="color:#FF0000;"> <?php echo form_error('room_type');?></span></td>
            </tr>
            <tr height="35">
                <td>Maximum Person:</td>
                <td><input type="text" id="max_person" name="max_person" value="<?php echo $cat_details->max_person; ?>" /><span style="color:#FF0000;"> <?php echo form_error('max_person');?></span></td>
            </tr>
            <tr height="35">
                <td>No of Bathrooms:</td>
                <td><input type="text" id="bath_rooms" name="bath_rooms" value="<?php echo $cat_details->bath_rooms; ?>"/><span style="color:#FF0000;"> <?php echo form_error('bath_rooms');?></span></td>
            </tr>
            <tr height="35">
                <td>Room Size: </td>
                <td><input type="text" id="room_zize" name="room_zize" value="<?php echo $cat_details->room_size; ?>"/> &nbsp;Sq. feet<span style="color:#FF0000;"> <?php echo form_error('room_zize');?></span></td>
            </tr>
            <tr height="35">
                <td>No of Bed Rooms:</td>
                <td><input type="text" id="bed_rooms" name="bed_rooms" value="<?php echo $cat_details->bed_rooms; ?>"/><span style="color:#FF0000;"> <?php echo form_error('bed_rooms');?></span></td>
            </tr>
            <tr height="35">
                <td>Is Building Terrace:</td>
                <td><input type="radio" id="terrace" name="terrace" value="1" <?php if($cat_details->building_terrace == 1) { echo "checked='checked' "; } ?>  /> Yes &nbsp;&nbsp;<input type="radio" id="terrace" name="terrace" value="0" <?php if($cat_details->building_terrace == 0) { echo "checked='checked' "; } ?> /> No</td>
            </tr>
            <tr height="35">
                <td>No of floors: </td>
                <td><input type="text" id="floors" name="floors" value="<?php echo $cat_details->floors; ?>"/><span style="color:#FF0000;"> <?php echo form_error('floors');?></span></td>
            </tr>-->
        </table>
        
      <!--  <div style="font-weight:bold; float:left; margin:10px 0px 5px 0px;">Space Facilities:</div>     
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-left:20px;">
        <tr>
        <td class="border-bottom" valign="top">
        <?php
        $space_faci = $this->Supplier_Model->inventory_category_space_facilities();
        for($i=0;$i<count($space_faci);$i++)
        {
        ?> 
            <input type="checkbox" name="space_faci[]" id="space_faci[]" value="<?php echo $space_faci[$i]->space_fac_id; ?>" <?php if($sup_space_faci = $this->Supplier_Model->supplier_space_facilities($id, $space_faci[$i]->space_fac_id)) { echo "checked='checked'"; } ?> />&nbsp;<label><?php echo $space_faci[$i]->space_fac_name; ?></label>&nbsp;<br>
        <?php	
        }
        ?>
        </td>
        </tr>
        </table>-->
    
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
