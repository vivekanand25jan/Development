<?php //echo "hiiiiiiiiiiiiiiiii";print_r($trans);exit;?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
		</script>
        
                     <div id="navjam">
<ul class="tabs">
	<li><a href="javascript:void(0)">View Booking</a></li>
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style=" float: right;    font-size: 14px;    margin-top: -36px;    padding: 3px;">

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a style="
background-color:#EDEFED;
color:#06C;
    font-size: 14px;
    font-weight: bold;
    height: 30px;
    line-height: 30px;
    margin: 0;
    padding: 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    top: 1px;
    width: 52px;" href=""  onClick="window.print()">Print</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a style="
background-color:#EDEFED;
color:#06C;
    font-size: 14px;
    font-weight: bold;
    height: 30px;
    line-height: 30px;
    margin: 0;
    padding: 0;
    position: relative;
    text-align: center;
    text-decoration: none;
    top: 1px;
    width: 52px;" href="<?php echo WEB_URL; ?>index/b2b_reports">Back</a></span>
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
	<div id="containerdount" class="admin-innerbox">
    	
<table width="100%" border="0" cellspacing="7" cellpadding="3" class="r-hoteldeta">
          <tr>
          	<td colspan="2">
            <span  style="font-size:15px; color:#069" ><strong>
            	Booking Details of Booking ID : <?php //echo $trans->prn_no; ?> <?php echo $result_view[0]->booking_number; ?>
           </strong></span>
			</td>
          </tr>
          <tr>
          	<td colspan="2" ><span style="font-size:15px; color:#069">Booker Name : Mr.<?php echo $contact_info->first_name; ?></span><br /></td>
          </tr>
           <tr>
          	<td colspan="2" ><span style="font-size:15px; color:#069;">Booking Status : <?php echo $result_view[0]->status; ?></span>

			<a href="<?php echo WEB_URL; ?>index/change_booking_status/<?php echo $result_view[0]->transaction_details_id; ?>">Change Status</a>



          	<br /></td>
          </tr>
           <?php
			$adult_co = explode("-",$result_view[0]->adult);
			$adult_count = array_sum($adult_co);
			
			$child_co = explode("-",$result_view[0]->child);
			$child_count = array_sum($child_co);
			
			?>
           <tr>
          	<td width="350" align="left" valign="top"><table style="font-size:15px;"width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style="color:#fff; background-color:#517BA5; font-size:15px; text-align:center">Traveller Details</td>
                  </tr>
                  <tr>
                    <td width="128">Guest Name</td>
                    <td width="270">: Mr <?php echo $contact_info->first_name; ?></td>
                  </tr>
                  <tr>
                    <td>No. of Adults</td>
                    <td>: <?php echo $adult_count; ?> Adults</td>
                  </tr>
                  <tr>
                    <td>No. of Childern</td>
                    <td>: <?php echo $child_count; ?> Childern</td>
                  </tr>
                  <tr>
                    <td>Voucher Date</td>
                    <td>: <?php echo $result_view[0]->created_date; ?></td>
                  </tr>
                  <tr>

                    <tr>
                    <td>Special Request</td>
                    <td>: <?php if($result_view[0]->special_request!=''){echo $result_view[0]->special_request;} else { echo "No Special Request.";} ?></td>
                  </tr>
                  <tr> 
                    <td>Supplier</td>
                    <td>: <?php echo $result_view[0]->api; ?></td>
                  </tr>
                </table>
                </td>
            <td width="350" align="left" valign="top"><table  style="font-size:15px;" width="100%" border="0" cellspacing="5" cellpadding="5" class="sum-txt">
                  <tr>
                    <td colspan="2" class="mid-txt" style="color:#fff; font-size:15px; background-color:#517BA5;   text-align:center">Your Reservation
