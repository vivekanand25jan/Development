<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Console</title>
<link href="<?php echo WEB_DIR; ?>adminstyle.css" rel="stylesheet" type="text/css" />

<script src="<?php echo WEB_DIR ?>jquery.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/themes/base/jquery.ui.all.css">

<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.core.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.widget.js"></script> 
<script src="<?php echo WEB_DIR; ?>datepickernew/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo WEB_DIR; ?>datepickernew/demos.css">

<script type="text/javascript" src="<?php echo WEB_DIR ?>ajaxsbmt.js"></script>
<script language="javascript1.5" type="text/javascript">
function hotel_fac_sorting()
{
	var sd =document.search.datepicker.value;
	var ed =document.search.datepicker1.value;
	var bookno =document.search.bookno.value;
	var status =document.search.status.value;
	
	$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(5).gif\'></div>');
	$("#result").load("<?php print WEB_URL ?>index/booking_search/"+sd+"/"+ed+"/"+bookno+"/"+status);
	
	return false;
	// For first time page load default results
}
</script>

 <div id="div_wrapper">
 	<div id="div_container">
    	
        <table width="986" align="center" border="0" cellpadding="0" cellspacing="0" style="border:0px #aaaaaa solid; margin-top:30px; border-top:none; border-radius:10px; ">
         <?php $this->load->view('header'); ?>
          <tr>
          	<td>
            	<table width="984" border="0" align="center" style="border:1px #9d9d9d solid; margin-top:6px; background-color:#edefed; border-radius:8px;">
                    <tr>
                      <td width="580" valign="top">
                   
        
                     <div id="navjam">
<ul class="tabs" style="position:relative; top:-4px; left:-3px; border-bottom:none">
	<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Credit Reports</a></li>
	<!--<li><a href="javascript:void(0)" style="border-radius:8px 0 0 0">Cash Reports</a></li>-->
	

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>
<span style="float:right; cursor:pointer; font-size:12px; padding:0px;color:#069;"><A HREF="<?php echo WEB_URL; ?>index/dashboard"> Go Back</A></span>
<!-- tab "panes" -->
<div class="panes" style="padding-bottom:0px">
	<div id="containerdount1" class="admin-innerbox" style="width:976px; padding-bottom:0px">
    	
<form method="post"  action="<?php echo WEB_URL; ?>index/serch_filter"  name="search">

<table width="915" align="center" border="0" cellpadding="5" cellspacing="0" style="padding-top:0px">
  <!--<tr>
  	<td colspan="5" style="font-size:16px; text-align:left; padding-left:10px;">Search</td>
  </tr>-->

  <tr>
    <td width="150">Booking Id</td>
    <td><input name="id" type="text" class="ma_pro_txt" /></td>
    <td width="10">&nbsp;</td>
    <td width="150">Booking Status</td>
    <td><select name="status" class="ma_pro_txt" style="width:260px">
      <option  style='padding-left:14px'  value="">ALL</option>
    <option  style='padding-left:14px'  value="confirmed">Confirmed</option>
      <option  style='padding-left:14px'  value="cancelled">Cancelled</option>
      <option  style='padding-left:14px'  value="Pending for Confirmation">Pending</option>
    </select></td>
  </tr>
  <tr>
    <td>Booking From Date</td>
    <td><input name="b_sd" type="text" id="datepicker" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>To Date</td>
    <td><input name="b_ed" type="text"  id="datepicker1"  class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td>Check in From Date</td>
    <td><input name="c_sd" type="text" id="datepicker2" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>To Date</td>
    <td><input name="c_ed" type="text" id="datepicker3" class="ma_pro_txt" /></td>
  </tr>
   
 
  <tr>
    <td>Customer Name</td>
    <td><input name="name" type="text" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>Customer Country</td>
    <td><select name="country" class="ma_pro_txt" style="width:260px">
      <option  style='padding-left:14px'  value="">ALL</option>
      <?php
							
							for ($i = 0; $i < count($countries); $i++) {
								$con = strtr(base64_encode($countries[$i]->country_name),array('+' => '.','=' => '-','/' => '~'));
								echo "<option style='padding-left:14px'  value='" . $con . "'>" . $countries[$i]->country_name."</option>";
							}
						?>
    </select></td>
  </tr>
  <tr>
    <td>Customer Email ID</td>
    <td><input name="email" type="text" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>Customer Phone No.</td>
    <td><input name="ph" type="text" class="ma_pro_txt" /></td>
  </tr>
  <tr>
    <td>Supplier Name</td>
    <td><select name="api" class="ma_pro_txt" style="width:260px">
    <option   style='padding-left:14px' value="">ALL</option>
    <?php
							for ($i = 0; $i < count($api); $i++) {
								echo "<option style='padding-left:14px' value='" . $api[$i]->api_name . "'>" . $api[$i]->api_name."</option>";
							}
						?>
    </select></td>
    <td>&nbsp;</td>
    <td>Supplier Confirmation Number </td>
    <td><input name="api_no" type="text" id="datepicker3" class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" border="0" /></td>
  </tr>

 
    

