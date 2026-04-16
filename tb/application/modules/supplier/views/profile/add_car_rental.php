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
fields = 0;
function addInput() {
	alert('fjdksf');
if (fields != 10) {

//$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" size="8"/></div></td></tr></table>');

$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left:-32px;font-size:13px;"> From Days<input type="text" id="from_days[]" name="from_days[]" size="7"/>&nbsp;
                    To Days<input type="text" id="to_days[]" name="to_days[]" size="7"/>
                    Rate Per Day<input type="text" id="rate_per_day[]" name="rate_per_day[]" size="7"/></div></td></tr></table>');

fields += 1;
} else {
$("#rows").append('<br />Only 10 upload fields allowed.');
document.form1.add.disabled=true;
}
}
</script>
<script language="javascript">
nights = 0;
function addNights() {
if (nights != 10) {

//$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" size="8"/></div></td></tr></table>');

$("#rowsNight").append('<table><tr><td><div style="padding-top:2px; margin-left:-32px;font-size:13px;">From Days<input type="text" name="from_days[]" size="7"/> &nbsp;To Days<input type="text" name=to_days[]" size="7"/>&nbsp;Rates Per Day: <input type="text" name="rates_per_day[]" id="rates_per_day[]" style="width:50px" value="" /></div></td></tr></table>');

nights += 1;
} else {
$("#rowsNight").append('<br />Only 10 upload fields allowed.');
document.form1.addnights.disabled=true;
}
}
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
<li><a href="<?php echo WEB_URL;?>index/rate_tactics_list/<?php echo $this->uri->segment(3)?>" >Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>">Accounting </a></li>
<li><a href="<?php echo WEB_URL;?>index/car_rental/<?php echo $this->uri->segment(3)?>" id="tabs_active">Car Rental </a></li>
</ul>
</div>
</div>
<div class="hotelnames_signin" style="min-height:329px;">
<!--<div id="mybook-tit">Inventory Management</div>-->

         		
<!-- the tabs -->

