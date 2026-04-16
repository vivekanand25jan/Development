<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR_FRONT ?>script/jquery.js"></script>

<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/themes/base/jquery.ui.all.css">
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR_FRONT; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR_FRONT; ?>datepickernew/demos.css">

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
<script language="javascript">
nights = 0;
function addNights() {
if (nights != 10) {

//$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" size="8"/></div></td></tr></table>');

$("#rowsNight").append('<table><tr><td><div style="padding-top:2px; margin-left:-6px;font-size:13px;">From Days &nbsp; <input type="text" name="from_days[]" size="7"/> &nbsp;To Days&nbsp;<input type="text" name=to_days[]" size="7"/>&nbsp;Rates Per Day: <input type="text" name="rates_per_day[]" id="rates_per_day[]" style="width:50px" value="" /></div></td></tr></table>');

nights += 1;
} else {
$("#rowsNight").append('<br />Only 10 upload fields allowed.');
document.form1.addnights.disabled=true;
}
}
</script>
<script language="javascript">
nights = 0;
function addDays() {
if (nights != 10) {

//$("#rows").append('<table><tr><td><div style="padding-top:2px; margin-left: -17px;">Charge &nbsp; <input type="text" name="cancel_policy_percent[]" size="8"/>% &nbsp;or&nbsp;&nbsp; <input type="text" name="cancel_policy_charge[]" size="8"/>amt &nbsp;&nbsp; Date From&nbsp; <input type="text" name="cancel_policy_from[]" size="8"/> &nbsp;To&nbsp; <input type="text" name="cancel_policy_to[]" size="8"/></div></td></tr></table>');

$("#rowsDay").append('<table><tr><td><div style="padding-top:2px; margin-left:-8px;font-size:13px;"> Days &nbsp;<input type="text" id="cancel_no_of_days[]" name="cancel_no_of_days[]" size="7"/>&nbsp; Charge &nbsp;<input type="text" id="cancel_charge[]" name="cancel_charge[]" size="7"/> &nbsp; Amt</div></td></tr></table>');

nights += 1;
} else {
$("#rowsDay").append('<br />Only 10 upload fields allowed.');
document.form1.adddays.disabled=true;
}
}
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

<ul class="tabs1">

<li><a href="<?php echo WEB_URL;?>index/car_rental" id="tabs_active">Car Rental </a></li>

</ul>
</div>
</div>



<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">
 <div style="float:right; height:25px; margin-top:10px ;"><a href="<?php echo site_url('index/view_car_rental_details')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099;">Back</a></div>
 
 
   