</table>


<?php /*?><table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 0px;">
  <tr>
   <!-- <td class="my_profile_name">Booking Category:</td>-->
    <td class="my_profile_name">Status:</td>
    <td class="my_profile_name">From: </td>
    <td class="my_profile_name">To:</td>
    <td class="my_profile_name">Booking Number: </td>
     <td class="my_profile_name">&nbsp; </td>
  </tr>
  <tr>
    <!--<td>&nbsp;
       
    </td>-->
    <td><select class="ma_book_txt_fl_jumb" name="status" id="jumpMenu2" >
        <option value="">Confirmed</option>
        <option value="">Cancelled</option>

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
    <td><input class="ma_book_txt_fl" name="sd" id="datepicker" type="text" /></td>
    <td><input class="ma_book_txt_fl" name="ed" id="datepicker1" type="text" /></td>
    <td><input class="ma_book_txt_fl" name="bookno" id="bookno" type="text" /></td>
    <td align="right" class="" style="padding:0 0px 0 10px ;">
    <input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" border="0" /></td>
  </tr>
</table><?php */?>
</form>
<h1><a href="<?php echo WEB_URL;?>index/generate_excel/<?php echo $URL;?>">Download as Excel</a></h1>	
<div style="float:left; width:200%; padding-bottom:85px; position:absolute; margin-top:10px;">
                 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" style="background-color:#E8E5E5; padding:0px; margin:0px; border:0px solid #ccc;">
                <tr>
                  <td align="center" colspan="4" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Booking Information</td>
                  <td align="center" colspan="5" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Agent Information</td>
                  <td align="center" colspan="3" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Action</td>
                  <td align="center" colspan="7" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Hotel Information</td>
                  <td align="center" colspan="2" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Supplier Information</td>
                  <td align="center" colspan="6" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Pricing Information</td>
                </tr>
                 <tr>
                  <td class="admin-table-colo-tab1">Booking&nbsp;ID</td>
                  <td class="admin-table-colo-tab1">Booking&nbsp;Date</td>
                   <td class="admin-table-colo-tab1">CheckIn&nbsp;Date</td>
                  <td class="admin-table-colo-tab1">Supplier&nbsp;Status</td>
                 
               
                 
                  
                  <td class="admin-table-colo-tab1">First&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">Last&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">E-mail&nbsp;ID</td>
                  <td class="admin-table-colo-tab1">TelePhone&nbsp;#</td>
                  <td class="admin-table-colo-tab1">City</td>
                  
                     <td class="admin-table-colo-tab1">Cancellation&nbsp;</td>
                   <td class="admin-table-colo-tab1">Send</td>
                  <td class="admin-table-colo-tab1">Print</td>
                  
                  <td class="admin-table-colo-tab1">Hotel&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">TelePhone&nbsp;#</td>
                  <td class="admin-table-colo-tab1">City</td>
                  <td class="admin-table-colo-tab1">No&nbsp;of&nbsp;Rms</td>
                  <td class="admin-table-colo-tab1">Room&nbsp;Type</td>
                  <td class="admin-table-colo-tab1">Basis</td>
                  <td class="admin-table-colo-tab1">Status</td>
                  
                  <td class="admin-table-colo-tab1">Supplier&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">Supplier&nbsp;Confirmation&nbsp;No.</td>
                  
                  <td class="admin-table-colo-tab1">Selling Price</td>
                  <td class="admin-table-colo-tab1">Currency</td>
                  <td class="admin-table-colo-tab1">Net Price</td>
                  <td class="admin-table-colo-tab1">Profit</td>
                  <td class="admin-table-colo-tab1">Payment Gateway Charge</td>
                  <td class="admin-table-colo-tab1">Profit after Payment Gateway Charges</td>
                  

                </tr>
                  <?php
  if($result_view!='')
  { 
	   for($i=0;$i<count($result_view);$i++)
	  {
		  if($result_view[$i]->visit == 0)
		  {
	   $con_id = $result_view[$i]->customer_contact_details_id;
	   $con_i=$this->admin_model->contact_info_detail_update_new($con_id);
	   $b_nights = $result_view[$i]->nights;
	   $markup_s = $result_view[$i]->markup;
	   $cancel_for_dates = $result_view[$i]->cancel_for_dates;
           $net_for_admin = array_sum(explode(',',$result_view[$i]->extra_service_admin));

	  $net_after_cancel = (($markup_s/$b_nights)*$cancel_for_dates)*$result_view[$i]->currency_val;

          
	$night_char = count(explode(',',$result_view[$i]->daily_rates));
	$namount = ((($result_view[$i]->net_amount)/$result_view[$i]->nights)*$night_char)*$result_view[$i]->currency_val;
	$ext_pri=0;
	$extra = explode(",",$result_view[$i]->extra_services);  
	for($nth=0;$nth<count($extra);$nth++){ $cc = explode('--',$extra[$nth]);$ext_pric[]=$cc[1];$ext_pri+=$cc[1];}
        
        $ex_pri = $ext_pri-$net_for_admin;
   	  ?>
      <tr id="result">
           <td   style="background-color:#D3FEFA;background-image:url(<?php echo WEB_DIR; ?>images/g-r.png); background-repeat:no-repeat;" class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/view_book_detail/<?php echo $result_view[$i]->transaction_details_id; ?>"><?php //echo $result_view[$i]->prn_no;?> <?php echo $result_view[$i]->booking_number; ?></a></td>
	<td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->voucher_date;?></td>
                   <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->check_in;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  
                 
                  
                  <td  style="background-color:#D3FEFA"  class="admin-table-colo-tab"><!--<a href="<?php echo WEB_URL; ?>index/view_user_id/<?php echo $result_view[$i]->transaction_details_id; ?>/<?php echo $result_view[$i]->user_id; ?>"><?php echo $con_i->first_name;?></a>--><?php echo $con_i->first_name;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $con_i->last_name;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $con_i->email;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $con_i->phone;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $con_i->city;?></td>
                  
                   <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/cancel_booking/<?php echo $result_view[$i]->transaction_details_id; ?>">Cancel</a></td>
                   <td  style="background-color:#D3FEFA"  class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/send_voucher/<?php echo $result_view[$i]->transaction_details_id; ?>">Mail</a></td>
                  <td style="background-color:#D3FEFA"   class="admin-table-colo-tab"><a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/booking_number/<?php echo $result_view[$i]->transaction_details_id; ?>');">Voucher</a> / <a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/invoice_print/<?php echo $result_view[$i]->transaction_details_id; ?>');">Invoice</a></td>
                  
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->hotel_name;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->phone;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->city;?></td>
                  <?php 
				  $a = explode("-",$result_view[$i]->room_type);
                                  
                                  
			  
				  ?>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->no_of_room;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $a[0];?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $a[1];?></td>
                   <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->api;?></td>
                  
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->booking_number;?></td>
                 
                  
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $aa =($result_view[$i]->status=="Cancelled" && $result_view[$i]->cancelled_charge!='')?$result_view[$i]->cancelled_charge:($result_view[$i]->amount);?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->xml_currency.$namount;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $net_amount = ($result_view[$i]->status=="Cancelled" && $result_view[$i]->cancelled_charge!='')?($result_view[$i]->cancelled_charge-$net_after_cancel)-$ex_pri:($namount)+$net_for_admin;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $net_profit = ($aa-$net_amount); ?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo round(($aa*$result_view[$i]->gateway/100),2); ?></td>
                   <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $after_getWay = ($result_view[$i]->gateway!=0)?($result_view[$i]->gateway/100)+$net_profit:$net_profit; ?></td>
                </tr>
                <?php
  			}
			
	  }
	  $ext_pri = 0;
 	  for($i=0;$i<count($result_view);$i++)
	  {
		  if($result_view[$i]->visit == 1)
		  {
                      
            $con_id = $result_view[$i]->customer_contact_details_id;
	   $con_i=$this->admin_model->contact_info_detail_update_new($con_id);
	   $b_nights = $result_view[$i]->nights;
	   $markup_s = $result_view[$i]->markup;
	   $cancel_for_dates = $result_view[$i]->cancel_for_dates;
           $net_for_admin = array_sum(explode(',',$result_view[$i]->extra_service_admin));

	  $net_after_cancel = (($markup_s/$b_nights)*$cancel_for_dates)*$result_view[$i]->currency_val;

          
	$night_char = count(explode(',',$result_view[$i]->daily_rates));
	$namount = (($result_view[$i]->net_amount*$result_view[$i]->currency_val)/$result_view[$i]->nights)*$night_char;
	$ext_pri=0;
	$extra = explode(",",$result_view[$i]->extra_services);  
	for($nth=0;$nth<count($extra);$nth++){ $cc = explode('--',$extra[$nth]);$ext_pric[]=$cc[1];$ext_pri+=$cc[1];}
        
        $ex_pri = $ext_pri-$net_for_admin;
          /*
           $net_for_admin = array_sum(explode(',',$result_view[$i]->extra_service_admin));
	   $con_id = $result_view[$i]->customer_contact_details_id;
	   $con_i=$this->admin_model->contact_info_detail_update_new($con_id);
           $night_char = array_sum(explode(',',$result_view[$i]->daily_rates));
           $extra = explode(",",$result_view[$i]->extra_services);  
	   for($nth=0;$nth<count($extra);$nth++){ $cc = explode('--',$extra[$nth]);$ext_pric[]=$cc[1];$ext_pri+=$cc[1];}
           $ex_pri = $ext_pri-$net_for_admin;
           */
   	  ?>
      <tr id="result">
           <td class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/view_book_detail/<?php echo $result_view[$i]->transaction_details_id; ?>"><?php //echo $result_view[$i]->prn_no;?> <?php echo $result_view[$i]->booking_number; ?></a></td>
	<td class="admin-table-colo-tab"><?php echo $result_view[$i]->voucher_date;?></td>
                   <td class="admin-table-colo-tab"><?php echo $result_view[$i]->check_in;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  
                 
                  
                  <td class="admin-table-colo-tab"><!--<a href="<?php echo WEB_URL; ?>index/view_user_id/<?php echo $result_view[$i]->transaction_details_id; ?>/<?php echo $result_view[$i]->user_id; ?>"><?php echo $con_i->first_name;?></a>--><?php echo $con_i->first_name;?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->last_name;?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->email;?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->phone;?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->city;?></td>
                  
                   <td class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/cancel_booking/<?php echo $result_view[$i]->transaction_details_id; ?>">Cancel</a></td>
                   <td class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/send_voucher/<?php echo $result_view[$i]->transaction_details_id; ?>">Mail</a></td>
                  <td class="admin-table-colo-tab"><a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/print_voucher/<?php echo $result_view[$i]->transaction_details_id; ?>');">Voucher</a> / <a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/invoice_print/<?php echo $result_view[$i]->transaction_details_id; ?>');">Invoice</a></td>
                  
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->hotel_name;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->phone;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->city;?></td>
                  <?php 
				  $a = explode("-",$result_view[$i]->room_type);
			  
				  ?>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->no_of_room;?></td>
                  <td class="admin-table-colo-tab"><?php echo $a[0];?></td>
                  <td class="admin-table-colo-tab"><?php echo $a[1];?></td>
                   <td class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->api;?></td>
                  
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->booking_number;?></td>
                 
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $aa =($result_view[$i]->status=="Cancelled" && $result_view[$i]->cancelled_charge!='')?$result_view[$i]->cancelled_charge:($result_view[$i]->amount);?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->xml_currency;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $net_amount = ($result_view[$i]->status=="Cancelled" && $result_view[$i]->cancelled_charge!='')?($result_view[$i]->cancelled_charge-$net_after_cancel)-$ex_pri:($namount)+$net_for_admin;?></td><?php /* *$result_view[$i]->currency_val */ ?>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $net_profit = ($aa-$net_amount); ?></td>
                   <?php /* ?><td class="admin-table-colo-tab"><?php echo $aa =($result_view[$i]->cancelled_charge!='')?$result_view[$i]->cancelled_charge:($result_view[$i]->amount);?></td>
                  <td  class="admin-table-colo-tab">AED</td>
                  <td   class="admin-table-colo-tab"><?php echo $result_view[$i]->amount-$result_view[$i]->markup;?></td>
                  <td  class="admin-table-colo-tab"><?php echo $result_view[$i]->markup; ?></td><?php */ ?>
                  <td  class="admin-table-colo-tab"><?php echo $result_view[$i]->gateway; ?></td>
                   <td   class="admin-table-colo-tab"><?php echo $net_profit ; ?></td> 
                </tr>
                <?php
  			}
			
	  }
	
	  
  }
  ?>
              </table>
