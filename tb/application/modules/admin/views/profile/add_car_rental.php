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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />

	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

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
<script type="text/javascript">

          $(function() {
          $( "#supp_name" ).autocomplete({ //the recipient text field with id #username
          source: function( request, response ) {
			 
            $.ajax({
                url: "<?php echo WEB_URL.'index/get_supplier_name'; ?>",
                dataType: "json",
				minLength: 0,
                data: request,
                success: function(data){
					//alert(data);
                    if(data.response == 'true') {
						
                       response(data.message);
                    }
                },
			select: 
            function(event, data) {
               var terms = split( this.value );
					// remove the current input
					terms.pop();
					// add the selected item
					terms.push( data.item.value );
					// add placeholder to get the comma-and-space at the end
					terms.push( "" );
					this.value = terms.join( ", " );
					return false;                
            },  
            });
        }
    });
});

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
<?php $car_pre_records = $this->Supplier_Model->get_records_of_car(); 
		//print '<pre />';print_r($car_pre_records);exit;
?>	
<div id="containerdount">
 <div style="float:right; height:25px; margin-top:10px ;"><a href="<?php echo site_url('index/view_car_rental_details/')?>/<?php echo $this->uri->segment(3); ?>" style="color:#099;">Back</a></div>
 
 <div style="margin-left:532px; margin-top:22px; position:absolute; margin-bottom:10px;">
    <form action='<?php echo WEB_URL; ?>index/add_matrix/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>' method='post'>    
    <table>
    <tr><td>
    Add Code
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
   
   
<div style="margin-top:20px;">
    
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/insert_car_rental_details/<?php echo $this->uri->segment(3); ?>" method="post" enctype="multipart/form-data">
    
    
    <table width="780" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Car Rental Information</h4></caption>
       <tr height="35">
       <td width="30%">Supplier Name</td>
       <?php  $sup = $this->Supplier_Model->get_supplier_name();
	   			//print '<pre />';print_r($sup);exit;
	    ?>
       <td width="77%"> <select name="supplier_name[]" id="supplier_name" style="width:170px;" multiple="multiple"  required >
                             <option value="">Select</option>
                              <?php
                            if(isset($sup[0]->agent_id))
                             {
                            for($i=0;$i<count($sup);$i++){
                            ?>
                            <option value="<?php echo $sup[$i]->agent_id; ?>" ><?php echo $sup[$i]->company_name.'-'.$sup[$i]->city; ?></option>
                            <?php	
                            }
                            }
                            ?>   
       					</select>
       </td>
       </tr>
    
  <tr height="35">
            <td width="30%">Code</td>
            <td width="77%">
            <?php  $cate = $this->Supplier_Model->get_matrix(); ?>
            <select name='matrix' id='matrix' style="width:150px;" >
                <option value="">Select</option>
                <?php
                if(isset($cate[0]->sup_car_matrix_id))
                    {
                    for($i=0;$i<count($cate);$i++){
                    ?>
                      <option value="<?php echo $cate[$i]->sup_car_matrix_id; ?>"><?php echo $cate[$i]->matrix; ?></option>
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
                if(isset($car[0]->sup_car_type_id))
                    {
                    for($i=0;$i<count($car);$i++){
                    ?>
                      <option value="<?php echo $car[$i]->sup_car_type_id;?>"><?php echo $car[$i]->car_type ; ?></option>
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
                     <option value="">
                     
                      Doors</option>
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
                  
                    From Days &nbsp;<input type="text" id="from_days[]" name="from_days[]" size="7"/>&nbsp;
                    To Days &nbsp;<input type="text" id="to_days[]" name="to_days[]" size="7"/>
                    
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
                <td><input type="text" name="currency" size="20"  value="<?php if(isset($car_pre_records->currency)) echo $car_pre_records->currency ; ?>"/></td>
            </tr>
            <tr height="35">
            
                <td valign="top">PAI:</td>
                <td><input type="text" name="pai" size="20" value="<?php if(isset($car_pre_records->pai)) echo $car_pre_records->pai ; ?>" /></td>
            </tr>
             <tr height="35">
            
                <td valign="top">Minimum Rental Period:</td>
                <td><input type="text" name="min_rental_period" size="30" value="<?php if(isset($car_pre_records->min_rental_period)) echo $car_pre_records->min_rental_period ; ?>" /></td>
            </tr>
             <tr height="35">
            
                <td valign="top">Rates Inclusion:</td>
                <td><input type="text" name="rates_inclusion" size="30" value="<?php if(isset($car_pre_records->rates_inclusion)) echo $car_pre_records->rates_inclusion ; ?>" /></td>
            </tr>
            <tr  height="35">
                <td valign="top">Insurance Access:</td>
                <td><textarea name="insurance_access" id="insurance_access" cols="50" rows="4"><?php if(isset($car_pre_records->insurance_access)) echo $car_pre_records->insurance_access ; ?></textarea></td>
            </tr>
            <tr  height="35">
                <td valign="top">Rate Exclusions :</td>
                <td><textarea name="rates_exclusions" id="rate_exclusions" cols="50" rows="4"><?php if(isset($car_pre_records->rates_exclusions)) echo $car_pre_records->rates_exclusions ; ?></textarea></td>
            </tr>
            <tr  height="35">
                <td valign="top">Security:</td>
                <td><textarea name="security" id="security" cols="50" rows="4"><?php if(isset($car_pre_records->security)) echo $car_pre_records->security ; ?></textarea></td>
            </tr>
            
             <tr  height="35">
                <td valign="top">Fuel policy:</td>
                <td><textarea name="fuel_policy" id="fuel_policy" cols="50" rows="4"><?php if(isset($car_pre_records->fuel_policy)) echo $car_pre_records->fuel_policy ; ?></textarea></td>
            </tr>
             <tr  height="35">
                <td valign="top">Public Holidays:</td>
                <td><textarea name="public_holidays" id="public_holidays" cols="50" rows="4"><?php if(isset($car_pre_records->public_holidays)) echo $car_pre_records->public_holidays ; ?></textarea></td>
            </tr>
             <tr  height="35">
                <td valign="top">Airport off-hire charges:</td>
                <td><textarea name="airport_off_charges" id="airport_off_charges" cols="50" rows="4"><?php if(isset($car_pre_records->airport_off_charges)) echo $car_pre_records->airport_off_charges ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Driving Licence Qualification:</td>
                <td><input type="text" name="driving_quali" size="30" value="<?php if(isset($car_pre_records->driving_quali)) echo $car_pre_records->driving_quali ; ?>" /></td>
            </tr>
             <tr  height="35">
                <td valign="top">Minimum Driver Age:</td>
                <td><input type="text" name="driving_age" size="30" value="<?php if(isset($car_pre_records->driving_age)) echo $car_pre_records->driving_age ; ?>" /></td>
            </tr>
            <tr  height="35">
                <td valign="top">Additional Driver:</td>
                <td><input type="text" name="additional_driver" size="30" value="<?php if(isset($car_pre_records->additional_driver)) echo $car_pre_records->additional_driver ; ?>" /></td>
            </tr>
             <tr  height="35">
                <td valign="top">Driving Restrictions:</td>
                <td><textarea name="driving_restrictions"  cols="50" rows="4"> <?php if(isset($car_pre_records->driving_restrictions)) echo $car_pre_records->driving_restrictions ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Non coverage:</td>
                <td><textarea name="non_coverage"  cols="50" rows="4"><?php if(isset($car_pre_records->non_coverage)) echo $car_pre_records->non_coverage ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Break Down Procedure:</td>
                <td><textarea name="break_down_procedure"  cols="50" rows="4"><?php if(isset($car_pre_records->break_down_procedure)) echo $car_pre_records->break_down_procedure ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Toll Fee:</td>
                <td><input type="text" name="toll_fee" size="30"  value="<?php if(isset($car_pre_records->toll_fee)) echo $car_pre_records->toll_fee ; ?>"/></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Parking Fee:</td>
                <td><input type="text" name="parking_fee" size="30" value="<?php if(isset($car_pre_records->parking_fee)) echo $car_pre_records->parking_fee ; ?>" /></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Special Equipment:</td>
                <td><textarea name="special_equipment"  cols="50" rows="4"><?php if(isset($car_pre_records->special_equipment)) echo $car_pre_records->special_equipment ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Driving Across Border:</td>
                <td><textarea name="driving_across_border"  cols="50" rows="4"><?php if(isset($car_pre_records->driving_across_border)) echo $car_pre_records->driving_across_border ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Deliviary / Collection Charges:</td>
                <td><textarea name="collection_charges"  cols="50" rows="4"><?php if(isset($car_pre_records->collection_charges)) echo $car_pre_records->collection_charges ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Oman off hire Charge:</td>
                <td><input type="text" name="oman_off_hire_charge" size="30" value="<?php if(isset($car_pre_records->oman_off_hire_charge)) echo $car_pre_records->oman_off_hire_charge ; ?>" /></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Chaufer Service:</td>
                <td><input type="text" name="chaufer_service" size="30" value="<?php if(isset($car_pre_records->chaufer_service)) echo $car_pre_records->chaufer_service ; ?>" /></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Late Return:</td>
                <td><textarea name="late_return"  cols="50" rows="4"><?php if(isset($car_pre_records->late_return)) echo $car_pre_records->late_return ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Allocations:</td>
                <td><textarea name="allocations"  cols="50" rows="4"><?php if(isset($car_pre_records->allocations)) echo $car_pre_records->allocations ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Black Out dates:</td>
                <td><textarea name="black_out_dates"  cols="50" rows="4"><?php if(isset($car_pre_records->black_out_dates)) echo $car_pre_records->black_out_dates ; ?></textarea></td>
            </tr> 
              <tr  height="35">
                <td valign="top">Cancellation Policy:</td>
                <td> Days &nbsp;<input type="text" id="cancel_no_of_days[]" name="cancel_no_of_days[]" size="7"/>&nbsp;
                     Charge &nbsp;<input type="text" id="cancel_charge[]" name="cancel_charge[]" size="7"/> &nbsp; Amt
                    &nbsp;<input type="button" onclick="addDays()" name="adddays" value="+ Add" /></td>
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
                <td><textarea name="cancellation_charges"  cols="50" rows="4"><?php if(isset($car_pre_records->cancellation_charges)) echo $car_pre_records->cancellation_charges ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Stop Sale:</td>
                <td><textarea name="stop_sale"  cols="50" rows="4"><?php if(isset($car_pre_records->stop_sale)) echo $car_pre_records->stop_sale ; ?></textarea></td>
            </tr> 
             <tr  height="35">
                <td valign="top">Upgrade Policy:</td>
                <td><textarea name="upgrade_policy"  cols="50" rows="4"><?php if(isset($car_pre_records->upgrade_policy)) echo $car_pre_records->upgrade_policy ; ?></textarea></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Image1:</td>
                <td> <input name="image1_url"  type="file" /></td>
            </tr> 
            <tr  height="35">
                <td valign="top">Image2:</td>
                <td> <input name="image2_url"  type="file" /></td>
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