<div style="margin-top:20px;">
    
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/update_car_rental/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post" enctype="multipart/form-data">
    
    <?php 
	$supplier_id= $this->Supplier_Model->get_sup_select_type($car_rental->sup_car_rental_id); 
	
	?>
    <table width="780" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Car Rental Information</h4></caption>
     <tr height="35">
       <td width="30%">Supplier Name</td>
       <?php  $sup = $this->Supplier_Model->get_supplier_name(); ?>
       <td width="77%"> <select name="supplier_name[]" id="supplier_name" style="width:170px;" multiple="multiple" >
                             <option value="">Select</option>
                              <?php
                            if(isset($sup[0]->agent_id))
                             {
                            for($i=0;$i<count($sup);$i++){
                            ?>
                            <option value="<?php echo $sup[$i]->agent_id; ?>" <?php for($j=0;$j<count($supplier_id); $j++) if($sup[$i]->agent_id == $supplier_id[$j]->sup_id) { echo "selected='selected'"; } ?> ><?php echo $sup[$i]->company_name.'-'.$sup[$i]->city; ?></option>
                            <?php	
                            }
                            }
                            ?>   
       					</select>
       </td>
       </tr>   
     
  <tr height="35">
            <td width="30%"> Code </td>
            <td width="77%">
             <?php  $cate = $this->Supplier_Model->get_matrix();
				//print'<pre>';print_r($car);exit; ?>
            <select name='matrix' id='matrix' style="width:150px;">
                <option value="">Select</option>
               <?php
                if(isset($cate[0]->sup_car_matrix_id))
                    {
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <option value="<?php echo $cate[$i]->sup_car_matrix_id; ?>" <?php if($cate[$i]->sup_car_matrix_id == $car_rental->matrix){ echo "selected='selected'"; } ?>><?php echo $cate[$i]->matrix; ?></option>
                    <?php	
                    }
                    }
                    ?>     
                </select>
            </td>
            </tr>
             <tr height="35">
            <td width="30%">Model / Car Type</td>
            <td width="77%">
             <?php  $car = $this->Supplier_Model->get_car_type(); ?>
            <select name='car_type' id='car_type' style="width:150px;">
                <option value="">Select</option>
               <?php
                if(isset($car[0]->sup_car_type_id ))
                    {
                    for($i=0;$i<count($car);$i++){
						
                    ?>
                     <option value="<?php echo $car[$i]->sup_car_type_id; ?>" <?php if($car[$i]->sup_car_type_id == $car_rental->car_type){ echo "selected='selected'"; } ?>><?php echo $car[$i]->car_type; ?></option>
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
                     <?php
                    for($j=1;$j<=6;$j++){
                    ?>
                      <option value="<?php echo $j; ?>" <?php if($j == $car_rental->no_of_doors){ echo "selected='selected'"; } ?>><?php echo $j; ?></option>
                     
                      <?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('no_of_doors');?></span></td>
            </tr>
            <tr height="35">
                <td>Number of passengers </td>
                <td><select name="no_of_passengers" id="no_of_passengers" style="width:150px;">
                       <?php
                    for($j=1;$j<=10;$j++){
                    ?>
                      <option value="<?php echo $j; ?>" <?php if($j == $car_rental->no_of_passengers){ echo "selected='selected'"; } ?>><?php echo $j; ?></option>
                     
                      <?php	
                    }
                    ?>
                    </select><span style="color:#FF0000;"> <?php echo form_error('no_of_passengers');?></span></td>
            </tr>
     		 <tr>
                <td valign="top">Rates Per Day: </td>
                <td style="color:#999;"></td>
            </tr>
            <tr>
                <td valign="top">&nbsp; </td>
                <td style="font-size:13px;">
                  <?php $package_days=$this->Supplier_Model->get_car_rental_rates($car_rental->sup_car_rental_id); 
                  		//print '<pre />';print_r($package_days);exit;
               		 if(isset($package_days[0]->sup_car_rental_id )) {
						 
						for($i=0;$i<count($package_days);$i++){  ?>
                   		 From Days &nbsp;<input type="text" id="from_days[]" name="from_days[]" value="<?php echo $package_days[$i]->from_days; ?>" size="7"/>&nbsp;
                    		To Days &nbsp;<input type="text" id="to_days[]" name="to_days[]"  value="<?php  echo $package_days[$i]->to_days; ?>" size="7"/>
                    
                    		Rates Per Day: <input type="text" name="rates_per_day[]"  id="rates_per_day[]" style="width:50px" value="<?php echo $package_days[$i]->rates_per_day; ?>" /></br>
                    <?php } } ?>
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
                <td><input type="text" name="currency" size="20" value="<?php  if(isset($car_rental->currency)) echo $car_rental->currency; ?>" /></td>
            </tr>
            <tr height="35">
            
                <td valign="top">PAI:</td>
                <td><input type="text" name="pai" size="20" value="<?php if(isset($car_rental->pai)) echo $car_rental->pai; ?>" /></td>
            </tr>
             <tr height="35">
            
                <td valign="top">Minimum Rental Period:</td>
                <td><input type="text" name="min_rental_period" size="30" value="<?php if(isset($car_rental->min_rental_period))  echo $car_rental->min_rental_period; ?>" /></td>
            </tr>
             <tr height="35">
            
                <td valign="top">Rates Inclusion:</td>
                <td><input type="text" name="rates_inclusion" size="30"  value="<?php  if(isset($car_rental->rates_inclusion))  echo $car_rental->rates_inclusion; ?>"/></td>
            </tr>
            <tr  height="35">
                <td valign="top">Insurance Access:</td>
                <td><textarea name="insurance_access" id="insurance_access" cols="50" rows="4"><?php if(isset($car_rental->insurance_access))  echo $car_rental->insurance_access; ?></textarea></td>
            </tr>
            <tr  height="35">
                <td valign="top">Rate Exclusions :</td>
                <td><textarea name="rates_exclusions" id="rate_exclusions" cols="50" rows="4"><?php if(isset($car_rental->rates_exclusions))  echo $car_rental->rates_exclusions; ?></textarea></td>
            </tr>
            <tr  height="35">
                <td valign="top">Security:</td>
                <td><textarea name="security" id="security" cols="50" rows="4"><?php  if(isset($car_rental->security))  echo $car_rental->security; ?></textarea></td>
            </tr>
            
             <tr  height="35">
                <td valign="top">Fuel policy:</td>
                <td><textarea name="fuel_policy" id="fuel_policy" cols="50" rows="4"><?php if(isset($car_rental->fuel_policy))  echo $car_rental->fuel_policy; ?></textarea></td>
            </tr>
             <tr  height="35">
                <td valign="top">Public Holidays:</td>
                <td><textarea name="public_holidays" id="public_holidays" cols="50" rows="4"><?php if(isset($car_rental->public_holidays))  echo $car_rental->public_holidays; ?></textarea></td>
            </tr>
             <tr  height="35">
                <td valign="top">Airport off-hire charges:</td>
                <td><textarea name="airport_off_charges" id="airport_off_charges" cols="50" rows="4"><?php if(isset($car_rental->airport_off_charges))  echo $car_rental->airport_off_charges; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Driving Licence Qualification:</td>
                <td><input type="text" name="driving_quali" size="30" value="<?php if(isset($car_rental->driving_quali))  echo $car_rental->driving_quali; ?>" /></td>
            </tr>
             <tr  height="35">
                <td valign="top">Minimum Driver Age:</td>
                <td><input type="text" name="driving_age" size="30"  value="<?php if(isset($car_rental->driving_age))  echo $car_rental->driving_age; ?>"/></td>
            </tr>
            <tr  height="35">
                <td valign="top">Additional Driver:</td>
                <td><input type="text" name="additional_driver" size="30"  value="<?php if(isset($car_rental->additional_driver))  echo $car_rental->additional_driver; ?>"/></td>
            </tr>
             <tr  height="35">
                <td valign="top">Driving Restrictions:</td>
                <td><textarea name="driving_restrictions"  cols="50" rows="4"><?php if(isset($car_rental->driving_restrictions))  echo $car_rental->driving_restrictions; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Non coverage:</td>
                <td><textarea name="non_coverage"  cols="50" rows="4"><?php if(isset($car_rental->non_coverage))  echo $car_rental->non_coverage; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Break Down Procedure:</td>
                <td><textarea name="break_down_procedure"  cols="50" rows="4"><?php if(isset($car_rental->break_down_procedure))  echo $car_rental->break_down_procedure; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Toll Fee:</td>
                <td><input type="text" name="toll_fee" size="30" value="<?php if(isset($car_rental->toll_fee))  echo $car_rental->toll_fee; ?>" /></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Parking Fee:</td>
                <td><input type="text" name="parking_fee" size="30"  value="<?php if(isset($car_rental->parking_fee))  echo $car_rental->parking_fee; ?>"/></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Special Equipment:</td>
                <td><textarea name="special_equipment"  cols="50" rows="4" ><?php if(isset($car_rental->special_equipment))  echo $car_rental->special_equipment; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Driving Across Border:</td>
                <td><textarea name="driving_across_border"  cols="50" rows="4"><?php if(isset($car_rental->driving_across_border))  echo $car_rental->driving_across_border; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Deliviary / Collection Charges:</td>
                <td><textarea name="collection_charges"  cols="50" rows="4"><?php if(isset($car_rental->collection_charges))  echo $car_rental->collection_charges; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Oman off hire Charge:</td>
                <td><input type="text" name="oman_off_hire_charge" size="30"  value="<?php if(isset($car_rental->oman_off_hire_charge))  echo $car_rental->oman_off_hire_charge; ?>"/></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Chaufer Service:</td>
                <td><input type="text" name="chaufer_service" size="30"  value="<?php if(isset($car_rental->chaufer_service))  echo $car_rental->chaufer_service; ?>"/></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Late Return:</td>
                <td><textarea name="late_return"  cols="50" rows="4"><?php if(isset($car_rental->late_return))  echo $car_rental->late_return; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Allocations:</td>
                <td><textarea name="allocations"  cols="50" rows="4"><?php  if(isset($car_rental->allocations))  echo $car_rental->allocations; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Black Out dates:</td>
                <td><textarea name="black_out_dates"  cols="50" rows="4"><?php if(isset($car_rental->black_out_dates))  echo $car_rental->black_out_dates; ?></textarea></td>
            </tr> 
             <tr  height="35">
                <td valign="top">Cancellation Policy:</td>
                <td>
                
                <?php if(isset($package_days[0]->sup_car_rental_id )) { 
						for($i=0;$i<count($package_days);$i++){
				?>
                 Days &nbsp;<input type="text" id="cancel_no_of_days[]" name="cancel_no_of_days[]" size="7" value="<?php echo $package_days[$i]->cancel_no_of_days; ?>"/>&nbsp;
                     Charge &nbsp;<input type="text" id="cancel_charge[]" name="cancel_charge[]" size="7" value="<?php  echo $package_days[$i]->cancel_charge; ?>"/> &nbsp; Amt</br>
                     	<?php  } } ?>
                    &nbsp;<input type="button" onclick="addDays()" name="adddays" value="+ Add" />
					
				
					</td>
            </tr> 
             <tr>
                <td>&nbsp;</td>
                <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td id="rowsDay" align="left">
                    </td>
                  </tr>
                </table>
                </td>
            </tr>
            <tr  height="35">
                <td></td>
                <td><textarea name="cancellation_charges"  cols="50" rows="4"><?php if(isset($car_rental->cancellation_charges)) echo $car_rental->cancellation_charges ; ?></textarea></td>
            </tr> 
            
            <tr  height="35">
                <td valign="top">Stop Sale:</td>
                <td><textarea name="stop_sale"  cols="50" rows="4"><?php if(isset($car_rental->stop_sale))  echo $car_rental->stop_sale; ?></textarea></td>
            </tr> 
             <tr  height="35">
                <td valign="top">Upgrade Policy:</td>
                <td><textarea name="upgrade_policy"  cols="50" rows="4"><?php if(isset($car_rental->upgrade_policy))  echo $car_rental->upgrade_policy; ?></textarea></td>
            </tr> 
             <tr  height="35">
                <td valign="top">Image1:</td>
                	<input type="hidden" name="img1_url" value="<?php if(isset($car_rental->image1_url)) echo $car_rental->image1_url; ?>" />
                <td> <input name="image1_url"  type="file"  />
                </br><?php if(isset($car_rental->image1_url)) { ?>
   				<div style="float:left; margin-top:5px; margin-bottom:10px;"> 
   				<img src="<?php echo WEB_DIR_FRONT ?>upload_images/<?php echo $car_rental->image1_url; ?>" width="180" height="120" border="0" />
   				</div>
   				<?php } ?>
                </td>
            </tr> 
            <tr  height="35">
                <td valign="top">Image2:</td>
                <input type="hidden" name="img2_url" value="<?php if(isset($car_rental->image2_url)) echo $car_rental->image2_url; ?>" />
                <td> <input name="image2_url"  type="file" />
                 </br><?php if(isset($car_rental->image2_url)) { ?>
   				<div style="float:left; margin-top:5px; margin-bottom:3px;"> 
   				<img src="<?php echo WEB_DIR_FRONT ?>upload_images/<?php echo $car_rental->image2_url; ?>" width="180" height="120" border="0" />
   				</div>
   				<?php } ?>
                </td>
            </tr> 
            
    </table>

        <?php
            $current_dte = date("d-m-Y",strtotime("+7 days"));
            $next_dte = date("d-m-Y",strtotime("+8 days"));
        ?>
            
   
    
 
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
 <style>
.b2b-AGE_OF2{ width:97px; float: left; color:#fff; font-family:MAIAN; padding:0 0 8px; margin:12px -7px 0 0; color:#000; font-size:12px;}

.check_149{ width:144px; float:right; margin:0 13px 3PX 0; position:relative; left:34px}
</style>