</div>
<?php /*?><div id="result">
<table width="920" border="0" align="left" cellpadding="0" cellspacing="1" style="margin:15px 0 0 15px; background-color:#E8E5E5; border:0px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="admin-table-colo">Booking Number</td>
    <td align="center" valign="top" class="admin-table-colo">From</td>
    <td align="center" valign="top" class="admin-table-colo">To</td>
    <td align="left" valign="top" class="admin-table-colo">Rooms</td>
    <td align="left" valign="top" class="admin-table-colo">Adult</td>
    <td align="left" valign="top" class="admin-table-colo">Child</td>
    <td align="left" valign="top" class="admin-table-colo">Voucher Date</td>
    <td align="center" valign="top" class="admin-table-colo">Price</td>
    <td align="center" valign="top" class="admin-table-colo">Status</td>
  </tr>
  <?php
  if($result_view!='')
  {
  for($i=0;$i<count($result_view);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->booking_number; ?></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->check_in; ?></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->check_out; ?> 	</td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->no_of_room; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->adult; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->child; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->voucher_date; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->amount; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1">Confirmed </td>
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
 <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">454022</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">ATH</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">SKG 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">Olympic Air</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">13/06/12 12:35</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">18/06/12 21:00</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">3</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">1.268,16 €</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second_ex">Confirmed</td>
  </tr>
</table>
</div><?php */?>




  </div>
  
  
  <div id="containerdount1" class="admin-innerbox" style="width:976px; padding-bottom:0px">
    	
