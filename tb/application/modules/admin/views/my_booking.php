<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="<?php echo WEB_DIR_FRONT ?>script/jquery-1.7.2.min.js"></script>


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
<style>
.image-box{width:172px; height:128px; float:left; border:1px solid #ccc; margin:5px; position:relative;}
.checkbox-bg{ position:absolute; width:40px; height:15px; top:4px; left:4px; padding:2px; background-color:#000; }
.img-fix{float:left; margin-top:-20px; margin-left:17px;}
</style>

<style>
.ma_book_txt_fl {
	width: 125px;
}
</style>
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
$prop_id = $this->uri->segment(3);
if(isset($prop_id) && $prop_id!="")
{
?>
<ul class="tabs1">
<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" >Hotel Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/inventory_category_list/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Inventory Management </a></li>
<li><a href="">Booking Details </a></li>
<li><a href="<?php echo WEB_URL;?>index/accounting/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active">Accounting </a></li>

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
	


<div id="navjam">
<!--<ul class="tabs">
	<li><a href="<?php echo WEB_URL;?>index/edit_contact_inform/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>" id="tabs_active"> Contact Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/edit_property_info/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Hotel Information </a></li>
	<li><a href="<?php echo WEB_URL;?>index/insert_facility/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Accommodation Facilities </a></li>
	<li><a href="<?php echo WEB_URL;?>index/general_settings/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">General Settings </a></li>
	<li><a href="<?php echo WEB_URL;?>index/accomodation_pictures/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>"> Photo Gallery </a></li>
	<li><a href="<?php echo WEB_URL;?>index/detail_location/<?php echo $this->uri->segment(3)?>/<?php echo $this->uri->segment(4)?>">Detail Location </a></li>
</ul>-->

</div>

<!-- tab "panes" -->
<div class="panes" style="padding-bottom:10px">
<!--This is the contact information division-->
<div id="containerdount" >
    	
<form name="search33" method="post" action="<?php echo WEB_URL;?>index/booking_list/<?php echo $this->uri->segment(3);?>/<?php echo $this->uri->segment(4);?>">
		
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
        <option value="Conformed">Confirmed</option>
        <option value="cancelled">Cancelled</option>
        <option value="Pending_for_Pay">Pending for Pay</option>

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
    <td><input class="ma_book_txt_fl" value=""  name="fdates" id="datepicker" type="text" size="10" /></td>
    <td><input class="ma_book_txt_fl" value=""  name="tdate" id="datepicker1" type="text" size="10" /></td>
  
    <td align="right" class="" style="padding:0 0px 0 10px ;">
    <input type="image" src="<?php echo WEB_DIR_FRONT ?>images/search-ne-but.png" border="0" /></td>
     <td align="right" class="" style="padding:0 0px 0 10px ;">
    <a href="<?php echo WEB_URL;?>index/booking_list/<?php echo $this->uri->segment(3);?>"></a><input type="image" src="<?php echo WEB_DIR_FRONT ?>images/b2b-back-but.png" border="0" /></a></td>
  </tr>
</table>
</form>


<table width="930" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:5px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>
	<td align="left" valign="top" class="my_profile_name_ex_tab">Passanger Name</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckIn</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">CheckOut</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Cancel Till</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Amount</td>
    <!--<td align="left" valign="top" class="my_profile_name_ex_tab">Net Amount</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Margin</td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Action</td>
  </tr>
  <?php
  if($result!='')
  {

  for($i=0;$i<count($result);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php //echo $result[$i]->prn_no; ?><?php echo $result[$i]->booking_number; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->name; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->created_date; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->check_in; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->check_out; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->status; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->cancel_tilldate; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->net_amount; ?> </td>
    <!--<td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo ($result[$i]->amount-$result[$i]->agent_markup); ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result[$i]->agent_markup; ?> </td>-->
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex"><?php
		//if ($result[$i]->status != 'Cancelled' && $result[$i]->booking_day_diff > 0) {
	 
	//echo ' <a href="'.WEB_URL.'b2b_hotel/cancel_booking/'.$result[$i]->transaction_details_id.'">Cancel</a>'; 
	//}
	 if($result[$i]->agent_mode!='cash')
	 {
	 ?>
	<a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL . 'index/voucher_print/' . $result[$i]->hotel_booking_id; ?>'); " >Voucher</a> | 
	<a  href="javascript:void(0);" onclick="JavaScript:newPopup1('<?php echo WEB_URL . 'index/invoice_print/' . $result[$i]->hotel_booking_id; ?>');" >Invoice</a>
	
	<!--| 
	 
	<a  href="javascript:void(0);" onclick="JavaScript:newPopup2('<?php echo WEB_URL  . 'index/send_voucher_email/' . $result[$i]->hotel_booking_id; ?>');" >Mail</a>-->
 
<?php	 }
?>
	 </td>
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="9" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
  
</table>
       
        

        
 	</div>
 </div>

</body>
</html>
