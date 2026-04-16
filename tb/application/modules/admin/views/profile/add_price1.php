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

$("#rowsNight").append('<table><tr><td><div style="padding-top:2px; margin-left:-32px;font-size:13px;">From Days &nbsp; <input type="text" name="from_days[]" size="7"/> &nbsp;To Days&nbsp;<input type="text" name=to_days[]" size="7"/>&nbsp;Rates Per Day: <input type="text" name="rates_per_day[]" id="rates_per_day[]" style="width:50px" value="" /></div></td></tr></table>');

nights += 1;
} else {
$("#rowsNight").append('<br />Only 10 upload fields allowed.');
document.form1.addnights.disabled=true;
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
<?php
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">

 <li><a href="<?php echo WEB_URL;?>index/transfer/<?php echo $this->uri->segment(3)?>" id="tabs_active">Transfer</a></li>
 
</ul>
<?php
}
else
{
?>
	<ul class="tabs1">
    <li><a href="javascript:void(0)" >Hotel Details </a></li>
    <li><a href="javascript:void(0" id="tabs_active">Inventory Management </a></li>
    <li><a href="">Booking Details </a></li>
    <li><a href="<?php echo WEB_URL;?>index/car_rental/<?php echo $this->uri->segment(3)?>" id="tabs_active">Car Rental </a></li>
    
	</ul>
<?php
}
?>
</div>
</div>



<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
	
<div id="containerdount">
 <div style="float:right; height:25px; margin-top:10px ;"><a href="<?php echo site_url('index//view_transfer_details/')?>/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" style="color:#099;">Back</a></div>
  
<div style="margin-top:20px;">
    
    <div style="float:left; margin-left:20px;">
    <form name="form1" action="<?php echo WEB_URL; ?>index/add_transfer_details/<?php echo $this->uri->segment(3); ?>/<?php echo $this->uri->segment(4); ?>" method="post">
    
    
    <table width="780" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Transfer Information</h4></caption>
        	<tr height="35">
            	<td>From :</td>
                <td><input type="text" name="pick_up" size="30" value=""  required/></td></br>
                <span style="color:#FF0000;"> <?php echo form_error('pick_up');?></span>	
            </tr>
            <tr height="35">
            	<td>To :</td>
                <td><input type="text" name="drop_off" size="30" value="" required /></td>
                </br>
                <span style="color:#FF0000;"> <?php echo form_error('drop_off');?></span>
            </tr>
        
             
            <tr height="35">
            	<td>Individual TRF Price for Car (1-3 pax) :</td>
                <td><input type="text" name="car_price" size="20" value="" /> AED</td>
            </tr>
               <tr height="35">
            	<td>Individual TRF Price for Mini Van (1-3 pax) :</td>
                <td><input type="text" name="minivan_price" size="20" value="" /> AED</td>
            </tr>
     	
             <tr height="35">
            	<td>Individual TRF Price for Micro Bus 1(4-8 pax) :</td>
                <td><input type="text" name="microbus1_price" size="20" value="" /> AED</td>
            </tr>
             <tr height="35">
            	<td>Individual TRF Price for Micro Bus 2(9-20 pax) :</td>
                <td><input type="text" name="microbus2_price" size="20" value="" /> AED</td>
            </tr>
           <tr height="35">
            	<td>Individual TRF Price for Bus(21 & above pax) :</td>
                <td><input type="text" name="bus_price" size="20" value="" /> AED</td>
            </tr>
         </table>
           <table width="780" border="0" cellspacing="1" cellpadding="0"><caption><h4 align="left">Prices List</h4></caption>
        	<tr height="25">
            	<td></td>
                <td>For 5 hrs</td>
                <td>For 10 Hrs</td>
                <td>For Extra Hours</td>
                
            </tr>
           
            <tr height="25">
            	<td>Car </td>
                <td><input type="text" name="car_5hrs_prc" size="10" /></td>
                <td><input type="text" name="car_10hrs_prc" size="10" /></td>
                <td><input type="text" name="car_extra_hrs_prc" size="10" /></td>
            </tr>
          
           <tr height="25">
            	<td>Mini van </td>
                <td><input type="text" name="mini_van_5hrs_prc" size="10" /></td>
                <td><input type="text" name="mini_van_10hrs_prc" size="10" /></td>
                <td><input type="text" name="mini_van_extra_hrs_prc" size="10" /></td>
            </tr>
           
            <tr height="25">
            	<td>15 Seater</td>
                <td><input type="text" name="seat15_5hrs_prc" size="10" /></td>
                <td><input type="text" name="seat15_10hrs_prc" size="10" /></td>
                <td><input type="text" name="seat15_extra_hrs_prc" size="10" /></td>
            </tr>
            <tr height="25">
            	<td>30 Seater</td>
                <td><input type="text" name="seat30_5hrs_prc" size="10" /></td>
                <td><input type="text" name="seat30_10hrs_prc" size="10" /></td>
                <td><input type="text" name="seat30_extra_hrs_prc" size="10" /></td>
            </tr>
            <tr height="25">
            	<td>50 Seater</td>
                <td><input type="text" name="seat50_5hrs_prc" size="10" /></td>
                <td><input type="text" name="seat50_10hrs_prc" size="10" /></td>
                <td><input type="text" name="seat50_extra_hrs_prc" size="10" /></td>
            </tr>
        
             
           
         </table>
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin:20px;">        
             <tr  height="35">
                <td valign="top" align="left">Notes:</td>
                <td align="right"><textarea name="notes"  cols="80" rows="4"></textarea></td>
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
<?php

