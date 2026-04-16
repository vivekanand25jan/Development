<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>
<style>

</style>

   <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">
              
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
                <script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
                <link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">
                
  <script type="text/javascript" src="<?php echo WEB_DIR ?>gui/ajax/ajaxsbmt.js"></script>
                <script language="javascript1.5" type="text/javascript">
				function hotel_fac_sortingaa()
		{
		
		var fdate =document.search33.fdates.value;
		
		var tdate =document.search33.tdate.value;
		var booking_status =document.search33.booking_status.value;
			var passenger_name =document.search33.passenger_name.value;
				var booking_number =document.search33.booking_number.value;
				
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
  $("#result").load("<?php print WEB_URL ?>b2b/my_booking_search_news/"+passenger_name);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
</head>
<body>
<table width="920" border="0" class="my_profile_name_ex_tab_whit" align="left" cellpadding="0" cellspacing="0" style="margin:15px 20px 0 15px;font-family:MAIAN; font-size:14px; border:1px solid #ccc;">
  <tr><td><table align="center" style="margin-left: 405px; background-color: rgb(255, 255, 255);"><tbody><tr><td><strong>INVOICE</strong></td></tr></tbody></table></td></tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit" style="text-align:justify;font-family:MAIAN; font-size:14px;">
    
    
    <strong>Travel Bay</strong><br />

Tel:+ 2323214521 <br />
Fax:+2323214521 <br />
Website: http://www.travelbay.com/ <br /></td>
    <td align="left" valign="top"  style="text-align:justify;font-family:MAIAN; font-size:14px;" class="my_profile_name_ex_tab_whit"><b>Booking Agent Details</b> <br /> 
    
    <span style="float:right;"><?php if($trans->status!='Cancelled') { ?>
<a href="#" onClick="javascript:window.print(); return false;" ><img   src="<?php echo WEB_DIR_FRONT; ?>/images/System-config-printer-icon.png"> Print</a>
<?php } ?></span>


<?php
echo $agent_info->company_name . '<br />';
echo $agent_info->address . '<br />';
echo 'Booking Date : ' . $result_view[0]->voucher_date . '<br />';   
//print_r($agent_info);
?>
Passengers Information <br />
Mr. <?php echo $contact_info->first_name . ' ' . $contact_info->middle_name . ' ' . $contact_info->last_name; ?>
<br /><br />



</td>
    </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab" colspan="2">
    
    <table width="100%" class="my_profile_name_ex_tab_whit" style=" font-weight:normal;">
    <tr><td  align="left">Booking Number</td><td align="left">: <?php echo $trans->booking_number; ?></td></tr>
<tr><td align="left">Invlice Date</td><td align="left">: <?php echo $result_view[0]->voucher_date;?></td></tr>
<tr><td align="left">Hotel Name</td><td align="left">: <?php echo $result_view[0]->hotel_name; ?></td></tr>
<tr><td align="left">City Name</td><td align="left">: <?php echo $result_view[0]->city; ?></td></tr>
<tr><td align="left">Address</td><td align="left">: <?php echo $result_view[0]->address;?></td></tr>
<tr><td align="left">Room Type</td><td align="left">: <?php echo $result_view[0]->room_type; ?></td></tr></table>
    </td>
    
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab" colspan="2">
    
    <table width="100%">
    <tr><td>Check-In Date</td>
<td>Check-Out Date</td>
<td>Total Nights</td>
<td>Per Nights (AED)</td>
<td>Total Price (AED) </td>
    
    </tr>
 <tr><td><?php echo $result_view[0]->check_in; ?></td>
<td><?php echo $result_view[0]->check_out; ?></td>

<td><?php echo $result_view[0]->nights; ?></td>
<td><?php echo round($trans->amount/$result_view[0]->nights,2); ?></td>

<td><?php echo $trans->amount; ?></td>
    
    </tr></table>
    </td>
    
  </tr>
 <tr>
 <td colspan="2">
 
Cancellation Deadline : <?php echo $result_view[0]->cancel_tilldate; ?> <br />
	 <br /><br />
  	  	 
  	This is TravelBay Invoice Any amedements made to booking will be reflected on the Final invoice 	 
  	Note: Please Note This is Payment Purpose Only Not a valid as a Hotel voucher 	 
  	This is Computer generated reciept so no need Signature 	 
  	  	 <br /><br />
  	Thanks for choosing TravelBay
	
	<br /><br />
	
    </td></tr>
</table>


	

</body>
</html>
 
