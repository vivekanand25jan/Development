<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="<?php echo WEB_DIR; ?>css/postion.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo WEB_DIR; ?>script/jquery-1.4.2.min.js"></script>

<link type="text/css" href="<?php echo WEB_DIR; ?>datepickernew/css/overcast/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" ssrc="<?php echo WEB_DIR; ?>datepickernew/jquery.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR; ?>datepickernew/ui.core.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR; ?>datepickernew/ui.datepicker.js"></script>

<script>
function zeroPad(num,count)
{
	var numZeropad = num + '';
	while(numZeropad.length < count) {
	numZeropad = "0" + numZeropad;
	}
	return numZeropad;
}
function valid_date()
{
	var sd = document.getElementById('datepicker3').value;
	var ed = document.getElementById('datepicker4').value;
	
	if(sd=='' || ed=='')
	{
		alert("Please enter date");
		return false; 
	}
	
}
function dateADD(currentDate)
{
 var valueofcurrentDate=currentDate.valueOf()+(24*60*60*1000);
 var newDate =new Date(valueofcurrentDate);
 return newDate;
} 

$(document).ready(function(){
			  
			$(function() {
							$( "#datepicker3" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: -30
							});

						});
						
				 $('#datepicker3').change(function(){
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
				   
							$( "#datepicker4" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker4" ).val($t);
				  });					  
									

} )

$(document).ready(function(){


			$(function() {
							$( "#datepicker" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: 0
							});

						});
						
				 $('#datepicker').change(function(){
				   //$t=$(this).val();
				  // alert($t);
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
							$( "#datepicker1" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker1" ).val($t);
				  });						

} )


$(document).ready(function(){
			  
			$(function() {
							$( "#datepicker5" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: -30
							});

						});
						
				 $('#datepicker5').change(function(){
				   var selectedDate = $(this).datepicker('getDate');
			       var nextdayDate  = dateADD(selectedDate);
				   var nextDateStr = zeroPad(nextdayDate.getDate(),2)+"/"+zeroPad((nextdayDate.getMonth()+1),2)+"/"+(nextdayDate.getFullYear());
				   
				   $t = nextDateStr;
				   
							$( "#datepicker6" ).datepicker({
								changeMonth: true,
								changeYear: true,
								minDate: $t
							});
				   $( "#datepicker6" ).val($t);
				  });					  
									

} )
	</script>
<script type="text/javascript">
function valid()
{
	 fname=document.advance_search;
	var val=fname.sel_date_type.value;
	if(val!=''){
		
	if(fname.fdate.value=='')
	{
	alert('Please Select From date');
	fname.fdate.focus();
	return false;
	}
	if(fname.tdate.value=='')
	{
	alert('Please Select To Date');
	fname.tdate.focus();
	return false;
	}
	if (CompareDates(fname.tdate.value,fname.fdate.value))
	{
	alert("From  Date cannot be greater than To Date"); 
	fname.tdate.focus();        
	return false; 
	}
	}


}
function CompareDates(str1,str2) 
{ 
	var dt1  = parseInt(str1.substring(0,2),10); 
	var mon1 = parseInt(str1.substring(3,5),10); 
	var yr1  = parseInt(str1.substring(6,10),10); 
	var dt2  = parseInt(str2.substring(0,2),10); 
	var mon2 = parseInt(str2.substring(3,5),10); 
	var yr2  = parseInt(str2.substring(6,10),10); 
	var date1 = new Date(yr1, mon1, dt1); 
	var date2 = new Date(yr2, mon2, dt2); 

	if(date2 < date1) 
	{ 
		return false; 
	} 
	else 
	{ 
		return true; 
	} 
} 

