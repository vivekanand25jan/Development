<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Travel Bay</title>

<link href="<?php echo WEB_DIR; ?>designAccess/css/travel_bay_stylesheet.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo WEB_DIR; ?>designAccess/engine1/style.css" />


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
		
		function val_sub()
		{
			if(document.reg.catacery.value == 'Cancellation Request')
			{
				if(document.reg.res_no.value == '')
				{
					alert("Please Choose Reservation Number...");
					return false;
				}
			}
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
<li><a href="<?php echo WEB_URL; ?>b2b/my_booking/" >MY BOOKING</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><?php if ($this->session->userdata('agent_logged_in')) :?><a href="<?php echo WEB_URL; ?>b2b/agent_profile" >MY CPANEL</a><?php endif;?></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/my_favourite/"  >MY FAVOURITE</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a href="<?php echo WEB_URL; ?>b2b/support_ticket/" id="nav_active">SUPPORT TICKET</a></li>
<li><div><img src="<?php echo WEB_DIR; ?>designAccess/images/nav_line.png" width="1" height="45" border="0" /></div></li>
<li><a  href="<?php echo WEB_URL; ?>b2b/contact/" onclick="$('#lightbox').show();" target="light_box" class="text3"">CONTACT US</a></li>
</ul>
</div>
</div>
<div class="nav_right"></div>
</div>
<div class="midlebody">

    <div class="mainbody_signin">
   
    <div>
    <div class="hotelnames_signin" style="min-height:329px;">
    
   		<!--<div class="right-hotel-name">Youngor Central Suzhou</div>--><div id="mybook-tit">SUPPORT TICKET</div>
   
        <div class="">            		
<!-- the tabs -->
<div id="navjam">
<ul class="tabs">
	<li><a href="javascript:void(0)">PENDING</a></li>

    <li><a href="javascript:void(0)">CLOSED</a></li>
    <li><a href="javascript:void(0)">NEW TICKET</a></li>

   <!-- <li><a href="#">MY TRAVELERS</a></li>
     <li><a href="#">BILLING INFO</a></li>
          <li><a href="#">CREDIT POINTS</a></li>
               <li><a href="#">TOOLS </a></li>-->
</ul>
</div>

<!-- tab "panes" -->
<div class="panes">
	<div id="containerdount" style="padding-top:30px;">
    	
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Ticket No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Category</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Reservation Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Message</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Creation Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Last Update</td>
        <td align="left" valign="top" class="my_profile_name_ex_tab">Status</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Last Update By</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
   
  </tr>
  <?php
  if($result_p!='')
  {

  for($i=0;$i<count($result_p);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->ticket_id; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->catacery; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->res_no ; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->message ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->created_date; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->update_date ; ?> </td>
        <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->status ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_p[$i]->process2 ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL.'b2b/close_ticket/'.$result_p[$i]->ticket_id; ?>">CLOSE</a> / <a href="<?php echo WEB_URL.'b2b/view_ticket/'.$result_p[$i]->ticket_id; ?>">VIEW</a></td>
    
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="7" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
</table>

    
  </div>
  <?php /*?><div id="containerdount" style="padding-top:30px;">
    	
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Ticket No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Category</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Reservation Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Message</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Creation Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Last Update</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
   
  </tr>
  <?php
  if($result_h!='')
  {

  for($i=0;$i<count($result_h);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_h[$i]->ticket_id; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_h[$i]->catacery; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_h[$i]->res_no ; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_h[$i]->message ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_h[$i]->created_date; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_h[$i]->update_date ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL.'b2b/close_ticket/'.$result_h[$i]->ticket_id; ?>">CLOSE</a> / <a href="<?php echo WEB_URL.'b2b/view_ticket/'.$result_h[$i]->ticket_id; ?>">VIEW</a></td>
    
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="7" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
</table>

    
  </div><?php */?>
  <div id="containerdount" style="padding-top:30px;">
    	
<table width="920" border="0" align="left" cellpadding="0" cellspacing="0" style="margin:15px 0 0 15px; border:1px solid #ccc;">
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Ticket No</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Category</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Reservation Number</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Message</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Creation Date</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab">Last Update</td>
        <td align="left" valign="top" class="my_profile_name_ex_tab">Closed By</td>
        <td align="left" valign="top" class="my_profile_name_ex_tab">Action</td>
   
  </tr>
  <?php
  if($result_c!='')
  {

  for($i=0;$i<count($result_c);$i++)
  {
  ?>
  <tr>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_c[$i]->ticket_id; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_c[$i]->catacery; ?></td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_c[$i]->res_no ; ?> 	</td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_c[$i]->message ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_c[$i]->created_date; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_c[$i]->update_date ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><?php echo $result_c[$i]->process ; ?> </td>
    <td align="left" valign="top" class="my_profile_name_ex_tab_whit"><a href="<?php echo WEB_URL.'b2b/view_ticket/'.$result_c[$i]->ticket_id; ?>">VIEW</a></td>
    
  </tr>
  <?php
  }
  }
  else
  {
	  ?> <td align="center" valign="top" colspan="7" class="my_profile_name_ex_tab_whit_ex">No Result Found... </td>
      <?php
  }
  ?>
</table>

    
  </div>
  
    
    
 
  
  

<div id="containerdount" style="margin-top:15px;">

<form onsubmit="javascript:return val_sub()" action="<?php echo WEB_URL.'b2b/new_ticket'; ?>" method="post" style="margin-top:30px"  name="reg" >
<font style=" color: #243419;
    font-size: 17px;
    margin-left:20px;
    font-weight: bold;">Create a new Query Ticket</font><br />
    <font style=" color: #243419;
    font-family: MAIAN;  margin-left:20px;
    font-size: 15px;
    ">
To send your queries, please select one of the below sections, write your question to the subject and message part and press the enter key.</font><br />
<font style=" color:#F00;
  margin-left:20px;
    font-size: 15px;
   ">Important note: Please specify your reservation number for the queries related to your reservation/s. </font>
    <table width="100%" border="0" cellspacing="7" cellpadding="7">
  <tr>
    <td width="28%">Category </td>
    <td width="4%">:</td>
    <td width="68%">
    <select onchange="javascript: cancel(this.value)" name="catacery" class="agent_text_cover_txt_feil">
    <option value="Amendment Request">Amendment Request</option>
<option value="Cancellation Request">Cancellation Request</option>
<option value="Complaint">Complaint</option>
<option value="Hotel Facilities and Booking Preferences">Hotel Facilities and Booking Preferences</option>
<option value="Payment / Commission">Payment / Commission</option>
<option value="Tours / Transfers">Tours / Transfers</option>
<option value="Visa Support">Visa Support</option>
</select>
    </td>
  </tr>
  <tr>
    <td>Subject</td>
    <td>:</td>
    <td><input class="agent_text_cover_txt_feil" name="subject" type="text" value="<?php if (set_value('subject') != null) { echo set_value('subject');}  ?>" /><div style="color:#FF0000;"> <?php echo form_error('subject');?></div></td>
  </tr><script>
	function cancel(id)
	{
		if(id == 'Cancellation Request')
		{
			$("#cancell").hide();
			 $("#ticketno2").slideDown();
			$("#ticketno").hide();
		}
	}
	function view_ticket()
	{
		 
		    $("#ticketno2").hide();
			 $("#ticketno").show();
	}function view_ticket1()
	{
		
		    $("#ticketno2").slideDown();
			$("#ticketno").hide();
	}
	</script>
   <?php
	if($result != '' || $result_b!='')
	{
		?>
        
  <tr id="cancell">
    <td>Do you have a reservation number </td>
    <td>:</td>
    
    <td>
   
    <input type="radio" onclick="javascript:return view_ticket1()" value="yes" name="reservation">
    YES
    
    <input type="radio" checked="checked" onclick="javascript:return view_ticket()" value="yes" name="reservation">
    NO
						</td>
  </tr>
  <?php
	}
	?>
  <tr>
    <td>Reservation Number </td>
    <td>:</td>
    <td id="ticketno" > Nil</td>
    <td id="ticketno2" style="display:none; ">
     <select name="res_no" class="agent_text_cover_txt_feil">
     <option value="">-Select-</option>
    <?php 
	if($result!='')
	{
	for($s=0;$s<count($result);$s++)
	{
		?>
    <option value="<?php echo $result[$s]->transaction_details_id; ?>"><?php echo $result[$s]->prn_no.' ( '.$result[$s]->booking_number.' )'; ?></option>

<?php
	}
	}
	if($result_b!='')
	{
	for($s=0;$s<count($result_b);$s++)
	{
			?>
    <option value="<?php echo $result_b[$s]->transaction_details_id; ?>"><?php echo $result_b[$s]->prn_no.' ( '.$result[$s]->booking_number.' )'; ?></option>

<?php
	}
	}
	?>
</select>
						</td>
  </tr>
  <tr>
    <td>Message  </td>
    <td>:</td>
    <td>
    <textarea name="message" cols="60" rows="4"></textarea>
    
						</td>
  </tr>
   
   
   
   
  <tr>
  <td>&nbsp;</td><td>&nbsp;</td><td><input type="image" src="<?php echo WEB_DIR ?>images/save-but.png"  /></td>
  
</table>

    	
</form></div>

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
 