</td>
                  </tr>
                  <tr>
                    <td width="171">Check - in</td>
                    <td width="228">: <?php echo $result_view[0]->check_in; ?></td>
                  </tr>
                  <tr>
                    <td>Check - out</td>
                    <td>: <?php echo $result_view[0]->check_out; ?></td>
                  </tr>
                  <tr>
                    <td>Rooms</td>
                    <td>: <?php echo $result_view[0]->no_of_room; ?> Rooms</td>
                  </tr>
                   <tr>
                    <td>Nights</td>
                    <td>: <?php echo $result_view[0]->nights; ?> Nights</td>
                  </tr>
                   <tr>
                    <td>Supplier Confimation No</td>
                    <td>: <?php echo $result_view[0]->booking_number ; ?></td>
                  </tr>
                </table>
                </td>
          </tr>
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Hotel Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:878px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	
                <div style="width:907px; float:left">
                	<p class="mid-txt">Hotel Name : <?php echo $result_view[0]->hotel_name; ?> 
                            
                      <br />

                    <p><?php echo $result_view[0]->description; ?></p>
                </div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Address  </div>
                <div style="width:505px; float:left" class="mid-txt">: <?php echo $result_view[0]->address; ?></div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">City  </div>
                <div style="width:505px; float:left" class="mid-txt">: <?php echo $result_view[0]->city; ?>	</div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Phone  </div>
                <div style="width:550px; float:left" class="mid-txt">: <?php echo $result_view[0]->phone; ?>	</div>
            	</div>
                
                <div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Fax  </div>
                <div style="width:550px; float:left" class="mid-txt">: <?php echo $result_view[0]->fax; ?>	</div>
            	</div>
                
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Room Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:150px; float:left;">Room Type : </div>
                <div style="width:205px; float:left" class="mid-txt"><?php echo $result_view[0]->room_type; ?></div>
                </div>
                
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
              Room Extra Services
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<div style="width:700px; margin:0 auto;">
            
            	<div class="hotelfa-div" style="border:none">
                <div style="width:700px; float:left" class="mid-txt"><?php //echo $result_view->room_type; ?>
					<?php
						$ex = explode(',',$result_view[0]->extra_services);
						$extra_msg = '';
						for($i=0;$i<count($ex);$i++){
							$exa = explode('--',$ex[$i]);
							
							switch($exa[0]){
									case 'aeb':
										$extra_msg.='<b>Adult Extra Bed = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'cc':
										$extra_msg.='<b>Child Charge = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'caa':
										$extra_msg.='<b>Child Above 6 Age = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'ceb':
										$extra_msg.='<b>Child Extra Bed = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'ampb':
										$extra_msg.='<b>Adult Meal Plan Breakfast = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'ampl':
										$extra_msg.='<b>Adult Meal Plan Lunch = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'ampd':
										$extra_msg.='<b>Adult Meal Plan Dinner = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'cmpb':
										$extra_msg.='<b>Child Meal Plan Breakfast = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'cmpl':
										$extra_msg.='<b>Child Meal Plan Lunch = </b>'.$exa[1].'<br/><br/>';
										break;
									case 'cmpd':
										$extra_msg.='<b>Child Meal Plan Dinner = </b>'.$exa[1].'<br/><br/>';
										break;
							}
						}
					
/*
						$string1 = "/aeb/";
						$string2 = "/cc/";
						$string3 = "/caa/";
						$string4 = "/ceb/";
						$string5 = "/ampb/";
						$string6 = "/ampl/";
						$string7 = "/ampd/";
						$string8 = "/cmpb/";
						$string9 = "/cmpl/";
						$string10 = "/cmpd/";
						$paragraph = $result_view[0]->extra_services;
						if (preg_match_all($string1, $paragraph, $matches)) {
						count($matches[0]);
						echo 'Adult Extra Bed';
						}
						if (preg_match_all($string2, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Charge';
						}
						if (preg_match_all($string3, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Above 6 Age'; 
						} 
						if (preg_match_all($string4, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Extra Bed'; 
						}
						if (preg_match_all($string5, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Adult Meal Plan Breakfast'; 
						}
						if (preg_match_all($string6, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Adult Meal Plan Lunch'; 
						}
						if (preg_match_all($string7, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Adult Meal Plan Dinner'; 
						}
						if (preg_match_all($string8, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Meal Plan Breakfast'; 
						}
						if (preg_match_all($string9, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Meal Plan Lunch'; 
						}
						if (preg_match_all($string10, $paragraph, $matches)) {
						count($matches[0]);
						echo '<br> Child Meal Plan Dinner'; 
						}*/
						
						echo $extra_msg;
                    ?>
                
                </div>
                </div>
                
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
             Currency Convertion
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style=" font-size:15px; ">
      <tr>
         <td align="left">
         	<table style=" background-color: #EDEFED;
    border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="7">
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D; height:28px;">Actual Price </td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Actual Currency </td>
   	<td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Currency Value</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Price in AED</td>

  </tr>
  
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->net_amount; ?></td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->xml_currency; ?></td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->currency_val; ?></td>
     <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->amount-$result_view[0]->markup-$result_view[0]->gateway; ?></td>

  </tr>
  
  
