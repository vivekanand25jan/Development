<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />
<link href="<?php echo WEB_DIR; ?>css/style_sheet.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<style>
.close_btn {
    background: url("<?php echo WEB_DIR; ?>images/close.png") no-repeat scroll 0 0 transparent;
    display: block;
    height: 42px;
    left: 507px;
    position: relative;
    text-indent: -9999px;
    width: 42px;
}
</style>

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
				if(fdate=='')
				{
					var fdate='-';
				}
				if(tdate=='')
				{
					var tdate='-';
				}
				if(booking_status=='')
				{
					var booking_status='-';
				}
				if(passenger_name=='')
				{
					var passenger_name='-';
				}
				if(booking_number=='')
				{
					var booking_number='-';
				}
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
  $("#result").load("<?php print WEB_URL ;?>b2b/my_booking_search_news/"+fdate+"/"+tdate+"/"+booking_status+"/"+passenger_name+"/"+booking_number);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		function hotel_fac_sortingasa()
		{
		
		var fdate =document.search44.fdates.value;
		
		var tdate =document.search44.tdate.value;
		var booking_status =document.search44.booking_status.value;
			var passenger_name =document.search44.passenger_name.value;
				var booking_number =document.search44.booking_number.value;
				if(fdate=='')
				{
					var fdate='-';
				}
				if(tdate=='')
				{
					var tdate='-';
				}
				if(booking_status=='')
				{
					var booking_status='-';
				}
				if(passenger_name=='')
				{
					var passenger_name='-';
				}
				if(booking_number=='')
				{
					var booking_number='-';
				}
		
		$("#result1").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
  $("#result1").load("<?php print WEB_URL ;?>b2b/my_booking_search_news_b/"+fdate+"/"+tdate+"/"+booking_status+"/"+passenger_name+"/"+booking_number);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
</head>
<body>
<?php include('contact_us.php'); ?>
<?php $this->load->view('b2b/header_index'); ?>
<div class="navfull">
<div class="nav_left"></div>
<div class="nav_middle">
<div class="nav">
<ul>
<li><a href="<?php echo WEB_URL; ?>b2b/agent_page/" >HOME</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/my_booking/" id="nav_active">MY BOOKING</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><?php if ($this->session->userdata('agent_logged_in')) :?><a href="<?php echo WEB_URL; ?>b2b/agent_profile">MY CPANEL</a><?php endif;?></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/my_favourite/">MY FAVOURITE</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/support_ticket/">SUPPORT TICKET</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a  href="<?php echo WEB_URL; ?>b2b/contact/" onclick="$('#lightbox').show();" target="light_box" class="text3">CONTACT US</a></li>
</ul>
</div>
</div>
<div class="nav_right"></div>
</div>
<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>--><div id="mybook-tit">My Booking</div>
   
        <div class="">            		
<!-- the tabs -->
<div id="navjam">
<ul class="tabs">
	<li><?php
		if ($this->session->userdata('branch_id') == 0) { ?>
		<a href="<?php echo WEB_URL.'b2b/my_booking/'; ?>">MY BOOKINGS</a> 
        <?php } ?>
        </li>
        <?php
		$agent_det_all = $this->B2b_Model->agentInfo($this->session->userdata('agent_id'));
		 if($agent_det_all->agent_mode!='cash')
		{
			?>
	<li><a href="javascript:void(0)">BRANCH BOOKINGS</a></li>
    <?php
		}
		?>

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">
    		<form name="search33"   onsubmit="javascript:return hotel_fac_sortingaa()"  method="post"  >
		
		<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 0px;">
  <tr>
    <td class="my_profile_name">Booking Number:</td>
    <td class="my_profile_name">Passanger Name:</td>
    <td class="my_profile_name">Status:</td>
    <td class="my_profile_name">From: </td>
    <td class="my_profile_name">To:</td>
   
     <td class="my_profile_name">&nbsp; </td>
  </tr>
  <tr>
    <td><input class="ma_book_txt_fl" value="" id="booking_number" name="booking_number" type="text" />
       
    </td>
    <td><input class="ma_book_txt_fl" value=""  id="passenger_name" name="passenger_name" type="text" /></td>
    <td><select   class="ma_book_txt_fl_jumb" id="booking_status" name="booking_status" >
        <option value="">All</option>
        <option value="confirmed">Confirmed</option>
        <option value="cancelled">Cancelled</option>

      </select></td>
  
                <script>
	 function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
 function dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
}

	$(function() {
		$( "#datepicker" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'yy-mm-dd',
			
			//minDate: 0
		  
		});
		 $('#datepicker').change(function(){
		   //$t=$(this).val(); 
		  // alert($t);
		   var selectedDate = $(this).datepicker('getDate');
		   var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = (nextdayDate.getFullYear())+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+zeroPad(nextdayDate.getDate(),2);

		   $t = nextDateStr;
					$( "#datepicker1" ).datepicker({


						numberOfMonths: 3,
						minDate: $t,
						
						dateFormat : 'yy-mm-dd'
					});
		   $( "#datepicker1" ).val($t);
		  });
		
		
		  
		$( "#anim" ).change(function() {
			$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
		});
	});
	
	</script>
    <td><input class="ma_book_txt_fl" value=""  name="fdates" id="datepicker" type="text" /></td>
    <td><input class="ma_book_txt_fl" value=""  name="tdate" id="datepicker1" type="text" /></td>
  
    <td align="right" class="" style="padding:0 0px 0 10px ;">
    <input type="image" src="<?php echo WEB_DIR ?>images/search-ne-but.png" border="0" /></td>
  </tr>