<!-- tab "panes" -->
<div class="panes">
<div style="margin-left:532px; margin-top:22px; position:absolute; margin-bottom:10px;">
    <form action='<?php echo WEB_URL; ?>index/add_matrix/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>' method='post'>    
    <table>
    <tr><td>
    Add Matrix
    </td>
    <td>
    <input type='text' name='matrix'  required  value='' />
    <input type='submit' name='submit' value='Add' />
    </td>
    </tr>
    </table> 
    </form>
    <form action='<?php echo WEB_URL; ?>index/add_car_type/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>' method='post'>    
    <table>
    <tr><td>
    Add Car Type
    </td>
    <td>
    <input type='text' name='car_type'  required  value='' />
    <input type='submit' name='submit' value='Add' />
    </td>
    </tr>
    </table> 
    </form>
    </div>
	
  <div id="containerdount"  class="tab1" style="padding-top:40px;">
  
   
    
  <div style="float:right; height:25px;"><a href="<?php echo site_url('index/add_car_rental_details/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" style="color:#099;">Back</a></div>
  
  
  
   
    <div style="font-weight:normal; float:left; margin-left:20px; font-size:16px;">Car Rental Information</div>
    <br />
    <div style="float:left; margin-left:20px; clear:both;">
    
    <form name="form1" action="<?php echo WEB_URL; ?>index/add_rate_plan/<?php echo $this->uri->segment(3); ?>" method="post">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
            <tr height="35">
            <td width="30%"> Matrix </td>
            <td width="77%"><select name='season' id='season' style="width:150px;">
                <option value="">Select</option>
                <?php  $car = $this->Supplier_Model->get_matrix($this->uri->segment(3));
                if(isset($car[0]->sup_car_matrix_id))
                    {
                    for($i=0;$i<count($car);$i++){
                    ?>
                      <option value="<?php echo $car[$i]->sup_car_matrix_id; ?>"<?php if(isset($car[$i]->sup_car_matrix_id)){ echo "selected='selected'"; } ?>><?php echo $car[$i]->matrix; ?></option>
                    <?php	
                    }
                    }
                    ?>      
                </select>
            </td>
            </tr>
             <tr height="35">
            <td width="30%">Model / Car Type</td>
            <td width="77%"><select name='season' id='season' style="width:150px;">
                <option value="">Select</option>
                <?php  $car = $this->Supplier_Model->get_car_type($this->uri->segment(3));
                if(isset($car[0]->sup_car_type_id ))
                    {
                    for($i=0;$i<count($car);$i++){
                    ?>
                      <option value="<?php echo $car[$i]->sup_car_type_id ;?>"<?php if(isset($car[$i]->sup_car_type_id )){ echo "selected='selected'"; } ?>><?php echo $car[$i]->car_type ; ?></option>
                    <?php	
                    }
                    }
                    ?>      
                </select>
            </td>
            </tr>

            <tr height="35">
                <td>Number of Doors:</td>
                <td><select name="no_of_doors" id="no_of_doors" style="width:150px;">
                     <option value="">Select Doors</option>
                      <option value="1" >1</option>
                      <option value="2" >2</option>
                      <option value="3" >3</option>
                      <option value="4" >4</option>
                      <option value="4" >5</option> 
                      <option value="4" >6</option>
                    </select><span style="color:#FF0000;"> <?php echo form_error('occupancy');?></span></td>
            </tr>
            <tr height="35">
                <td>Number of passengers </td>
                <td><select name="no_of_passengers" id="no_of_passengers" style="width:150px;">
                      <option value="">select Passengers</option>
                      <option value="1" >1</option>
                      <option value="2" >2</option>
                      <option value="3" >3</option>
                      <option value="4" >4</option>
                      <option value="4" >5</option>
                      <option value="4" >6</option>
                      <option value="4" >7</option>
                      <option value="4" >8</option>
                      <option value="4" >9</option>
                      <option value="4" >10</option>
                    </select><span style="color:#FF0000;"> <?php echo form_error('adult');?></span></td>
            </tr>
     		 <tr>
                <td valign="top">Rates Per Day: </td>
                <td style="color:#999;"></td>
            </tr>
            <tr>
                <td valign="top">&nbsp; </td>
                <td style="font-size:13px;">
                  
                    From Days<input type="text" id="from_days[]" name="from_days[]" size="7"/>&nbsp;
                    To Days<input type="text" id="to_days[]" name="to_days[]" size="7"/>
                    
                    Rates Per Day: <input type="text" name="rates_per_day[]" id="rates_per_day[]" style="width:50px" value="" />
                    &nbsp;<input type="button" onclick="addNights()" name="addnights" value="+ Add" />
                	</td>
            </tr>
          <tr>
                <td>&nbsp;</td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td id="rowsNight" align="left">
                    </td>
                  </tr>
                </table>
                </td></tr>
            <tr height="35">
            
                <td valign="top">Currency:</td>
                <td><input type="text" name="currency" size="20" /></td>
            </tr>
            <tr height="35">
            
                <td valign="top">PAI:</td>
                <td><input type="text" name="pai" size="20" /></td>
            </tr>
             <tr height="35">
            
                <td valign="top">Minimum Rental Period:</td>
                <td><input type="text" name="pai" size="20" /></td>
            </tr>
             <tr height="35">
            
                <td valign="top">Rates Inclusion:</td>
                <td><input type="text" name="pai" size="20" /></td>
            </tr>
            <tr>
                <td valign="top">Insurance Access:</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr>
            <tr>
                <td valign="top">Rate Exclusions :</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr>
            <tr>
                <td valign="top">Security:</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr>
             <tr>
                <td valign="top">Fuel policy:</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr>
             <tr>
                <td valign="top">Public Holidays:</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr>
             <tr>
                <td valign="top">AirPort-off Charges:</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr> 
            <tr>
                <td valign="top">Driving Licence Qualification:</td>
                <td><input type="text" name="pai" size="20" /></td>
            </tr>
             <tr>
                <td valign="top">Minimum Driver Age:</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr>
             <tr>
                <td valign="top">AirPort-off Charges:</td>
                <td><textarea name="cancel_policy_desc" id="cancel_policy_desc" cols="50" rows="4"></textarea></td>
            </tr>
            	<tr>
                <td>&nbsp;</td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td id="rowsNight" align="left">
                    </td>
                  </tr>
                </table>
                </td></tr>
                
            
            
        </table>
    <!--</form>   
        
    <form action="<?php echo WEB_URL; ?>index/maintain_by_month/<?php echo $this->uri->segment(3); ?>" method="post">-->

    <input type="hidden" id="apartfec_val" name="apartfec_val" value=""/>
    <input type="hidden" name="month" id="month" value=""/>
    <input type="hidden" name="year" id="year" value=""/>   
    <div style="margin-top:5px;">
    <table style="" width="100%">
    <tr>
    <td width="250"><!--Select Category and Plan Type--></td>
    <td width="2"></td>
   
    <td width="2"></td>
    <td width="120"></td>
    <td width="10"></td>
    <td width="232">
    </td>
    </tr>
    
    
    </table>
    
    <table>
        <tr>
       
        <td id="rows1"></td>
        
        </tr>
       
        </table>
    
    
    </div>
        
    
    <div id="filtering" style="coloir:#fff; width:100%; background:#f8f8f8; display:none;">
    <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic">
    
    <tr style="background:#243419"  height="45">
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-top:3px; color:#fff; padding-left:0px;">Smart Update</td>
    
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="price" id="price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="extra_bed_price" id="extra_bed_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="avail" id="avail" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><select name="adult" id="adult" style="width:60px;">
                          <option value="">Adults</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><select name="child" id="child" style="width:60px;">
                          <option value="">Childs</option>
                          <option value="0">0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select></td>
     <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="child_price" id="child_price" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="infant" id="infant" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input name="sup_charge" id="sup_charge" type="text" class="input-field"  style="height:20px; margin-top:3px; background:#F2F2F2;" size="5"/></td>
    <td style="border-right:solid 1px #deab6f; text-align:center; padding-left:0px;"><input type="button" value="Update" style="margin-top:3px;" onclick="check_new();"/></td>
    </tr>
    
    <tr height="30" style="font-size:12px;">
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Dates</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Per Night Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Extra Bed Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Available Rooms</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Adults</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Childs</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Child Charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:10%; padding-left:0px;">Infants</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:11%; padding-left:0px;">Supplementary charge</td>
    <td style="border-right:solid 1px #f8d1a3; text-align:center; width:9%; ">&nbsp;</td>
    </tr>
    </table>

<!--<form action="<?php echo WEB_URL; ?>index/add_maintain_month/<?php echo $this->uri->segment(3); ?>" method="post">-->

<table  width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="display tableStatic" style="background:#fff; margin-top:0px;">

<tr><td>&nbsp;</td></tr>
<span id="monthDates"></span>
<tr>
    <td height="30" style="color:red;">Once you finish all settings please click the "Save" button to save.</td>
</tr>
<input type="hidden" name="cnt" value=""/>
<input type="hidden" name="from" id="from" value=""/>
<input type="hidden" name="to" id="to" value=""/>
<input type="hidden" name="room_id" id="room_id" value=""/>
<input type="hidden" name="capacity" id="capacity" value=""/>

<input type="hidden" name="on_req_checked" id="on_req_checked"/>
<input type="hidden" name="on_arr_checked" id="on_arr_checked"/>
<input type="hidden" name="on_blk_checked" id="on_blk_checked"/>
</table>
<div style="clear:both; height:1px;"></div>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
    <td align="center"><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
</tr>
<tr>
	<td height="20" colspan="2">&nbsp;</td>
</tr>
</table>
</div>
</form>
    
    
    </div>

    
  </div>
 
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