function add_transfer_details1($supplier_id,$sup_transfer_period_id,$transfer_period_id)
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect('index/login', 'refresh'); 
		}
		
		$this->form_validation->set_rules('pick_up', 'From', 'required');
		$this->form_validation->set_rules('drop_off', 'To ', 'required');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('profile/add_transfer');
		}
		
		//print'<pre />';print_r($_POST);exit;
		$pick_up = $this->input->post('pick_up');
		$drop_off = $this->input->post('drop_off');
		$car_price = $this->input->post('car_price');
		$minivan_price = $this->input->post('minivan_price');
		$microbus1_price= $this->input->post('microbus1_price');
		$microbus2_price = $this->input->post('microbus2_price');
		$bus_price = $this->input->post('bus_price');
		$seat50_5hrs_prc = $this->input->post('seat50_5hrs_prc');
		$seat50_10hrs_prc = $this->input->post('seat50_10hrs_prc');
		$seat50_extra_hrs_prc= $this->input->post('seat50_extra_hrs_prc');
		$mini_van_5hrs_prc = $this->input->post('mini_van_5hrs_prc');
		$mini_van_10hrs_prc = $this->input->post('mini_van_10hrs_prc');
		$mini_van_extra_hrs_prc = $this->input->post('mini_van_extra_hrs_prc');
		$car_5hrs_prc = $this->input->post('car_5hrs_prc');
		$car_10hrs_prc= $this->input->post('car_10hrs_prc');
		$car_extra_hrs_prc = $this->input->post('car_extra_hrs_prc');
		$seat15_5hrs_prc = $this->input->post('seat15_5hrs_prc');
		$seat15_10hrs_prc = $this->input->post('seat15_10hrs_prc');
		$seat15_extra_hrs_prc = $this->input->post('seat15_extra_hrs_prc');
		$seat30_5hrs_prc= $this->input->post('seat30_5hrs_prc');
		$seat30_10hrs_prc = $this->input->post('seat30_10hrs_prc');
		$seat30_extra_hrs_prc = $this->input->post('seat30_extra_hrs_prc');
		$notes= $this->input->post('notes');
		
		$this->Supplier_Model->add_transfer_details($supplier_id,$sup_transfer_period_id,$pick_up,$drop_off,$car_price,$minivan_price,$microbus1_price,
		$microbus2_price,$bus_price,$seat50_5hrs_prc,$seat50_10hrs_prc,$seat50_extra_hrs_prc,$mini_van_5hrs_prc,$mini_van_10hrs_prc,$mini_van_extra_hrs_prc,$car_5hrs_prc,$car_10hrs_prc,$car_extra_hrs_prc,$seat15_5hrs_prc,$seat15_10hrs_prc,$seat15_extra_hrs_prc,$seat30_5hrs_prc,$seat30_10hrs_prc,$seat30_extra_hrs_prc,$notes);
		redirect('index/view_transfer_details/'.$supplier_id.'/'.$sup_transfer_period_id,'refresh');
	}
function add_transfer_details1($supplier_id,$sup_transfer_period_id,$pick_up,$drop_off,$car_price,$minivan_price,$microbus1_price,
		$microbus2_price,$bus_price,$notes,$sup_id)
	{
		
		$data = array(
				'sup_id' => $supplier_id,
				'sup_transfer_period_id' => $sup_transfer_period_id,
				'pick_up' => $pick_up,
				'drop_off' => $drop_off,
				'car_price' => $car_price,
				'minivan_price' => $minivan_price,
				'microbus1_price' => $microbus1_price,
				'microbus2_price' => $microbus2_price,
				'bus_price' => $bus_price,
				'seat50_5hrs_prc' => $seat50_5hrs_prc,
				'seat50_10hrs_prc' => $seat50_10hrs_prc,
				'seat50_extra_hrs_prc' => $seat50_extra_hrs_prc,
				'mini_van_5hrs_prc' => $mini_van_5hrs_prc,
				'mini_van_10hrs_prc' => $mini_van_10hrs_prc,
				'mini_van_extra_hrs_prc' => $mini_van_extra_hrs_prc,
				'car_5hrs_prc' => $car_5hrs_prc,
				'car_10hrs_prc' => $car_10hrs_prc,
				'car_extra_hrs_prc' => $car_extra_hrs_prc,
				'seat15_5hrs_prc' => $seat15_5hrs_prc,
				'seat15_10hrs_prc' => $seat15_10hrs_prc,
				'seat15_extra_hrs_prc' => $seat15_extra_hrs_prc,
				'seat30_5hrs_prc' => $seat30_5hrs_prc,
				'seat30_10hrs_prc' => $seat30_10hrs_prc,
				'seat30_extra_hrs_prc' => $seat30_extra_hrs_prc,
				'notes' => $notes,
				'status' => 1
				);
		//print '<pre />';print_r($data);exit;
		$this->db->insert('sup_transfer_details', $data);
		$id = $this->db->insert_id();
		
		if(!empty($id)) 
		{
			return true;
		} 
		else
		{
			return false;
		}
	
	}	
?>