<form method="post"  action="<?php echo WEB_URL; ?>index/serch_filter"  name="search">

<table width="915" align="center" border="0" cellpadding="5" cellspacing="0" style="padding-top:0px">
  <!--<tr>
  	<td colspan="5" style="font-size:16px; text-align:left; padding-left:10px;">Search</td>
  </tr>-->

  <tr>
    <td width="150">Booking Id</td>
    <td><input name="id" type="text" class="ma_pro_txt" /></td>
    <td width="10">&nbsp;</td>
    <td width="150">Booking Status</td>
    <td><select name="status" class="ma_pro_txt" style="width:260px">
      <option  style='padding-left:14px'  value="">ALL</option>
    <option  style='padding-left:14px'  value="confirmed">Confirmed</option>
      <option  style='padding-left:14px'  value="cancelled">Cancelled</option>
    </select></td>
  </tr>
  <tr>
    <td>Booking From Date</td>
    <td><input name="b_sd" type="text" id="datepicker" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>To Date</td>
    <td><input name="b_ed" type="text"  id="datepicker1"  class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td>Check in From Date</td>
    <td><input name="c_sd" type="text" id="datepicker2" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>To Date</td>
    <td><input name="c_ed" type="text" id="datepicker3" class="ma_pro_txt" /></td>
  </tr>
   
 
  <tr>
    <td>Customer Name</td>
    <td><input name="name" type="text" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>Customer Country</td>
    <td><select name="country" class="ma_pro_txt" style="width:260px">
      <option  style='padding-left:14px'  value="">ALL</option>
      <?php
							
							for ($i = 0; $i < count($countries); $i++) {
								$con = strtr(base64_encode($countries[$i]->country_name),array('+' => '.','=' => '-','/' => '~'));
								echo "<option style='padding-left:14px'  value='" . $con . "'>" . $countries[$i]->country_name."</option>";
							}
						?>
    </select></td>
  </tr>
  <tr>
    <td>Customer Email ID</td>
    <td><input name="email" type="text" class="ma_pro_txt" /></td>
    <td>&nbsp;</td>
    <td>Customer Phone No.</td>
    <td><input name="ph" type="text" class="ma_pro_txt" /></td>
  </tr>
  <tr>
    <td>Supplier Name</td>
    <td><select name="api" class="ma_pro_txt" style="width:260px">
    <option   style='padding-left:14px' value="">ALL</option>
    <?php
							for ($i = 0; $i < count($api); $i++) {
								echo "<option style='padding-left:14px' value='" . $api[$i]->api_name . "'>" . $api[$i]->api_name."</option>";
							}
						?>
    </select></td>
    <td>&nbsp;</td>
    <td>Supplier Confirmation Number </td>
    <td><input name="api_no" type="text" id="datepicker3" class="ma_pro_txt" /></td>
  </tr>
   <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" border="0" /></td>
  </tr>

 
    

