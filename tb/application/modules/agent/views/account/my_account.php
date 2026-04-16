<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR ?>css/postion.css" rel="stylesheet" type="text/css" />

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
				function hotel_fac_sorting()
		{
		
		var sd =document.search.datepicker.value;
		var ed =document.search.datepicker1.value;
		var bookno =document.search.bookno.value;
		
		$("#result").empty().html('<div style="padding-left:400px" align="middle"><img src=\'<?php print WEB_DIR ?>images/ajax-loader(2).gif\'></div>');
		  $("#result").load("<?php print WEB_URL ?>account/booking_search/"+sd+"/"+ed+"/"+bookno);
		
		       return false;
                      // For first time page load default results
                         
		 
		}
		</script>
</head>

<body>
		<div id="main_continer">
   		  <div class="header">
                	<?php $this->load->view('header'); ?>
            
                    <div class="b2b_banner"><img src="<?php echo WEB_DIR ?>images/b2b_banner.jpg" width="977" height="143" /></div>
                    <div class="content_continer">
        <div class="tab_cover">            		
<!-- the tabs -->
<div id="navjam">
<ul class="tabs">
	<li><a href="javascript:void(0)">MY PROFILE</a></li>
	<li><a href="javascript:void(0)">MY Booking</a></li>

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount">
    		<div class="my_booking_Head"><span class="yellow_span">MY ACCOUNT</span>
<span class="small_font_size">Mr Miller welcome to your account</span>
</div>    
<div class="tab_right_section">

		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Login Information: </td>
  </tr>
  <tr>
    <td align="left" valign="top"><input name="" value="<?php echo $profile->email; ?>" class="ma_pro_txt" type="text" /></td>
  </tr>
  <tr>
    <td align="right" valign="top" style="padding:15px 34px 15PX 0;"><img src="<?php echo WEB_DIR ?>images/edit_btn.jpg" width="109" height="35" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">Personal Information:</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name">
      <select class="ma_pro_txt_jumb" name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
        <option>item1</option>
      </select>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="<?php echo $profile->first_name; ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="<?php echo $profile->middle_name; ?>" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="<?php echo $profile->last_name; ?>" /></td>
  </tr>
</table>

</div>
<div class="tab_right_section"><table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">Contact Information: </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Mobile Phone Number" /></td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Alternative Phone Number" /></td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Country" /></td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="City" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Address" /></td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Postal Code" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table></div>
<div class="tab_right_second">
		<table width="300" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:20px 0 0 0;">
  <tr>
    <td align="left" valign="top" class="my_profile_name">My Document Information: </td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Document Type" /></td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Nationalty Phone Number" /></td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Passport Number" /></td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"><input name="" type="text" class="ma_pro_txt" value="Issuing Country" /></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><input name="" type="checkbox" value="" /> &nbsp; Miles Card Holder </td>
  </tr>
  <tr>
   <td align="left" valign="top" class="my_profile_name"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="my_profile_name"><!--<input name="" class="ma_pro_txt" type="text" />--></td>
  </tr>
</table>

</div>
<div class="wi_for_cancel">
			<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:0 0 25px 0;">
  <tr>
    <td align="left" valign="top">
    
    		<table width="350" border="0" align="left" cellpadding="0" cellspacing="0">
  <tr>
    <td style="padding:5px 0 0 0; color:#14a3e7;"><input name="" type="checkbox" value="" /> &nbsp; I want to receive newsletter & great savings offers</td>
  </tr>
  
</table>

    </td>
    <td align="left" valign="top"><table width="250" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td><a href="#"><img src="<?php echo WEB_DIR ?>images/save_btn.jpg" width="109" height="35" /></a></td>
    <td><a href="#"><img src="<?php echo WEB_DIR ?>images/cancel_btn_new.jpg" width="109" height="35" /></a></td>
  </tr>
</table>
</td>
  </tr>
</table>

</div>
    
  </div>
  
    
    
<div id="containerdount">
		<div class="my_booking_Head"><span class="yellow_span">MY BOOKINGS</span>
</div>
<!-- action="<?php echo WEB_URL.'account/booking_search'; ?>" -->
<form method="post"  onsubmit="javascript:return hotel_fac_sorting()" name="search">
		<table width="900" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 0px;">
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
        <option value="available">Available</option>
        <option value="onreq">On Request</option>
        <option value="pending">Pending Confirmation</option>
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
    <input type="image" src="<?php echo WEB_DIR ?>images/search_012.jpg" width="81" height="35" /></td>
  </tr>
</table>
</form>
<div id="result">
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Booking Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">From</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">To</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Rooms</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Adult</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Child</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Voucher Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Price</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_ex">Status</td>
  </tr>
  <?php
  if($result_view!='')
  {
  for($i=0;$i<count($result_view);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->booking_number; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->check_in; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->check_out; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->no_of_room; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->adult; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->child; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->voucher_date; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_view[$i]->amount; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit_ex">Available </td>
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
  
  
<div id="containerdount">3</div>
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
          
          
          <div class="border_dd"></div>
          <div class="footer">
          		<div class="wi1006"> <a href="#" class="FOOTER_LINK">HOME</a>     <a href="#" class="FOOTER_LINK">ABOUT US</a>      <a href="#" class="FOOTER_LINK">ADAVANTAGE</a>      <a href="#" class="FOOTER_LINK">WHY BOOK ONLINE</a>     <a href="#" class="FOOTER_LINK">TERMS & CONDITION</a>      <a href="#" class="FOOTER_LINK">BECOME AGENT </a>
</div>
<div class="copy">©2012  stayaway com. All rights reserved</div>
<div class="wi122"> <img src="<?php echo WEB_DIR ?>images/fb.jpg" width="27" height="27" />&nbsp;
<img src="<?php echo WEB_DIR ?>images/twitter.jpg" width="27" height="27" />&nbsp;<img src="<?php echo WEB_DIR ?>images/google.jpg" width="27" height="27" />&nbsp;<img src="<?php echo WEB_DIR ?>images/skype.jpg" width="27" height="27" />
</div>
          </div>
        </div>
        </div>
</body>
</html>