</script>
	
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>
		<div id="main_continer">
   		  <div class="header">
                	<?php echo $this->load->view('b2b/header'); ?>
            
                    <div class="b2b_banner"><img src="<?php echo WEB_DIR ?>images/b2b_banner.jpg" width="977" height="143" /></div>
                    <div class="content_cover">
                    		<?php //echo $this->load->view('b2b/agent_left_panel'); ?>
                            <div class="hotel_right_panel">
                            	
		<div class="content flights">
        <?php
		if ($this->session->userdata('branch_id') == 0) : ?>
		<a href="<?php echo WEB_URL.'b2b/my_booking/'; ?>">MY BOOKINGS</a> &nbsp; <a href="<?php echo WEB_URL.'b2b/branch_booking/'; ?>">BRANCH BOOKINGS</a> <BR /><BR />
		<?php endif; ?>
        <div class="agent_management">MY BOOKINGS</div>
        <div class="wi680_search_branc">
		<form action="<?php echo WEB_URL.'b2b/my_booking/'; ?>" method="post"  name="reg" >
				
				
        		<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Booking Number :</div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="booking_number" type="text" value="<?php if( isset($booking_number)) echo $booking_number; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('booking_number');?></div>
						</div>
                </div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Passenger Name : </div>
                        <div class="tb_sample_cover_thre_R"><input class="agent_text_cover_txt_feil" name="passenger_name" type="text" value="<?php if( isset($passenger_name)) echo $passenger_name; ?>" />
						<div style="color:#FF0000;"> <?php echo form_error('passenger_name');?>
						</div>
                </div>
				</div>
				
                <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Booking Status : </div>
                        <div class="tb_sample_cover_thre_R"><select class="agent_acc_depo-h1-right-fld-3" name="booking_status">
                           
                              <option value="confirmed">Confirmed</option>
                                 <option value="cancelled">Cancelled</option>
                              </select>
						<div style="color:#FF0000;"> <?php echo form_error('booking_status');?>
						</div>
                </div>
				</div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Date Type : </div>
                        <div class="tb_sample_cover_thre_R">
						 <select class="agent_acc_depo-h1-right-fld-3" name="sel_date_type" >
                         <option value="">Select Date Type</option>
                              <option value="1">Check in date</option>
                                <option value="2">Booking Date</option>
                              </select>  
							  
						<div style="color:#FF0000;"> <?php echo form_error('date_type');?>
						</div>
                </div>
				</div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> Between : </div>
                        <div class="tb_sample_cover_thre_R">
						 
							  <input name="fdate" type="text" value="" id="datepicker5" maxlength="10" size="7"/>	<img src="<?php print WEB_DIR; ?>images/cal.gif" alt="" border="0" /> 
						<div style="color:#FF0000;"> <?php echo form_error('fdate');?>
						</div>
                </div>
				</div>
				
				<div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L"> And : </div>
                        <div class="tb_sample_cover_thre_R">
						 
							  <input name="tdate" type="text" value="" id="datepicker6" maxlength="10" size="7" />	<img src="<?php print WEB_DIR; ?>images/cal.gif" alt="" border="0" />
						<div style="color:#FF0000;"> <?php echo form_error('tdate');?>
						</div>
                </div>
				</div>
				<?php
					$method_name = $this->uri->segment(2);
				?>
				<input type="hidden" name='booking_type' value='<?php echo $method_name; ?>'>
				

				

        
        <div class="tb_sample_cover_thre">
                		<div class="tb_sample_cover_thre_L" style="line-height:25PX;"> &nbsp;</div>
                        <div class="tb_sample_cover_thre_R"><input type="image" src="<?php echo WEB_DIR ?>images/search_btn_new.jpg" width="109" height="35" /></div>
          </div>
		  </form>
        
        </div>
        	<span class="clear"></span>
	  
 
                          <div style="clear:both;"></div>  
					<!-- Search result start -->
						  <div class="tb">
            		<div class="tb_sample_cover">
                    <div class="tb_col_01">Booking Number</div>
                    <div class="tb_col_01">Amount (USD)</div>
					<div class="tb_col_01">Booking Date</div>
                    <div class="tb_col_01">Check-in</div>
					<div class="tb_col_01">Check-out</div>
					<div class="tb_col_01">Cancel Till</div>
                    
					<?php
					//print_r($result);
					if (!empty($result)) {
					for($i=0;$i< count($result);$i++) { ?>
						<div class="tb_sample_cover211">
                    		<div class="tr_col_01"><?php echo $result[$i]->booking_number; ?></div>
                            <div class="tr_col_01"><?php echo $result[$i]->amount; ?></div>
							 <div class="tr_col_01"><?php echo $result[$i]->created_date; ?></div>
							 
							 <div class="tr_col_01"><?php echo $result[$i]->check_in; ?></div>
                            <div class="tr_col_01"><?php echo $result[$i]->check_out; ?></div>
							 <div class="tr_col_01"><?php echo $result[$i]->cancel_tilldate; ?></div>
							 
                            
                        
                    </div>
				<?php } 
				} else { 
					echo 'Result not found';
				}
				?>
                  
        </div></div>
					<!-- Search result end -->
						  </div>
                    </div>
          
          
          <div class="border_dd"></div>
          <?php echo $this->load->view('b2b/footer'); ?>
        </div>
        </div>
</body>
</html>