</table>


<?php /*?><table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 0px;">
  <tr>
   <!-- <td class="my_profile_name">Booking Category:</td>-->
    <td class="my_profile_name">Status:</td>
    <td class="my_profile_name">From: </td>
    <td class="my_profile_name">To:</td>
    <td class="my_profile_name">Booking Number: </td>
     <td class="my_profile_name">&nbsp; </td>
  </tr>
  <tr>
    <!--<td>&nbsp;
       
    </td>-->
    <td><select class="ma_book_txt_fl_jumb" name="status" id="jumpMenu2" >
        <option value="">Confirmed</option>
        <option value="">Cancelled</option>

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
    <td><input class="ma_book_txt_fl" name="sd" id="datepicker" type="text" /></td>
    <td><input class="ma_book_txt_fl" name="ed" id="datepicker1" type="text" /></td>
    <td><input class="ma_book_txt_fl" name="bookno" id="bookno" type="text" /></td>
    <td align="right" class="" style="padding:0 0px 0 10px ;">
    <input type="image" src="<?php echo WEB_DIR ?>images/sub_mint_btn_admin.png" border="0" /></td>
  </tr>
</table><?php */?>
</form>

<div style="float:left; width:200%; padding-bottom:85px; position:absolute; margin-top:10px;">
                 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" style="background-color:#E8E5E5; padding:0px; margin:0px; border:0px solid #ccc;">
                <tr>
                  <td align="center" colspan="4" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Booking Information</td>
                  <td align="center" colspan="5" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Agent Information</td>
                  <td align="center" colspan="3" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Action</td>
                  <td align="center" colspan="7" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Hotel Information</td>
                  <td align="center" colspan="2" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Supplier Information</td>
                  <td align="center" colspan="6" class="admin-table-colo-tab1" style="background-color:#517BA5; color:#FFF">Pricing Information</td>
                </tr>
                 <tr>
                  <td class="admin-table-colo-tab1">Booking&nbsp;ID</td>
                  <td class="admin-table-colo-tab1">Booking&nbsp;Date</td>
                   <td class="admin-table-colo-tab1">CheckIn&nbsp;Date</td>
                  <td class="admin-table-colo-tab1">Supplier&nbsp;Status</td>
                 
               
                 
                  
                  <td class="admin-table-colo-tab1">First&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">Last&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">E-mail&nbsp;ID</td>
                  <td class="admin-table-colo-tab1">TelePhone&nbsp;#</td>
                  <td class="admin-table-colo-tab1">City</td>
                  
                     <td class="admin-table-colo-tab1">Cancellation&nbsp;</td>
                   <td class="admin-table-colo-tab1">Send</td>
                  <td class="admin-table-colo-tab1">Print</td>
                  
                  <td class="admin-table-colo-tab1">Hotel&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">TelePhone&nbsp;#</td>
                  <td class="admin-table-colo-tab1">City</td>
                  <td class="admin-table-colo-tab1">No&nbsp;of&nbsp;Rms</td>
                  <td class="admin-table-colo-tab1">Room&nbsp;Type</td>
                  <td class="admin-table-colo-tab1">Basis</td>
                  <td class="admin-table-colo-tab1">Status</td>
                  
                  <td class="admin-table-colo-tab1">Supplier&nbsp;Name</td>
                  <td class="admin-table-colo-tab1">Supplier&nbsp;Confirmation&nbsp;No.</td>
                  
                  <td class="admin-table-colo-tab1">Selling Price</td>
                  <td class="admin-table-colo-tab1">Currency</td>
                  <td class="admin-table-colo-tab1">Net Price</td>
                  <td class="admin-table-colo-tab1">Profit</td>
                  <td class="admin-table-colo-tab1">Payment Gateway Charge</td>
                  <td class="admin-table-colo-tab1">Profit after Payment Gateway Charges</td>
                  

                </tr>
                  <?php
  if($result_view!='')
  {
	
	
	   for($i=0;$i<count($result_view);$i++)
	  {
		  if($result_view[$i]->visit == 0)
		  {
                        $net_for_admin = array_sum(explode(',',$result_view[$i]->extra_service_admin));
	   $con_id = $result_view[$i]->customer_contact_details_id;
	   $con_i=$this->admin_model->contact_info_detail_update_new($con_id);
$extra = explode("--",$result_view[$i]->extra_services);$ext_priiii=0;
	for($nth = 0;$nth<count($extra);$nth++){ $ext_priiii+=$extra[1];}
   	  ?>
      <tr id="result">
           <td   style="background-color:#D3FEFA;background-image:url(<?php echo WEB_DIR; ?>images/g-r.png); background-repeat:no-repeat;" class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/view_book_detail/<?php echo $result_view[$i]->transaction_details_id; ?>"><?php //echo $result_view[$i]->prn_no;?> <?php echo $result_view[$i]->booking_number; ?></a></td>
	<td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->voucher_date;?></td>
                   <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->check_in;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  
                 
                  
                  <td  style="background-color:#D3FEFA"  class="admin-table-colo-tab"><!--<a href="<?php echo WEB_URL; ?>index/view_user_id/<?php echo $result_view[$i]->transaction_details_id; ?>/<?php echo $result_view[$i]->user_id; ?>"><?php echo $con_i->first_name;?></a>--><?php echo $con_i->first_name;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $con_i->last_name;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $con_i->email;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $con_i->phone;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $con_i->city;?></td>
                  
                   <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/cancel_booking/<?php echo $result_view[$i]->transaction_details_id; ?>">Cancel</a></td>
                   <td  style="background-color:#D3FEFA"  class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/send_voucher/<?php echo $result_view[$i]->transaction_details_id; ?>">Mail</a></td>
                  <td style="background-color:#D3FEFA"   class="admin-table-colo-tab"><a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/print_voucher/<?php echo $result_view[$i]->transaction_details_id; ?>');">Voucher</a> / <a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/invoice_print/<?php echo $result_view[$i]->hotel_booking_id; ?>');">Incoice</a></td>
                  
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->hotel_name;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->phone;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->city;?></td>
                  <?php 
				  $a = explode("-",$result_view[$i]->room_type);
			  
				  ?>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->no_of_room;?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $a[0];?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $a[1];?></td>
                   <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->api;?></td>
                  
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->booking_number;?></td>
                 
                  
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo ($result_view[$i]->amount-$result_view[$i]->markup)?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->xml_currency.'3';?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $net_for_admin;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $result_view[$i]->markup; ?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->gateway; ?></td>
                   <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo ($result_view[$i]->markup-$result_view[$i]->gateway); ?></td>
                </tr>
                <?php
  			}
			
	  }
	  
 	  for($i=0;$i<count($result_view);$i++)
	  {
		  if($result_view[$i]->visit == 1)
		  {
                      $net_for_admin = array_sum(explode(',',$result_view[$i]->extra_service_admin));
	   $con_id = $result_view[$i]->customer_contact_details_id;
	   $con_i=$this->admin_model->contact_info_detail_update_new($con_id);
$extra = explode("--",$result_view[$i]->extra_services);$ext_pris=0;
	for($nth = 0;$nth<count($extra);$nth++){ $ext_pris+=$extra[1];}
   	  ?>
      <tr id="result">
           <td class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/view_book_detail/<?php echo $result_view[$i]->transaction_details_id; ?>"><?php //echo $result_view[$i]->prn_no;?> <?php echo $result_view[$i]->booking_number; ?></a></td>
	<td class="admin-table-colo-tab"><?php echo $result_view[$i]->voucher_date;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->check_in;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  
                 
                  
                  <td class="admin-table-colo-tab"><!--<a href="<?php echo WEB_URL; ?>index/view_user_id/<?php echo $result_view[$i]->transaction_details_id; ?>/<?php echo $result_view[$i]->user_id; ?>"><?php echo $con_i->first_name;?></a>--><?php echo $con_i->first_name; ?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->last_name;?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->email;?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->phone;?></td>
                  <td class="admin-table-colo-tab"><?php echo $con_i->city;?></td>
                  
                   <td class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/cancel_booking/<?php echo $result_view[$i]->transaction_details_id; ?>">Cancel</a></td>
                   <td class="admin-table-colo-tab"><a href="<?php echo WEB_URL; ?>index/send_voucher/<?php echo $result_view[$i]->transaction_details_id; ?>">Mail</a></td>
                  <td class="admin-table-colo-tab"><a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/print_voucher/<?php echo $result_view[$i]->transaction_details_id; ?>');">Voucher</a> / <a  href="javascript:void(0);" onclick="JavaScript:newPopup('<?php echo WEB_URL; ?>index/invoice_print/<?php echo $result_view[$i]->hotel_booking_id; ?>');">Incoice</a></td>
                  
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->hotel_name;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->phone;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->city;?></td>
                  <?php 
				  $a = explode("-",$result_view[$i]->room_type);
			  
				  ?>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->no_of_room;?></td>
                  <td class="admin-table-colo-tab"><?php echo $a[0];?></td>
                  <td class="admin-table-colo-tab"><?php echo $a[1];?></td>
                   <td class="admin-table-colo-tab"><?php echo $result_view[$i]->status;?></td>
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->api;?></td>
                  
                  <td class="admin-table-colo-tab"><?php echo $result_view[$i]->booking_number;?></td>
                 
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $aa =($result_view[$i]->status=="Cancelled" && $result_view[$i]->cancelled_charge!='')?$result_view[$i]->cancelled_charge:($result_view[$i]->amount);?></td><?php /* *$result_view[$i]->currency_val */ ?>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $result_view[$i]->xml_currency.'4';?></td>
                  <td style="background-color:#D3FEFA"  class="admin-table-colo-tab"><?php echo $net_amount = ($result_view[$i]->status=="Cancelled" && $result_view[$i]->cancelled_charge!='')?$result_view[$i]->cancelled_charge:($result_view[$i]->net_amount*$result_view[$i]->currency_val)+$net_for_admin;?></td>
                  <td  style="background-color:#D3FEFA" class="admin-table-colo-tab"><?php echo $net_profit = ($aa-$net_amount); ?></td>
                  <?php/*?> <td class="admin-table-colo-tab"><?php echo ($result_view[$i]->amount-$result_view[$i]->markup)?></td>
                  <td  class="admin-table-colo-tab">AED</td>
                  <td   class="admin-table-colo-tab"><?php echo $result_view[$i]->amount;?></td>
                  <td  class="admin-table-colo-tab"><?php echo $result_view[$i]->markup; ?></td><?php */?>
                  <td  class="admin-table-colo-tab"><?php echo $result_view[$i]->gateway; ?></td>
                   <td   class="admin-table-colo-tab"><?php echo ($result_view[$i]->markup-$result_view[$i]->gateway); ?></td> 
                </tr>
                <?php
  			}
			
	  }
	
	  
  }
  ?>
              </table>