</table>
         </td>
      </tr>
    </table></td>
          </tr>
          
          
             <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
             Fare Summary
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table  align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         	<table style=" background-color: #EDEFED;
    border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="7">
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D; height:28px;">No Of Room</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Actual Price AED</td>
   	<td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Markup Price AED</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Gateway Price AED</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Margin</td>
    <td style="border-bottom: 1px solid #9D9D9D;">Selling Price AED</td>
  </tr>
  
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->no_of_room; ?></td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->amount-$result_view[0]->markup-$result_view[0]->gateway; ?></td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->markup; ?></td>
     <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->gateway; ?></td>
     <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->markup+$result_view[0]->gateway; ?></td>
    <td style="border-bottom: 1px solid #9D9D9D;"><?php echo $result_view[0]->amount; ?></td>
  </tr>
  <tr><td colspan="6">&nbsp;</td>
  <tr>
    <td>&nbsp;</td>
     <td>&nbsp;</td>
      <td>&nbsp;</td>
       <td>&nbsp;</td>
        <td align="right">Total :</td>
    <td><?php echo $result_view[0]->amount; ?> AED</td>
  </tr>
</table>

         </td>
      </tr>
    </table></td>
          </tr>
          
            <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
            Cancellation Policy
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <table style=" background-color: #EDEFED;
    border: 1px solid #9D9D9D;border: 1px solid #9D9D9D;" width="100%" border="0" cellspacing="0" cellpadding="7">
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">CheckIn Date</td>
<!--
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation Till Date</td>
-->
   	<td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation End Date</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Cancellation Charges</td>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">Refund Charges</td>
   
    
  </tr>
  <tr>
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->check_in; ?></td>
<!--
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->cancellation_till_date; ?></td>
-->
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->cancellation_till_date; ?></td>
<!--
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;"><?php echo $result_view[0]->cancellation_till_charge; ?> AED</td>
-->
    <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">
	<?php
		$canPolicies = explode("//",$result_view[0]->cancellation_till_charge);
		for($c=0;$c< count($canPolicies);$c++)
		{
			$canTill = explode("___",$canPolicies[$c]);
			echo "<div>If you cancel this before the date ".$canTill[0].", AED ".$canTill[1]." will be the charge</div>";
		}
	?>
	</td>
     <td style="border-bottom: 1px solid #9D9D9D;border-right: 1px solid #9D9D9D;">
		 <?php
			//echo ($trans->amount-$trans->cancellation_till_charge);
			$canPolicies = explode("//",$result_view[0]->cancellation_till_charge);
			for($c=0;$c< count($canPolicies);$c++)
			{
			$canTill = explode("___",$canPolicies[$c]);
			$refundCharge = $result_view[0]->amount-$canTill[1];
			echo "<div>AED ".$refundCharge."</div>";
			}
		 ?></td>
   
  </tr>
  <tr><td colspan="6">Description :</td>
  <tr>
    <td colspan="6"><?php echo $result_view[0]->cancel_policy; ?></td>
     </tr>
</table>
         
         </td>
      </tr>
    </table></td>
          </tr>
         
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
          Customer Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="13%">Email ID </td>
    <td width="1%">:</td>
    <td width="86%"><?php echo $contact_info->email; ?></td>
  </tr>
    <tr>
    <td>Address</td>
    <td>:</td>
    <td><?php echo $contact_info->address; ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td>:</td>
    <td><?php echo $contact_info->city; ?></td>
  </tr>
  <tr>
    <td>Country</td>
    <td>:</td>
    <td><?php echo $contact_info->country; ?></td>
  </tr>
  <tr>
    <td>Postal Code</td>
    <td>:</td>
    <td><?php echo $contact_info->mobile; ?></td>
  </tr>
  <tr>
    <td>Phone Number</td>
    <td>:</td>
    <td><?php echo $contact_info->phone; ?></td>
  </tr>
</table>

         </td>
      </tr>
    </table></td>
          </tr>
         
         
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table width="100%">
            <tr><td  style="color:#fff; height:28px;  background-color:#517BA5; font-size:15px; ">
          Passenger Details
                </td></tr></table></td>
          </tr>
          
          <tr>
          	<td  width="350" align="left" colspan="2" valign="top">
            <table align="left" width="100%" border="0" cellspacing="0" cellpadding="5" class="sum-txt" style="font-size:15px;">
      <tr>
         <td align="left">
         <div style="width:700px; margin:0 auto;">
             <?php
					for($i=0;$i< count($pass_info);$i++)
					{
						?>
            	<div class="hotelfa-div" style="border:none">
            	<div style="width:690px; float:left;">Mr. <?php echo $pass_info[$i]->first_name.' '.$pass_info[$i]->last_name; ?></div>
                </div>
                 <?php
					}
					?>
            </div>
         </td>
      </tr>
    </table></td>
          </tr>
         
         
         
        </table>
    
     
    

     
    
    
    
    
     
     
    
     
    
    
     
     
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
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
 </div>
</body>
</html>
