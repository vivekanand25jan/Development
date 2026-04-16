<?php //echo "<pre/>";print_r($result_view);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />

<script src="<?php echo WEB_DIR ?>script/jquery.js"></script>
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script>
function cancel_booking(booking_number,id,api,pnr)
{
		if(confirm("Are you sure, you want to Cancel the booking?")) {
			var data = "booking_number="+booking_number;
			
			$.ajax({
			  url:'<?php echo WEB_URL; ?>b2b_hotel/cancel_booking/', 
			  data: "booking_number="+booking_number+"&id="+id+"&api="+api+"&pnr="+pnr,
			  dataType: "json",
			  type: 'POST',
			  success: function(result){
				if (result == 'success') {
					window.location = "<?php echo WEB_URL; ?>b2b/my_booking/";
				}
				
				
			
			}
			});
	
		} else {
			return false;
		}
		
}
</script>
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

<table width="920" border="0" class="my_profile_name_ex_tab_whit" align="Center" cellpadding="0" cellspacing="0" style="margin:15px 20px 0 15px;font-family:MAIAN; font-size:14px; border:1px solid #ccc;">
 <tr><td><table align="center" style="margin-left: 405px; background-color: rgb(255, 255, 255);"><tbody><tr><td><strong>INVOICE</strong></td></tr></tbody></table></td></tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit" style="text-align:justify;font-family:MAIAN; font-size:14px;">
    
   
    <strong>Travel Bay</strong><br />

Tel:+ +971 6 5573813 <br />
Fax:+971 6 5573817 <br />
Website: http://www.travel-bay.com/ <br /></td>
    <td align="left" valign="top"  style="text-align:justify;font-family:MAIAN; font-size:14px;" class="my_profile_name_ex_tab_whit"><b>Booking Agent Details</b> <br /> 
    
    <span style="float:right;"><?php if($trans->status!='Cancelled') { ?>
<a href="#" onClick="javascript:window.print(); return false;" ><img   src="<?php echo WEB_DIR; ?>images/System-config-printer-icon.png"> Print</a>
<?php } ?></span>


<?php
echo $agent_info->company_name . '<br />';
//echo $agent_info->address . '<br />';
echo 'Booking Date : ' . $result_view->voucher_date . '<br />';   
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
    <tr><td  align="left">Booking Number</td><td align="left">: <?php echo $trans->booking_number; ?></td>
<td align="left">Invoice Date</td><td align="left">: <?php echo $result_view->voucher_date;?></td></tr>
<tr><td align="left">Hotel Name</td><td align="left">: <?php echo $result_view->hotel_name; ?></td></tr>
<tr><td align="left">City Name</td><td align="left">: <?php echo $result_view->city; ?></td></tr>
<tr><!--<td align="left">Address</td><td align="left">: <?php echo $result_view->address;?></td>--></tr>
<tr><td align="left">Room Type</td><td align="left">: <?php echo $result_view->room_type; ?></td></tr></table>
    </td>
    
  </tr>
   <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab" colspan="2">
    
    <table width="100%">
    <tr><td>Check-In Date</td>
<td>Check-Out Date</td>
<td>Total Nights</td>
<td id="dailyRates" style="cursor:pointer;">Average Per Night (<?php echo $trans->xml_currency;?>)
	<div id="dailyRatesDiv" style="display:none;z-index:999;background-color:#243419;color:#FFF;">
		<?php
			$d_rates = explode(',',$trans->daily_rates);

			echo "<table>";
			echo "<th>Date</th><th>Rate</th>";
			for($i=0;$i<count($d_rates);$i++){
			echo "<tr>";
			echo "<td>".date('Y-m-d',strtotime($result_view->check_in)+24*60*60*$i)."</td><td>".$d_rates[$i]."</td>";	
			echo "</tr>";
			}
		echo "</table>";
		?>
	</div>
</td>
<td>Total Price (<?php echo $trans->xml_currency;?>) </td>
    
    </tr>
 <tr><td><?php echo $result_view->check_in; ?></td>
<td><?php echo $result_view->check_out; ?></td>

<td><?php echo $ex_nights = ($trans->status=="Cancelled" && $trans->cancelled_charge!='' && $trans->cancel_for_dates!=0)?$trans->cancel_for_dates:$result_view->nights; ?></td>
<td><?php echo round($trans->amount/$result_view->nights,2); ?></td>

<td>
	<?php if($trans->status!="Cancelled" && $trans->cancelled_charge==''){ echo $trans->amount; } else{ echo $trans->cancelled_charge; } ?>
</td>
    
    </tr></table>
    </td>
    
  </tr>
 <tr>
 <td colspan="2">
 
 <?php //echo $result_view->cancel_tilldate; ?> <br />
	 <br /><br />
<?php if($trans->status=="Cancelled"){ ?>
  	 <b>Cancelation Charges</b><?php } ?><br/><br/>	
ANY AMENDMETS MADE IN THE BOOKING WILL BE RFLECTED ON THE FINAL INVOICE
INVOICE IS FOR PAYMENT PURPOSE ONLY 
THIS IS SYSTEM GENERATED INVOICE AND HENCE DOES NOT REQUIRE SIGNATURE

  	  	 <br /><br />
  	Thanks for choosing TravelBay
	
	<br /><br />
	
    </td></tr>
    <tr><td>
    	<div style="clear:both;"></div>
  <div style="margin-top:25px;" align="center"><div align="center">
  <p align="center">Tel: +971 6 5573813 / Fax: + 971 6 5573817 / Email: admin@travel-bay.com<br/>
  P.O Box: 9657
  Sharjah<br/>
  UAE<br/>
  www.travel-bay.com</p></div>
    </td>
</tr>
</table>


<script>
	$(document).ready(function(){
		$("#dailyRates").mouseover(function(){
			$("#dailyRatesDiv").show('slow');
		});
	$("#dailyRates").mouseout(function(){
			$("#dailyRatesDiv").hide();
		});
	});
</script>	

</body>
</html>
 