</div>
<?php /*?><div id="result">
<table width="920" border="0" align="left" cellpadding="0" cellspacing="1" style="margin:15px 0 0 15px; background-color:#E8E5E5; border:0px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="admin-table-colo">Booking Number</td>
    <td align="center" valign="top" class="admin-table-colo">From</td>
    <td align="center" valign="top" class="admin-table-colo">To</td>
    <td align="left" valign="top" class="admin-table-colo">Rooms</td>
    <td align="left" valign="top" class="admin-table-colo">Adult</td>
    <td align="left" valign="top" class="admin-table-colo">Child</td>
    <td align="left" valign="top" class="admin-table-colo">Voucher Date</td>
    <td align="center" valign="top" class="admin-table-colo">Price</td>
    <td align="center" valign="top" class="admin-table-colo">Status</td>
  </tr>
  <?php
  if($result_view!='')
  {
  for($i=0;$i<count($result_view);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->booking_number; ?></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->check_in; ?></td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->check_out; ?> 	</td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->no_of_room; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->adult; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->child; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->voucher_date; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1"><?php echo $result_view[$i]->amount; ?> </td>
    <td align="left" valign="top" class="admin-table-colo1">Confirmed </td>
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
 <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">454022</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">ATH</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">SKG 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">Olympic Air</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">13/06/12 12:35</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">18/06/12 21:00</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">3</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second">1.268,16 €</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_second_ex">Confirmed</td>
  </tr>
</table>
</div><?php */?>




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
          	<td style="width:980px;">
                 
                 
                 
    
                 
            
            </td>
          </tr>
          <tr><td>&nbsp;</td></tr>
        </table>
        
        <div style="clear:both; height:30px;">&nbsp;</div>
        

        
 	</div>
    

    
 </div>
</body>
</html>
   
             

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
		$( "#datepicker2" ).datepicker({
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
			$( "#datepicker" ).datepicker( "option", "showAnim", $( this ).val() );
		});
		
	});
	
	</script>
              <script type="text/javascript">
// Popup window code
function newPopup(url) {
	popupWindow = window.open(
		url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
}
</script>