</table>
</form>

<div id="result">
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>

    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckIn</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckOut</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Cancel Till</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Amount</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Net Amount</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Margin</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Action</td>
  </tr>
  <?php
  
  if($result!='')
  { //echo "<pre/>";
  	//print_r($result);

  for($i=0;$i<count($result);$i++)
  { // echo "<pre/>";print_r($this->session->all_userdata());
	  $booking_nights = $result[$i]->booking_nights;
	  $namount = ($result[$i]->status=="Cancelled" && $result[$i]->cancelled_charge!='')?$result[$i]->cancelled_charge:$result[$i]->amount;
	  $namountmar = ($result[$i]->status=="Cancelled" && $result[$i]->cancelled_charge!='')?($result[$i]->cancelled_charge+($result[$i]->cancelled_charge*$this->session->userdata('markup')/100)):$result[$i]->amount+$result[$i]->agent_markup;
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php //echo $result[$i]->prn_no; ?><?php echo $result[$i]->booking_number; ?></td>
     
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->created_date; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->check_in; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->check_out; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->status; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->cancel_tilldate; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo round($namount,2); ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo round($namountmar,2); ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo round(($namountmar-$namount),2); ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex"><?php
								//if ($result[$i]->status != 'Cancelled' && $result[$i]->booking_day_diff > 0) {
							 if ($result[$i]->status != 'Cancelled' && $result[$i]->status=='Confirmed') {
							echo ' <a href="'.WEB_URL.'b2b_hotel/cancel_booking/'.$result[$i]->transaction_details_id.'">Cancel</a>'; 
							}
							 if($result[$i]->agent_mode!='cash')
							 {
							 ?>
					 |	<a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL . 'b2b/voucher_print/' . $result[$i]->hotel_booking_id; ?>'); " >Voucher</a> | 
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup1('<?php echo WEB_URL . 'b2b/invoice_print/' . $result[$i]->hotel_booking_id; ?>');" >Invoice</a>
							
							| 
                             
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup2('<?php echo WEB_URL  . 'b2b/send_voucher_email/' . $result[$i]->hotel_booking_id; ?>');" >Mail</a>
                         
						<?php	 }
						?>
							 </td>
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="8" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
  <!--<tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">454022</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">ATH</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">SKG 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">Olympic Air</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">13/06/12 12:35</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">18/06/12 21:00</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">3</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">1.268,16 €</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second_ex">Confirmed</td>
  </tr>-->
</table>
</div>

    
  </div>
  
    
    
 
  
  
<div id="containerdount"><form name="search44"   onsubmit="javascript:return hotel_fac_sortingasa()"  method="post"  >
		
		<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:45px 0 0 0px;">
  <tr>
    <td class="my_profile_name">Booking Number:</td>
    <td class="my_profile_name">Passanger Name:</td>
    <td class="my_profile_name">Status:</td>
    <td class="my_profile_name">From: </td>
    <td class="my_profile_name">To:</td>
   
     <td class="my_profile_name">&nbsp; </td>
  </tr>
  <tr>
    <td><input class="ma_book_txt_fl" value="" id="booking_number" name="booking_number" type="text" />
       
    </td>
    <td><input class="ma_book_txt_fl" value=""  id="passenger_name" name="passenger_name" type="text" /></td>
    <td><select value=""  class="ma_book_txt_fl_jumb" id="booking_status" name="booking_status" >
        <option value="confirmed">Confirmed</option>
        <option value="cancelled">Cancelled</option>

      </select></td>
  
                <script>
	 function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
 function dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
}

	$(function() {
		$( "#datepicker2" ).datepicker({
			numberOfMonths: 3,
			dateFormat: 'yy-mm-dd',
			
			//minDate: 0
		  
		});
		 $('#datepicker2').change(function(){
		   //$t=$(this).val(); 
		  // alert($t);
		   var selectedDate = $(this).datepicker('getDate');
		   var nextdayDate  = dateADD(selectedDate);
		   var nextDateStr = (nextdayDate.getFullYear())+"-"+zeroPad((nextdayDate.getMonth()+1),2)+"-"+zeroPad(nextdayDate.getDate(),2);

		   $t = nextDateStr;
					$( "#datepicker3" ).datepicker({


						numberOfMonths: 3,
						minDate: $t,
						
						dateFormat : 'yy-mm-dd'
					});
		   $( "#datepicker3" ).val($t);
		  });
		
		
		  
		$( "#anim" ).change(function() {
			$( "#datepicker2" ).datepicker( "option", "showAnim", $( this ).val() );
		});
	});
	
	</script>
    <td><input class="ma_book_txt_fl" value=""  name="fdates" id="datepicker2" type="text" /></td>
    <td><input class="ma_book_txt_fl" value=""  name="tdate" id="datepicker3" type="text" /></td>
  
    <td align="right" class="" style="padding:0 0px 0 10px ;">
    <input type="image" src="<?php echo WEB_DIR ?>images/search-ne-but.png" border="0" /></td>
  </tr>
</table>
</form>

<div id="result1">
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>

    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckIn</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckOut</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Cancel Till</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Amount</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Net Amount</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Margin</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Action</td>
  </tr>
  <?php
  if($result_p!='')
  {

  for($i=0;$i<count($result_p);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->prn_no; ?></td>
     
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->created_date; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->check_in; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->check_out; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->status; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->cancel_tilldate; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->amount; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo ($result_p[$i]->amount-$result_p[$i]->agent_markup); ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->agent_markup; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex"><?php
								if ($result_p[$i]->status != 'Cancelled' && $result_p[$i]->booking_day_diff > 0) {
							 
							echo ' <a href="'.WEB_URL.'b2b_hotel/cancel_booking/'.$result_p[$i]->transaction_details_id.'">Cancel</a>'; 
							}
							 if($result[$i]->agent_mode!='cash')
							 {
							 ?>
					 |	<a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL . 'b2b/voucher_print/' . $result_p[$i]->hotel_booking_id; ?>'); " >Voucher</a> | 
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup1('<?php echo WEB_URL . 'b2b/invoice_print/' . $result_p[$i]->hotel_booking_id; ?>');" >Invoice</a>
							
							| 
                             
                            <a  href="javascript:void(0);" onclick="JavaScript:newPopup2('<?php echo WEB_URL  . 'b2b/send_voucher_email/' . $result_p[$i]->hotel_booking_id; ?>');" >Mail</a>
                         
						<?php	 }
						?>
							 </td>
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="8" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
  <!--<tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">454022</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">ATH</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">SKG 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">Olympic Air</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">13/06/12 12:35</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">18/06/12 21:00</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">3</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">1.268,16 €</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second_ex">Confirmed</td>
  </tr>-->
</table>
</div>
</div>
<div id="containerdount">4</div>
<div id="containerdount">5</div>
<div id="containerdount">6</div>
</div>


<!-- This JavaScript snippet activates those tabs -->
<script>

// perform JavaScript after the document is scriptable.
$(function() {
	// setup ul.tabs to work as tabs for each div directly under div.panes
	$("ul.tabs").tabs("div.panes > div");
});
</script>
</div>
                            
                    </div>
 

  </div>
  </div>
  
  
</div>
</div></div>
<div style="clear:both"></div>
<?php $this->load->view('b2b/footer'); ?>
</body>
</html>
       <script type="text/javascript">
// Popup window code
function newPopup(url) { 
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}

function newPopup1(url) { 
	popupWindow = window.open(
		url,'popUpWindow','height=500,width=1100,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}


function newPopup2(url) { 
	popupWindow = window.open(
		url,'popUpWindow','height=400,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
  
