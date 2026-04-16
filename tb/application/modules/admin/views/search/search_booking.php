<link type="text/css" href="<?php echo WEB_DIR_ADMIN; ?>datepickernew/css/overcast/jquery-ui-1.8.6.custom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo WEB_DIR_ADMIN; ?>datepickernew/jquery.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_ADMIN; ?>datepickernew/ui.core.js"></script>
<script type="text/javascript" src="<?php print WEB_DIR_ADMIN; ?>datepickernew/ui.datepicker.js"></script>
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
 <div class="clr"></div>
        <div class="mdle_container"><!--mdle container start-->
        	<div class="agent_dash_out">
            	
                <div class="agent_account_depo-right">
                	<div class="agent_dash-box-out-3">
                   	  <div class="agent_dash-box-title-red-3">
                        	<div class="agent_dash-box-titile-txt-3">Booking Search</div>
                      </div>
					  
                   	  <div class="agent_dash-box-txt-3">
					  <form action="<?php echo WEB_URL; ?>index/search_booking_view" method="post" name="form1" onsubmit="javascript:return valid_date();">
                      <div class="agent_acc_depo-h1-out-3">Quick Search</div>
					  <div class="agent_acc_depo-h1-out-2">
                         <div class="agent_acc_depo-h1-left">Booking Type</div>
                            <div class="agent_acc_depo-h1-right">
                              <select name="type" class="agent_acc_depo-h1-right-fld-3">
                              <option value="hotel" selected="selected">Hotels</option>
                              </select>
                            </div>
                        </div>
   	      <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">From  :</div>
                    <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                        <label>  <input type="text" name="sd" id="datepicker3" readonly="readonly" size="6" onchange="reserveddate()" />    <img src="<?php print WEB_DIR_ADMIN; ?>images/cal.gif" alt="" border="0" /> </label>
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon">
                            </div>
              </div>
                        </div>
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">To :</div>
                            <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                         <label>  <input type="text" name="ed" id="datepicker4" readonly="readonly" size="6" />   <img src="<?php print WEB_DIR_ADMIN; ?>images/cal.gif" alt="" border="0" /></label> 
                            </div>
                            <div class="agent_acc_depo-h1-right-fld-icon"><!--<input type="image" src="images/calendar_day.png"  />-->
                            </div>
                          </div>
                        </div>
                        <div class="agent_acc_depo-sumit"><input type="image" src="<?php print WEB_DIR_ADMIN?>images/search.jpg"  />
                        </div>
						</form>
                        
                        <form name="advance_search" action="<?php echo WEB_URL; ?>index/advanced_search_booking" method="post" >
                        <div class="agent_acc_depo-h1-out-3">Advance Search</div>
                        
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Booking Id :</div>
                            <div class="agent_acc_depo-h1-right">
                              <input name="book_id" type="text" class="agent_acc_depo-h1-right-fld" />
                            </div>
                        </div>
                        
                       <!-- <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Customer Reference :</div>
                            <div class="agent_acc_depo-h1-right">
                              <input name="agent_ref" type="text" class="agent_acc_depo-h1-right-fld" />
                            </div>
                        </div> -->
                        
                        
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Passenger Name :</div>
                          <div class="agent_acc_depo-h1-right">
                            <input name="pass_name" type="text" class="agent_acc_depo-h1-right-fld" />
                            </div>
                        </div>
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Booking Status :</div>
                            <div class="agent_acc_depo-h1-right">
                            <select class="agent_acc_depo-h1-right-fld-3" name="book_type">
                           
                              <option value="1">Confirmed</option>
                                 <option value="2">Cancelled</option>
                                  <!--  <option value="3">Pending</option>-->
                              </select>
                    </div>
                        </div>
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Date Type :</div>
                          <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	               <select class="agent_acc_depo-h1-right-fld-3" name="sel_date_type" >
                         <option value="">Select Date Type</option>
                              <option value="1">Check in date</option>
                                <option value="2">Booking Date</option>
                              </select>                            
                            </div>
                         </div>
                        </div>
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">Between :</div>
                            <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                      <label>  <input name="fdate" type="text" value="" id="datepicker5" maxlength="10" size="7"/>	<img src="<?php print WEB_DIR_ADMIN; ?>images/cal.gif" alt="" border="0" />   </label>                         
                            </div>
                            
                          </div>
                        </div>
                        <div class="agent_acc_depo-h1-out-2">
                        	<div class="agent_acc_depo-h1-left">And :</div>
                            <div class="agent_acc_depo-h1-right">
                            <div class="agent_acc_depo-h1-right-in">
    	                         <label> <input name="tdate" type="text" value="" id="datepicker6" maxlength="10" size="7" />	<img src="<?php print WEB_DIR_ADMIN; ?>images/cal.gif" alt="" border="0" />   </label>                             
                            </div>
                            
                          </div>
                        </div>
                        <div class="clr"></div>
                        <div class="agent_acc_depo-sumit"><input type="image" src="<?php print WEB_DIR_ADMIN?>images/search.jpg" onclick="return valid();"  />
                        
						 </div>
                        <div class="clr"></div>
						</form>
						</div>
                	</div>
                </div>
            </div>
			
            <div class="clr"></div>
            	
			</div>
		       <div class="clr"></div>	